<?php

namespace Core\BDD;

use \PDO;


class Model extends Database
{
    protected $table = 'auteurs';

    protected $db;

    
    public function __construct(){
        $this->db = Database::getInstance();
    }
    

    
    public function statement(string $sql, array $attributs = null)
    {
        if(is_null($attributs)){
            return $this->db->query($sql);
        }else{
            $q = $this->db->prepare($sql);
            $q->execute($attributs);
            return $q;
        }
    }

    public function findAll()
    {
        $sql = 'SELECT * FROM ' . $this->table;
        $q = $this->statement($sql);
        return $q->fetchAll();
    }

    public function findBy(array $attributs)
    {
        $champs = [];
        $valeurs = [];
        foreach($attributs as $key=>$value){
            $champs[] = $key . ' = ? ';
            $valeurs[] = $value;
        }

        $sql = 'SELECT * FROM ' .$this->table . ' WHERE '  . implode(' AND ', $champs);
        $q = $this->statement($sql, $valeurs);
        return $q->fetchAll();
        //SELECT * FROM table WHERE att1= ? AND att2 = ?
        //execute([$valuers])
    }
}