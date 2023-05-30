<?php


use App\Autoloader as AppAutoloader;
use App\Citation\CitationEntity;
use App\Citation\CitationManager;
use Core\Autoloader as CoreAutoloader;

require_once('../conf/constantes.php');



//Autoloaders
require_once ROOT . '/App/Autoloader.php';
AppAutoloader::register();
require_once ROOT . '/Core/Autoloader.php';
CoreAutoloader::register();
require_once ROOT . '/vendor/autoload.php';

$manager = new CitationManager;

$manager->create(new CitationEntity(
    [
        'citation' => 'C\'est comme ça',
        'auteurs_id'=>2
    ]
    ));

    $manager->create(new CitationEntity(
        [
            'citation' => 'Dis-moi REnaud d\'abord pourquoi',
            
        ]
        ));
dump($manager->findAll());