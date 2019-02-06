<?php
/**
 * Created by PhpStorm.
 * User: kevalente
 * Date: 29/11/18
 * Time: 10:53
 */

class NewsGt
{

    private $co;
    private $max;

    /**
     * NewsGt constructor.
     * @param $con
     */
    public function __construct()
    {
        global $base,$login,$mdp;
        $this->co = new Connection($base,$login,$mdp);
    }

    public function insertNews($url, $quand, $siteRef, $titre, $des){
        $query='INSERT INTO  news Values (:url,:quand,:sr,:titre,:des)';
        $this->co->executeQuery($query,
            array(':url'=>array($url, PDO::PARAM_STR),
                ':quand'=>array($quand, PDO::PARAM_STR),
                ':sr'=>array($siteRef, PDO::PARAM_STR),
                ':titre' =>array($titre, PDO::PARAM_STR),
                ':des' =>array(des, PDO::PARAM_STR)
            ));
    }

    /**
     * @return mixed
     */
    public function getMax()
    {
        return $this->max;
    }



    public function findAllNews($page){
        $gt = new NumberGt();
        $nbLigne=$gt->findnumber();
        $clc = ($page-1)*$nbLigne;
        $querry = 'Select count(*) FROM News ';
        $this->co->executeQuery($querry);
        $result = $this->co->getResults();
        $max = $nbLigne*$page;
        //echo intval($result[0],$base=10);
        if($max > $result[0]){$max=$result[0];}

        $this->max=$max;

        $querry = 'Select * FROM News order by quand=:quand desc LIMIT '.$clc.','. $max;
        $this->co->executeQuery($querry,array(':quand'=>array("quand",PDO::PARAM_STR)));
        $result = $this->co->getResults();
        foreach ($result as $row){
            $tnews[] = new News($row['url'],$row['quand'],$row['siteRef'],$row['titre'],$row['des']);
        }
        return $tnews;

    }

    public function insertNewsbyNews(News $news){
        $query='INSERT INTO  news Values (:url,:quand,:sr,:titre,:des';
        $this->co->executeQuery($query,
            array(':url'=>array($news->getUrl(), PDO::PARAM_STR),
                ':quand'=>array($news->getQuand(), PDO::PARAM_STR),
                ':sr'=>array($news->getSiteRef(), PDO::PARAM_STR),
                ':titre' =>array($news->getTitre(), PDO::PARAM_STR),
                ':des' =>array($news->getDes(), PDO::PARAM_STR)
            ));
    }


}