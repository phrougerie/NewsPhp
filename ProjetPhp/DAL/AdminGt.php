<?php
/**
 * Created by PhpStorm.
 * User: Philippe
 * Date: 18/12/2018
 * Time: 21:40
 */

class AdminGt
{

    private $co;
    public function __construct()
    {
        global $base,$login,$mdp;
        $this->co = new Connection($base,$login,$mdp);
    }

    function checkAdmin($login,$mdp){

        $querry='Select * from Admins where login=:login and mdp=:mdp';
        $this->co->executeQuery($querry, array(':login' => array($login,PDO::PARAM_STR),':mdp' => array($mdp,PDO::PARAM_STR)));
        $result = $this->co->getResults();

        if (isset ($result[0])){
            if(isset($_SESSION['login'])) echo 'lama';

            return true;
        }
        else return false;
    }

}