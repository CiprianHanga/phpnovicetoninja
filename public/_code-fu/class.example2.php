<?php
// Class definition.
class Person {
    public $name;
}

// Object instantiation.
$foo = new Person;
$foo->names = ['Ciprian', 'Claudiu', 'Bianca'];

// List names from object foo.
foreach ($foo->names as $name) {
    echo $name . '<br>';
}


?>
