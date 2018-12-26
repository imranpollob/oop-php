<?php

class Car
{
    // Private access modifier denies access to the property and method from outside the class’s scope
    private $model;
 
    // Public access modifier allows the access from outside the class
    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return "The car model is  " . $this->model;
    }
}

$mercedes = new Car();
//Sets the car’s model
$mercedes->setModel("Mercedes benz");
//Gets the car’s model
echo $mercedes->getModel();