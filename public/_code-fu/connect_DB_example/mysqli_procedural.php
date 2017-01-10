<?php
// MySQLi procedural method.
// 
// Note: MySQLi methods don't require a DB specification, as long as
// the user credentials are true for ANY DB on the specified server

$servername = 'localhost';
$username = 'tester';
$password = 'secret';

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . $mysqli_connect_error());
} echo "Connected successfully Procedural!";

// No PHP closing tag as for included files policy.


/**
- the connection is created via a function: mysqli_connect()
- the error case is on DEBUG mode: should be obscured from user in production



*/