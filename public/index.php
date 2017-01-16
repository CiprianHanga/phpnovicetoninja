<?php
echo '</p><cite>Premature optimization is the root of all evil.</cite> --Donald Knuth</p>';

if (isset($_GET['addjoke'])) {
    include 'addjoke.html.php';
    exit();
}

try {
    $servername = 'localhost';
    $dbname = 'ijdb';
    $dbtitle = 'Internet Jokes Database';
    $username = 'ijdbuser';
    $password = 'secret';

    $conn = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec('SET NAMES "UTF8"');
} catch (PDOException $e) {
    $output = "Error connecting to $dbtitle :" . $e->getMessage();
    include 'output.html.php';
    exit();
}

if (isset($_POST['joketext'])) {
    try {
        $sql = 'INSERT INTO joke SET
            joketext = :joketext,
            jokedate = CURDATE()';
        $s = $conn->prepare($sql);
        $s->bindValue(':joketext', $_POST['joketext']);
        $s->execute();
    } catch (PDOException $e) {
        $output = "Error adding joke to the database: " . $e->getMessage();
        include 'output.html.php';
        exit();
    }

    header ('Location: .');
    exit();
}

try {
    $sql = 'SELECT joketext FROM joke';
    $result = $conn->query($sql);
} catch (PDOException $e) {
    $output = "Error fetching jokes from $dbtitle: " . $e->getMessage();
    include 'output.html.php';
    exit();
}

foreach ($result as $row) {
    $jokes[] = $row['joketext'];
}

include 'jokes.html.php';

?>