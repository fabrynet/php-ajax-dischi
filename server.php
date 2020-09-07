<?php

header('content-type:application/json');

include 'database.php';

echo json_encode($db);

 ?>
