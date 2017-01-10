<!doctype html>
2    <html lang="en">
3    <head>
4       <meta charset="utf-8">
5       <title>Hello, World!</title>
6       <link rel="stylesheet" href="style.css">
7    </head>
8    <body>
9   <?php # Script 4.2 - hello_object.php
        /** This page uses the HelloWorld class.
        *  This page just says "Hello, world!".
        */

        // Include the class definition:
        require('class.HelloWorld.php');

        // Create the object:
        $obj = new HelloWorld ();

        // Call the sayHello method:
        $obj->sayHello();

        // Say hello in different languages:
        $obj->sayHello('Italian');
        $obj->sayHello('French');
        $obj->sayHello('Dutch');

        // Delete the object:
        unset($obj);
    ?>
    </body>
    </html>
    