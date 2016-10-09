<?php

namespace nullref\dialog\models;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[UserHasDialog]].
 *
 * @see UserHasDialog
 */
class UserHasDialogQuery extends ActiveQuery
{
    /**
     * @inheritdoc
     * @return UserHasDialog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserHasDialog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
