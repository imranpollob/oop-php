<?php

class Task{
    public $title;
    public $description;
    public $completed = false;

    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function completed()
    {
        $this->completed = true;
    }
}


$task1 = new Task('Learn', 'Learn from Laracasts');
$task2 = new Task('Shop', 'Buy pencil from shop');

$task1->completed();

var_dump($task1->completed);
var_dump($task2->title);