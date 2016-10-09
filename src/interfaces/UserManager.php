<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2016 NRE
 */


namespace nullref\dialog\interfaces;


interface UserManager
{
    /**
     * @return mixed
     */
    public function getClass();

    /**
     * @return mixed
     */
    public function createModel();
}