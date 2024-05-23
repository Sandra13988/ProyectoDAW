<?php  $mensaje = ""?>
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
	<!--Seccion de Login-->
	<div id="contenedorLogin">


		<header>
			<div class="cabeceraLogin">
				<img id="logotipo" src="./assets/imagenes/logotipo/librex2.png" alt="logotipo">
			</div>
		</header>


		<?php
		include("./fuentes/funciones.php");

		//Si se ha pulsado el boton de login...
		if (isset($_POST["login"])) {
			//Recogemos los datos del formulario en variables
			$usuario = $_POST["usuario"];
			$pass = $_POST["pass"];
			

			//Conectamos y hacemos la consulta para averiguar si existe ese usuario y contraseña
			$conexion = conectar();
			$consultaUsuario = "SELECT * FROM usuarios WHERE usuario = '$usuario' and pass = '$pass'";
			$resultadoUsuario = mysqli_query($conexion, $consultaUsuario);
			$filaUsuario = mysqli_fetch_assoc($resultadoUsuario);

			//Si existe ...
			if ($filaUsuario) {
				//Guardamos datos en la sesion para usarlos posteriormente
				$_SESSION['id'] = $filaUsuario['id'];
				$_SESSION['nombre'] = $filaUsuario['usuario'];
				$_SESSION['suscripcion'] = $filaUsuario['suscripcion'];
				$_SESSION['rol'] = $filaUsuario['rol'];

				//Guardamos la cookie por 30 dias para usarlos en el nombre del menu
				setcookie("nombre_usuario", $filaUsuario['usuario'], time() + (86400 * 30), "/"); 

				
				echo "Sesión iniciada correctamente";
				//Redirigimos al usuario a la pagina del indice
				header("location:./fuentes/Pages/Indice.php");
				exit();
			} else {
				$mensaje = "Ese usuario no existe";
			}
		}


		?>
		<div class="titulo">
		<h2>Bienvenido a LIBREX</h2>
		<h3>Encuentra todo lo que estas imaginando aqui!</h3>
		</div>
		<!--Formulario de login-->
		<form action="login.php" method="POST" class="formularioLogin"  id="loginForm">
			<label for="usuario">Usuario </label>
			<input type="text" name="usuario" placeholder="usuario@usuario.com">
			<label for="pass">Contraseña </label>
			<input type="text" name="pass" placeholder="contraseña">
			<input type="submit" name="login" value="Login">
		</form>

		<?php echo $mensaje?>

		<!--Boton para redirigirnos a registro-->
		<div class="tituloRegistro">
			<p>Aun no estás registrado? Unete a nosotros!</p>
			<a href="./registro.php">Registrate</a>
			

		</div>
		
		<?php include_once "./fuentes/plantillas/fotter.php" ?>
	</div>
</body>

</html>