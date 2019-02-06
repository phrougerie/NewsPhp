<?php
/**
 * Created by PhpStorm.
 * User: Philippe
 * Date: 05/12/2018
 * Time: 17:50
 */

class CtrlUser
{
    function __construct()
    {
        $dVueEreur = array ();
    try{
        $action =$_REQUEST['action'];
        switch($action){
            case NULL:
            case 'prin':
            $this->pagePrin($dVueEreur);
                break;
            case 'connect':
                $this->connect();
                break;

            case 'cliqueNews':
                $this->cliquerPrec();
                break;
            case 'deco':
                $this->deco($dVueEreur);
                break;
            default:
                require ('erreur.php');

        }
    }
    catch (PDOException $epdo){ echo $epdo->getMessage();require ("vues/erreur.php");}
    catch(Exception $e2){ require ("vues/erreur.php");}

    }

    private function pagePrin($dVueEreur) {
        global $rep,$vues;

        $page = $_GET['page'];
        if($page==null){
            $page=1;
        }
        $mdlNum = new mdlNumber();
        $nbLignes = $mdlNum->findnumber();
        $val = new Validation();
        $val->val_number($nbLignes, $dVueEreur);

        //Creer validPage
        if($val->val_Page($page,$dVueEreur )){
            $modNews = new ModeleNews();

        }


        $listeNews =$modNews->GetNews($page);
        $max=$modNews->Max();


        require($rep.$vues['pagesp']);


    }

    private function deco($dVueEreur){
        global $rep,$vues;
        $mdlAd = new mdlAdmin();
        $mdlAd->deconnexion();
        $this->pagePrin($dVueEreur);

    }
    private function connect() {
        global $rep,$vues;
        $login = $_REQUEST['pseudo'];
        $mdp = $_REQUEST['mdp'];
        $mdlAd = new mdlAdmin();
        $verif = $mdlAd->connection($login,$mdp);

        if ($verif != null){
            require($rep.$vues['pagead']);
        }
        else{
            require ($rep.$vues['pageco']);
        }

    }



}
