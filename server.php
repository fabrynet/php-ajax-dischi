<?php

header('content-type:application/json');

include 'database.php';

$data = [];
$noFilters = (!$_GET['author'] || $_GET['author'] === '')
              && (!$_GET['genre'] || $_GET['genre'] === '');
$authorFilter = $_GET['author'] || $_GET['author'] !== '';
$genreFilter = $_GET['genre'] || $_GET['genre'] !== '';

$author = $_GET['author'];
$genre = $_GET['genre'];

// if (!$_GET['author'] || $_GET['author'] === '') {
//   $data = $db;
// } else {
//   $author = $_GET['author'];
//   foreach ($db['response'] as $cd) {
//     if ($cd['author'] === $author) {
//         $data['response'][] = $cd;
//     }
//   }
// }
if ($noFilters) {
  $data = $db;
} else if ($authorFilter && !$genreFilter) {
  foreach ($db['response'] as $cd) {
    if ($cd['author'] === $author) {
        $data['response'][] = $cd;
    }
  }
} else if (!$authorFilter && $genreFilter) {
  foreach ($db['response'] as $cd) {
    if ($cd['genre'] === $genre) {
        $data['response'][] = $cd;
    }
  }
} else if ($authorFilter && $genreFilter){
  foreach ($db['response'] as $cd) {
    if ($cd['author'] === $author && $cd['genre'] === $genre) {
        $data['response'][] = $cd;
    }
  }
}

echo json_encode($data);

 ?>
