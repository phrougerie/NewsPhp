<?php

//gen
$rep=__DIR__.'/../';


//BD

$base="mysql:host=localhost;dbname=phrougerie";
$login="phrougerie";
$mdp="achanger";

//Vues

$vues['erreur']='vues/erreur.php';
$vues['pagesp']='vues/PagePrin.php';
$vues['pageco']='vues/PageConnect.php';
$vues['pagead']='vues/PageAdmin.php';
$vues['preface']='vues/preface.php';
$vues['geFlux']='vues/afficheflux.php';

//Appel parseur
$parseur['parseur']='parseur/Appel.php';



?>