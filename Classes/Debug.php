<?php

class Debug
{
    public static function var_dump($param){
        echo '<pre>';

            var_dump($param);
        echo '</pre>';
    }

    public static function print_r(array $data){
        echo '<pre>';

            print_r($data);
        echo '</pre>';
    }
}