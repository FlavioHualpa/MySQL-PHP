<?php

   require 'query_generos.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Películos por género</title>
   <link rel="stylesheet" href="css/main.css">
</head>
<body>
   <div class="contenedor">
      <h1>Listado películas por género</h1>

      <?php if ($open_db_fail) : ?>
         <div>
            <img src="img/advertencia.png" alt="advertencia" class="icono-advertencia">
            <span class="texto-advertencia">Error de conexión con la base de datos</span>
         </div>
      <?php else : ?>
         <table class="redTable">
            <thead>
               <tr>
                  <th>Género</th>
                  <th>Películas</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $datos = $cons->fetch(PDO::FETCH_ASSOC);
                  while ($datos) :
                     $subcons->bindValue(':id', $datos['id']);
                     $subcons->execute();
                     $por_genero = $subcons->rowCount();
                     $renglon = 0;
                     $pelis = $subcons->fetch(PDO::FETCH_ASSOC);
                     while ($pelis) :
                  ?>
                  <tr>
                     <?php if ($renglon == 0) : ?>
                        <td rowspan="<?= $por_genero ?>"><?= $datos['name'] ?></td>
                     <?php endif ?>
                     <td><a href="pelicula.php?pel_id=<?= $pelis['id'] ?>" class="link"><?= $pelis['title'] ?></a></td>
                  </tr>
                  <?php
                     $renglon++;
                     $pelis = $subcons->fetch(PDO::FETCH_ASSOC);
                     endwhile
                  ?>
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
