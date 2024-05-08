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
    <title>Noticias</title>
</head>
<!--ESTO ESTÁ SIN TERMINAR-->
<!--ESTÁ EL CODIGO PERO HAY QUE COMPROBAR QUE FUNCIONE-->

<body>

    <div id="contenedorLogin">

        <header>
            <div class="cabeceraLogin">
                <img id="logotipo" src="./assets/imagenes/logotipo/librex2.png" alt="logotipo">
            </div>
        </header>
    
        <?php
        include("./fuentes/funciones.php");
        //include("encabezado.php");

        if (isset($_POST["altaUsuario"])) {

            $usuario = $_POST["usuario"];
            $pass = $_POST["pass"];
            $correo = $_POST["correo"];
     
            if (comprobarUsuario($usuario)) {
                $mensaje =  "Este usuario ya existe";
            } else {

                $id = asignarId();
                $suscripcion = false;
                $rol = "normal";
                echo("Entra en el php");
                $conexion = conectar();
                $consultaAlta = "INSERT INTO `usuarios`(`id`, `usuario`, `pass`, `correo`, `suscripcion`, `rol`) VALUES ('$id','$usuario','$pass','$correo','$suscripcion','$rol')";
                $resultadoAlta = mysqli_query($conexion, $consultaAlta);
                if (mysqli_affected_rows($conexion)) {
                    $mensaje = "Tu registro se ha realizado alta correctamente";
                    header("location:./login.php");
                } else {
                    $mensaje = "Ha habido un error al registrarte";
                }
            }
        }



        ?>

        <div class="titulo">
            <h2>Bienvenido a LIBREX</h2>
            <h3>Encuentra todo lo que estas imaginando aqui!</h3>
            <h3>REGISTRATE CON NOSOTROS</h3>
        </div>
        
        <form action="registro.php" method="POST" id="loginForm" class="formularioLogin">
            <label for="usuario" >Usuario: </label>
            <input type="text" id="usuario" name="usuario" placeholder="usuario">
            <label for="pass">Contraseña: </label>
            <input type="password" id="pass" name="pass" placeholder="contraseña">
            <label for="correo">Correo: </label>
            <input type="text" id="correo" name="correo" placeholder="usuario@usuario.com">
            <input type="submit" name="altaUsuario" value="REGISTRAR">
			<a href="./login.php"><h5>Volver al login</h5></a>

        </form>
        <script>
            console.log("Entra en el js")
            document.getElementById("loginForm").addEventListener("submit", function(event) {


                // Obtener valores del formulario
                var username = document.getElementById("usuario").value;
                var password = document.getElementById("pass").value;
                var correo = document.getElementById("correo").value;

                // Expresiones regulares para validar nombre de usuario y contraseña
                var usernameRegex = /^[a-zA-Z0-9]+$/; // Solo letras y números
                var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/; // Al menos 8 caracteres, incluyendo una letra mayúscula, una letra minúscula y un número
                var correoRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;


                // Validaciones
                if (!username.match(usernameRegex)) {
                    alert("El nombre de usuario debe contener solo letras y números.");
                } else if (!password.match(passwordRegex)) {
                    alert("La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula, una letra minúscula y un número.");
                
                }else if (!correo.match(correoRegex)){
                    alert("El correo no es valido");
                } else {
                    alert("¡Registro exitoso!");
                    // Aquí podrías redirigir al usuario a otra página
                }
            });
        </script>


</body>

<?php include_once "./fuentes/plantillas/fotter.php" ?>


</html>