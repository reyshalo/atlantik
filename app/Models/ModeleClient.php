<?php

namespace App\Models;

use CodeIgniter\Model;

 

class ModeleClient extends Model

{

    protected $table = 'Client';

    /* ci-dessus on indique la table a 'mapper' */

    protected$primaryKey = 'noclient'; // clé primaire

    protected $useAutoIncrement = true;

    protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)

    protected $allowedFields = ['nom', 'prenom',  'adresse', 'codepostal', 'ville', 'telephonefixe', 'telephonemobile',  'mel', 'motdepasse'];

    /* champs pour lesquels insertion, et mises à jour sont autorisées

    Nota Bene : on autorisera les champs en AUTOINCREMENT */

// Nota Bene : ModeleLiaison héritent de très nombreuses méthodes : find, findAll, insert, update...

// Pour la liste complète : https://codeigniter.com/user_guide/models/model.html
public function seconnecter($mel, $mdp)
{
    return $this->select('prenom,nom')
                ->where('mel',$mel)
                ->where('motdepasse', $mdp)
                ->findAll();
}
}