<?php $mensaje = ""; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
	<link rel="stylesheet" href="../../assets/css/estiloComponentesAdmin.css" />
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../../assets/css/estiloMenus.css" />
	<title>MODIFICAR USUARIO</title>
</head>

<body>
	<div id="contenedor">
		<?php include('../plantillas/cabecero.php') ?>
		<main id="cuerpo">
			<?php
			$libro = array();

			if (isset($_POST["buscarUsuario"])) {
				$id = $_POST["id"];
				$conexion = conectar();
				$consulta = "SELECT * FROM usuarios WHERE id = '$id'";
				$resultado = mysqli_query($conexion, $consulta);
				if ($resultado && mysqli_num_rows($resultado) > 0) {
					$libro = mysqli_fetch_assoc($resultado);
				} else {
					$mensaje = "No se encontró ningún libro con ese ID.";
				}
			}

			if (isset($_POST["modificarUsuario"])) {
				$id = $_POST["id"];
				$usuario = $_POST["usuario"];
				$pass = $_POST["pass"];
				$correo = $_POST ["correo"];
				$suscripcion = $_POST["suscripcion"];
				$rol = $_POST["rol"];

				$conexion = conectar();
				$consulta = "UPDATE `usuarios` SET `usuario`='$usuario',`pass`='$pass',`correo`='$correo',`suscripcion`='$suscripcion',`rol`='$rol' WHERE `id` = $id";
				$resultado = mysqli_query($conexion, $consulta);
				if ($resultado) {
					$mensaje = "Los datos del libro han sido modificados correctamente.";
				} else {
					$mensaje = "Ha ocurrido un error al modificar los datos del libro.";
				}
			}
			?>

			<h2>Modificar Usuario</h2>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<label for="id">ID del Usuario:</label>
				<input type="text" name="id" id="id">
				<button type="submit" name="buscarUsuario">Buscar Libro</button>
			</form>
			<?php if (!empty($libro)) { ?>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

					<input type="hidden" name="id" value="<?php echo $libro['id']; ?>"><br>
					<label for="usuario">Usuario:</label>
					<input type="text" name="usuario" value="<?php echo $libro['usuario']; ?>"><br>
					<label for="pass">Contraseña:</label>
					<input type="text" name="pass" value="<?php echo $libro['pass']; ?>"><br>
					<label for="correo">Correo:</label>
					<input type="text" name="correo" value="<?php echo $libro['correo']; ?>"><br>
					<label for="suscripcion">Suscripcion:</label>
					<input type="text" name="suscripcion" value="<?php echo $libro['suscripcion']; ?>"><br>
					<label for="rol">Rol:</label>
					<input type="text" name="rol" value="<?php echo $libro['rol']; ?>"><br>
					<button type="submit" name="modificarUsuario">Modificar Usuario</button>
				</form>
			<?php } ?>
			<p><?php echo $mensaje; ?></p>
		</main>
		<?php include("../plantillas/fotter.php"); ?>

	</div>
</body>

</html>