<?php
// With Type hinting we can specify the expected data type 
// (arrays, objects, interface, etc.) for an argument in a function declaration
class Car
{
    protected $driver;
    protected $model;
    protected $hasSunRoof;
    protected $numberOfDoors;
    protected $price;
       
    // The constructor can only get Driver objects as arguments.
    public function __construct(Driver $driver)
    {
        $this->driver = $driver;
    }

    // string type hinting
    public function setModel(string $model)
    {
        $this->model = $model;
    }

    // boolean type hinting
    public function setHasSunRoof(bool $value)
    {
        $this->hasSunRoof = $value;
    }

    // integer type hinting
    public function setNumberOfDoors(int $value)
    {
        $this->numberOfDoors = $value;
    }

    // float type hinting
    public function setPrice(float $value)
    {
        $this->price = $value;
    }
}

class Driver
{

}

// Car accepts Driver type
$driver1 = new Driver();
$car1 = new Car($driver1);

$car1->setModel('BMW');
$car1->setHasSunRoof(true);
$car1->setNumberOfDoors(4);
$car1->setPrice(1234.56);