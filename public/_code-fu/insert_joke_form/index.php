<?php
if (get_magic_quotes_gpc()) {
    $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    while (list($key, $val) = $each($process)) {
        foreach ($val as $k => $v) {
            unset($process[$key][$k]);
            if (is_array($v)) {
                $process[$key][stripslashes($k)] = $v;
                $process[] = &$process[$key][stripslashes($k)];
            } else {
                $process[$key][stripslashes($k)] = stripslashes($v);
            }
        }
    }
    unset($process);
}

if (isset($_GET['addjoke'])) {
    include 'addjoke_form.html.php';
    exit();
}

try {
    $servername =  'localhost';
    $dbname = 'ijdb';
    $dbtitle = 'Internet Jokes Database';
    $username = 'ijdbuser';
    $password = 'secret';

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec('SET NAMES "utf8"');
} catch (PDOException $e) {
    $output = "Error connecting to $dbtitle on $servername: " . $e->getMessage();
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
        $output = "Error adding submitted joke: " . $e->getMessage();
        include 'output.html.php';
        exit();
    }

    header('Location: .');
    exit();
}

try {
    $sql = 'SELECT joketext FROM joke';
    $result = $conn->query($sql);
} catch (PDOException $e) {
    $output = "Error fetching jokes: " . $e->getMessage();
    include 'output.html.php';
    exit();
}

foreach ($result as $row) {
    $jokes[] = $row['joketext'];
}

include 'jokes.html.php';


?>