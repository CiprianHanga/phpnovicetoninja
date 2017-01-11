<?php
// Nota 2017/01/11:
// - nu pot sa o fac sa mearga, trece de prima pagina 'front.html', ajunge 
// in 'addjoke.html.php' dar de acolo se intoarce in 'front.html' fara sa mai 
// faca ceva cu DB. 


// Magic quotes
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

if (isset($_GET['foobar'])) {

    include 'addsql_form.html.php';
    //exit();

    try {
        $servername = 'localhost';
        $dbname = 'emptytest';
        $dbtitle = 'Test Database';
        $username = 'tester';
        $password = 'secret';

        $conn = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec('SET NAMES "UTF8"');
    } catch (PDOException $e) {
        $output = "Error connecting to $dbtitle on $servername: " . $e->getMessage();
        include 'output.html.php';
        exit();
    }

    echo 'pope';

    if (isset($_POST['somesql'])) {
        try {
            $sql = ':somesql';
            $s = $conn->prepare($sql);
            $s->bindValue(':somesql', $_POST['somesql']);
            $s->execute();
        } catch (PDOException $e) {
            $output = "Error executing the SQL command on $dbtitle: " . $e->getMessage();
            include 'output.html.php';
            exit();
        }

        header('Location: .');
        exit();
    }

} else {
    include 'front.html';
    exit();
}


