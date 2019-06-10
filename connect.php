<?php

   $dsn = 'mysql:host=localhost;port=3316;dbname=movies_db;';
   $user = 'root';
   $pass = 'digitalhouse';
   $open_db_fail = false;

   try {
      $db = new PDO($dsn, $user, $pass);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (\Throwable $th) {
      $open_db_fail = true;
      $db = null;
   }
