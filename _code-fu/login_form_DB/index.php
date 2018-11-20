<?php
// Login Form with DB support
// 
// Has just one user accepted: Ciprian Hanga (password:secret).
// Everyone else get's redirected to the login screen again.
// Assumes an 'emptytest' MySQL DB on server 'localhost' (tester:secret)
// Note: Admittedly, storing the user:password credentials inside the app controller
//      is not the best strategy, so a different/better solution must be implemented,
//      where the authorization is abstracted at the DB level.
//      In that regard, the solution here is just for demonstration purposes 
//      and is not meant for production.
// 
// Author: Ciprian Hanga (email: ciprianhanga@gmail.com)
// Last Updated: 2017/01/08

if (!isset($_POST['firstname'])) {
    include 'form.html.php';
} else {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];

    // this structure should be replaced by a SQL query authorization
    if ($firstname == 'Ciprian' and $lastname = 'Hanga' and $password == 'secret') {
        $username = 'tester';
        $servername = 'localhost';
        $dbname = 'emptytest';
        
        try {
            $conn = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to Exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $output = 'Welcome back, oh glorious leader!';
            include 'output.html.php';
        } catch (PDOException $e) {
            $output = 'Sorry, connection to database failed: ' . $e->getMessage(); // <-- DEBUG
            include 'output.html.php';
            exit();
        }

    } else {
        include 'form.html.php';
    }

}

?>
