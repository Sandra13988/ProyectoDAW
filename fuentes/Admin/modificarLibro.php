<?php include('../funciones.php'); ?>
<?php mantener_sesion()?>
<?php permisoAdmin(); ?>
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
	<!--Codigo para modificar un libro -->
	<div id="contenedor">
		<?php include('../plantillas/cabecero.php') ?>
		<main id="cuerpo">
			<?php
			//Generamos un array de libros vacio
			$libro = array();

			//Si se ha presionado el boton de buscar libros...
			if (isset($_POST["buscarLibro"])) {
				//Obtenemos el isbn del libro en una variable
				$isbn = $_POST["id"];

				//Comprobamos si el isbn existe en nuestra base de datos
				if(comprobarExistencias($isbn)){
					$conexion = conectar();
					//Si existe, generamos la consulta
					$consulta = "SELECT * FROM libros WHERE isbn = '$isbn'";
					$resultado = mysqli_query($conexion, $consulta);
					if ($resultado && mysqli_num_rows($resultado) > 0) {
						$libro = mysqli_fetch_assoc($resultado);
					} else {
						$mensaje = "No se encontró ningún libro con ese ID.";
					}
					desconectar($conexion);
				}
				
			}
			//Si la consulta anterior devuelve resultados, recogemos todos los datos del libro
			//para implementarlos en los inputs del formulario donde procederemos a 
			//hacer la modificacion


			//Si se ha presionado el boton de modificar, recogeremos los nuevos datos en variables...
			if (isset($_POST["modificarLibro"])) {
				$isbn = $_POST["isbn"];
				$nombre = $_POST["nombre"];
				$autor = $_POST["autor"];
				$genero = $_POST["genero"];
				$sinopsis = $_POST["sinopsis"];

				//Generaremos la consulta de actualizacion
				$conexion = conectar();
				$consulta = "UPDATE libros SET isbn='$isbn', nombre='$nombre', autor='$autor', genero='$genero', sinopsis='$sinopsis' WHERE isbn='$isbn'";
				$resultado = mysqli_query($conexion, $consulta);
				if ($resultado) {
					$mensaje = "Los datos del libro han sido modificados correctamente.";
				} else {
					$mensaje = "Ha ocurrido un error al modificar los datos del libro.";
				}
				desconectar($conexion);
			}
			?>

			<!--Formulario para recoger el isbn del libro que queremos modificar -->
			<h2>Modificar Libro</h2>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<label for="id">ISBN del Libro:</label>
				<input type="text" name="id" id="id">
				<button type="submit" name="buscarLibro">Buscar Libro</button>
			</form>

			<!--Formulario para modificar el libro seleccionado -->
			<div class="recuadro">
				
				<?php if (!empty($libro)) { ?>
					<h3>Modificar Libro</h3>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						<table>
							<input type="hidden" name="isbn" value="<?php echo $libro['isbn']; ?>" required>
							<tr>
								<td><label for="nombre">Nombre:</label></td>
								<td><input type="text" name="nombre" value="<?php echo $libro['nombre']; ?>" required></td>
							</tr>
							<tr>
								<td><label for="autor">Autor:</label></td>
								<td><input type="text" name="autor" value="<?php echo $libro['autor']; ?>" required></td>
							</tr>
							<tr>
								<td><label for="genero">Género:</label></td>
								<td><input type="text" name="genero" value="<?php echo $libro['genero']; ?>" required></td>
							</tr>
							<tr>
								<td><label for="sinopsis">Sinopsis:</label></td>
								<td><textarea name="sinopsis" style="width: 350px; height: 200px;" required><?php echo $libro['sinopsis']; ?></textarea></td>
							</tr>
							<tr>
								<td colspan="2"><button type="submit" name="modificarLibro">Modificar Libro</button></td>
							</tr>
						</table>
					</form>
				<?php } ?>
			</div>
			
		</main>
		<?php include("../plantillas/fotter.php"); ?>

	</div>
</body>

</html>