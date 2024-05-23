<?php $mensaje = ""; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../../assets/css/estiloComponentesAdmin.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/estiloMenus.css" />
    <title>ALTA USUARIO</title>
</head>

<body>
    <!--Codigo para dar de alta un usuario -->
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>
        <main id="cuerpo">
            <?php
            //Recoger en variables los datos enviados desde el formulario
            if (isset($_POST["altaLibro"])) {
                $id = asignarId();
                $usuario = $_POST["usuario"];
                $pass = $_POST["pass"];
                $correo = $_POST["correo"];
                $suscripcion = false;
                $rol = "normal"; 

                //Comprobar si el usuario existe
                if (comprobarUsuario($usuario)) {
                    $mensaje =  "Este usuario ya existe";
                } else {
                    //Si existe, lo damos de alta
                    $conexion = conectar();
                    $consultaAlta = "INSERT INTO `usuarios`(`id`, `usuario`, `pass`, `correo`, `suscripcion`, `rol`) VALUES ('$id','$usuario','$pass','$correo','$suscripcion','$rol')";
                    $resultadoAlta = mysqli_query($conexion, $consultaAlta);
                    desconectar($conexion);
                }
            }
            ?>
            <!--Formulario para dar de alta un usuario (desde el admin)-->
            <div class="recuadro">
                <h3>ALTA USUARIO</h3>
                <form action="altaUsuario.php" method="POST" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td><label for="usuario">Usuario: </label></td>
                            <td><input type="text" name="usuario"></td>
                        </tr>
                        <tr>
                            <td><label for="pass">Contraseña: </label></td>
                            <td><input type="text" name="pass"></td>
                        </tr>
                        <tr>
                            <td><label for="correo">Correo: </label></td>
                            <td><input type="text" name="correo"></td>
                        </tr>
                        
                        <tr>
                            <td colspan="2"><input type="submit" name="altaLibro" value="ALTA"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <p><?php echo $mensaje; ?></p>
        </main>
        <?php include("../plantillas/fotter.php"); ?>
    </div>
</body>

</html>