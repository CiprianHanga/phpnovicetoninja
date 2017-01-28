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


// Delete authors
if (isset($_POST['action']) and  $_POST['action'] == 'Delete') {
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db/dbconnect.php';

    // Get jokes belonging to author
    try {
        $sql = 'SELECT id FROM joke WHERE authorid = :id';
        $s = $conn->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    } catch (PDOException $e) {
        $output = "Error getting list of jokes to delete: " . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/includes/redirects/output.html.php';
        exit();
    }

    $result = $s->fetchAll();

    // Delete joke category entries
    try {
        $sql = 'DELETE FROM jokecategory WHERE jokeid = :id';
        $s = $conn->prepare($sql);

        // For each joke
        foreach ($result as $row) {
            $jokeId = $row['id'];
            $s->bindValue(':id', $jokeId);
            $s->execute();
        }
    } catch (PDOException $e) {
        $output = "Error deleting category entries for joke: " . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/includes/redirects/output.html.php';
        exit();
    }

    // Delete jokes belonging to the author
    try {
        $sql = 'DELETE FROM joke WHERE authorid = :id';
        $s = $conn->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    } catch (PDOException $e) {
        $output = "Error deleting jokes from author: " . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/includes/redirects/output.html.php';
        exit();
    }

    // Delete the author
    try {
        $sql = 'DELETE FROM author WHERE id = :id';
        $s = $conn->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    } catch (PDOException $e) {
        $output = "Error deleting author: " . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/includes/redirects/output.html.php';
        exit();
    }

    header('Location: .');
    exit();
}

