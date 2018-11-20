<?php

if (!isset($_POST['firstname'])) {
    include 'form.html.php';
} else {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];

    if ($firstname == 'Ciprian' and $lastname == 'Hanga' and $password == 'secret') {
        $username = 'ijdbuser';
        $servername = 'localhost';
        $dbname = 'ijdb';

        try {
            $conn = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to Exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $output = 'Sorry, connection to database failed.' . $e->getMessage(); // DEBUG
            include 'output.html.php';
            exit();
        }

        try {
            $sql = 'CREATE TABLE joke (
                id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                joketext TEXT,
                jokedate DATE NOT NULL
            ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
            $conn->exec($sql);
        } catch (PDOException $e) {
            $output = 'Error creating joke table: ' . $e->getMessage();
            include 'output.html.php';
            exit();
        }

        $output = 'Joke table successfully created.';
        include 'output.html.php';

    } else {
        include 'form.html.php';
    }
}

?>