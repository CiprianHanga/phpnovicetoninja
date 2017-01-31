<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers/magicquotes.php';

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
}   // end of Delete authors block

// Add new author
if (isset($_GET['add'])) {
    $pageTitle = 'New Author';
    $action = 'addform';
    $name = '';
    $email = '';
    $id = '';
    $button = 'Add author';

    include 'form.html.php';
    exit();
}

if (isset($_GET['addform'])) {
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db/dbconnect.php';

    try {
        $sql = 'INSERT INTO author SET
            name = :name,
            email = :email';
        $s = $conn->prepare($sql);
        $s->bindValue(':name', $_POST['name']);
        $s->bindValue(':email', $_POST['email']);
        $s->execute();
    } catch (PDOException $e) {
        $output = "Error adding submitted author: " . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/includes/redirects/output.html.php';
        exit();
    }

    header('Location: .');
    exit();
} // end of Add new author block

// Edit existing author
if (isset($_POST['action']) and $_POST['action'] == 'Edit') {
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db/dbconnect.php';

    try {
        $sql = 'SELECT id, name, email FROM author WHERE id = :id';
        $s = $conn->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    } catch (PDOException $e) {
        $output = "Error fetching author details: " . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/includes/redirects/output.html.php';
        exit();
    }

    $row = $s->fetch();

    $pageTitle = 'Edit Author';
    $action = 'editform';
    $name = $row['name'];
    $email = $row['email'];
    $id = $row['id'];
    $button = 'Update author';

    include 'form.html.php';
    exit();
} // end of Edit existing author block

if (isset($_GET['editform'])) {
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db/dbconnect.php';

    try {
        $sql = 'UPDATE author SET
            name = :name,
            email = :email
            WHERE id = :id';
        $s = $conn->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':name', $_POST['name']);
        $s->bindValue(':email', $_POST['email']);
        $s->execute();
    } catch (PDOException $e) {
        $output = "Error updating submitted author: " . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/includes/redirects/output.html.php';
        exit();
    }

    header('Location: .');
    exit();
}

