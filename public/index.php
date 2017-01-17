<?php
echo '<cite>Premature optimization is the root of all evil.</cite> --Donald Knuth';

if (isset($_GET['addjoke'])) {
    include 'addjoke_form.html.php';
    exit();
}

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

if (isset($_POST['joketext'])) {
    try {
            $sql = 'INSERT INTO joke SET
            joketext = :joketext,
            jokedate = CURDATE()';
        $s = $conn->prepare($sql);
        $s->bindValue(':joketext', $_POST['joketext']);
        $s->execute();
    } catch (PDOException $e) {
        $output = "Error adding the joke to $dbtitle: " . $e->getMessage();
        include 'output.html.php';
        exit();
    }

    header('Location: .');
    exit();
}

if (isset($_GET['deletejoke'])) {
    try {
        $sql = 'DELETE FROM joke WHERE id = :id';
        $s = $conn->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    } catch (PDOException $e) {
        $output = "Error deleting joke from $dbtitle: " . $e->getMessage();
        include 'output.html.php';
        exit();
    }

    header('Location: .');
    exit();
}

try {
    $sql = 'SELECT id, joketext FROM joke';
    $result = $conn->query($sql);
} catch (PDOException $e) {
    $output = "Error fetching jokes from $dbtitle: " . $e->getMessage();
    include 'output.html.php';
    exit();
}

foreach ($result as $row) {
    $jokes[] = array ('id' => $row['id'], 'text' => $row['joketext']);
}

include 'jokes.html.php';

?>