
/**
 * Created by PhpStorm.
 * User: phrougerie
 * Date: 09/01/19
 * Time: 15:33
 */

<html>




<body>

<?php
global $rep,$vues;
require($rep.$vues['preface']);

?>
<h2>Flux :</h2>

<div class="container-fluid" id="Serie">
    <div class="row" id="box-search">
        <div class="thumbnail text-center">



<?php


if(isset($listeFlux)){
    foreach ($listeFlux as $f){

        echo'<form action="index.php?action=suppFlux" method="post">
                <div class="form-group">
                    <label for="nbL">Nombre de lignes : </label>
                    <Input type="text" name="fluRl" value='.$f->getFluRl().' class="form-control" readonly />

                </div>
                <button type="submit" class="btn btn-default">Supprimer</button>

            </form>';



    }
}

?>

        </div>
    </div>
</div>


</body>

