<?php

use App\Auteur\AuteurController;
use App\Citation\CitationController;
use App\Utilisateur\UtilisateurController;
use Core\Controllers\ControllerFactory;

$routeur->map( 'GET', '/', function() {
    ControllerFactory::getController('Citation')->index();
});

/////////////////// CITATION ///////////////////
$routeur->map( 'GET', '/citation', function() {
    ControllerFactory::getController('Citation')->index();
});
$routeur->map( 'GET', '/citation/ajouter', function() {
    ControllerFactory::getController('Citation')->formAjouter();
});
$routeur->map( 'POST', '/citation/ajouter/post', function() {
    ControllerFactory::getController('Citation')->ajouter();
});
$routeur->map( 'GET', '/citation/modifier/[i:id]', function($id) {
    ControllerFactory::getController('Citation')->modifier($id);
});
$routeur->map( 'GET', '/citation/supprimer/[i:id]', function($id) {
    ControllerFactory::getController('Citation')->supprimerCitation($id);
}); 


/////////////////// AUTEUR ///////////////////
$routeur->map( 'GET', '/auteur', function() {
    ControllerFactory::getController('Auteur')->index();
});
$routeur->map( 'GET', '/auteur/ajouter', function() {
    ControllerFactory::getController('Auteur')->formAjouter();
});
$routeur->map( 'POST', '/auteur/ajouter/post', function() {
    ControllerFactory::getController('Auteur')->ajouter();
});
$routeur->map( 'GET', '/auteur/modifier/[i:id]', function($id) {
    ControllerFactory::getController('Auteur')->modifier($id);
}); 
$routeur->map( 'GET', '/auteur/supprimer/[i:id]', function($id) {
    ControllerFactory::getController('Auteur')->supprimerAuteur($id);
});
/* $routeur->map( 'GET', '/auteur/modifier/[i:id]', function() {
    $controller = new AuteurController;
    $uri = $_GET['req'];
    $uri = explode('/', $uri);
    $controller->modifier($uri[2]);
});  */


/////////////////// UTILISATEUR ///////////////////
$routeur->map( 'GET', '/utilisateur', function() {
    ControllerFactory::getController('Utilisateur')->index();
});

$routeur->map( 'GET', '/utilisateur/ajouter', function() {
    ControllerFactory::getController('Utilisateur')->formAjouter();
});
$routeur->map( 'POST', '/utilisateur/ajouter/post', function() {
    ControllerFactory::getController('Utilisateur')->ajouter();
});
$routeur->map( 'GET', '/utilisateur/modifier/[i:id]', function($id) {
    ControllerFactory::getController('Utilisateur')->modifier($id);
});
$routeur->map( 'GET', '/utilisateur/supprimer/[i:id]', function($id) {
    ControllerFactory::getController('Utilisateur')->supprimerUtilisateur($id);
});


$match = $routeur->match();


if( is_array($match) && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] ); 
} 
else {
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}