<?php

namespace nullref\dialog\widgets;

/**
 * @author    Dmytro Karpovych
 * @copyright 2016 NRE
 */

use nullref\dialog\models\Dialog as DialogModel;
use yii\base\InvalidConfigException;
use yii\base\Widget;

class Dialog extends Widget
{
    /** @var DialogModel */
    public $dialog;

    /** @var \nullref\dialog\interfaces\UserModel|null */
    public $user;

    public $canWrite = false;

    public $canDelete = false;

    public function init()
    {
        parent::init();
        if ($this->dialog === null) {
            throw new InvalidConfigException("Property 'model' must be specified.");
        }
    }

    /**
     * @return string
     */
    public function run()
    {
        return $this->render('dialog', [
            'dialog' => $this->dialog,
            'id' => $this->getId(),
            'widget' => $this,
            'user' => $this->user,
        ]);
    }

}