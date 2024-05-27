<?php

namespace App\Models;

use CodeIgniter\Model;

 

class ModeleLiaison extends Model

{

    protected $table = 'Liaison';

    /* ci-dessus on indique la table a 'mapper' */

    protected$primaryKey = 'noliaison'; // clé primaire

    protected $useAutoIncrement = true;

    protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)

    protected $allowedFields = ['noliaison', 'noport_depart', 'nosecteur',  'noport_arrivee', 'distance'];

    /* champs pour lesquels insertion, et mises à jour sont autorisées

    Nota Bene : on autorisera les champs en AUTOINCREMENT */

// Nota Bene : ModeleLiaison héritent de très nombreuses méthodes : find, findAll, insert, update...

// Pour la liste complète : https://codeigniter.com/user_guide/models/model.html
    public function GetLiaison()
    {
        return $this->select('distance, liaison.noliaison as codeliaison, secteur.NOM as nom_secteur, port_depart.NOM as nom_port_depart, port_arrivee.NOM as nom_port_arrivee')
                    ->join('secteur', 'secteur.NOSECTEUR = liaison.NOSECTEUR')
                    ->join('port as port_depart', 'port_depart.NOPORT = liaison.NOPORT_DEPART')
                    ->join('port as port_arrivee', 'port_arrivee.NOPORT = liaison.NOPORT_ARRIVEE')
                    ->findAll();
    }
    public function getLiaisontarif($liaison)
    {
        return $this->select('liaison.noliaison, port_depart.NOM as nom_port_depart, port_arrivee.NOM as nom_port_arrivee')
            ->join('port as port_depart', 'port_depart.NOPORT = liaison.NOPORT_DEPART')
            ->join('port as port_arrivee', 'port_arrivee.NOPORT = liaison.NOPORT_ARRIVEE')
            ->where('liaison.noliaison', $liaison)
            ->findAll();
    }
    public function Getliaisonpoursecteur($secteur){
    return $this->select('liaison.noliaison, port_depart.NOM as nom_port_depart, port_arrivee.NOM as nom_port_arrivee')
            ->join('secteur', 'secteur.NOSECTEUR = liaison.NOSECTEUR')
            ->join('port as port_depart', 'port_depart.NOPORT = liaison.NOPORT_DEPART')
            ->join('port as port_arrivee', 'port_arrivee.NOPORT = liaison.NOPORT_ARRIVEE')
            ->where('secteur.nosecteur', $secteur)
            ->findAll();
    }
}