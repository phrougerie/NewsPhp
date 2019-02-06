
/**
 * Created by PhpStorm.
 * User: phrougerie
 * Date: 06/12/18
 * Time: 09:19
 */
<html>




<body>

<?php
global $rep,$vues;
require($rep.$vues['preface']);

?>
<h2>Dernières actualités :</h2>

<div class="container-fluid" id="Serie">
    <div class="row" id="box-search">
        <div class="thumbnail text-center">



<?php


if(isset($listeNews)){
    foreach ($listeNews as $n){
        echo '<h2><a href = '.$n->getUrl().'>'.$n->getTitre().'</br></a></h2>';

        echo '<p>'.$n->getDes().'<p>';
        echo '<p>'.$n->getQuand().' source : '.$n->getSiteRef().' </p>';

    }
}

?>

        </div>
    </div>
</div>

<?php
if(isset($page)){
    if($page<1){
        $page=1;
    }
    else{
        if($page == 1){
            echo 'Page : 1';
            echo '<a href = index.php?page='.($page+1).'> > </a>';
        }
        else{
            //if($page == $page*$nbligne){
            if($max%$nbLignes == $page){
                echo '<a href = index.php?page=1> << </a>';
                echo '<a href = index.php?page='.($page-1).'> < </a>';
                echo "page : ".$page;
            }
            else{
                echo '<a href = index.php?page=1> << </a>';
                echo '<a href = index.php?page='.($page-1).'> < </a>';
                echo "page : ".$page;
                echo '<a href = index.php?page='.($page+1).'> > </a>';
            }
        }
    }



}



?>

</body>

</html>