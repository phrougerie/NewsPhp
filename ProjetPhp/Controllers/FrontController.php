<?php
/**
 * Created by PhpStorm.
 * User: phrougerie
 * Date: 13/12/18
 * Time: 09:23
 */

class FrontController
{

    function __construct()
    {
        session_start();
        global $rep,$vues;
        $listeAction_Admin = array ('appelco','pageadm','modifLigne','addFlux','geFlux','chargeRSS','suppFlux');
        try{
            $a = mdlAdmin::isAdmin();
            $action = $_REQUEST ['action'];
            if (in_array($action, $listeAction_Admin)){

                if($a == null){
                    require($rep.$vues['pageco']);
                }
                else $ctrA = new CtrlAdmin();
            }
            else $ctrl = new CtrlUser();
        }
        catch(Exception $e2){ require ("vues/erreur.php");}


    }

}