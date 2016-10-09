<?php
/**
 * @author    Dmytro Karpovych
 * @copyright 2016 NRE
 */


namespace nullref\dialog\interfaces;


interface Message
{
    /**
     * @return string
     */
    public function getText();

    /**
     * @return Dialog
     */
    public function getDialog();

    /**
     * @return UserModel|null
     */
    public function getUser();

    /**
     * @param $user UserModel|null
     * @return boolean
     */
    public function isOwner($user);
}