<?php

	if ($_POST) {
      require 'validar_buscador.php';
      
      if (empty($errores)) {
         header('location: resultado_buscador.php?buscar=' . $_POST['title'] . '&clase=' . $_POST['clase']);
         exit;
      }
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/main.css">
	<script src="https://kit.fontawesome.com/487b4db8ef.js"></script>
	<title>Buscador de Series y Películas</title>
</head>

<body>
	<div class="contenedor">
		<h1>Buscador de Series y Películas</h1>
		<form method="post">
			<div class="campo-form">
            <label>Qué querés buscar?</label>
				<input type="radio" name="clase" id="serie" value="ser" <?= isset($_POST['clase']) && $_POST['clase'] == 'ser' ? 'checked' : '' ?>>
            <label for="serie" class="radio-label">Series</label>
				<input type="radio" name="clase" id="peli" value="pel" <?= isset($_POST['clase']) && $_POST['clase'] == 'pel' ? 'checked' : '' ?>>
            <label for="peli" class="radio-label">Películas</label>
				<?php if (isset($errores['clase'])) : ?>
				<p><i class="fas fa-exclamation-circle"></i><?= $errores['clase'] ?></p>
				<?php endif ?>
			</div>
			<div class="campo-form">
				<label>El nombre contiene</label>
				<input type="text" name="title" value="<?= $_POST['title'] ?? '' ?>">
				<?php if (isset($errores['title'])) : ?>
				<p><i class="fas fa-exclamation-circle"></i><?= $errores['title'] ?></p>
				<?php endif ?>
			</div>
			<div class="campo-form">
				<button type="submit">Buscar</button>
			</div>
		</form>
	</div>
</body>

</html>
