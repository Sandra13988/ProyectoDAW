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
	if(isset($_POST["enviarModificar"])){
		$id = $_POST["id"];
		
		if(comprobarExistencias($id) == FALSE){
			$mensaje = "Este articulo no existe";
		}else{
			$conexion = conectar();
			$consultaListado = "SELECT * FROM articulos WHERE id = '$id'";
			$resultadoListado = mysqli_query($conexion, $consultaListado);
			$filaListado = mysqli_fetch_assoc($resultadoListado);
			if($filaListado){
				echo "<form action='modificar.php' method='POST'>";
				echo "<input type='hidden' name='modificarId' value='".$filaListado['id']."'>";
				echo "<label>Nombre: <input type='text' name='modificarNombre' value='".$filaListado['nombre']."'></label>";
				echo "<label>Categoria: <input type='text' name='modificarCategoria' value='".$filaListado['categoría']."'></label>";
				echo "<label>Precio: <input type='text' name='modificarPrecio' value='".$filaListado['precio']."'></label>";
				echo "<label>Procedencia: <input type='text' name='modificarProcedencia' value='".$filaListado['procedencia']."'></label>";
				echo "<label><input type='submit' name='enviarCambios' value='Enviar cambios'</td></form>";
			}
		}
	}
?>
		
<?php
	if(isset($_POST["enviarCambios"])){
		$id = $_POST["modificarId"];
		$nombreNuevo = $_POST["modificarNombre"];
		$categoriaNueva = $_POST["modificarCategoria"];
		$precioNuevo = $_POST["modificarPrecio"];
		$procedenciaNueva = $_POST["modificarProcedencia"];

		$conexion = conectar();
		$consultaUpdate = "UPDATE `articulos` SET `nombre`='$nombreNuevo',`categoría`='$categoriaNueva',`precio`='$precioNuevo',`procedencia`='$procedenciaNueva' WHERE id = '$id'";
		$resultadoUpdate = mysqli_query($conexion, $consultaUpdate);
		if(mysqli_affected_rows($conexion)){
			$mensaje = "Modificacion realizada correctamente";
		}else{
			$mensaje = "Ha habido un error al actualizar el articulo";
		}

	}

?>

<h2>MODIFICAR ARTICULO</h2>
<form action="modificar.php" method="POST">
	<label for="id">Introduzca el ID del articulo que desea modificar: </label>
	<input type="text" name="id">
	
	<input type="submit" name="enviarModificar" value="MODIFICAR">
	<?php echo $mensaje; ?>
</form>

	
</body>



</html>