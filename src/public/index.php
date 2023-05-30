<?php

use App\Auteur\AuteurController;
use App\Autoloader as AppAutoloader;
use App\Citation\CitationController;
use App\Citation\CitationEntity;
use App\Citation\CitationManager;
use App\Utilisateur\UtilisateurController;
use Core\Autoloader as CoreAutoloader;

require_once('../conf/constantes.php');



//Autoloaders
require_once ROOT . '/App/Autoloader.php';
AppAutoloader::register();
require_once ROOT . '/Core/Autoloader.php';
CoreAutoloader::register();
require_once ROOT . '/vendor/autoload.php';

dump(new AuteurController(), new CitationController(), new UtilisateurController());

$controller = new AuteurController();
$controller->index();
