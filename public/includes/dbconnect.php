<?php

$servername = 'localhost';
$dbname = 'ijdb';
$dbtitle = 'Internet Jokes Database';
$username = 'ijdbuser';
$password = 'secret';

try {
    $conn = new PDO ("mysql:host=$servername;$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec('SET NAMES "UTF8"');
    // echo "OK";
} catch (PDOException $e) {
    $output = "Error connecting to $dbtitle on $servername: " . $e->getMessage();
    include 'output.html.php';
    exit();
}

// End of PHP code tag not included as for included files policy.