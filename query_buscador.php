<?php

   require 'connect.php';
   
   if ($db) {

      switch ($_GET['clase']) {
         case 'pel':
            $query = 'SELECT movies.title, movies.length, DATE_FORMAT(movies.release_date, "%d-%m-%Y") AS release_date, genres.name
               FROM movies
               INNER JOIN genres ON movies.genre_id = genres.id
               WHERE movies.title LIKE :busqueda
               ORDER BY movies.release_date';
            break;

         case 'ser':
            $query = 'SELECT series.title, COUNT(seasons.id) AS temporadas, DATE_FORMAT(series.release_date, "%d-%m-%Y") AS release_date, genres.name
               FROM series
               INNER JOIN genres ON series.genre_id = genres.id
               INNER JOIN seasons ON seasons.serie_id = series.id
               WHERE series.title LIKE :busqueda
               GROUP BY series.title, series.release_date, genres.name
               ORDER BY series.release_date';
            break;
      }
      
      $cons = $db->prepare($query);
      $cons->bindValue(':busqueda', '%' . $_GET['buscar'] . '%');
      $cons->execute();
   }
