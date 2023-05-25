<?php

class VoitureFactory
{
    public static function getVoiture(string $type)
    {
       $class = 'Voiture' . ucfirst($type);
       require $class.'.php';

       return new $class();

      
    } 
}

VoitureFactory::getVoiture('Citadine');
