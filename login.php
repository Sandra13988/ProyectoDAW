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
    <title>LOGIN</title>
</head>
<body>
<?php include_once "./fuentes/plantillas/cabeceroLogin.php"?>
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

