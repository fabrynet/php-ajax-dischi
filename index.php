<?php
// Stampare a schermo una decina di dischi musicali
// (vedi screenshot) in due modi diversi:
// - Solo con l'utilizzo di PHP, che stampa
// direttamente i dischi in pagina: al caricamento
// della pagina ci saranno tutti i dischi.
// - Attraverso l'utilizzo di AJAX: al caricamento
// della pagina ajax chiederà attraverso una
// chiamata i dischi a php e li stamperà
// attraverso handlebars.
// Utilizzare: Html, JS, jQuery, handlebars, Php
// OPZIONALE:
// - Attraverso un'altra chiamata ajax, filtrare gli
// album per artista
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP-Ajax Dischi</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
    <script id="disk-template" type="text/x-handlebars-template">
      <div class="disk" data-genre="{{ genre }}">
          <img src="{{ poster }}" alt="Disk Poster">
          <h3>{{ title }}</h3>
          <span class="author">{{ author }}</span>
          <span class="year">{{ year }}</span>
      </div>
    </script>
  </head>
  <body>
    <header>
      <div class="container">
          <img src="img/logo.png" alt="logo" />
          <select id="select-artist" name="">
            <option value="" selected="selected">Seleziona un artista</option>
            <option value="Pop"></option>
          </select>
      </div>
    </header>
    <div class="disks-container container">
      <?php
      // include __DIR__.'/vars.php';
      // $disks = $db['response'];
      // foreach ($disks as $disk) {
      //   $poster = $disk['poster'];
      //   $title = $disk['title'];
      //   $author = $disk['author'];
      //   $genre = $disk['genre'];
      //   $year = $disk['year'];
        ?>
        <!-- <div class="disk" data-genre="<?php echo $genre; ?>">
            <img src="<?php echo $poster; ?>" alt="Disk Poster">
            <h3><?php echo $title; ?></h3>
            <span class="author"><?php echo $author; ?></span>
            <span class="year"><?php echo $year; ?></span>
        </div> -->
        <?php
      // }
       ?>

    </div>


     <script type="text/javascript" src="js/script.js"></script>
   </body>
</html>
