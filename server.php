<?php

header('content-type:application/json');

include 'database.php';

$data = [];
$noFilters = (is_null($_GET['author']) || $_GET['author'] === '')
              && (is_null($_GET['genre']) || $_GET['genre'] === ''); //is_null mi restituisce vero solo se la variabile $_GET è null, evito il pericolo che mi restituisca vero se $_GET = false
$authorFilter = !is_null($_GET['author']) && $_GET['author'] !== '';
$genreFilter = !is_null($_GET['genre']) && $_GET['genre'] !== '';

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
