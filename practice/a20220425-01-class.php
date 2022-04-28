<?php

class Person
{
    private $name = '';

    function __construct($name, $age = 0)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function getName()
    {
        return $this->name;
    }
}

$p1 = new Person('Bill', 25);

echo "\$p1->getName(): {$p1->getName()} <br>";
echo "\$p1->age: {$p1->age} <br>";