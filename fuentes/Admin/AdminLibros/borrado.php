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

	if(isset($_POST["enviarBaja"])){
		$id = $_POST["id"];
		

		if(!comprobarExistencias($id)){
			$mensaje =  "Este articulo NO existe";
		}else{
			$conexion = conectar();
			$consultaAlta = "DELETE FROM `articulos` WHERE id = '$id'";
			$resultadoAlta = mysqli_query($conexion, $consultaAlta);
			if(mysqli_affected_rows($conexion)){
				$mensaje = "El articulo ha sido dado de baja correctamente";
			}else{
				$mensaje = "Ha habido un error al dar de baja el articulo";
			}
		}
	}
	


	?>

<h2>ALTA DE ARTICULOS</h2>
<form action="borrado.php" method="POST">
	<label for="id">Introduzca el ID del articulo que desea borrar: </label>
	<input type="text" name="id">
	
	<input type="submit" name="enviarBaja" value="BAJA">
	<?php echo $mensaje; ?>
</form>
	
	
	
</body>



</html>

