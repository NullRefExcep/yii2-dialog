<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2016 NRE
 */


namespace nullref\dialog\interfaces;


interface Dialog
{
    /**
     * @return Message[]
     */
    public function getMessages();

    /**
     * @return UserModel
     */
    public function getUser();
}