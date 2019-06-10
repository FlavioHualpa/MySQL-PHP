<?php

   if (empty($errores)) {
      
      require 'connect.php';
      
      if ($open_db_fail) {
      
         header('location: resultado_guardar_pelicula.php?exito=0');
         exit;
      
      } else {

         $cons = $db->prepare('SELECT * FROM movies WHERE title LIKE :title');
         $cons->bindValue(':title', $_POST['title']);
         $cons->execute();
         
         if ($cons->rowCount() > 0) {
            $errores['title'] = 'Esta película ya existe en la base de datos';
         } else {
            $cons = $db->prepare('
               INSERT INTO movies
               (created_at, title, rating, awards, release_date, length, genre_id)
               VALUES (CURRENT_TIMESTAMP, :title, :rating, :awards, :rdate, :length, :genre)'
            );
            $cons->bindValue(':title', $_POST['title']);
            $cons->bindValue(':rating', $_POST['rating']);
            $cons->bindValue(':awards', $_POST['awards']);
            $cons->bindValue(':rdate', $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day']);
            $cons->bindValue(':length', $_POST['length']);
            $cons->bindValue(':genre', $_POST['genero']);
            $inserciones = $cons->execute();

            header('location: resultado_guardar_pelicula.php?exito=' . $inserciones);
            exit;
         }

      }
   }
