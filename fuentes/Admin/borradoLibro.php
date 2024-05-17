<?php
$mensaje = "";

?>

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
					$mensaje =  "Este artículo NO existe";
				} else {
					$conexion = conectar();
					$consulta = "SELECT pdf FROM libros WHERE isbn = '$id'";
					$resultado = mysqli_query($conexion, $consulta);
					$fila = mysqli_fetch_assoc($resultado);
					$pdf = $fila['pdf'];

					$consultaBaja = "DELETE FROM libros WHERE isbn = '$id'";
					$resultadoBaja = mysqli_query($conexion, $consultaBaja);
					if (mysqli_affected_rows($conexion)) {
						// Eliminar el archivo PDF asociado
						if ($pdf !== "") {
							$ruta_pdf = './pdf/' . $pdf;
							if (file_exists($ruta_pdf)) {
								unlink($ruta_pdf);
							}
						}
						$mensaje = "El artículo ha sido dado de baja correctamente";
					} else {
						$mensaje = "Ha habido un error al dar de baja el artículo";
					}
				}
			}
			?>
			<div class="recuadro">
				<h3>BAJA LIBRO</h3>
				<form action="borradoLibro.php" method="POST">
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
				<p><?php echo $mensaje; ?></p>
			</div>
		</main>
		<?php include("../plantillas/fotter.php"); ?>
	</div>
</body>

</html>