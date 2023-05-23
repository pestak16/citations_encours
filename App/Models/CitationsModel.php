<?php

namespace App\Models;
use Core\Models\Model;

class CitationsModel extends Model
{
    public function __construct()
    {
        $this->table = 'citations';
    }
} 