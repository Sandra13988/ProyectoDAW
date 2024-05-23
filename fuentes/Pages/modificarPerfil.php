<?php $mensaje = ""; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
	<link rel="stylesheet" href="../../assets/css/estiloComponentesAdminAlta.css" />
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../../assets/css/estiloMenus.css" />
	<title>MODIFICAR LIBRO</title>
</head>

<body>
	<div id="contenedor">
		<?php include('../plantillas/cabecero.php') ?>
		<main id="cuerpo">
			<?php


			// Obtener los datos del usuario de la sesión
			$id = $_SESSION["id"];
			$conexion = conectar();
			$consulta = "SELECT * FROM usuarios WHERE id = '$id'";
			$resultado = mysqli_query($conexion, $consulta);

			if ($resultado && mysqli_num_rows($resultado) > 0) {
				$usuario = mysqli_fetch_assoc($resultado);
			} else {
				$mensaje = "No se encontró ningún usuario con ese ID.";
			}

			// Procesar el formulario si se envió
			if (isset($_POST["modificarUsuario"])) {
				$nombre = $_POST["usuario"];
				$pass = $_POST["pass"];
				$correo = $_POST["correo"];

				// Actualizar los datos del usuario
				$consulta = "UPDATE usuarios SET usuario='$nombre', pass='$pass', correo='$correo' WHERE id='$id'";
				$resultado = mysqli_query($conexion, $consulta);
				if ($resultado) {
					echo "<script>window.location.href='./Perfil.php';</script>";
					exit();
				}
			}
			?>


			<?php if (!empty($usuario)) { ?>
				<h3>Modificar usuario</h3>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<table>
						<input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
						<tr>
							<td><label for="nombre">Nombre:</label></td>
							<td><input type="text" name="usuario" value="<?php echo $usuario['usuario']; ?>"></td>
						</tr>
						<tr>
							<td><label for="autor">Contraseña:</label></td>
							<td><input type="text" name="pass" value="<?php echo $usuario['pass']; ?>"></td>
						</tr>
						<tr>
							<td><label for="genero">Correo:</label></td>
							<td><input type="text" name="correo" value="<?php echo $usuario['correo']; ?>"></td>
						</tr>
						<tr>
							<td colspan="2"><button type="submit" name="modificarUsuario">Modificar usuario</button></td>
						</tr>
					</table>
				</form>
			<?php } ?>
		</main>
		<?php include("../plantillas/fotter.php"); ?>
	</div>
</body>

</html>