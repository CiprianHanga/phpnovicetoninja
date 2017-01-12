<?php
// Personal Note: this piece of code can be added to the top of the page
// on a server that you don't control to check if magic quotes are on or off.
// If they are ON and you can't change that, use the solution provided in this 
// folder (file: sanitize_magic_quotes.php).
// 
// From the original author (Anon): "This is just a generic check for magic_quotes
// If they are on they strip the slashes leaving the input unaltered."
// (From: http://aaroncameron.net/article.html?aID=59) 



$debug = 1;

if (get_magic_quotes_gpc()) {
    if ($debug) {
        echo 'Magic_quotes_gpc is on<br>';
    }

    while (list ($key, $value )  = each ($_POST)) {
 	    // IF A VALUE WAS SELECTED	
 	    if (!(empty ($value)) ) {
 		    if ($debug) {
                 echo $key. ' - ' . $value . ' <br>';
            }
 		    
            $value = stripslashes($value);
 		    
            if ($debug) {
                 echo $key.' - ' . $value . ' <br>';
            }

 			$_POST[$key] = $value ;
        }
    }

} else {
    if ($debug) {
        echo 'Magic_quotes_gpc is off<br>';
    }

}

reset($_POST); 




?>