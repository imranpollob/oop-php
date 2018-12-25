<?php

class Utilis
{
    // Declaring class properties or methods as static makes them 
    // accessible without needing an instantiation of the class.
    public static $numCars = 0;

    public static function addToNumCars($int)
    {
        $int = (int)$int;
        self::$numCars += $int;
    }
}

echo Utilis::$numCars;

Utilis::addToNumCars(3);
echo Utilis::$numCars;

Utilis::addToNumCars(-1);
echo Utilis::$numCars;