<?php

interface Car
{
    // Can include public abstract methods and constants
    public function setModel($name);

    public function getModel();
}

interface Vehicle
{
    public function setHasWheels($bool);

    public function getHasWheels();
}

class miniCar implements Car, Vehicle
{
    // Implements interface methods and may have its own code
    private $model;
    private $hasWheels;

    public function setModel($name)
    {
        $this->model = $name;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setHasWheels($bool)
    {
        $this->hasWheels = $bool;
    }

    public function getHasWheels()
    {
        return ($this->hasWheels) ? "has wheels" : "no wheels";
    }

    public function talk()
    {
        return "wow";
    }
}