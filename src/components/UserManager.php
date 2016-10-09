<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2016 NRE
 */


namespace nullref\dialog\components;

use nullref\dialog\interfaces\UserManager as UserManagerInterface;
use yii\base\Component;
use yii\base\InvalidConfigException;

/**
 * Class UserFinder
 * @package nullref\dialog\models
 *
 * @property string $userClass
 */
class UserManager extends Component implements UserManagerInterface
{
    /**
     * @var string
     */
    protected $_modelClass;

    /**
     * @return string
     */
    public function getModelClass()
    {
        return $this->_modelClass;
    }

    /**
     * @param string $userClass
     */
    public function setModelClass($userClass)
    {
        $this->_modelClass = $userClass;
    }

    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();
        if ($this->_modelClass === null) {
            throw new InvalidConfigException('"modelClass" must be set');
        }
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->_modelClass;
    }

    /**
     * @return mixed
     */
    public function createModel()
    {
        return \Yii::createObject($this->_modelClass);
    }
}