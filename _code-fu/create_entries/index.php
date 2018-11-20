<?php

if (!isset($_POST['firstname'])) {
    include 'form.html.php';
} else {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];

    if ($firstname=='Ciprian' and $lastname=='Hanga' and $password=='secret') {
        $username = 'ijdbuser';
        $servername = 'localhost';
        $dbname = 'ijdb';
        $dbtitle = 'Internet Jokes Database';

        try {
            $conn = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $output = "Sorry, connection to $dbtitle failed: " . $e->getMessage();
            include 'output.html.php';
            exit();
        }

        try {
            $sql = 'INSERT INTO joke
                (joketext, jokedate) VALUES (
                "There are a lot of bad jokes in the book, so I\'m not going to bother. ;)",
                "2017-01-09")';
            $conn->exec($sql);
        } catch (PDOException $e) {
            $output = 'Error executing the SQL command: ' . $e->getMessage();
            include 'output.html.php';
            exit();
        }

        $output = "SQL command successfully executed on $dbtitle.";
        include 'output.html.php';

    } else {
        include 'form.html.php';
    }
}

?>
