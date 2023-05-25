
<?php
require 'Classes/AuteurEntity.php';
require 'Classes/AuteurManager.php';
require 'Classes/Debug.php';
require 'dao.php';


$manager = new AuteurManager($dao);
//$auteurs = $manager->findBy(['id'=>1]);
//Debug::print_r($auteurs);

//

/*
$anh->setBio(' Elle vit en france depuis 2017');

$manager->update($anh);
*/




