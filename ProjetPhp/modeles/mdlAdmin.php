<?php
/**
 * Created by PhpStorm.
 * User: Philippe
 * Date: 18/12/2018
 * Time: 21:35
 */

class mdlAdmin
{

    function connection ($login,$mdp){

        $login=filter_var($login,FILTER_SANITIZE_STRING);
        $mdp=filter_var($mdp,FILTER_SANITIZE_STRING);
        $gt = new AdminGt($login,$mdp);
        $boo = $gt->checkAdmin($login,$mdp);

        if(!$boo) {
            return null;
        }
        else{

            $_SESSION['role'] = 'admin';
            $_SESSION['login'] = $login;
            return new User($login,$mdp);
        }
    }

    function isAdmin(){

        if(isset($_SESSION['login']) && isset($_SESSION['role'])){
            $login=filter_var($_SESSION['login'],FILTER_SANITIZE_STRING);
            $role = filter_var($_SESSION['role'],FILTER_SANITIZE_STRING);

            return new Admin($login,$role);
        }
        else return null;
    }

    function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION = array();
    }
}