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
    <title>Noticias</title>
</head>

<body>
    <div id="contenedor">
        <?php include('./plantillas/cabecero.php'); ?>

        <?php
        include("funciones.php");
        include("encabezado.php");

        if (isset($_POST["altaUsuario"])) {

            $usuario = $_POST["usuario"];
            $pass = $_POST["pass"];

            if (comprobarUsuario($usuario)) {
                $mensaje =  "Este usuario ya existe";
            } else {

                $id = asignarId();
                $suscripcion = false;
                $rol = "normal";

                $conexion = conectar();
                $consultaAlta = "INSERT INTO `usuarios`(`id`, `usuario`, `pass`, `suscripcion`, `rol`) VALUES ('$id','$usuario','$pass','$suscripcion','$rol')";
                $resultadoAlta = mysqli_query($conexion, $consultaAlta);
                if (mysqli_affected_rows($conexion)) {
                    $mensaje = "Tu registro se ha realizado alta correctamente";
                } else {
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
<?php include('./plantillas/fotter.php'); ?>


</html>