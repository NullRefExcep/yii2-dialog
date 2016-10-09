<?php

namespace nullref\dialog\models;

use nullref\dialog\interfaces\UserModel;
use nullref\dialog\Module;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use nullref\dialog\interfaces\Message as MessageInterface;

/**
 * This is the model class for table "{{%dialog_message}}".
 *
 * @property integer $id
 * @property integer $dialog_id
 * @property integer $user_id
 * @property string $text
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Dialog $dialogRelation
 * @property UserModel $userRelation
 */
class Message extends ActiveRecord implements MessageInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dialog_message}}';
    }

    /**
     * @inheritdoc
     * @return MessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessageQuery(get_called_class());
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDialogRelation()
    {
        return $this->hasOne(Dialog::className(), ['id' => 'dialog_id']);
    }

    /**
     * @return Dialog
     */
    public function getDialog()
    {
        return $this->dialogRelation;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dialog_id', 'user_id'], 'required'],
            [['dialog_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['text'], 'string'],
            [['dialog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dialog::className(), 'targetAttribute' => ['dialog_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('dialog', 'ID'),
            'dialog_id' => Yii::t('dialog', 'Dialog ID'),
            'user_id' => Yii::t('dialog', 'User ID'),
            'text' => Yii::t('dialog', 'Text'),
            'created_at' => Yii::t('dialog', 'Created At'),
            'updated_at' => Yii::t('dialog', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRelation()
    {
        return $this->hasOne(Module::getUserManager()->getModelClass(), ['id' => 'user_id']);
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param $user UserModel|null
     * @return bool
     */
    public function isOwner($user)
    {
        if ($user === $this->getUser()) {
            return true;
        }
        if ($user === null) {
            return false;
        }
        if ($this->getUser() === null) {
            return false;
        }
        return $user->getId() === $this->getUser()->getId();
    }

    /**
     * @return UserModel
     */
    public function getUser()
    {
        return $this->userRelation;
    }
}
