<?php

header('content-type:application/json');

include 'database.php';

$data = [];
if (!$_GET['author'] || $_GET['author'] === '') {
  $data = $db;
} else {
  $author = $_GET['author'];
  foreach ($db['response'] as $cd) {
    if ($cd['author'] === $author) {
        $data['response'][] = $cd;
    }
  }
}

echo json_encode($data);

 ?>
