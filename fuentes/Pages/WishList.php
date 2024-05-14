<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../../assets/css/estiloPerfil.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estiloMenus.css">
    <title>Libros</title>
</head>

<body>
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>

        <main id="cuerpoPerfil">
            <h1>PERFIL</h1>
            <?php


		//De momento se queda asi, pero quizas sea mejor cambiar esto por 
		//una funcion que tengo en funciones de comprobar usuarios registrados
            $nombreUsuario = $_SESSION['nombre'];
			$conexion = conectar();
			$consultaUsuario = "SELECT * FROM usuarios WHERE usuario = '$nombreUsuario'";
			$resultadoUsuario = mysqli_query($conexion, $consultaUsuario);
			$filaUsuario = mysqli_fetch_assoc($resultadoUsuario);


			if ($filaUsuario) {
                echo "<div class='datosPerfil'>";
                    echo "<p><strong>Nombre de usuario:</strong> " . $filaUsuario['usuario'] . "</p>";
                    echo "<p><strong>Contraseña:</strong> " . $filaUsuario['pass'] . "</p>";
                    echo "<p><strong>Email:</strong> " . $filaUsuario['correo'] . "</p>";
                echo "</div>";
                // Agrega más campos según sea necesario
			
			}
		


		?>
        </main>
        <?php include('../plantillas/fotter.php'); ?>
    </div>
</body>

</html>