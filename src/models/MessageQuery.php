<?php

namespace nullref\dialog\models;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Message]].
 *
 * @see Message
 */
class MessageQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     * @return Message[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Message|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
