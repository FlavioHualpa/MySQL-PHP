<?php

   $errores = [];

   if ($_POST) {

      if (isset($_POST['title'])) {
         if (empty(trim($_POST['title']))) {
            $errores['title'] = 'Debe completar este campo';
         }
      } else {
         $errores['title'] = 'Error de programación. No se recibió el valor de este campo.';
      }

      if (isset($_POST['genero'])) {
         if (empty(trim($_POST['genero']))) {
            $errores['genero'] = 'Debe seleccionar un valor';
         }
      } else {
         $errores['genero'] = 'Error de programación. No se recibió el valor de este campo.';
      }

      if (isset($_POST['rating'])) {
         if (trim($_POST['rating']) == '') {
            $errores['rating'] = 'Debe completar este campo';
         } elseif (!is_numeric($_POST['rating'])) {
            $errores['rating'] = 'Por favor ingrese un valor numérico en este campo';
         } elseif ($_POST['rating'] < 0 || $_POST['rating'] > 10) {
            $errores['rating'] = 'Debe ingresar un valor numérico entre 0 y 10';
         }
      } else {
         $errores['rating'] = 'Error de programación. No se recibió el valor de este campo.';
      }

      if (isset($_POST['awards'])) {
         if (trim($_POST['awards']) == '') {
            $errores['awards'] = 'Debe completar este campo';
         } elseif (!is_numeric($_POST['awards'])) {
            $errores['awards'] = 'Por favor ingrese un valor numérico en este campo';
         } elseif ($_POST['awards'] < 0 || $_POST['awards'] > 100) {
            $errores['awards'] = 'Debe ingresar un valor numérico entre 0 y 100';
         }
      } else {
         $errores['awards'] = 'Error de programación. No se recibió el valor de este campo.';
      }

      if (isset($_POST['length'])) {
         if (trim($_POST['length']) == '') {
            $errores['length'] = 'Debe completar este campo';
         } elseif (!is_numeric($_POST['length'])) {
            $errores['length'] = 'Por favor ingrese un valor numérico en este campo';
         } elseif ($_POST['length'] < 1 || $_POST['length'] > 500) {
            $errores['length'] = 'Debe ingresar un valor numérico entre 1 y 500';
         }
      } else {
         $errores['length'] = 'Error de programación. No se recibió el valor de este campo.';
      }

      if (isset($_POST['year']) && isset($_POST['month']) && isset($_POST['day'])) {
         $fecha_ingresada = strtotime($_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day']);
         $fecha_actual = time(); // también se puede usar strtotime('now');
         if ($fecha_ingresada > $fecha_actual) {
            $errores['fecha'] = 'La fecha de salida debe ser igual o anterior a la fecha actual';
         }
      } else {
         $errores['fecha'] = 'Error de programación. No se recibió el valor de este campo.';
      }
   
   }