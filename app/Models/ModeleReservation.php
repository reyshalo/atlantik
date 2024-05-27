<?php

namespace App\Models;

use CodeIgniter\Model;

 

class ModeleClient extends Model

{

    protected $table = 'Reservation';

    /* ci-dessus on indique la table a 'mapper' */

    protected$primaryKey = 'noreservation'; // clé primaire

    protected $useAutoIncrement = true;

    protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)

    protected $allowedFields = [];

    /* champs pour lesquels insertion, et mises à jour sont autorisées

    Nota Bene : on autorisera les champs en AUTOINCREMENT */

// Nota Bene : ModeleLiaison héritent de très nombreuses méthodes : find, findAll, insert, update...

// Pour la liste complète : https://codeigniter.com/user_guide/models/model.html
public function historiquereserve($noclient)
{
    return $this->select('noreservation , dateheure, noporttdepart, noportarriver, dateheuredepar, montanttotal , paye')
    ->join('port as port_depart', 'port_depart.NOPORT = liaison.NOPORT_DEPART')
    ->join('port as port_arrivee', 'port_arrivee.NOPORT = liaison.NOPORT_ARRIVEE')
    ->where('noclient', $noclient)
    ->findAll();
}
}