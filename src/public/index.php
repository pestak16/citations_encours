<?php

use App\Auteur\AuteurController;
use App\Autoloader as AppAutoloader;
use App\Citation\CitationController;
use App\Citation\CitationEntity;
use App\Citation\CitationManager;
use App\Utilisateur\UtilisateurController;
use Core\Autoloader as CoreAutoloader;
//use Core\Routeur;

require_once('../conf/constantes.php');



//Autoloaders
require_once ROOT . '/App/Autoloader.php';
AppAutoloader::register();
require_once ROOT . '/Core/Autoloader.php';
CoreAutoloader::register();
require_once ROOT . '/vendor/autoload.php';


$routeur = new AltoRouter;

require ROOT .'\App\routes.php';

$match = $routeur->match();

if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func( $match['target'] ); 
}