<?php
/**
 * Created by PhpStorm.
 * User: Philippe
 * Date: 05/12/2018
 * Time: 18:24
 */

class User
{

    function __construct($login,$mdp)
    {
        $this->$login = $login;
        $this->$mdp = $mdp;
    }
}