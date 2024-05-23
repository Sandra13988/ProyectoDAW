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
    <link rel="stylesheet" href="../../assets/css/estiloMenus.css" />
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
            $idUsuario = $_SESSION['id'];
            $conexion = conectar();
            $consultaUsuario = "SELECT * FROM usuarios WHERE id = '$idUsuario'";
            $resultadoUsuario = mysqli_query($conexion, $consultaUsuario);
            $filaUsuario = mysqli_fetch_assoc($resultadoUsuario);


            if ($filaUsuario) {
                echo "<div class='posicionDiv'>";
                echo "<table class='tablaListado'>";
                echo "<tr>";
                echo "<th>USUARIO</th>";
                echo "<th>CONTRASEÑA</th>";
                echo "<th>CORREO</th>";
                echo "<th>SUSCRIPCION</th>";
                echo "</tr>";


                echo "<tr>";
                echo "<td>" . $filaUsuario['usuario'] . "</td>";
                echo "<td>" . $filaUsuario['pass'] . "</td>";
                echo "<td>" . $filaUsuario['correo'] . "</td>";
                echo "<td>" . $filaUsuario['suscripcion'] . "</td>";
                echo "</tr>";
                echo "</table>";

                echo "<div class='botonesPerfil'>";
                echo "<form action='Perfil.php' method='POST'>";
                echo "<input type='submit' name='bajaSub' value='Ya no quiero estar suscrito/a perfil'/>";
                echo "</form>";
                echo "<form action='modificarPerfil.php' method='POST'>";
                echo "<input type='submit' name='modificarPerfil' value='Modificar perfil'/>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
              

            }

            if (isset($_POST["bajaSub"])) {
                $id = $_SESSION["id"];

                $conexion = conectar();
                $consultaUsuario = "UPDATE `usuarios` SET `suscripcion`='none' WHERE id = $id";
                $resultadoUsuario = mysqli_query($conexion, $consultaUsuario);
        

                if ($resultadoUsuario) {
                    echo "Suscripcion dada de baja!";
                } else {
                    echo "Fallo en darse de baja";
                }
            }

            ?>
        </main>
        <?php include('../plantillas/fotter.php'); ?>
    </div>
</body>

</html>