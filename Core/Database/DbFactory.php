<?php 
namespace Core\Database;

class DbFactory{
    const MY_SQL = 'PDOMysql';
    static $instance;
    public static function getDb($type)
    {
        
        $class = __NAMESPACE__ . '\Db\\' . $type;
        
        if(class_exists($class)){
            return $class::getInstance();
        }

    }
}