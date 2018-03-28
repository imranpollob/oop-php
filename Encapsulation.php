<?php

class Person{
    private $name;
    private $age;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        if ($age < 18) {
            throw new Exception('You should be at least 18');
        }
        $this->age = $age;
    }
}

$person1 = new Person('Pollob');

$person1->setAge(18);

var_dump($person1->getAge());