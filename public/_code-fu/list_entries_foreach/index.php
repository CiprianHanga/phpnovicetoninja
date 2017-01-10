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
            $conn->exec('SET NAMES "utf8"');
        } catch (PDOException $e) {
            $output = "Connection to $dbtitle has failed: " . $e->getMessage();
            include 'output.html.php';
            exit();
        }
        
        try {
            $sql = 'SELECT joketext FROM joke';
            $result = $conn->query($sql);
        } catch (PDOException $e) {
            $output = "SQL command on $dbtitle has failed: " . $e->getMessage();
            include 'output.html.php';
            exit();
        }

        foreach ($result as $row) {
            $jokes[] = $row['joketext'];
        }

        include 'jokes.html.php';

        $output = "SQL command on $dbtitle was performed successfully.";
        include 'output.html.php';

    } else {
        include 'form.html.php';
    }
}

?>