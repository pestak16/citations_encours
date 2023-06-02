<?php

use App\Auteur\AuteurController;
use App\Citation\CitationController;
use App\Utilisateur\UtilisateurController;
use Core\Controllers\ControllerFactory;

$routeur->map( 'GET', '/', function() {
    ControllerFactory::getController('Citation')->index();
});
$routeur->map( 'GET', '/citation', function() {
    ControllerFactory::getController('Citation')->index();
});
$routeur->map( 'GET', '/auteur', function() {
    ControllerFactory::getController('Auteur')->index();
});
$routeur->map( 'POST|GET', '/auteur/ajouter', function() {
    ControllerFactory::getController('Auteur')->ajouter();
});
$routeur->map( 'GET', '/auteur/supprimer/[i:id]', function($id) {
    ControllerFactory::getController('Auteur')->supprimer($id);
});

$routeur->map( 'POST|GET', '/auteur/modifier/[i:id]', function($id) {
    ControllerFactory::getController('Auteur')->modifier($id);
});




$match = $routeur->match();


if( is_array($match) && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] ); 
} 
else {
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}