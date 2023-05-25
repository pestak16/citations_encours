<?php

namespace Core\Database;

class PDOFactory
{
    static function getPDO($type)
    {
        $class = 'PDO' .  $type;
        // $path = __DIR__ .' /' . $class . '.php';
        var_dump(class_exists($class));
       die($class);
        if(class_exists($class)){
        //    require $path;
           return new $class;
        }
    }
}