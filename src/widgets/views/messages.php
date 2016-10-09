<?php
/**
 * @var  $this            \yii\web\View
 * @var  $canDelete        boolean
 * @var  $dialog           \nullref\dialog\models\Dialog
 * @var  $dataProvider    \yii\data\ActiveDataProvider
 * @var  $user            \nullref\dialog\interfaces\UserModel|null
 */
use nullref\dialog\models\Message;
use yii\widgets\ListView;

?>

<div class="dialog-messages">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'emptyText' => Yii::t('dialog', 'No messages'),
        'layout' => '{items}',
        'itemView' => function (Message $model, $key, $index, ListView $widget) use ($user, $canDelete) {
            if ($model->isOwner($user)) {
                return $widget->view->render('_own_message', [
                    'model' => $model,
                    'canDelete' => $canDelete,
                ]);
            }
            return $widget->view->render('_message', [
                'model' => $model,
            ]);
        }
    ]) ?>
</div>
