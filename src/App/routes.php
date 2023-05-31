<?php

use App\Auteur\AuteurController;
use App\Citation\CitationController;
use App\Utilisateur\UtilisateurController;
use Core\HTML\Form;

$routeur->map('GET','/',function(){
    $controller = new CitationController;
    $controller->index();
});

$routeur->map('GET','/citation', function(){
    $controller = new CitationController;
    $controller->index();
} );

$routeur->map('GET','/auteur', function(){
    $controller = new AuteurController;
    $controller->index();
});

$routeur->map('GET','/utilisateur', function(){
    $controller = new UtilisateurController;
    $controller->index();
});

$routeur->map('GET', '/auteur/ajouter', function(){
    $controller = new Form;
    $controller->input('test','text','test');
    $controller->submit();
    echo 'ajouter un auteur';
    
});

$routeur->map('GET', '/citation/modifier/[i:id]', function(){
    $controller = new CitationController;
    $uri = $_GET['req'];
    $uri = explode('/' ,$uri);
    $controller->modifier($uri[2]);
});