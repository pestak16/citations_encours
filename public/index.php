<?php

use App\Auteur\AuteurEntity;
use App\Utilisateur\UtilisateurEntity;
use \App\Auteur\AuteurManager;





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



//$manager = new AuteurManager();
//Debug::var_dump($manager->findAll());
//Debug::var_dump($manager->findBy(['id'=>2])[0]);

//dump($manager->update(new AuteurEntity(['auteur'=>'delphine', 'bio'=>'39 ans', 'id'=>20])));


//var_dump($manager->delete(18));

$manager = new UtilisateurEntity();
