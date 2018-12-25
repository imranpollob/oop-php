<?php
// The parent class has hello method that returns "beep".
class Car
{
    // Child class can override this method
    public function hello()
    {
        return "beep";
    }

    // Prevents the child class from overriding
    final public function tryToOverride()
    {
        return "try hard";
    }
}
   
// The child class has hello method that returns "Hallo"
class SportsCar extends Car
{
    public function hello()
    {
        return "Hallo";
    }

    // This code will throw PHP Fatal error: "Cannot override"
    // public function tryToOverride()
    // {
    //     return "trying for lifetime";
    // }
}
      
// Create a new object
$sportsCar1 = new SportsCar();

// Get the result of the hello method
echo $sportsCar1->hello();