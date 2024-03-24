<?php
$mensaje = "";
/*
 * 
 * Copyleft 2022 Pepe Sánchez 
 *
 * 
 * 
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Modificar artículos</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.38" />
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
