<?php

class Car
{
    private $model = '';
  
    //__construct magic method
    public function __construct($model = null)
    {
        if ($model) {
            $this->model = $model;
        }
    }

    public function getCarModel()
    {
        //We use the __CLASS__ magic constant in order to get the class name
        return " The <b>" . __class__ . "</b> model is: " . $this->model;
    }
}

$car1 = new Car('Mercedes');

echo $car1->getCarModel();