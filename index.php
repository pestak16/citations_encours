<?php

    if(isset($_POST['bio'], $_POST['auteur'])){
        if(!empty($_POST['auteur'])){
            require 'dao.php';
            require 'Classes/AuteurEntity.php';
            require 'Classes/AuteurManager.php';
            require 'Classes/Debug.php';
            $auteur['auteur'] = $_POST['auteur'];
            if(!empty($_POST['bio'])){
                $auteur['bio']= $_POST['bio'];
            }
            $auteur = new AuteurEntity($auteur);
            //Debug::var_dump($auteur);

            require 'confirm.php';
        }else{
            require 'formulaire.php';
        }
       
    }
    require 'formulaire.php';
?>



