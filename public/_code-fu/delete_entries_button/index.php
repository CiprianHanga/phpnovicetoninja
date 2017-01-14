<?php
if (isset($_GET['addjoke'])) {
    include 'addjoke_form.html.php';
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
    $conn->exec('SET NAMES "utf8"');
} catch (PDOException $e) {
    $output = "Connection to $dbtitle on $servername has failed: " . $e->getMessage();
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
        $output = "Error adding submitted joke to $dbtitle: " . $e->getMessage();
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
}

try {
    $sql = 'SELECT id, joketext FROM joke';
    $result = $conn->query($sql);
} catch (PDOException $e) {
    $output = "Error fetching jokes on $dbtitle: " . $e->getMessage();
    include 'output.html.php';
    exit();
}

foreach ($result as $row) {
    // $jokes[] = $row['joketext'];
    $jokes[] = array('id' => $row['id'], 'text' => $row['joketext']);
}
// Deci: cand vrei mai mult de o singura valoare dintr-un array, folosesti 
// tipul de declarare ptr associative arrays, folosind in loc de valori ''
// acceasi variabila temporara $row, din care insa extragi element cu element.

include 'front.html.php';




?>
