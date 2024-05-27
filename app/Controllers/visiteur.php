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

    public function enregistrer()

    {
        $data['TitreDeLaPage'] = 'creer un compte';

        /* TEST SI FORMULAIRE POSTE OU SI APPEL DIRECT (EN GET) */

        if (!$this->request->is('post')) {

            /* le formulaire n'a pas été posté, on retourne le formulaire */

            return view('Template/Header')

            . view('vue_enregistrement.php', $data)

            . view('Template/Footer');

        }

        /* SI FORMULAIRE NON POSTE, LE CODE QUI SUIT N'EST PAS EXECUTE */

        /* VALIDATION DU FORMULAIRE */

        $reglesValidation = [
            // obligatoire, 3 caractères, exactement

            'txtnom' => 'required|string|max_length[30]',
            'txtprenom' => 'required|string|max_length[30]',
            'txtadresse' => 'required|string',
            'txtcp' => 'required|numeric|exact_length[5]',
            'txtville' => 'required|string',
            'txttelfixe' => 'required|numeric|exact_length[10]',
            'txttelport' => 'required|numeric|exact_length[10]',
            'txtmel' => 'required|string',
            'txtmdp' => 'required|string|min_length[7]',


        ];

        if (!$this->validate($reglesValidation)) {

            /* formulaire non validé, on renvoie le formulaire */

            $data['TitreDeLaPage'] = "Saisie champ incorrecte";

            return view('template/Header')

            . view('vue_enregistrement.php', $data)

            . view('template/Footer');

        }

        /* SI FORMULAIRE NON VALIDE, LE CODE QUI SUIT N'EST PAS EXECUTE */

        /* INSERTION PRODUIT SAISI DANS BDD */

        $donneesAInserer = array(

            'nom' => $this->request->getPost('txtnom'),
            'prenom' => $this->request->getPost('txtprenom'),
            'adresse' => $this->request->getPost('txtadresse'),
            'codepostal' => $this->request->getPost('txtcp'),
            'ville' => $this->request->getPost('txtville'),
            'telephonefixe' => $this->request->getPost('txttelfixe'),
            'telephonemobile' => $this->request->getPost('txttelport'),
            'mel' => $this->request->getPost('txtmel'),
            'motdepasse' => $this->request->getPost('txtmdp'),


        ); // reference, libelle, prixht, quantiteenstock, image : champs de la table 'produit'

        $ModeleClient = new ModeleClient(); //instanciation du modèle

        $donnees['champAjoute'] = $ModeleClient->insert($donneesAInserer, false);

        // provoque insert into sur la table mappée (produit, ici), retourne 1 (true) si ajout OK

        return view('Template/Header')

            .view('vue_rapportenregistrement.php', $donnees)

            .view('Template/Footer');

    } // ajouterProduit


    public function Afficherliasion($liaison = null)

    {
        $modeleliaison = new ModeleLiaison();
        $modeletarif = new ModeleTarif();
        if ($liaison === null){

            // On appelle la jointure
            $data['liaison'] = $modeleliaison->GetLiaison();
            $data['TitrePage'] = 'Toutes les liaisons';
            return view('template/Header')
            . view('Vue_AfficherLiaison', $data)
            . view('template/Footer');
        }else

        // une référence plante en entrée : on n'affichera le détail du plante correspondant
        {
            $data['tarifs'] = $modeletarif->GetTarifbyliaison($liaison);
            $data['liaison'] = $modeleliaison->getLiaisontarif($liaison);

            if (empty($data['liaison'])) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
            $data['TitrePage'] = $liaison;
            return view('template/Header')
            .view('Vue_affichertarif', $data)
            .view('template/Footer');

        }

    }
    public function afficherhorairetraverser($secteur = null)
    {

       // $liason= $this->request->getPost('liaison');
        //    $date = $this->request->getPost('date');
//echo $liason; die();
        // Charger les modèles
        $modelesecteur = new ModeleSecteur();
        $modeleliaison = new ModeleLiaison();
        $modeletraversee = new ModeleTraversee();

        // Si la méthode de la requête est POST
        if ($this->request->is('post')) {
            $liason= $this->request->getPost('liaison');
            $date = $this->request->getPost('date');
            // Récupérer les horaires de traversée pour la liaison et la date spécifiées
            $data['date'] = $date;
            $data['liason'] = $liason;
            $data['horaire'] = $modeletraversee->GetHorairetraversee($liason);
            
            // Récupérer les liaisons pour le secteur spécifié
            $data['lesliaison'] = $modeleliaison->Getliaisonpoursecteur($secteur);
            
            // Récupérer tous les secteurs
            $data['secteur'] = $modelesecteur->GetSecteur();
            
            $data['TitrePage'] = $liason;
            $data['sect'] = $secteur;

            return view('template/Header')
                . view('Vue_afficherhorairetraversee', $data)
                . view('template/Footer');
        }

        // Si aucun secteur n'est spécifié
        elseif ($secteur === null) {
            // Récupérer tous les secteurs
            $data['secteur'] = $modelesecteur->GetSecteur();
            $data['sect'] = $secteur; // Ajout de la variable $sect

            return view('template/Header')
                . view('Vue_afficherhorairetraversee', $data)
                . view('template/Footer');
        }

        // Si un secteur spécifique est fourni
        else {
            // Récupérer les liaisons pour le secteur spécifié
            $data['lesliaison'] = $modeleliaison->Getliaisonpoursecteur($secteur);
            
            // Récupérer tous les secteurs
            $data['secteur'] = $modelesecteur->GetSecteur();
            $data['sect'] = $secteur; // Ajout de la variable $sect

            return view('template/Header')
                . view('Vue_afficherhorairetraversee', $data)
                . view('template/Footer');
        }
    }
    
    
}