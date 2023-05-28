<?php

use App\Autoloader as AppAutoloader;
use Core\Autoloader as CoreAutoloader;
use App\Utilisateur\UtilisateurEntity;
use App\Utilisateur\UtilisateurManager;
use App\Citation\CitationManager;
use App\Citation\CitationEntity;
use App\Auteur\AuteurEntity;
use Core\Main;


require_once('../conf/constantes.php');



//Autoloaders
require_once ROOT . '/App/Autoloader.php';
AppAutoloader::register();
require_once ROOT . '/Core/Autoloader.php';
CoreAutoloader::register();
require_once ROOT . '/vendor/autoload.php';

