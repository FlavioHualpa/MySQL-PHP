<?php

   require 'connect.php';
   
   if ($db) {
      $cons = $db->prepare('SELECT movies.title, DATE_FORMAT(movies.release_date, "%d-%m-%Y") AS release_date, movies.awards, genres.name AS genre
         FROM movies
         INNER JOIN genres ON movies.genre_id = genres.id
         WHERE genres.active = :activo
         ORDER BY movies.release_date'
      );
      $cons->bindValue(':activo', 1);
      $cons->execute();
   }
   
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>MySQL Tables</title>
   <link rel="stylesheet" href="css/main.css">
</head>
<body>
   <div class="contenedor">
      <h1>Listado de películas</h1>

      <?php if ($open_db_fail) : ?>
         <div>
            <img src="img/advertencia.png" alt="advertencia" class="icono-advertencia">
            <span class="texto-advertencia">Error de conexión con la base de datos</span>
         </div>
      <?php else : ?>
         <table class="redTable">
            <thead>
               <tr>
                  <th>Título</th>
                  <th>Género</th>
                  <th>Fecha</th>
                  <th>Premios</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $datos = $cons->fetch(PDO::FETCH_ASSOC);
                  while ($datos) :
               ?>
               <tr>
                  <td><?= $datos['title'] ?></td>
                  <td><?= $datos['genre'] ?></td>
                  <td><?= $datos['release_date'] ?></td>
                  <td><?= $datos['awards'] ?></td>
               </tr>
               <?php
                  $datos = $cons->fetch(PDO::FETCH_ASSOC);
                  endwhile
               ?>
            </tbody>
         </table>
      <?php endif ?>

      <!--
      <br>
      <h2>Y ahora un poco de azar...</h2>
      <span class="bolilla"><?= rand(1, 44) ?></span>
      <span class="bolilla"><?= rand(1, 44) ?></span>
      <span class="bolilla"><?= rand(1, 44) ?></span>
      <span class="bolilla"><?= rand(1, 44) ?></span>
      <span class="bolilla"><?= rand(1, 44) ?></span>
      -->
   </div>
</body>
</html>