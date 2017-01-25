<?php

function area($width, $height) {
    return $width * $height;
}

$area = area(3, 5);
include 'test2.php';

echo $area;

?>