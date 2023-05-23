<?php


define('ROOT', dirname(__DIR__));

require_once ROOT. '/config/constantes.php';

require_once ROOT . '/autoload.php';


use App\Models\AuteursModel;
$model = new AuteursModel;

var_dump($model->update(['auteur'=>'david', 'bio'=>'boit du cafe'], 6));
