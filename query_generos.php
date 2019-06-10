<?php

   require 'connect.php';
   
   if ($db) {
      $cons = $db->prepare(
         'SELECT id, name
         FROM genres
         ORDER BY name'
      );
      $cons->execute();

      $subcons = $db->prepare(
         'SELECT id, title
         FROM movies
         WHERE genre_id = :id
         ORDER BY title'
      );
   }
