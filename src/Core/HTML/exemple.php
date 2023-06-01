<?php

/**
 * Exemple d'utilisation de la classe Form pour la création d'un formulaire
 */

require 'Form.php';
require 'FormElement.php';
require 'FormInput.php';
require 'FormSelect.php';
require 'FormTextarea.php';

// Debug
echo '$_POST : ';
var_dump($_POST);
echo '<br>';
echo '$_GET : ';
var_dump($_GET);


$form = new \Core\HTML\Form(); // Instanciation du formulaire

$form->setMethod('POST') // Définition des paramêtres de base du formulaire
    ->setAction("")
    ->setName("megaform");

$form->fieldset("Le formulaire"); // Ajout d'une balise <fieldset>

$form->nest('<div class="form-group">'); // Ajout d'une balise de nesting personnalisé

/**
 * Ajout d'une balise orpheline <input> définie à l'aide de 2 paramètres :
 * 1 - Un tableau associatif comportant tout les attributs souhaités
 * 2 - Option : Le nom souhaité (string) pour une balise <label> associée à l'input
 */
$form->addInput(["type" => "hidden", "id" => "id", "value" => uniqid()]);

$form->addInput(["type" => 'file', "name" => "img", "accept" => ".png", "multiple" => true, "class" => "form-control"], "Votre photo");

$form->addInput(["type" => 'date', "name" => "date", "value" => date("Y-m-d"), "class" => "form-control"], "Date du jour");

$form->addInput(["type" => 'number', "name" => "nombre", "id" => "number"], "Des nombres");

$form->addInput(["type" => "password", 'id' => 'password', 'name' => 'password', "class" => "form-control"], "Mot de passe");

$form->addInput(["type" => "email", "id" => 'email', "name" => "email", "placeholder" => "votre mail", "class" => "form-control", "required" => '', "autocomplete" => "off"], "votre mail");

/**
 * Ajout d'une balise inline <select> définie à l'aide de 3 paramètres :
 * 1 - Un tableau associatif comportant tout les attributs souhaités
 * 2 - Le nom souhaité (string) pour la balise <label> associé à la liste
 * 3 - Les <option> de la liste sous la forme d'un tableau de tableaux
 *     Note : Chaque option est un tableau de 2 à 3 valeurs ['name','value','selected']
 */
$options = [];
$options[] = ['youki', 'dog'];
$options[] = ['minimne', 'cat', 'selected'];
$options[] = ['baloo', 'bear'];
$form->addSelect(["name" => "pets", "id" => "pet-select"], "Choisi ton animal", $options);

/**
 * Ajout d'une balise inline <textarea> définie à l'aide de 2 paramètres :
 * 1 - Un tableau associatif comportant tout les attributs souhaités
 * 2 - Option : Le nom souhaité (string) pour une balise <label> associée à la liste
 */
$form->addTextarea(["id" => "😚", "name" => "bio", "value" => "C'est ici que vous saisirez votre biographie", "rows" => 6, "class" => "form-control"], "Bio");

$form->addInput(["type" => "submit", "value" => "😍😘😚 envoyer", "class" => "btn btn-success"]);

$form->render(); // Appel de la méthode render pour afficher le formulaire
