<?php

namespace App\Auteur;

use Core\Controller;

class AuteurController extends Controller
{
    public function ajouter()
    {
       if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $compact = ['title'=>'Ajouter un Auteur', 'data'=>[]];
         $this->render($compact, 'ajouter.php');
       }
    }
}