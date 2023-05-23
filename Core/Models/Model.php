<?php

namespace Core\Models;

use Exception;
use \PDO;

/**
 * Offre les functions de crud à la base de données
 */
class Model extends Database
{

    /**
     * DAO
     *
     * @var Database
     */
    protected Database $db;

    /**
     * Table SQL concernée
     *
     * @var string
     */
    public string $table;


    /**
     * Envoi d'une requete (type PDOStatement)
     *
     * @param string $sql la requete 
     * @param array|null $attributs
     * @return void
     */
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


    /**
     * REtourne tous les enregistrements
     *
     * @return array
     */
    public function findAll(): array
    {
        $q = $this->statement('SELECT * FROM ' . $this->table);
        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Retourne les enregistrements selon  des critères 
     *
     * @param array $attributs les critères
     * @return array
     */
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

    /**
     * Retourne un enregistrement par son id 
     *
     * @param integer $id
     * @return array
     */
    public function find(int $id): array
    {
        return $this->findBy(['id'=> $id]);
    }


    /**
     * Creer un enregistrement en BDD
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        //INSERT INTO table(value,value,value) VALUES(?,?,?)

        $champs=[];
        $interrogation=[];
        $valeurs=[];

        foreach($data as $key=>$value){
            $champs[]=$key;
            $interrogation[]='?';
            $valeurs[]=$value;
        }
        $sql = 'INSERT INTO ' .  $this->table . '(' . implode(',', $champs) .')';
        $sql .= ' VALUES(' . implode(',', $interrogation). ')';
            try{
                $this->statement($sql, $valeurs);
                return $this->db->lastInsertId();
            }catch(Exception $e){
                return false;
            }  
    }

    public function update(array $data, int $id)
    {
        //UPDATE table SET champ=?, champ=? WHERE id=?
        $set = 'SET ';
        $valeurs = array();

        foreach($data as $key=>$value){
           $set .= "$key = ?, ";
            $valeurs[] = $value;
        }
        $set = substr($set, 0, -2);
        $sql = 'UPDATE '. $this->table . ' ' . $set . ' WHERE id=?';
        $valeurs[] = $id;
        try{
            $q = $this->statement($sql, $valeurs);
            return true;
        }catch(Exception $e){
            if(DEBUG){
                echo $e->getMessage();
            }
            return false;
        }
        

        
    }

}