<?php

namespace App\Controllers;

 

class Connecter extends BaseController

{

    public function connexion()

    {

        return view('vue_Accueil.php');

        /* retour de la vue : "vue_bonjour" du dossier "Test" situé dans "Views" (pas d'affichage dans le contrôleur !) */

    }

}