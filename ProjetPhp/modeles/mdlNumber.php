<?php
/**
 * Created by PhpStorm.
 * User: Philippe
 * Date: 06/02/2019
 * Time: 12:26
 */

class mdlNumber
{
    private $gateway;

    /**
     * ModeleNews constructor.
     * @param $gateway
     */
    public function __construct()
    {
        $this->gateway = new NumberGt();
    }
    public function updateNum($nbLigne){

        $this->gateway->updateNumber($nbLigne);

    }
    public function findnumber()
    {

        return $this->gateway->findnumber();
    }

}