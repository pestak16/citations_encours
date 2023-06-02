<?php

namespace App\Auteur;

use Core\Controllers\Controller;
use Core\Database\DbFactory;
use Core\Database\Manager;

class AuteurController extends Controller
{
    public function ajouter()
    {
        if($_SERVER['REQUEST_METHOD'] === 'GET'){

            $form = new \Core\HTML\Form();
            $form->setMethod('POST')
                ->setAction('/auteur/ajouter');
            $form->addInput([
                'name'=>'auteur',
                'id'=>'auteur'
            ], 'Auteur');
            $form->addTextarea([
                'name'=>'bio',
                'bio'
            ], 'Bio');

            $form->addInput([
                'type'=>'submit',
                'value'=>'ajouter'
            ]);
            $form->nest('<div class="field">');
            $form->toHtml();

            $this->twig->display(
                $this->module. '.ajouter.twig', 
                [
                    'title'=>'Ajouter un auteur',
                    'form'=>$form->toHtml()
                ]
            );
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset(
                $_POST['auteur'], 
                $_POST['bio']
            )){
                if(empty($_POST['auteur'])){
                    trigger_error('Auteur est vide', E_USER_WARNING);
                    header('Location: /auteur/ajouter');
                }

                $manager = new AuteurManager();
                if($manager->create( new AuteurEntity([
                    'auteur'=>strip_tags($_POST['auteur']),
                    'bio'=>strip_tags($_POST['bio'])
                ]))){
                    //ok
                }else{
                    //pas bon
                }
                header('Location: /auteur');

            }
        }

    }

    public function modifier($id){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            //Aller chercher les data dans modele
          $data= $this->manager->find($id);

          $form = new \Core\HTML\Form();
          $form->setMethod('POST')
              ->setAction('/auteur/modifier/' . $id);
          $form->addInput([
              'name'=>'auteur',
              'id'=>'auteur',
              'value'=>$data->auteur
          ], 'Auteur');
          $form->addTextarea([
              'name'=>'bio',
              'value'=>$data->bio
          ], 'Bio');

          $form->addInput([
              'type'=>'submit',
              'value'=>'modifier'
          ]);
          $form->nest('<div class="field">');
          $compact['form'] = $form->toHtml();

         
          $compact['title'] = 'Modifier ' . $data->auteur;
         
          $this->twig->display('auteur.modifier.twig', $compact);
            //on appelle la vue
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['auteur'], $_POST['bio']) && !empty($_POST['auteur'])){
                $auteur = new AuteurEntity([
                    'id'=>$id,
                    'auteur'=>strip_tags($_POST['auteur']),
                    'bio'=>strip_tags($_POST['bio'])
                ]);

                if($this->manager->update($auteur)){
                    //message success 
                }else{
                    //message erreur
                }
                header('Location: /auteur');
            }
        }
    }
}