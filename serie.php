<?php

   require 'query_detalle.php';
   
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
      <?php if ($open_db_fail) : ?>
         <div>
            <img src="img/advertencia.png" alt="advertencia" class="icono-advertencia">
            <span class="texto-advertencia">Error de conexión con la base de datos</span>
         </div>
      <?php elseif ($cons->rowCount() == 0) : ?>
         <div>
            <img src="img/advertencia.png" alt="advertencia" class="icono-advertencia">
            <span class="texto-advertencia">El código de la serie es incorrecto</span>
         </div>
      <?php else : ?>
      <?php $row = $cons->fetch(PDO::FETCH_ASSOC) ?>
         <h1><?= $row['nombre'] ?></h1>

         <table class="redTable">
            <thead>
               <tr>
                  <th>Temporadas</th>
                  <th>Episodios</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td><?= $row['temporadas'] ?></td>
                  <td><?= $row['episodios'] ?></td>
               </tr>
            </tbody>
         </table>
      <?php endif ?>

      <br>
      <a href="series.php" class="link">&lt;&lt;&nbsp;Volver</a>
   </div>
</body>
</html>