<?php

   require 'connect.php';
   
   if ($db) {
      $cons = $db->prepare('SELECT
         (SELECT title
            FROM series
            WHERE id = :id
         ) AS nombre,
         (SELECT COUNT(id)
            FROM seasons
            WHERE serie_id = :id
         ) AS temporadas,
         (SELECT COUNT(episodes.id)
            FROM episodes
            INNER JOIN seasons ON episodes.season_id = seasons.id
            WHERE seasons.serie_id = :id
         ) AS episodios'
      );

      $id = $_GET['serie_id'] ?? 0;
      $cons->bindValue(':id', $id);
      $cons->execute();
   }
