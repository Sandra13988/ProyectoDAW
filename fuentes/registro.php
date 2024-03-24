<?php $mensaje = "";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>REGISTRO</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.38" />
</head>

<body>
	
	<?php 
	include("funciones.php");
	include("encabezado.php");

	if(isset($_POST["altaUsuario"])){

		$usuario = $_POST["usuario"];
		$pass = $_POST["pass"];
	
		if(comprobarUsuario($usuario)){
			$mensaje =  "Este usuario ya existe";
		}else{

            $id = asignarId();
            $suscripcion = false;
            $rol = "normal";

			$conexion = conectar();
			$consultaAlta = "INSERT INTO `usuarios`(`id`, `usuario`, `pass`, `suscripcion`, `rol`) VALUES ('$id','$usuario','$pass','$suscripcion','$rol')";
			$resultadoAlta = mysqli_query($conexion, $consultaAlta);
			if(mysqli_affected_rows($conexion)){
				$mensaje = "Tu registro se ha realizado alta correctamente";
			}else{
				$mensaje = "Ha habido un error al registrarte";
			}
		}
	}
	


	?>

<h2>REGISTRO</h2>
<form action="registro.php" method="POST">
	<label for="usuario">USUARIO: </label>
	<input type="text" name="usuario">
	<label for="procedencia">CONTRASEÑA: </label>
	<input type="password" name="pass">
	<input type="submit" name="altaUsuario" value="REGISTRAR">
	<?php echo $mensaje; ?>
</form>
	
	
	
</body>



</html>

