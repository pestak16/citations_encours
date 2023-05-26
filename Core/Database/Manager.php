<?php
namespace Core\Database;
use \PDO;
use \PDOException;
use \Core\Debug;




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
           $q = $db->prepare($sql);
           $q->execute($attributs);
           return $q;
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

    public function findBy(array $data){
        $champs=array();
        $valeurs=array();

        foreach($data as $key=>$value){
            $champs[] = $key . ' = ?';
            $valeurs[] = $value;        
        }
       $sql = 'SELECT * FROM ' . $this->table . ' WHERE ' . implode(' AND ', $champs);
       $q = $this->statement($sql, $valeurs);
        return $q->fetchAll(PDO::FETCH_CLASS, $this->getEntityClassName());
    }

    public function find(int $id)
    {
        return $this->findBy(['id'=>$id])[0];
    }


}