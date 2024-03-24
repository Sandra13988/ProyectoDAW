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

	if(isset($_POST["enviarAlta"])){
		$id = $_POST["id"];
		$nombre = $_POST["nombre"];
		$categoria = $_POST["categoria"];
		$precio = $_POST["precio"];
		$procedencia = $_POST["procedencia"];

		if(comprobarExistencias($id)){
			$mensaje =  "Este articulo ya existe";
		}else{
			$conexion = conectar();
			$consultaAlta = "INSERT INTO `articulos`(`id`, `nombre`, `categoría`, `precio`, `procedencia`) VALUES ('$id','$nombre','$categoria','$precio','$procedencia')";
			$resultadoAlta = mysqli_query($conexion, $consultaAlta);
			if(mysqli_affected_rows($conexion)){
				$mensaje = "El articulo ha sido dado de alta correctamente";
			}else{
				$mensaje = "Ha habido un error al dar de alta el articulo";
			}
		}
	}
	


	?>

<h2>ALTA DE ARTICULOS</h2>
<form action="alta.php" method="POST">
	<label for="id">ID: </label>
	<input type="text" name="id">
	<label for="nombre">NOMBRE: </label>
	<input type="text" name="nombre">
	<label for="categoria">CATEGORIA: </label>
	<input type="text" name="categoria">
	<label for="precio">PRECIO: </label>
	<input type="text" name="precio">
	<label for="procedencia">PROCEDENCIA: </label>
	<input type="text" name="procedencia">
	<input type="submit" name="enviarAlta" value="ALTA">
	<?php echo $mensaje; ?>
</form>
	
	
	
</body>



</html>

