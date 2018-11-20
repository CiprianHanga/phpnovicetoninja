<?php
// PHP & MySQL: Novice to Ninja Project

$servername = 'localhost';
$dbname = 'ijdb';
$username = 'ijdbuser';
$password = 'secret';

// Establish the DB connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec('SET NAMES "utf8"');
} catch (PDOException $e) {
    $error = 'Unable to connect to the database server.';
    include 'error.html.php';
}

// Extracts jokes inside the DB
try {
    $sql = 'SELECT joketext FROM joke';
    $result = $conn->query($sql);
} catch (PDOException $e) {
    $error = 'Error fetching jokes.' . $e->getMessage();
    include 'error.html.php';
    exit();
}

// Shows the results
while ($row = $result->fetch()) {
    $jokes[] = $row['joketext'];
} 

include 'jokes.html.php';

?>