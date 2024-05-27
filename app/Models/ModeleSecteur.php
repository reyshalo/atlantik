<?php

namespace App\Models;

use CodeIgniter\Model;

 

class ModeleSecteur extends Model

{

    protected $table = 'Secteur';

    /* ci-dessus on indique la table a 'mapper' */

    protected$primaryKey = 'nosecteur'; // clé primaire

    protected $useAutoIncrement = true;

    protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)

    protected $allowedFields = ['nosecteur', 'nom'];

    /* champs pour lesquels insertion, et mises à jour sont autorisées

    Nota Bene : on autorisera les champs en AUTOINCREMENT */

// Nota Bene : ModeleLiaison héritent de très nombreuses méthodes : find, findAll, insert, update...

// Pour la liste complète : https://codeigniter.com/user_guide/models/model.html
public function getSecteur() {
    return $this->select('nosecteur, nom')->findAll();
}
public function GetHorairetraversee($liaison,$date)
{
    {
        return $this->select('traversee.notraversee, TIME(traversee.DATEHEUREDEPART) AS heure_depart, bateau.nom, categorie.LIBELLE, SUM(enregistrer.QUANTITERESERVEE) AS quantite_reservee, enregistrer.LETTRECATEGORIE')
        ->join('bateau', 'traversee.NOBATEAU = bateau.NOBATEAU')
        ->join('reservation', 'traversee.NOTRAVERSEE = reservation.NOTRAVERSEE')
        ->join('enregistrer', 'reservation.NORESERVATION = enregistrer.NORESERVATION')
        ->join('type', 'enregistrer.NOTYPE = type.NOTYPE')
        ->join('categorie', 'type.LETTRECATEGORIE = categorie.LETTRECATEGORIE')
        ->join('liaison', 'liaison.NOSECTEUR = secteur.NOSECTEUR')
        ->join('traversee', 'traversee.noliaison = liaison.noliaison')
        ->where('liaison.noliaison', $liaison)
        ->where('reservation.dateheure', $date)
        ->groupBy('traversee.notraversee, heure_depart, bateau.nom, categorie.LIBELLE, enregistrer.LETTRECATEGORIE')
        ->limit(3)
        ->get()
        ->getResult();
    }
}
}