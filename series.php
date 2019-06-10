<?php

   require 'query_series.php';
   
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
      <h1>Listado de series</h1>

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
               </tr>
            </thead>
            <tbody>
               <?php
                  $datos = $cons->fetch(PDO::FETCH_ASSOC);
                  while ($datos) :
               ?>
               <tr>
                  <td><a href="serie.php?serie_id=<?= $datos['id'] ?>" class="link"><?= $datos['title'] ?></a></td>
                  <td><?= $datos['genre'] ?></td>
                  <td><?= $datos['release_date'] ?></td>
               </tr>
               <?php
                  $datos = $cons->fetch(PDO::FETCH_ASSOC);
                  endwhile
               ?>
            </tbody>
         </table>
      <?php endif ?>
   </div>
</body>
</html>