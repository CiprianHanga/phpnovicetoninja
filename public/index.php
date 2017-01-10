<?php
echo '<cite>Premature optimization is the root of all evil.</cite> --Donald Knuth<br>';

if (!isset($_POST['firstname'])) {
    include 'login_form.html.php';
} else {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];

    if ($firstname=='Ciprian' and $lastname=='Hanga' and $password=='secret') {
        echo 'OK';
    } else {
        include 'login_form.html.php';
    }

}

?>