<?php

use App\Auteur\AuteurEntity;
use \Core\Debug;
use \App\Auteur\AuteurManager;
use \Core\Database\PDOMysql;
use Core\Database\PDOFactory;


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
require ROOT . '/vendor/autoload.php';



$manager = new AuteurManager();
//Debug::var_dump($manager->findAll());
//Debug::var_dump($manager->findBy(['id'=>2])[0]);

dump($manager->create(new AuteurEntity(['auteur'=>'delphine', 'bio'=>'40 ans'])));


