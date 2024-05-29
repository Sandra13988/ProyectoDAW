<?php session_start();?>
<?php require '../../conexion.php';?>
<?php include('../funciones.php'); ?>
<?php mantener_sesion()?>
<?php permisoAdmin() ?>
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
	<title>Modificar Usuario</title>
</head>

<body>
	<!--Codigo para modificar un usuario -->
	<div id="contenedor">
		<?php include('../plantillas/cabecero.php'); ?>
		<main id="cuerpo">
			<?php
			$usuario = null;

			//Si el usuario ha presionado el boton de buscar usuario ....
			if (isset($_POST["buscarUsuario"])) {
				//Guardamos en una variable su id
				$id = $_POST["id"];
				$conexion = conectar();

				//Comprobamos si el usuario existe
				if (comprobarUsuarioPorID($id)) {
					//Generamos la consulta para encontrar dicho usuario 
					$consulta = "SELECT * FROM usuarios WHERE id = '$id'";
					$resultado = mysqli_query($conexion, $consulta);
					if ($resultado && mysqli_num_rows($resultado) > 0) {
						$usuario = mysqli_fetch_assoc($resultado);
					} else {
						$mensaje = "No se encontró ningún usuario con ese ID.";
					}
				}
				desconectar($conexion);
			}

			//Si presionamos el boton de modificar, recogemos los datos del formulario
			if (isset($_POST["modificarUsuario"])) {
				$id = $_POST["id"];
				$pass = $_POST["pass"];
				$correo = $_POST["correo"];
				$suscripcion = $_POST["suscripcion"];
				$rol = $_POST["rol"];

				//Generamos la actualizacion
				$conexion = conectar();
				$consulta = "UPDATE `usuarios` SET `pass`='$pass',`correo`='$correo',`suscripcion`='$suscripcion',`rol`='$rol' WHERE `id` = $id";
				$resultado = mysqli_query($conexion, $consulta);
				if ($resultado) {
					$mensaje = "Los datos del usuario han sido modificados correctamente.";
				} else {
					$mensaje = "Ha ocurrido un error al modificar los datos del usuario.";
				}
				desconectar($conexion);
			}
			?>

			<!--Formulario para identificar el usuario que queremos modificar-->
			<h2>Modificar Usuario</h2>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<label for="id">ID del Usuario:</label>
				<input type="text" name="id" id="id">
				<button type="submit" name="buscarUsuario">Buscar usuario</button>
			</form>
			<!--Formulario para modificar el usuario-->
			<div class="recuadro">
				<?php if (!empty($usuario)) { ?>
					<h3>Modificar usuario</h3>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					
						<table>
							<input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
							<tr>
								<td><label for="pass">Contraseña:</label></td>
								<td><input type="text" name="pass" value="<?php echo $usuario['pass']; ?>" required></td>
							</tr>
							<tr>
								<td><label for="correo">Correo:</label></td>
								<td><input type="text" name="correo" value="<?php echo $usuario['correo']; ?>" required></td>
							</tr>
							<tr>
								<td><label for="suscripcion">Suscripción:</label></td>
								<td>
									<select name="suscripcion" id="suscripcion" required>
										<option value="none" <?php if ($usuario['suscripcion'] == 'none') echo 'selected'; ?>>None</option>
										<option value="basico" <?php if ($usuario['suscripcion'] == 'basico') echo 'selected'; ?>>Básico</option>
										<option value="estandar" <?php if ($usuario['suscripcion'] == 'estandar') echo 'selected'; ?>>Estándar</option>
										<option value="delux" <?php if ($usuario['suscripcion'] == 'delux') echo 'selected'; ?>>Delux</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><label for="rol">Rol:</label></td>
								<td>
									<select name="rol" id="rol" required>
										<option value="normal" <?php if ($usuario['rol'] == 'normal') echo 'selected'; ?>>Normal</option>
										<option value="admin" <?php if ($usuario['rol'] == 'admin') echo 'selected'; ?>>Administrador</option>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="2" style="text-align: center;">
									<button type="submit" name="modificarUsuario">Modificar Usuario</button>
								</td>
							</tr>
				
						</table>
					
					</form>
					
				<?php } ?>
			</div>
			<p><?php echo $mensaje; ?></p>
		</main>
		<?php include("../plantillas/fotter.php"); ?>

	</div>
</body>

</html>
