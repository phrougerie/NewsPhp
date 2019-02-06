<?php

class Validation {

static function val_action($action) {

if (!isset($action)) {
throw new Exception('pas d\'action');

}
}

    static function val_page(int &$page, array &$dVueEreur) : int
    {
        if (!isset($page) || $page == null || $page<0) {
            return $page = 1;
        }
        if ($page != filter_var($page, FILTER_VALIDATE_INT)) {
            $dVueEreur[] = "testative d'injection de code (attaque sécurité)";
        }
        return $page;
    }

    static function val_number(int &$nbL, array &$dVueEreur)
    {

        if (!isset($nbL) || $nbL == null) {
            $dVueEreur[] = "Pas de nombre";

        }

        if ($nbL != filter_var($nbL, FILTER_VALIDATE_INT)) {
            $dVueEreur[] = "testative d'injection de code (attaque sécurité)";


        }
    }

    static function val_flux(string &$urlS, string &$urlF, array &$dVueEreur) {
        if (!isset($urlS) || $urlS == "" || !filter_var($urlS, FILTER_VALIDATE_URL)) {
            $dVueEreur[] = "Url du site non valide";
        }
        if (!isset($urlF) || $urlF == "" || !filter_var($urlF, FILTER_VALIDATE_URL)) {
            $dVueEreur[] = "Url du flux non valide";
        }

    }




}
?>

        