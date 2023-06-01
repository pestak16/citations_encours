<?php

namespace App\Auteur;

use Core\Controllers\Controller;

class AuteurController extends Controller
{
    public function ajouter()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $compact = ['title'=>'Ajouter un auteur', 'data'=>[]];
            $this->render($compact, 'ajouter.php');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo 'ajout auteur en post';
            $_POST["id"] = 12;
            dump($_POST);
            echo 'nom auteur: ' . $_POST["Auteur"];
            echo '<br> id auteur: ' . $_POST["id"];
        }
    }
    public function formAjouter()
    {
        echo "formulaire d'ajout auteur <br><br><br>";

        $form = <<< "EOF"
        <form action="/auteur/ajouter/post" method="POST">
            <div class="ajoutAuteur">
                <label for="Auteur">Auteur</label><br>
                <input name="Auteur" id="auteur" type="string"></input>
            </div>
            <button class="btn">Envoyer</button>
        <form>
        EOF;

        echo $form;
    }
    public function modifier(int $id)
    {
        echo 'modif auteur: ' . $id;
    }
    
    public function supprimerAuteur(int $id)
    {
        echo 'supprimer auteur: ' . $id;
    }
}