<?php

use App\Autoloader as AppAutoloader;
use Core\Autoloader as CoreAutoloader;

use Core\BDD\Model;

define('ROOT', dirname(__DIR__));
require_once ROOT. '/conf/constantes.php';


//Autoloaders
require_once ROOT . '/App/Autoloader.php';
AppAutoloader::register();
require_once ROOT . '/Core/Autoloader.php';
CoreAutoloader::register();
require_once ROOT . '/vendor/autoload.php';

$model  = new Model;
dump($model->findBy(['id'=>2]));



