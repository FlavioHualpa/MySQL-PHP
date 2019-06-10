<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Agregar Película</title>
   <link rel="stylesheet" href="css/main.css">
</head>
<body>
   <div class="contenedor">
      <?php if (!isset($_GET['exito']) || ($_GET['exito'] != 0 && $_GET['exito'] != 1)) : ?>
         <div class="centrado">
            <img src="img/advertencia.png" alt="advertencia" class="icono-advertencia">
            <span class="texto-advertencia">Resultado de la operación desconocido</span>
         </div>
      <?php elseif ($_GET['exito'] == 0) : ?>
         <div class="centrado">
            <img src="img/advertencia.png" alt="advertencia" class="icono-advertencia">
            <span class="texto-advertencia">Falló el agregado de la película</span>
         </div>
      <?php else : ?>
         <div class="centrado">
            <img src="img/exito.png" alt="éxito" class="icono-advertencia">
            <span class="texto-advertencia">Muy bien! Agregaste una película!</span>
         </div>
      <?php endif ?>

      <br>
      <a href="index.php" class="link">&lt;&lt;&nbsp;Ir al listado de películas</a>
   </div>
</body>
</html>