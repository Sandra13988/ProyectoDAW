<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN</title>
</head>
<body>
<?php include_once "./fuentes/plantillas/cabecero.php"?>
<?php
session_start();

//De momento se queda asi, pero quizas sea mejor cambiar esto por 
//una funcion que tengo en funciones de comprobar usuarios registrados
	if(isset($_POST["login"])){
		$usuario = $_POST["usuario"];
		$pass = $_POST["pass"];


		$conexion = conectar();
		$consultaUsuario = "SELECT * FROM usuarios WHERE usuario = '$usuario' and pass = '$pass'";
		$resultadoUsuario = mysqli_query($conexion, $consultaUsuario);
		$filaUsuario = mysqli_fetch_assoc($resultadoExistencias);

		if($filaUsuario){
			$_SESSION['nombre'] = $filaUsuario['nombre'];
			$_SESSION['rol'] = $filaUsuario['rol'];
			header("location:fuentes/listado.php");
			exit();
		}else{
			echo "Ese usuario no existe";
		}
	}


?>

<form action="index.php" method="POST">
	<label for="usuario">Usuario: </label>
	<input type="text" name="usuario">
	<label for="pass">Contrasña: </label>
	<input type="text" name="pass">
	<input type="submit" name="login" value="Login">
</form>
<?php include_once "./fuentes/plantillas/fotter.php"?>
</body>
</html>

