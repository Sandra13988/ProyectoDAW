<?php $mensaje = ""; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
	<link rel="stylesheet" href="assets/css/estiloNoticias.css" />
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
	<title>Noticias</title>
</head>

<body>

	<?php
	include("funciones.php");
	include("encabezado.php");

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

	<h2>ALTA LIBRO</h2>
	<form action="alta.php" method="POST">
		<label for="isbn">ISBN: </label>
		<input type="text" name="isbn">
		<label for="nombre">NOMBRE: </label>
		<input type="text" name="nombre">
		<label for="autor">AUTOR: </label>
		<input type="text" name="autor">
		<label for="genero">GENERO: </label>
		<input type="text" name="genero">
		<label for="sinopsis">SINOPSIS: </label>
		<input type="text" name="sinopsis">
		<label for="pdf">PDF: </label> <!--Averiguar como meter archivos aqui-->
		<input type="text" name="pdf">
		<input type="submit" name="altaLibro" value="ALTA">
		<?php echo $mensaje; ?>
	</form>



</body>



</html>