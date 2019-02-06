<?php
/**
 * Created by PhpStorm.
 * User: phrougerie
 * Date: 09/01/19
 * Time: 15:42
 */

class Flux
{
    private $url;
    private $fluRl;

    /**
     * News constructor.
     * @param $url
     * @param $quand
     * @param $siteRef
     * @param $titre
     * @param $des
     */
    public function __construct($fluRl,$url )
    {
        $this->url = $url;
        $this->fluRl = $fluRl;

    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getFluRl()
    {
        return $this->fluRl;
    }

    /**
     * @return mixed
     */







}