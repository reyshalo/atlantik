<?php

namespace App\Models;

use CodeIgniter\Model;

 

class ModeleTraversee extends Model

{

    protected $table = 'traversee';

    /* ci-dessus on indique la table a 'mapper' */

    protected$primaryKey = 'NOTRAVERSEE '; // clé primaire

    protected $useAutoIncrement = true;

    protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)

    protected $allowedFields = ['noliaison', 'nobateau','dateheuredepart','DATEHEUREARRIVEE'];

    /* champs pour lesquels insertion, et mises à jour sont autorisées

    Nota Bene : on autorisera les champs en AUTOINCREMENT */



public function GetHorairetraversee($liaison)
{
    {
        return $this->select('traversee.notraversee, TIME(traversee.DATEHEUREDEPART) AS heure_depart, bateau.nom, categorie.LIBELLe as libelle, SUM(enregistrer.QUANTITERESERVEE) AS quantite_reservee, enregistrer.LETTRECATEGORIE')
        ->join('bateau', 'traversee.NOBATEAU = bateau.NOBATEAU')
        ->join('reservation', 'traversee.NOTRAVERSEE = reservation.NOTRAVERSEE')
        ->join('enregistrer', 'reservation.NORESERVATION = enregistrer.NORESERVATION')
        ->join('type', 'enregistrer.NOTYPE = type.NOTYPE')
        ->join('categorie', 'type.LETTRECATEGORIE = categorie.LETTRECATEGORIE')
        ->join('liaison', 'traversee.noliaison = liaison.noliaison')
        ->where('liaison.noliaison', $liaison)
        //->like('reservation.dateheure', $date, 'after')
        ->groupBy('traversee.notraversee, heure_depart, bateau.nom, categorie.LIBELLE, enregistrer.LETTRECATEGORIE')
        ->limit(3)
        ->get()
        ->getResult();
    }
}
}