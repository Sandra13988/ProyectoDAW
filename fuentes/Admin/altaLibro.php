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
	<title>ALTA LIBRO</title>
</head>

<body>
	<div id="contenedor">
		<?php include('../plantillas/cabecero.php'); ?>
		<main id="cuerpo">
			<?php

			if (isset($_POST["altaLibro"])) {
				$isbn = $_POST["isbn"];
				$nombre = $_POST["nombre"];
				$autor = $_POST["autor"];
				$genero = $_POST["genero"];
				$sinopsis = $_POST["sinopsis"];
				$pdf = $_POST["pdf"];

				if (comprobarExistencias($id)) {
					$mensaje =  "Este libro ya existe";
				} else {
					$conexion = conectar();
					$consultaAlta = "INSERT INTO `libros`(`isbn`, `nombre`, `autor`, `genero`, `sinopsis`, `pdf`) VALUES ('$isbn','$nombre','$autor','$genero','$sinopsis','$pdf')";
					$resultadoAlta = mysqli_query($conexion, $consultaAlta);
					if (mysqli_affected_rows($conexion)) {
						$mensaje = "El libro ha sido dado de alta correctamente";
					} else {
						$mensaje = "Ha habido un error al dar de alta el libro";
					}
				}
			}
			?>
			<div class="recuadro">
				<h3>ALTA LIBRO</h3>
				<form action="alta.php" method="POST">
					<table>

						<tr>
							<td><label for="isbn">ISBN: </label></td>
							<td><input type="text" name="isbn"></td>
						</tr>
						<tr>
							<td><label for="nombre">NOMBRE: </label></td>
							<td><input type="text" name="nombre"></td>
						</tr>
						<tr>
							<td><label for="autor">AUTOR: </label></td>
							<td><input type="text" name="autor"></td>
						</tr>
						<tr>
							<td><label for="genero">GENERO: </label></td>
							<td><input type="text" name="genero"></td>
						</tr>
						<tr>
							<td><label for="sinopsis">SINOPSIS: </label></td>
							<td><input type="text" name="sinopsis"></td>
						</tr>
						<tr>
							<td><label for="pdf">PDF: </label>
							<td><input type="text" name="pdf"></td><!--Averiguar como meter archivos aqui-->
						</tr>
						<tr>
							<td>
								<div class="botonAdmin"><input type="submit" name="altaLibro" value="ALTA"></div>
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