<?php

namespace Core\Models;
use Exception;
use PDO;
use PDOException;

class Database extends PDO
{
    static $instance;

    private function __construct()
    {
        require_once ROOT . '/config/bdd.php';
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
        try{
            parent::__construct($dsn, DB_USER, DB_PASS);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAME utf8');
        }catch(Exception $e){
            header('HTTP/1.1 500 Internal Server Error');
            if(DEBUG){
                echo $e->getMessage();
            }
        }
        
    }

    public static function getInstance()
    {
        if(is_null(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }
}