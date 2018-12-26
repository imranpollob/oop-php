<?php

class Car
{
    // The properties
    public $comp;
    public $color = 'red';
    public $hasSunRoof = true;

    // The method that says hello
    public function hello()
    {
        // accessing own properties and methods using $this
        return "Beep, I am a " . $this->comp .
            ", and my color is" . $this->color.
            ". I am created at " . $this->model() . ".";
    }

    public function model()
    {
        return date('Y');
    }
}

// We can now create an object from the class.
$bmw = new Car();
$mercedes = new Car();

// Set the values of the class properties.
$bmw->color = 'blue';
$bmw->comp = "BMW";
$mercedes->comp = "Mercedes Benz";

// Call the hello method.
echo $bmw->hello();
echo $mercedes->hello();