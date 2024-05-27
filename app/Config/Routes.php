<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('accueil', 'Accueil::AccueilAffiche');

/*enregistrement creer compte  */
$routes->match(['get', 'post'], 'enregistrer', 'visiteur::enregistrer');



//liaison tarif
$routes->get('tarifliaison', 'visiteur::Afficherliasion');
$routes->get('tarifliaison/(:alphanum)', 'visiteur::Afficherliasion/$1');

//horaire liaison
$routes->get('horairetraverser', 'visiteur::afficherhorairetraverser');
$routes->get('afficherhorairetraverser/(:alphanum)', 'visiteur::afficherhorairetraverser/$1');
$routes->match(['get', 'post'], 'afficherhorairetraverser/(:alphanum)', 'visiteur::afficherhorairetraverser/$1');

// historique des reservation
$routes->get('historiquereserve', 'visiteur::historiquereserve');
