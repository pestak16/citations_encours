<?php
namespace Core\Database;
use \PDO;
use \PDOException;
use \PDOStatement;

class PDOMySQL extends PDO
{
    protected  $pdo;


    public function __construct()
    {
        require_once ROOT . '/conf/bdd.php';
        $dsn = 'mysql:host=' . DB_HOST . '; dbname=' . DB_NAME;
        $this->pdo = new PDO($dsn, DB_USER, DB_PASS);
        if(DEBUG) {
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } else {
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        }

        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAME utf8');


    }

}
?>