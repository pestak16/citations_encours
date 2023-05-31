<?php

use App\Autoloader as AppAutoloader;
use App\Citation\CitationEntity;
use App\Citation\CitationManager;
use Core\Autoloader as CoreAutoloader;
//use Core\Routeur;

require_once('../conf/constantes.php');



//Autoloaders
require_once ROOT . '/App/Autoloader.php';
AppAutoloader::register();
require_once ROOT . '/Core/Autoloader.php';
CoreAutoloader::register();
require_once ROOT . '/vendor/autoload.php';

//ControllerFactory::getController('Auteur')->index();


$routeur = new AltoRouter;
require ROOT . '/App/routes.php';



