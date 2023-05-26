<?php namespace  Core\Database\Db;
use PDO;
use PDOException;
use PDOStatement;
class PDOMysql extends PDO
{
  
    static $instance;
    private function __construct()
    {
      
        require_once ROOT . '/conf/bdd.php';
        $dsn = $dsn = 'mysql:host=' . DB_HOST . '; dbname=' . DB_NAME;
         parent::__construct($dsn,DB_USER, DB_PASS);
        if(DEBUG){
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }else{
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        }
        
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAME utf8');
    }



    public static function getInstance(){
        if(self::$instance == null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }
}