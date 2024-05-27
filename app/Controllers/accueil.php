<?php

namespace App\Controllers;

 

class Accueil extends BaseController

{

    public function AccueilAffiche()

    {

        return view('Template/Header')

            . view('vue_Accueil')

            . view('Template/Footer');
        /* retour de la vue : "vue_bonjour" du dossier "Test" situé dans "Views" (pas d'affichage dans le contrôleur !) */

    }

}