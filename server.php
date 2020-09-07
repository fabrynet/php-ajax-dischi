<?php

header('content-type:application/json');

include 'database.php';

$hasGet = count($_GET) > 0; //controllo che abbia almeno un GET, GET è sempre un array
$noFilters = !$hasGet || ($_GET['author'] === '' && $_GET['genre'] === '');
// $noFilters = (is_null($_GET['author']) || $_GET['author'] === '')
              // && (is_null($_GET['genre']) || $_GET['genre'] === '');
$authorFilter = !is_null($_GET['author']) && $_GET['author'] !== ''; //is_null mi restituisce vero solo se la variabile $_GET è null, evito il pericolo che mi restituisca vero se $_GET = false
$genreFilter = !is_null($_GET['genre']) && $_GET['genre'] !== '';

$author = $_GET['author'];
$genre = $_GET['genre'];

$data = [];

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

echo json_encode($data);

 ?>
