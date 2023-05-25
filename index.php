
<?php
require 'Classes/AuteurEntity.php';
require 'Classes/UtilisateurEntity.php';
require 'Classes/AuteurManager.php';
require 'Classes/Debug.php';
require 'dao.php';


$anh = new UtilisateurEntity(
    [
        'prenom'=>'anh',
        'mail'=>'nia1512@gmail.com',
        'is_admin'=>true,
        'a_de_la_barbe'=>true
    ]
);


Debug::var_dump($anh);





