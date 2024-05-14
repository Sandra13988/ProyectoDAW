<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
	<link rel="stylesheet" href="./assets/css/estiloLogin.css" />
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">

	<title>LOGIN</title>
</head>

<body>
	<!--ESTO ESTÁ SIN TERMINAR-->
	<!--ESTÁ EL CODIGO PERO HAY QUE COMPROBAR QUE FUNCIONE-->
	<div id="contenedorLogin">


		<header>
			<div class="cabeceraLogin">
				<img id="logotipo" src="./assets/imagenes/logotipo/librex2.png" alt="logotipo">
			</div>
		</header>


		<?php
		include("./fuentes/funciones.php");

		//De momento se queda asi, pero quizas sea mejor cambiar esto por 
		//una funcion que tengo en funciones de comprobar usuarios registrados
		if (isset($_POST["login"])) {
			$usuario = $_POST["usuario"];
			$pass = $_POST["pass"];


			$conexion = conectar();
			$consultaUsuario = "SELECT * FROM usuarios WHERE usuario = '$usuario' and pass = '$pass'";
			$resultadoUsuario = mysqli_query($conexion, $consultaUsuario);
			$filaUsuario = mysqli_fetch_assoc($resultadoUsuario);


			if ($filaUsuario) {
				$_SESSION['nombre'] = $filaUsuario['usuario'];
				$_SESSION['rol'] = $filaUsuario['rol'];
				echo "Sesión iniciada correctamente";
				header("location:/Proyecto_DAW/fuentes/Pages/Indice.php");
				exit();
			} else {
				echo "Ese usuario no existe";
			}
		}


		?>
		<div class="titulo">
		<h2>Bienvenido a LIBREX</h2>
		<h3>Encuentra todo lo que estas imaginando aqui!</h3>
		</div>
		
		<form action="login.php" method="POST" class="formularioLogin">
			<label for="usuario">Usuario </label>
			<input type="text" name="usuario" placeholder="usuario@usuario.com">
			<label for="pass">Contraseña </label>
			<input type="text" name="pass" placeholder="contraseña">
			<input type="submit" name="login" value="Login">
		</form>

		<div class="tituloRegistro">
			<p>Aun no estás registrado? Unete a nosotros!</p>
			<a href="./registro.php">Registrate</a>
			

		</div>
		<div class="tituloRegistro">
			<p>Has olvidado tu contraseña? No te preocupes! </p>
			<a href="./registro">Pincha aqui!</a>

		</div>
		<script>
			document.getElementById("loginForm").addEventListener("submit", function(event) {
			

				// Obtener valores del formulario
				var username = document.getElementById("usuario").value;
				var password = document.getElementById("pass").value;

				// Expresiones regulares para validar nombre de usuario y contraseña
				var usernameRegex = /^[a-zA-Z0-9]+$/; // Solo letras y números
				var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/; // Al menos 8 caracteres, incluyendo una letra mayúscula, una letra minúscula y un número

				// Validaciones
				if (!username.match(usernameRegex)) {
					alert("El nombre de usuario debe contener solo letras y números.");
				} else if (!password.match(passwordRegex)) {
					alert("La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula y un número.");
				} else {
					alert("¡Inicio de sesión exitoso!");
					// Aquí podrías redirigir al usuario a otra página
				}
			});
		</script>
		<?php include_once "./fuentes/plantillas/fotter.php" ?>
	</div>
</body>

</html>