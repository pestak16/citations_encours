<?php

namespace App\Utilisateur;

use Core\Controllers\Controller;

class UtilisateurController extends Controller
{
    public function ajouter()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $compact = ['title'=>'Ajouter un utilisateur', 'data'=>[]];
            $this->render($compact, 'ajouter.php');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo 'ajout utilisateur en post';
            $_POST["id"] = 24;
            dump($_POST);
            echo 'utilisateur: ' . $_POST["Utilisateur"];
            echo '<br> id utilisateur: ' . $_POST["id"];
        }
    }
    public function formAjouter()
    {
        echo "formulaire d'ajout utilisateur <br><br>";

        $form = <<< "EOF"
        <form action="/utilisateur/ajouter/post" method="POST">
            <div class="ajoutUtilisateur">
                <label for="Utilisateur">Utilisateur</label><br>
                <input name="Utilisateur" id="utilisateur" type="string"></input>
            </div>
            <button class="btn">Envoyer</button>
        <form>
        EOF;

        echo $form;
    }
    public function modifier(int $id)
    {
        echo 'modif utilisateur: ' . $id;
    }
    
    public function supprimerUtilisateur(int $id)
    {
        echo 'supprimer utilisateur: ' . $id;
    }
}