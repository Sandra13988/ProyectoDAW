<?php session_start();?>
<?php require '../../conexion.php';?>
<?php include('../funciones.php'); ?>
<?php mantener_sesion()?>

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
    <!-- Seccion de perfil del usuario conectado -->
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>

        <main id="cuerpoPerfil">
            <h1>PERFIL</h1>
            <?php

            //Recogemos el id de la sesion
            $idUsuario = $_SESSION['id'];
            //Conectamos y hacemos la consulta con los datos del usuario conectado
            $conexion = conectar();
            $consultaUsuario = "SELECT * FROM usuarios WHERE id = '$idUsuario'";
            $resultadoUsuario = mysqli_query($conexion, $consultaUsuario);
            $filaUsuario = mysqli_fetch_assoc($resultadoUsuario);

            //Si la consulta da resultado, imprimimos sus datos
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

                //Ademas de los datos, se agregan 3 botones, modificar perfil, dar de baja a la suscripcion y borrar cuenta
                echo "<div class='botonesPerfil'>";

                echo "<form action='modificarPerfil.php' method='POST'>";
                echo "<input type='submit' name='modificarPerfil' value='Modificar perfil'/>";
                echo "</form>";
                echo "<form action='Perfil.php' method='POST'>";
                echo "<input type='submit' name='bajaSub' value='Ya no quiero estar suscrito/a'/>";
                echo "</form>";
                echo "<form action='Perfil.php' method='POST'>";
                echo "<input type='submit' name='borrarCuenta' value='Borrar cuenta'/>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }

            //Si se ha pulsado el boton de dar de baja a su suscripcion
            if (isset($_POST["bajaSub"])) {
                //Recogemos el id de la sesion
                $id = $_SESSION["id"];

                //Conectamos y actualizamos los datos del usuario poniendo en "none" su suscripcion
                $conexion = conectar();
                $consultaUsuario = "UPDATE `usuarios` SET `suscripcion`='none' WHERE id = $id";
                $resultadoUsuario = mysqli_query($conexion, $consultaUsuario);


                if ($resultadoUsuario) {
                    echo "Suscripcion dada de baja!";
                } else {
                    echo "Fallo en darse de baja";
                }
                desconectar($conexion);
            }

            //Si hemos pulsado el boton de borrar cuenta... 
            if (isset($_POST["borrarCuenta"])) {
                //Recogemos el id de la sesion
                $id = $_SESSION["id"];
                //Conectamos y borramos el usuario
                $conexion = conectar();
                $consultaUsuario = "DELETE FROM `usuarios` WHERE id = $id";
                $resultadoUsuario = mysqli_query($conexion, $consultaUsuario);


                if ($resultadoUsuario) {
                    
                    echo "Cuenta dada de baja!";
                    //Si los resultados son positivos nos mandará al login y cerrara la sesion
                    echo "<script>window.location.href='../../cerrar.php';</script>";
                    exit();
                } else {
                    echo "Fallo en darse de baja";
                }
                desconectar($conexion);
            }

            ?>
        </main>
        <?php include('../plantillas/fotter.php'); ?>
    </div>
</body>

</html>