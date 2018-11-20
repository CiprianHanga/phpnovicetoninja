<?php
// MySQLi OOP method
// 
// Note: MySQLi methods don't require a DB specification, as long as
// the user credentials are true for ANY DB on the specified server

$servername = 'localhost';
$username = 'tester';
$password = 'secret';

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
} echo "Connected successfully OOP!";

// No PHP closing tag as for included files policy.

/**
- the connection is created via a new mysqli object, instead of a function
- the error case is on DEBUG mode: should be obscured from user in production




*/