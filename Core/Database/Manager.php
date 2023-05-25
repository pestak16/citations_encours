<?php
namespace Core\Database;
use \PDO;
use \PDOException;



class Manager
{
    protected $dao;
    protected $table;

 

    public function statement(string $sql, array $attributs=null)
    {
        if(is_null($attributs)){

            var_dump(PDOFactory::getPDO('MySQL'));

           $q = PDOFactory::getPDO('MySQL')->query($sql);
           return $q;
        }else{
            die('requete avec des conditions');
        }
    }

    public function findAll()
    {
        $sql = 'SELECT * FROM ' .$this->table;
        $q = $this->statement($sql);
        return $q->fetchAll();
        
    }

}