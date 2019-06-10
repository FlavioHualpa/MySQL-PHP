<?php

	if ($_POST) {
		require 'validar_guardar.php';
		require 'guardar_pelicula.php';
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/main.css">
	<script src="https://kit.fontawesome.com/487b4db8ef.js"></script>
	<title>Agregar Película</title>
</head>

<body>
	<div class="contenedor">
		<h1>Ingresemos una nueva película</h1>
		<form method="post">
			<div class="campo-form">
				<label>Título</label>
				<input type="text" name="title" value="<?= $_POST['title'] ?? '' ?>">
				<?php if (isset($errores['title'])) : ?>
				<p><i class="fas fa-exclamation-circle"></i><?= $errores['title'] ?></p>
				<?php endif ?>
			</div>
			<div class="campo-form">
				<label>Género</label>
				<!-- El select para el género lo genero con código de otro archivo -->
				<?php require 'select_generos.php' ?>
				<?php if (isset($errores['genero'])) : ?>
				<p><i class="fas fa-exclamation-circle"></i><?= $errores['genero'] ?></p>
				<?php endif ?>
			</div>
			<div class="campo-form">
				<label>Rating</label>
				<input type="text" name="rating" value="<?= $_POST['rating'] ?? '' ?>">
				<?php if (isset($errores['rating'])) : ?>
				<p><i class="fas fa-exclamation-circle"></i><?= $errores['rating'] ?></p>
				<?php endif ?>
			</div>
			<div class="campo-form">
				<label>Premios</label>
				<input type="text" name="awards" value="<?= $_POST['awards'] ?? '' ?>">
				<?php if (isset($errores['awards'])) : ?>
				<p><i class="fas fa-exclamation-circle"></i><?= $errores['awards'] ?></p>
				<?php endif ?>
			</div>
			<div class="campo-form">
				<label>Duración (en minutos)</label>
				<input type="text" name="length" value="<?= $_POST['length'] ?? '' ?>">
				<?php if (isset($errores['length'])) : ?>
				<p><i class="fas fa-exclamation-circle"></i><?= $errores['length'] ?></p>
				<?php endif ?>
			</div>
			<div class="campo-form">
				<label>Fecha de Estreno</label> <br>
				<i>Año: </i>
				<select name="year">
					<?php for ($i = 2019; $i >= 1920; $i--) : ?>
						<option value="<?php echo $i; ?>" <?= isset($_POST['year']) && $_POST['year'] == $i ? 'selected' : '' ?>><?php echo $i; ?></option>
					<?php endfor ?>
				</select>
				<i>Mes: </i>
				<select name="month">
					<?php for ($i=1; $i < 13; $i++) : ?>
						<option value="<?php echo $i; ?>" <?= isset($_POST['month']) && $_POST['month'] == $i ? 'selected' : '' ?>><?php echo $i; ?></option>
					<?php endfor ?>
				</select>
				<i>Día: </i>
				<select name="day">
					<?php for ($i=1; $i < 32; $i++) : ?>
						<option value="<?php echo $i; ?>" <?= isset($_POST['day']) && $_POST['day'] == $i ? 'selected' : '' ?>><?php echo $i; ?></option>
					<?php endfor ?>
				</select>
				<?php if (isset($errores['fecha'])) : ?>
				<p><i class="fas fa-exclamation-circle"></i><?= $errores['fecha'] ?></p>
				<?php endif ?>
			</div>
			<div class="campo-form">
				<button type="submit">Guardar película</button>
			</div>
		</form>
	</div>
</body>

</html>
