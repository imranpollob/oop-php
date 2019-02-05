<?php
class Car
{
    public $name;

    // __construct ([ mixed $args = "" [, $... ]] ) : void
    function __construct($name = null)
    {
        $this->name = $name;
        echo ("Constructor is called\n");
    }

    public function say()
    {
        echo "My name is $this->name\n";
    }

    // __destruct ( void ) : void
    function __destruct()
    {
        echo "Destroying " . __class__ . "\n";
    }

    // public __call ( string $name , array $arguments ) : mixed
    public function __call($name, $arguments)
    {
        echo "Calling object method '$name', Arguments: " . implode(', ', $arguments) . "\n";
    }

    // public static __callStatic ( string $name , array $arguments ) : mixed
    public static function __callStatic($name, $arguments)
    {
        echo "Calling static method '$name', Arguments: " . implode(', ', $arguments) . "\n";
    }

    // public __set ( string $name , mixed $value ) : void
    public function __set($name, $value)
    {
        echo "Setting '$name' to '$value'\n";
        $this->$name = $value;
    }

    // public __get ( string $name ) : mixed
    public function __get($name)
    {
        echo "Getting '$name'\n";
        return $this->$name;
    }

    // public __isset ( string $name ) : bool
    public function __isset($name)
    {
        echo "Is '$name' set?\n";
        return isset($this->$name);
    }

    // public __unset ( string $name ) : void
    public function __unset($name)
    {
        echo "Unsetting '$name'\n";
        unset($this->$name);
    }

}

// __construct
// $bmw = new Car;
$bmw = new Car('X1');
$bmw->say();
$bmw->runTest('Hi', 123);
Car::runTest('Hello', 123);
