<?php

namespace Core\Controllers;
class ControllerFactory
{
    static $instance;
    public static function getController(string $controller)
    {
        $controller = '\App\\' . $controller . '\\' . $controller . 'Controller';
        if (class_exists($controller)) {
            self::$instance = new $controller();
            return self::$instance;
        }
        else {
            
        }
    }
}