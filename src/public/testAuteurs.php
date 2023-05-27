<?php
/*
Test AuteurManger
//creation nouveau auteur
//hydratation
//est_nouveau
dump((new AuteurEntity())
        ->hydrate([
            'auteur'=>'delphine',
            'bio'=>'a eu 40 ans'
        ])
        ->est_nouveau()
    );

*/
/*
$delphine  = (new AuteurEntity())
        ->hydrate([
            'auteur'=>'delphine',
            'bio'=>'a eu 40 ans'
        ]);

$manager = new AuteurManager();
//var_dump($manager->create($delphine));
dump($manager->delete(7));*/
/*
$manager = new AuteurManager();
$renaud = $manager->findBy(['auteur'=>'renaud'])[0];
$renaud->setBio('Fait de la moto régulièrement');
dump($manager->update($renaud));
*/