<?php $mensaje = ""; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
	<link rel="stylesheet" href="../../assets/css/estiloComponentesAdmin.css" />
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../../assets/css/estiloMenus.css" />
	<title>BAJA LIBRO</title>
</head>

<body>
	<div id="contenedor">
		<?php include('../plantillas/cabecero.php'); ?>
		<main id="cuerpo">

			<?php


			if (isset($_POST["enviarBaja"])) {
				$id = $_POST["id"];


				if (!comprobarExistencias($id)) {
					$mensaje =  "Este articulo NO existe";
				} else {
					$conexion = conectar();
					$consultaAlta = "DELETE FROM `articulos` WHERE id = '$id'";
					$resultadoAlta = mysqli_query($conexion, $consultaAlta);
					if (mysqli_affected_rows($conexion)) {
						$mensaje = "El articulo ha sido dado de baja correctamente";
					} else {
						$mensaje = "Ha habido un error al dar de baja el articulo";
					}
				}
			}



			?>
			<div class="recuadro">
				<h3>BAJA LIBRO</h3>
				<form action="borrado.php" method="POST">
					<table>
						<tr>
							<td><label for="id">Introduzca el ID del libro que desea borrar: </label></td>
							<td><input type="text" name="id"></td>
						</tr>
						<tr>
							<td>
								<div class="botonAdmin"><input type="submit" name="enviarBaja" value="BAJA"></div>
							</td>
						</tr>

					</table>
				</form>
				<?php echo $mensaje; ?>
			</div>
		</main>
		<?php include("../plantillas/fotter.php"); ?>
	</div>

</body>



</html>