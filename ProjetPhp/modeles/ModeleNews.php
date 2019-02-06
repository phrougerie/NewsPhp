<?php
/**
 * Created by PhpStorm.
 * User: phrougerie
 * Date: 06/12/18
 * Time: 10:24
 */

class ModeleNews {

    private $gateway;

    /**
     * ModeleNews constructor.
     * @param $gateway
     */
    public function __construct()
    {
        $this->gateway = new NewsGt();
    }


    /**
     * @return mixed
     */
    function GetNews($page){

        return $this->gateway->findAllNews($page);
    }

    function Max(){

        return $this->gateway->getMax();
    }


}