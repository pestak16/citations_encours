<?php

namespace App\Citation;

use Core\Controllers\Controller;

class CitationController extends Controller
{
    public function ajouter()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $compact = ['title'=>'Ajouter une citation', 'data'=>[]];
            $this->render($compact, 'ajouter.php');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo 'ajout citation en post';
            $_POST["id"] = 46;
            dump($_POST);
            echo 'citation: ' . $_POST["Citation"];
            echo '<br> id citation: ' . $_POST["id"];
        }
    }
    public function formAjouter()
    {
        echo "formulaire d'ajout citation <br><br>";

        $form = <<< "EOF"
        <form action="/citation/ajouter/post" method="POST">
            <div class="ajoutCitation">
                <label for="Citation">Citation</label><br>
                <input name="Citation" id="citation" type="string"></input>
            </div>
            <button class="btn">Envoyer</button>
        <form>
        EOF;

        echo $form;
    }
    public function modifier(int $id)
    {
        echo 'modif citation: ' . $id;
    }

    public function supprimerCitation(int $id)
    {
        echo 'supprimer citation: ' . $id;
    }
}
