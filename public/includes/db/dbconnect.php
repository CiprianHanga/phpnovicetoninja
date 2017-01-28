<?php
try {
    $servername = 'localhost';
    $dbname = 'ijdb';
    $dbtitle = 'Internet Jokes Database';
    $username = 'ijdbuser';
    $password = 'secret';

    $conn = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec('SET NAMES "UTF8"');
    // echo "OK";
} catch (PDOException $e) {
    $output = "Error connecting to $dbtitle on $servername: " . $e->getMessage();
    include  $_SERVER['DOCUMENT_ROOT'] .'/includes/redirects/output.html.php';
    exit();
}



// End of PHP code tag not included as for included files policy.