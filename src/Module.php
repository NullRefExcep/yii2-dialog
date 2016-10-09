<?php

namespace nullref\dialog;

use nullref\dialog\components\UserManager;
use nullref\core\interfaces\IAdminModule;
use Yii;
use yii\base\InvalidConfigException;
use yii\base\Module as BaseModule;

/**
 * dialog module definition class
 */
class Module extends BaseModule //implements IAdminModule
{
    /**
     * @return UserManager
     */
    public static function getUserManager()
    {
        return Yii::$app->getModule('dialog')->get('userManager');
    }

    /*public static function getAdminMenu()
    {
        return [
            //@todo
        ];
    }*/

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
