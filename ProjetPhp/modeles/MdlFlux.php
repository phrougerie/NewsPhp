<?php
/**
 * Created by PhpStorm.
 * User: phrougerie
 * Date: 09/01/19
 * Time: 11:54
 */

class MdlFlux
{
    function insertFlux($fluRl,$url){
        $gateway = new FluxGt();
        $gateway->insertFlux($fluRl,$url);
    }
    function GetFlux(){
        $gateway = new FluxGt();
        return $gateway->findAllFlux();
    }

    function deleteFlux($fluRl){
        $gt = new FluxGt();
        $gt->deleteFlux($fluRl);
    }

}