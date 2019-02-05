<?php
// We are implementing Serializable only for testing serialize() and unserialize()
class Car implements Serializable
{
    public $name;
    private $hidden = 'Serect';

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

    // public __sleep ( void ) : array
    public function __sleep()
    {
        echo "It is invoked because serialize() method is invoked outside the class\n";
        $this->name = base64_encode($this->name);
        // should return an array
        return array('name');
    }

    public function __wakeup()
    {
        echo "It is invoked when the unserialize() method is invoked outside the class.<br>";
        $this->name = 'Mr. Bean';
        // There is no need to return an array here.
    }

    // Serializable interface method
    public function serialize()
    {
        return serialize('hello world');
    }
    
    // Serializable interface method
    public function unserialize($serialized)
    {
        $this->name = unserialize($serialized);
    }

    // public __toString ( void ) : string
    public function __toString()
    {
        return "Beautiful Car\n";
    }

    // __invoke ([ $... ] ) : mixed
    public function __invoke($x = true)
    {
        var_dump($x);
    }

    // static __set_state ( array $properties ) : object
    public static function __set_state($an_array)
    {
        $obj = new Car;
        $obj->name = $an_array["name"];

        return $obj;
    }

    // __debugInfo ( void ) : array
    public function __debugInfo()
    {
        return ['name' => 'Debug Name'];
    }

    // __clone ( void ) : void
    public function __clone()
    {
        echo "You are cloning the object\n";
    }

}

// __construct is invoked
$bmw = new Car('X1');
// say() method from class is invoked
$bmw->say();
// class has no method names runTest() so __call is invoked
$bmw->runTest('Hi', 123);
// class has no static method names runTest() so __callStatic is invoked
Car::runTest('Hello', 123);
echo "\n";

// class has no private property 'aaa' so __set is invoked
$bmw->aaa = 1;
// class has private property 'hidden' so __set is invoked
$bmw->hidden = "Hacked";
// class has public property 'name' so __set is not invoked
$bmw->name = "X8";
echo "\n";

// class has no private property 'aaa' so __get is not invoked
echo $bmw->aaa . "\n";
// class has private property 'hidden' so __get is invoked
echo $bmw->hidden . "\n";
// class has public property 'name' so __get is invoked
echo $bmw->name . "\n";
echo "\n";

// class has private property 'hidden' so __isset is invoked
var_dump(isset($bmw->hidden));
// class has private property 'hidden' so __unset is invoked
unset($bmw->hidden);
var_dump(isset($bmw->hidden));
echo "\n";

// class has public property 'name' so __isset is not invoked
var_dump(isset($bmw->name));
// class has public property 'name' so __unset is not invoked
unset($bmw->name);
// Now 'name' property isn't set, that's why __isset is invoked to search it's private properties
var_dump(isset($bmw->name));
echo "\n";

// serialize will invoke __sleep method
echo (serialize($bmw));
// unserialize will invoke __wakeup method
// it will also invoke __destruct method 
echo (unserialize(serialize($bmw)));
echo "\n";

// The __toString() method will be called when using echo method to print an object directly.
echo $bmw;
// When you try to call an object in the way of calling a function, the __invoke method will be called automatically.
echo $bmw();
echo "\n";

// __set_state() method is called by var_export()
$someCar = new Car('Some Name');
$someCar->name = "Honda";
eval('$b = ' . var_export($someCar, true) . ';');
echo var_export($b);
echo "\n";

// __debugInfo() method is called by var_dump() when dumping an object to get the properties that should be shown
var_dump(new Car("poll"));
echo "\n";

// __clone() method will be called when performing clone
$fromSomeCar = clone $someCar;
