<?php

   require 'connect.php';
   
   if ($db) {

      $query = 'SELECT CONCAT(first_name, " ", last_name) AS actor_name
         FROM actors
         ORDER BY actor_name';
      
      $cons = $db->prepare($query);
      $cons->execute();
   }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/main.css">
	<script src="https://kit.fontawesome.com/487b4db8ef.js"></script>
	<title>Buscador de Series y Películas</title>
</head>

<body>
	<div class="contenedor">
      <h1>Listado de actores</h1>
      <br>
      
      <?php if ($open_db_fail) : ?>
         <div>
            <img src="img/advertencia.png" alt="advertencia" class="icono-advertencia">
            <span class="texto-advertencia">Error de conexión con la base de datos</span>
         </div>
      <?php else : ?>
         <ul>
         <?php
            $row = $cons->fetch(PDO::FETCH_ASSOC);
            while ($row) :
            ?>
            <li><?= $row['actor_name'] ?></li>
         <?php
            $row = $cons->fetch(PDO::FETCH_ASSOC);
            endwhile
            ?>
         </ul>
      <?php endif ?>
   </div>
</body>
</html>
