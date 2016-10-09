<?php

namespace nullref\dialog\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%user_has_dialog}}".
 *
 * @property integer $user_id
 * @property integer $dialog_id
 */
class UserHasDialog extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_has_dialog}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'dialog_id'], 'required'],
            [['user_id', 'dialog_id'], 'integer'],
            [['dialog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dialog::className(), 'targetAttribute' => ['dialog_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('dialog', 'User ID'),
            'dialog_id' => Yii::t('dialog', 'Dialog ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return UserHasDialogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserHasDialogQuery(get_called_class());
    }
}
