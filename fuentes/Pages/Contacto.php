<?php $mensaje = ""?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../../assets/css/estiloContacto.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/estiloMenus.css" />
    <title>Libros</title>
</head>

<body>
    <!--Pagina de contacto, donde tendremos un formulario y un mapa-->
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>

        <main id="cuerpo">
            <h1>CONTACTO</h1>
            <?php
            //Si presionamos el boton de enviar, recogeremos los datos del formulario..
            if (isset($_POST["enviar"])) {
                $nombre = $_POST["nombre"];
                $email = $_POST["email"];
                $edad = $_POST["edad"];
                $telefono = $_POST["telefono"];
                $consulta = $_POST["consulta"];

                //Conectamos y generamos la insercion en el apartado de contacto
                $conexion = conectar();
                $consultaAlta = "INSERT INTO `contacto`(`nombre`, `correo`, `edad`, `telefono`, `consulta`) VALUES ('$nombre','$email','$edad','$telefono','$consulta')";
                $resultadoAlta = mysqli_query($conexion, $consultaAlta);
                if($resultadoAlta){
                    $mensaje = "Consulta enviada";
                }
                desconectar($conexion);
            }
            ?>
            <!--Formulario para ponernos en contacto con el administrador -->
            <form method="post" action="#">
                <label for="nombre">Nombre</label><br>
                <input type="text" id="nombre" name="nombre" autofocus required placeholder="Nombre"><br><br>
                <label for="email">E-mail</label><br>
                <input type="email" id="email" name="email" required placeholder="correo@gmail.com"><br><br>
                <label for="edad">Edad</label><br>
                <input type="number" id="edad" name="edad" required placeholder="18"><br><br>
                <label for="telefono">Telefono</label><br>
                <input type="text" id="telefono" name="telefono" required placeholder=" 122 344 566"><br><br>

                <label for="consulta">Consulta</label><br>
                <textarea id="consulta" name="consulta" required rows="4" cols="40" placeholder="Escriba su consulta"></textarea><br><br>
                <div class="politica">
                    <input type="checkbox" id="politicaYCookies" name="politicaYCookies" required><br><br>
                    <label for="politicaYCookies">Politica de privacidad y cookies</label><br>
                </div>
                <input type="submit" id="enviar" name="enviar" required><br><br>
                <?php echo $mensaje?>;
            </form>
            <!--Mapas para saber donde nos encontramos-->
            <div class="mapa">
                <h2>Y tambien estamos aquí!</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25096.254789702598!2d-0.8210516355925964!3d38.16269935093852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd63bb24b1bc1467%3A0x9a9de53a3857566a!2s03158%20Catral%2C%20Alicante!5e0!3m2!1ses!2ses!4v1715275611662!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="mapa2">
                <h2>Y tambien estamos aquí!</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12548.599042593361!2d-0.8032001939331055!3d38.159958883464256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1707048334320!5m2!1ses!2ses" width="385" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </main>
        <?php include('../plantillas/fotter.php'); ?>
    </div>
</body>

</html>