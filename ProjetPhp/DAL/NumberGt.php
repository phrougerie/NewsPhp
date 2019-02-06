<?php
/**
 * Created by PhpStorm.
 * User: Philippe
 * Date: 09/01/2019
 * Time: 21:09
 */

class NumberGt
{

    private $co;
    public function __construct()
    {
        global $base,$login,$mdp;
        $this->co = new Connection($base,$login,$mdp);
    }

    public function findnumber(){

        $querry = 'Select * FROM num';
        $this->co->executeQuery($querry);

        $result = $this->co->getResults();

        return $result[0]['nbLignes'];

    }

    public function updateNumber($nbLigne){
        echo $nbLigne;
        $query='Update num set nbLignes=:nbLigne';
        $this->co->executeQuery($query,
            array(':nbLigne'=>array($nbLigne, PDO::PARAM_INT)
            ));
    }

}