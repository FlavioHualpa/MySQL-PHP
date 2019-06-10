<?php

   require 'connect.php';
   
   if ($db) :
      $cons = $db->prepare('SELECT id, name
         FROM genres
         ORDER BY name'
      );
      $cons->execute();
      $generos = $cons->fetchAll(PDO::FETCH_ASSOC); ?>

      <select name="genero" id="genero" class="genero">
         <?php foreach ($generos as $genero) : ?>
            <option value="<?= $genero['id'] ?>"><?= $genero['name'] ?></option>
         <?php endforeach ?>
      </select>
   <?php endif ?>
