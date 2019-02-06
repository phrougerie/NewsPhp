<?php
/**
 * Created by PhpStorm.
 * User: phrougerie
 * Date: 20/12/18
 * Time: 07:46
 */

class Admin
{
    private $login;
    private $role;

    function __construct($login,$role)
    {
        $this->$login = $login;
        $this->$role = $role;
    }
}