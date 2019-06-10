<?php

   if (isset($_GET['clase']) && isset($_GET['buscar'])) {
      require 'query_buscador.php';
   } else {
      exit;
   }

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Resultado de la búsqueda</title>
   <link rel="stylesheet" href="css/main.css">
</head>
<body>
   <div class="contenedor">
      <?php if ($open_db_fail) : ?>
         <div class="centrado">
            <img src="img/advertencia.png" alt="advertencia" class="icono-advertencia">
            <span class="texto-advertencia">Error de conexión con la base de datos</span>
         </div>
      <?php elseif ($cons->rowCount() == 0) : ?>
         <div class="centrado">
            <img src="img/advertencia.png" alt="advertencia" class="icono-advertencia">
            <span class="texto-advertencia">La búsqueda no devolvió resultados</span>
         </div>
      <?php else : ?>
         <h2>Resultados de '<?= $_GET['buscar'] ?>' en <?= $_GET['clase'] == 'pel' ? 'películas' : 'series' ?></h2>
         <table class="redTable">
            <thead>
               <tr>
                  <?php if ($_GET['clase'] == 'pel') : ?>
                     <th>Título</th>
                     <th>Género</th>
                     <th>Duración</th>
                     <th>Fecha</th>
                  <?php elseif ($_GET['clase'] == 'ser') : ?>
                     <th>Título</th>
                     <th>Género</th>
                     <th>Temporadas</th>
                     <th>Fecha</th>
                  <?php endif ?>
               </tr>
            </thead>
            <tbody>
               <?php
                  $datos = $cons->fetch(PDO::FETCH_ASSOC);
                  while ($datos) :
               ?>
               <tr>
                  <?php if ($_GET['clase'] == 'pel') : ?>
                     <td><?= $datos['title'] ?></td>
                     <td><?= $datos['name'] ?></td>
                     <td><?= $datos['length'] ?></td>
                     <td><?= $datos['release_date'] ?></td>
                  <?php elseif ($_GET['clase'] == 'ser') : ?>
                     <td><?= $datos['title'] ?></td>
                     <td><?= $datos['name'] ?></td>
                     <td><?= $datos['temporadas'] ?></td>
                     <td><?= $datos['release_date'] ?></td>
                  <?php endif ?>
               </tr>
               <?php
                  $datos = $cons->fetch(PDO::FETCH_ASSOC);
                  endwhile
               ?>
            </tbody>
         </table>
      <?php endif ?>

      <br>
      <a href="buscador.php" class="link">&lt;&lt;&nbsp;Hacer una nueva búsqueda</a>
   </div>
</body>
</html>