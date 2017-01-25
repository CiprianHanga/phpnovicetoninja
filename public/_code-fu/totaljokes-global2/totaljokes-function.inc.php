<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/dbconnect.php';

function totalJokes()
{
  try
  {
    $sql = 'SELECT COUNT(*) FROM joke';
    $result = $GLOBALS['conn']->query($sql);
  }
  catch (PDOException $e)
  {
    $error = 'Database error counting jokes: ' . $e->getMessage();
    include 'error.html.php';
    exit();
  }

  $row = $result->fetch();

  return $row[0];
}
