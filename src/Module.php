<?php

namespace nullref\dialog;

use nullref\dialog\components\UserManager;
use Yii;
use yii\base\InvalidConfigException;
use yii\base\Module as BaseModule;

/**
 * dialog module definition class
 */
class Module extends BaseModule
{
    /**
     * @return UserManager
     */
    public static function getUserManager()
    {
        return Yii::$app->getModule('dialog')->get('userManager');
    }

    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();
        if (!$this->has('userManager')) {
            throw new InvalidConfigException('"userManager" component must be set');
        }
    }
}
