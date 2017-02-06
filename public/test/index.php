<?php

class Person {
    public $firstname;
    public $lastname;
    public $age;
    
    public function full_name() {
        return $this->firstname . ' ' . $this->lastname;
    }
    
    public function say_hello() {
        echo "Hello there, I'm " . $this->full_name() . " and I'm $this->age years old.<br>";
    }
}

$person1 = new Person();
$person1->firstname = 'Ciprian';
$person1->lastname = 'Hanga';
$person1->age = 40;
$person1->say_hello();

$person2 = new Person();
$person2->firstname = 'Claudiu';
$person2->lastname = 'Hanga';
$person2->age = 29;
$person2->say_hello();

$person3 = new Person();
$person3->firstname = 'Bianca Elena';
$person3->lastname = 'Hanga';
$person3->age = 27;
$person3->say_hello();