<?php
echo '<cite>Premature optimization is the root of all evil.</cite> --Donald Knuth';

try {
    $username = 'ijdbuser';
    $password = 'secret';
    $servername = 'localhost';
    $dbname = 'ijdb';
    $dbtitle = 'Internet Jokes Database';

    $conn = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec('SET NAMES "UTF8"');
} catch (PDOException $e) {
    $output = "Error connecting to $dbtitle: " . $e->getMessage();
    include 'output.html.php';
    exit();
}

?>