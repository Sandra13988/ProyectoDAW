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
	<title>Altas de Artículos</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.38" />
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

