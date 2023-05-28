<?php

namespace App\Models\Auteur;
use Core\Database\Manager;

class AuteurManager extends Manager
{
    public function __construct(){
        $this->table = 'auteurs';
    }
}