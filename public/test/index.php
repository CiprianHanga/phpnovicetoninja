<?php

class Person {
    function say_hello() {
        echo 'hello from inside the class';
    }
}

$person1 = new Person();
$person2 = new Person();

echo get_class($person1) . '<br>';

if (is_a($person, 'Person')) {
    echo 'OK';
} else {
    echo 'NOT OK';
}

$person->say_hello();