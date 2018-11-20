<?php
echo '<cite>Premature optimization is the root of all evil.</cite> --Donald Knuth<br>';

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
            $output = "Sorry, connection to $dbtitle has failed: " . $e->getMessage();
            include 'output.html.php';
            exit();
        }

        try {
            $sql = 'UPDATE joke SET jokedate = "2017-01-09" WHERE id = "1"';
            $conn->exec($sql);
        } catch (PDOException $e) {
            $output = "Sorry, the SQL command on $dbtitle has failed: " . $e->getMessage();
            include 'output.html.php';
            exit();
        }

        $output = "SQL command on $dbtitle performed successfully!";
        include 'output.html.php';

    } else {
        include 'form.html.php';
    }
}


?>
