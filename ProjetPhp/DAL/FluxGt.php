<?php
/**
 * Created by PhpStorm.
 * User: phrougerie
 * Date: 13/12/18
 * Time: 09:26
 */

class FluxGt
{
    private $co;
    public function __construct()
    {
        global $base,$login,$mdp;
        $this->co = new Connection($base,$login,$mdp);
    }

    public function findAllFlux(){

        $querry = 'Select * FROM Flux';
        $this->co->executeQuery($querry);

        $result = $this->co->getResults();
        foreach ($result as $row){
            $tflux[] = new Flux($row['fluRl'],$row['url']);
        }

        return $tflux;

    }

    public function insertFlux($fluRl,$url){
        $query='INSERT INTO  Flux Values (:fluRl,:url)';
        $this->co->executeQuery($query,
            array(':fluRl'=>array($fluRl, PDO::PARAM_STR),
                ':url'=>array($url, PDO::PARAM_STR)));
    }
    public function deleteFlux($fluRl){
        $query='DELETE FROM Flux WHERE fluRl=:fluRl';
        $this->co->executeQuery($query,
            array(':fluRl'=>array($fluRl, PDO::PARAM_STR) ));
    }

}