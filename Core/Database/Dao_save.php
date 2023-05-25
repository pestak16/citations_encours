<?php
namespace Core\Database;
use \PDO;
use \PDOException;
use \PDOStatement;
/*
require_once ROOT . '/conf/bdd.php';

$dsn = 'mysql:host=' . DB_HOST . '; dbname=' . DB_NAME;
$dao = new PDO($dsn, DB_USER,  DB_PASS);
if(DEBUG){
    $dao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}else{
    $dao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
}

$dao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$dao->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAME utf8');
*/


/**Fournit une instance PDO accéccessible de partout */
class Dao extends PDO
{
    private  static $instance;
   
    
    public function __construct()
    {
        require_once ROOT . '/conf/bdd.php';
        $dsn = 'mysql:host=' . DB_HOST . '; dbname=' . DB_NAME;
        parent::__construct($dsn, DB_USER, DB_PASS);
        if(DEBUG){
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }else{
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        }
        
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAME utf8');
        
    }

    public static function getInstance()
    {  
        if(is_null(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    } 
}
?>