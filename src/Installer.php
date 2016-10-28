<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2016 NRE
 */


namespace nullref\dialog;


use nullref\core\components\ModuleInstaller;
use yii\helpers\Console;

class Installer extends ModuleInstaller
{
    public function getModuleId()
    {
        return 'dialog';
    }

    protected function getConfigArray()
    {
        $config = parent::getConfigArray();
        $userModelClass = Console::prompt('Enter user class model', ['default' => 'app\models\User']);
        $config['components'] = [
            'userManager' => [
                'class' => 'nullref\dialog\components\UserManager',
                'modelClass' => $userModelClass,
            ],
        ];
        return $config;
    }

}