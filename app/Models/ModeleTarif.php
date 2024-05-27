<?php
namespace App\Models;

use CodeIgniter\Model;

class ModeleTarif extends Model
{
    protected $table = 'Tarifer';
    /* ci-dessus on indique la table a 'mapper' */
    protected$primaryKey = ['noperiode', 'lettrecategorie', 'notype', 'noliaison']; // clé primaire
    protected $useAutoIncrement = false;
    protected $returnType = 'object'; // résultats retournés sous forme d'objet(s)
    protected $allowedFields = ['noperiode', 'lettrecategorie', 'notype', 'noliaison', 'tarif'];
    /* champs pour lesquels insertion, et mises à jour sont autorisées
    Nota Bene : on autorisera les champs en AUTOINCREMENT */
// Nota Bene : ModeleLiaison héritent de très nombreuses méthodes : find, findAll, insert, update...
// Pour la liste complète : https://codeigniter.com/user_guide/models/model.html

public function GetTarifbyliaison($noliaison)
{
    return $this->select('categorie.lettrecategorie,categorie.libelle as libellecategorie, type.lettrecategorie, type.libelle as libelletype,type.notype, periode.datedebut, periode.datefin, tarif')
    ->join('liaison', 'tarifer.noliaison = liaison.noliaison')
    ->join('periode', 'tarifer.noperiode = periode.noperiode')
    ->join('type', 'tarifer.notype = type.notype')
    ->join('categorie', 'tarifer.lettrecategorie = categorie.lettrecategorie')
    //autojointure
    ->join('port as port_depart', 'port_depart.NOPORT = liaison.NOPORT_DEPART')
    ->join('port as port_arrivee', 'port_arrivee.NOPORT = liaison.NOPORT_ARRIVEE')

    ->where('liaison.noliaison', $noliaison)
    ->findAll();

}
}