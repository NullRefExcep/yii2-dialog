<?php

namespace nullref\dialog\models;

use nullref\dialog\interfaces\Dialog as DialogInterface;
use nullref\dialog\interfaces\UserModel;
use nullref\dialog\Module;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%dialog}}".
 *
 * @property integer $id
 * @property string $type
 * @property integer $created_at
 * @property integer $user_id
 *
 * @property Message[] $messagesRelation
 * @property UserModel[] $usersRelation
 * @property UserModel $userRelation
 */
class Dialog extends ActiveRecord implements DialogInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dialog}}';
    }

    /**
     * @inheritdoc
     * @return DialogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DialogQuery(get_called_class());
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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['type', 'string'],
            [['created_at', 'user_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('dialog', 'ID'),
            'type' => Yii::t('dialog', 'Type'),
            'created_at' => Yii::t('dialog', 'Created At'),
            'user_id' => Yii::t('dialog', 'User'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getUserRelations()
    {
        return $this->hasMany(Module::getUserManager()->getModelClass(), ['id' => 'user_id '])
            ->via('messagesRelation');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessagesRelation()
    {
        return $this->hasOne(Message::className(), ['dialog_id' => 'id']);
    }

    /**
     * @return Message[]
     */
    public function getMessages()
    {
        return $this->messagesRelation;
    }

    /**
     * @return UserModel
     */
    public function getUser()
    {
        return $this->userRelation;
    }
}
