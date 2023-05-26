<?php
namespace Core\Database;
use \PDO;
use \PDOException;




class Manager
{
    
    protected $table;

    

    public function statement(string $sql, array $attributs=null)
    {
        $db = DbFactory::getDb(DbFactory::MY_SQL);
        if(is_null($attributs)){

          $q = $db->query($sql);
           return $q;
        }else{
            die('requete avec des conditions');
        }
    }
    private function getEntityClassName()
    {
        $class_name = substr(ucfirst($this->table),0,-1);
        $class_name = '\App\\' . $class_name . '\\' . $class_name . 'Entity';
        return $class_name;
    }

    public function findAll()
    {
        $sql = 'SELECT * FROM ' .$this->table;
        $q = $this->statement($sql);
        return $q->fetchAll(PDO::FETCH_CLASS, $this->getEntityClassName());
        
    }


}