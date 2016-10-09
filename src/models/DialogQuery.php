<?php

namespace nullref\dialog\models;

use nullref\dialog\interfaces\UserModel;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Dialog]].
 *
 * @see Dialog
 */
class DialogQuery extends ActiveQuery
{
    /**
     * @inheritdoc
     * @return Dialog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Dialog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @param $type
     * @return $this
     */
    public function byType($type)
    {
        return $this->andWhere(['type' => $type]);
    }

    /**
     * @param UserModel $user
     * @return $this
     */
    public function byUser(UserModel $user)
    {
        return $this->andWhere(['user_id' => $user->getId()]);
    }
}
