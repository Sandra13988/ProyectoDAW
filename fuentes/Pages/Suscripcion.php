<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="../../assets/css/estiloSuscripcion.css"/>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="estiloMenus.css">
        <title>Suscripciones</title>
    </head>
    <body>
        <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>
        <main id="cuerpo">
                <h1>SUSCRIPCIONES</h1>
         
            <div class="suscripcion">
                <h2 class="tituloSub">Básico</h2>
                <div class="desc">
                    <div class="descripcionSub">Acceso ilimitado a una amplia selección de libros electrónicos. Perfecto para lectores ocasionales que disfrutan de la lectura en un solo dispositivo.</div>
                    <div class="precioSub"><strong>8€</strong></div>
                    <div class="dispositivosSub">Capacidad de conectarse con 1 dispositivo simultáneamente.</div>
                    <div class="descargaOffline">Necesita conexión a internet para acceder a la aplicación.</div>
                </div>
                <div class="botonSub"><input type="submit" value="SUSCRIBIRSE" name="suscribeteBasico"/></div>
            </div>

            

            <div class="suscripcion">
                <h2 class="tituloSub">Estandar</h2>
                <div class="desc">
                    <div class="descripcionSub">Acceso ilimitado a una amplia selección de libros electrónicos. Ideal para lectores regulares que desean compartir la experiencia de lectura con hasta tres dispositivos diferentes.</div>
                    <div class="precioSub"><strong>12€</strong></div>
                    <div class="dispositivosSub">Capacidad de conectarse con 3 dispositivos simultáneamente.</div>
                    <div class="descargaOffline">Descarga de libros en modo offline disponible.</div>
                </div>
                <div class="botonSub"><input type="submit" value="SUSCRIBIRSE" name="suscribeteEstandar"/></div>
            </div>

            <div class="suscripcion">
                <h2 class="tituloSub">Deluxe</h2>
                <div class="desc">
                    <div class="descripcionSub">Acceso ilimitado a una amplia selección de libros electrónicos, incluyendo títulos exclusivos y contenido premium. Perfecto para lectores ávidos que desean disfrutar de la lectura en múltiples dispositivos y acceder a funciones adicionales.</div>
                    <div class="precioSub"><strong>18€</strong></div>
                    <div class="dispositivosSub">Capacidad de conectarse con 6 dispositivos simultáneamente.</div>
                    <div class="descargaOffline">Descarga de libros en modo offline disponible.</div>
                </div>
                <div class="botonSub"><input type="submit" value="SUSCRIBIRSE" name="suscribeteDelux"/></div>
            </div>
           
           
            </main>
            <?php
                session_start();

                //SUSCRIPCION AL PLAN BASICO
                if (isset($_POST["suscripcionBasica"])) {
                    $suscripcion = $_POST["suscripcionBasica"];
                    $usuario = $_SESSION["usuario"];

                    $conexion = conectar();
                    //Aqui hay que hacer un update
                    $consultaUsuario = "SELECT * FROM usuarios WHERE usuario = '$usuario' and pass = '$pass'";
                    $resultadoUsuario = mysqli_query($conexion, $consultaUsuario);
                    $filaUsuario = mysqli_fetch_assoc($resultadoExistencias);

                    if ($filaUsuario) {
                        echo "Suscripcion al plan Basico realizada!";
                    } else {
                        echo "Fallo en la suscripcion";
                    }
                }

                //SUSCRIPCION AL PLAN ESTANDAR
                if (isset($_POST["suscribeteDelux"])) {
                    $suscripcion = $_POST["suscribeteDelux"];
                    $id = $_SESSION["id"];

                    $conexion = conectar();
                    //Aqui hay que hacer un update
                    $consultaUsuario = "INSERT INTO `suscripciones`(`id`, `suscripcion`) VALUES ('$id','$suscripcion')";
                    $resultadoUsuario = mysqli_query($conexion, $consultaUsuario);
                    $filaUsuario = mysqli_fetch_assoc($resultadoExistencias);

                    if ($filaUsuario) {
                        echo "Suscripcion al plan Deluxe realizada!";
                    } else {
                        echo "Fallo en la suscripcion";
                    }
                }

                //SUSCRIPCION AL PLAN DELUXE
                if (isset($_POST["suscribeteDelux"])) {
                    $suscripcion = $_POST["suscribeteDelux"];
                    $usuario = $_SESSION["usuario"];

                    $conexion = conectar();
                    //Aqui hay que hacer un update
                    $consultaUsuario = "SELECT * FROM usuarios WHERE usuario = '$usuario' and pass = '$pass'";
                    $resultadoUsuario = mysqli_query($conexion, $consultaUsuario);
                    $filaUsuario = mysqli_fetch_assoc($resultadoExistencias);

                    if ($filaUsuario) {
                        echo "Suscripcion al plan Deluxe realizada!";
                    } else {
                        echo "Fallo en la suscripcion";
                    }
                }


		?>

            <?php include('../plantillas/fotter.php'); ?>
        </div>
    </body>
</html>