<?php
/**
 * Created by PhpStorm.
 * User: Philippe
 * Date: 05/12/2018
 * Time: 17:50
 */

class CtrlAdmin
{
    function __construct() {
        global $rep,$vues; // nécessaire pour utiliser variables globales
// on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)



//debut

//on initialise un tableau d'erreur
        $dVueEreur = array ();

        try{
            $action=$_REQUEST['action'];

            switch($action) {

//pas d'action, on r�initialise 1er appel
                case 'pageadm':
                    $this->pageAdmin();
                    //$this->Reinit();
                    break;
                case 'chargeRSS';
                    $this->chargeRss();
                    break;
                case 'geFlux' :
                    $this->geGlux();
                    break;
                case 'suppFlux':
                    $this->suppFlux();
                    break;

                case "modifLigne":
                    $this->ModifLigne($dVueEreur);
                    break;


                case "addFlux":
                    $this->addFlux($dVueEreur);
                    break;


//mauvaise action
                default:
                    $dVueEreur[] =	"Erreur d'appel php";
                    require ($rep.$vues['vuephp1']);
                    break;
            }

        } catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);

        }
        catch (Exception $e2)
        {
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }


//fin
        exit(0);
    }//fin constructeur


    //Modifie le nombre de lignes

    private function pageAdmin() {

        global $rep,$vues;
        require($rep.$vues['pagead']);


    }
    private function chargeRss() {

        global $rep,$parseur,$vues;
        require($rep.$vues['pagead']);
        require ($rep.$parseur['parseur']);


    }
    private function suppFlux(){
        $fluRl=$_POST['fluRl'];
        $mdlF = new MdlFlux();
        $mdlF->deleteFlux($fluRl);

        $this->geGlux();

    }

    private function geGlux() {

        global $rep,$vues;

        $modFlux = new MdlFlux();

        $listeFlux =$modFlux->GetFlux();

        require($rep.$vues['geFlux']);


    }


    private function addFlux(array $dVueEreur){
        $siteRef=$_POST['txtUrlSite'];
        $flux=$_POST['txtFlux'];
        Validation::val_flux($siteRef, $flux,$dVueEreur);
        $mdF = new MdlFlux();
        $mdF->insertFlux($flux,$siteRef);
        $this->pageAdmin();

}


    private function ModifLigne(array $dVueEreur){

        $nbLigne = $_POST['nbL'];

        Validation::val_number($nbLigne,$dVueEreur);

        $mdlNum = new mdlNumber();
        $mdlNum->updateNum($nbLigne);
        $this->pageAdmin();

    }



}//fin class

?>