<?php

abstract class Shape{
    protected $color;

    public function getColor($color = 'red')
    {
        return $this->color;
    }

    abstract public function area();

}

class Square extends Shape{

    public function area()
    {
        return 4 * 5;
    }
}

$square1 = new Square('green');

echo $square1->area();