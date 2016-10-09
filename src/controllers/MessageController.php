<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2016 NRE
 */


namespace nullref\dialog\controllers;


use nullref\useful\filters\RedirectFilter;
use nullref\dialog\models\Dialog;
use nullref\dialog\models\Message;
use nullref\dialog\models\MessageForm;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class MessageController extends Controller
{
    public function behaviors()
    {
        return [
            'redirect' => RedirectFilter::class,
        ];
    }

    /**
     * Deletes an existing Message model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();


        if ($url = Yii::$app->request->get('redirect_url')) {
            return $this->redirect($url);
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Message model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Message the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Message::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @param $dialog_id
     * @return mixed|string
     */
    public function actionCreate($dialog_id)
    {
        /** @var MessageForm $form */
        $form = Yii::createObject(MessageForm::className());

        $dialog = $this->findDialog($dialog_id);

        if ($form->load(Yii::$app->request->post()) && $form->createMessage($dialog)) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return $form->getMessage();
            }
            return $this->render('view', [
                'message' => $form->getMessage(),
            ]);
        }
        return $this->render('create', [
            'form' => $form,
        ]);
    }

    /**
     * @param $dialog_id
     * @return Dialog
     * @throws NotFoundHttpException
     */
    protected function findDialog($dialog_id)
    {
        $model = Dialog::findOne($dialog_id);

        if ($model === null) {
            throw  new NotFoundHttpException();
        }

        return $model;
    }
}