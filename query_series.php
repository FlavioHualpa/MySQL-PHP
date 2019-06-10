<?php

   require 'connect.php';
   
   if ($db) {
      $cons = $db->prepare('SELECT series.id, series.title, DATE_FORMAT(series.release_date, "%d-%m-%Y") AS release_date, genres.name AS genre
         FROM series
         INNER JOIN genres ON series.genre_id = genres.id
         ORDER BY series.release_date'
      );
      $cons->execute();
   }
