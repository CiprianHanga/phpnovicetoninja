<?php 
// Source: http://php.net/manual/en/reserved.variables.server.php
// 
// Here's a simple, quick but effective way to block unwanted external visitors to your local server: 

// only local requests 
if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1') 
  die(header("Location: /")); 

// This will direct all external traffic to your home page. Of course you could send a 404 or other custom error. Best practice is not to stay on the page with a custom error message as you acknowledge that the page does exist. That's why I redirect unwanted calls to (for example) phpmyadmin.

?> 