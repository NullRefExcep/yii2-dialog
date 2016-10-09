<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2016 NRE
 */


namespace nullref\dialog\widgets;


use nullref\dialog\models\MessageForm;
use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;

class DialogMessageForm extends Widget
{
    /** @var  Dialog */
    public $dialog;

    /** @var \nullref\dialog\interfaces\UserModel|null */
    public $user;


    public function init()
    {
        parent::init();
        if ($this->dialog === null) {
            throw new InvalidConfigException("Property 'dialog' must be specified.");
        }
    }

    public function run()
    {
        /** @var MessageForm $messageForm */
        $messageForm = Yii::createObject(MessageForm::className());

        if ($this->user !== null) {
            $messageForm->userId = $this->user->getId();
        }

        return $this->render('dialog-message-form', [
            'messageForm' => $messageForm,
            'dialog' => $this->dialog,
        ]);
    }


}