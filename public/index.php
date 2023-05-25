<?php
use App\Auteur\AuteurEntity;
use \Core\Debug;


//initialisation du projet
require_once('../conf/constantes.php');

if(!DEBUG){
    error_reporting(0);
}


//autoloading
require ROOT . '/App/Autoloader.php';
App\Autoloader::register();
require ROOT . '/Core/Autoloader.php';
Core\Autoloader::register();

\Core\Debug::var_dump(new AuteurEntity());


