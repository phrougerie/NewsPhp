<?php
/**
 * Created by PhpStorm.
 * User: kevalente
 * Date: 29/11/18
 * Time: 10:29
 */

class News
{
    private $url;
    private $quand;
    private $siteRef;
    private $titre;
    private $des;

    /**
     * News constructor.
     * @param $url
     * @param $quand
     * @param $siteRef
     * @param $titre
     * @param $des
     */
    public function __construct($url, $quand, $siteRef, $titre, $des)
    {
        $this->url = $url;
        $this->quand = $quand;
        $this->siteRef = $siteRef;
        $this->titre = $titre;
        $this->des = $des;
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
    public function getQuand()
    {
        return $this->quand;
    }

    /**
     * @return mixed
     */
    public function getSiteRef()
    {
        return $this->siteRef;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @return mixed
     */
    public function getDes()
    {
        return $this->des;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @param mixed $quand
     */
    public function setQuand($quand)
    {
        $this->quand = $quand;
    }

    /**
     * @param mixed $siteRef
     */
    public function setSiteRef($siteRef)
    {
        $this->siteRef = $siteRef;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @param mixed $des
     */
    public function setDes($des)
    {
        $this->des = $des;
    }






}