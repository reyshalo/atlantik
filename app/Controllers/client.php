<?php

namespace App\Controllers;

use App\Models\ModeleClient;
use App\Models\ModeleLiaison;
use App\Models\ModeleSecteur;
use App\Models\ModeleTarif;
use App\Models\ModeleTraversee;

helper(['url', 'assets', 'form']); // donne accès aux fonctions du helper 'asset'

class Visiteur extends BaseController
{
    public function historiquereserve($pagination = null)
    {
        
    }
}