<?php

// Display author list
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db/dbconnect.php';

try {
    $result = $conn->query('SELECT id, name FROM author');
} catch (PDOException $e) {
    $output = "Error fetching authors from the database: " . $e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/redirects/output.html.php';
    exit();
}

foreach ($result as $row) {
    $authors[] = array('id' => $row['id'], 'name' => $row['name']);
}

include 'authors.html.php';

