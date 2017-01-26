<?php
// Function to calculate the area of a square.
// Comment/uncomment the include instruction to see values change.

function area($width, $height) {
    return $width * $height;
}

$area = area(3, 5);

include 'test2.php';

echo $area;

?>