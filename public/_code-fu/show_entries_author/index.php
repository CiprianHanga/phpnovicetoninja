<?php
echo '<cite>Premature optimization is the root of all evil.</cite> --Donald Knuth<br>';

// redirect to addjoke form if GET value is provided
if (isset($_GET['addjoke'])) {
    include 'addjoke_form.html.php';
    exit();
}

// DB connection
try {
    $username = 'ijdbuser';
    $password = 'secret';
    $servername = 'localhost';
    $dbname = 'ijdb';
    $dbtitle = 'Internet Jokes Database';

    $conn = new PDO ("mysql:localhost=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec('SET NAMES "UTF8"');
} catch (PDOException $e) {
    $output = "Error connecting to $dbtitle: " . $e->getMessage();
    include 'output.html.php';
    exit();
}

// add joke
if (isset($_POST['joketext'])) {
    try {
        $sql = 'INSERT INTO joke SET
            joketext = :joketext,
            jokedate = CURDATE(),
            authorid = 1';
        $s = $conn->prepare($sql);
        $s->bindValue(':joketext', $_POST['joketext']);
        $s->execute();
    } catch (PDOException $e) {
        $output = "Error adding joke to the database: " . $e->getMessage();
        include 'output.html.php';
        exit();
    }

    header('Location: .');
    exit();
}

// delete joke
if (isset($_GET['deletejoke'])) {
    try {
        $sql = 'DELETE FROM joke WHERE id = :id';
        $s = $conn->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    } catch (PDOException $e) {
        $output = "Error deleting joke from the database: " . $e->getMessage();
        include 'output.html.php';
        exit();
    }
}

// show jokes
try {
    $sql = 'SELECT joke.id, joketext, name, email
    FROM joke INNER JOIN author
    ON authorid = author.id';
    $result = $conn->query($sql);
} catch (PDOException $e) {
    $output = "Error fetching jokes on $dbtitle: " . $e->getMessage();
    include 'output.html.php';
    exit();
}

foreach ($result as $row) {
    $jokes[] = array (
        'id' => $row['id'],
        'text' => $row['joketext'],
        'name' => $row['name'],
        'email' => $row['email']
        );
}

include 'jokes.html.php';



?>