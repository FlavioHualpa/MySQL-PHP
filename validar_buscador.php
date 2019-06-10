<?php

   $errores = [];

   if ($_POST) {

      if (isset($_POST['title'])) {
         if (empty(trim($_POST['title']))) {
            $errores['title'] = 'Ingrese alguna palabra';
         }
      } else {
         $errores['title'] = 'Error de programación. No se recibió el valor de este campo.';
      }

      if (isset($_POST['clase'])) {
         if ($_POST['clase'] != 'ser' && $_POST['clase'] != 'pel') {
            $errores['clase'] = 'Error de programación. No se recibió el valor de este campo.';
         }
      } else {
         $errores['clase'] = 'Debe seleccionar un valor';
      }
   
   }