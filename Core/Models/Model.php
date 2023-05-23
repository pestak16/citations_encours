<?php

namespace Core\Models;

use \PDO;


class Model extends Database
{

    protected $db;
    public $table;


    public function statement(string $sql, array $attributs = null)
    {
        $this->db = parent::getInstance();

        if (is_null($attributs)) {

            return $this->db->query($sql);
        } else {

            $q = $this->db->prepare($sql);
            $q->execute($attributs);
            return $q;
        }
    }


    public function findAll(): array
    {
        $q = $this->statement('SELECT * FROM ' . $this->table);
        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    public function findBy(array $attributs): array
    {
        $champs = [];
        $valeurs = [];
        foreach ($attributs as $key => $value) {
            $champs[] = $key . ' = ? ';
            $valeurs[] = $value;
        }

        $sql = 'SELECT * FROM ' . $this->table . ' WHERE ' . implode('AND ', $champs);
        $q = $this->statement($sql, $valeurs);
        return $q->fetchAll(PDO::FETCH_OBJ);
    }


    public function manuel(string $sql, array $attributs = null)
    {
        $q = $this->statement($sql, $attributs);
        return $q->fetchAll(PDO::FETCH_OBJ);
    }


}