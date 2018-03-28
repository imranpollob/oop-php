<?php

class Pet{
    protected $name;

    public function __construct($name = 'red')
    {
        $this->name = $name;
    }

    public function sleep()
    {
        return 'I like to sleep';
    }

    public function eat()
    {
        return "I eat fish";
    }

}

class Cat extends Pet{

}

class Dog extends Pet{

    public function eat()
    {
        return "I eat meat";
    }
}

$cat1 = new Cat('meaw');
$dog1 = new Dog('doggy');

echo $cat1->sleep();
echo $cat1->eat();
echo $dog1->sleep();
echo $dog1->eat();