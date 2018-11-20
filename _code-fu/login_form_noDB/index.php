<?php
// Login Form w/o DB support
// 
// From: PHP & MySQL: Novice to Ninja, 5th Edition, by Kevin Yank, Sitepoint, 2012.
// Uses $_REQUEST for getting the user input.
// Uses no DB backend, has just two cases: user is either Ciprian Hanga or it's not.
// When user is not Ciprian Hanga, is accepted by default.
// 
// Last Updated: 2017/01/17

if (!isset($_REQUEST['firstname'])) {
    include 'form.html.php';
} else {
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];

    if ($firstname == 'Ciprian' and $lastname == 'Hanga') {
        $output = 'Welcome back, oh glorious leader!';
    } else {
        $output = 'Welcome to our website, ' .
            htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8') . ' ' .
            htmlspecialchars($lastname, ENT_QUOTES, 'UTF-8') . '!';
    }
    include 'welcome.html.php';
}

?>