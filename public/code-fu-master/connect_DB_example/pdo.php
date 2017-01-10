<?php
// PDO connection method
// 
// Note: the PDO method requires a DB specification

$servername = 'localhost';
$dbname = 'emptytest';
$username = 'tester';
$password = 'secret';

// Create connection and check the connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully PDO!";
} catch (PDOException $e) {
    echo "Connection failed... " . '<p>' . $e->getMessage() . '</p>';
}


// No PHP closing tag as for included files policy.

/**
- the error case is on DEBUG mode: it should be obscured from user in production


*/