<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2016 NRE
 */


namespace nullref\dialog\widgets;


use nullref\dialog\models\Dialog as DialogModel;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class Messages extends Widget
{
    /** @var DialogModel */
    public $dialog;

    /** @var \nullref\dialog\interfaces\UserModel|null */
    public $user;

    /** @var array  */
    public $dataProviderConfig = [];

    public $canDelete = true;

    public function init()
    {
        parent::init();
        if ($this->dialog === null) {
            throw new InvalidConfigException("Property 'dialog' must be specified.");
        }
    }

    public function run()
    {
        $dataProvider = new ActiveDataProvider(ArrayHelper::merge([
            'query' => $this->dialog->getMessagesRelation(),
        ], $this->dataProviderConfig));

        return $this->render('messages', [
            'dataProvider' => $dataProvider,
            'user' => $this->user,
            'canDelete' => $this->canDelete,
        ]);
    }
}