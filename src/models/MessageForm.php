<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2016 NRE
 */


namespace nullref\dialog\models;


use Yii;
use yii\base\Model;

class MessageForm extends Model
{
    public $text;
    public $userId;

    protected $message;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['text', 'required'],
            ['userId', 'safe'],
        ];
    }

    /**
     * @param Dialog $dialog
     * @return bool
     */
    public function createMessage(Dialog $dialog)
    {
        /** @var Message $message */
        $message = Yii::createObject(Message::className());

        $message->text = $this->text;
        $message->user_id = $this->userId;

        $message->link('dialogRelation', $dialog);

        return !$message->hasErrors();
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

}