<?php
// Class definition.
class Person {
    public $first = 'Some';
    public $last = 'Body';

    public function showName () {
        echo $this->first . ' ' . $this->last . '<br>';
    }
}

// Object(s) instantiation.
$somebody = new Person;
$cip = new Person;
    $cip->first = 'Ciprian';
    $cip->last = 'Hanga';
$clau = new Person;
    $clau->first = 'Claudiu';
    $clau->last = 'Hanga';

// Show names.
$somebody->showName();
$cip->showName();
$clau->showName();



?>