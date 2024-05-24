<?php include('../funciones.php'); ?>
<?php mantener_sesion()?>
<?php permisoAdmin() ?>
<?php $mensaje = ""; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../../assets/css/estiloComponentesAdmin.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/estiloMenus.css" />
    <title>BAJA LIBRO</title>
</head>

<body>
    <!--Codigo para borrar un usuario-->
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>
        <main id="cuerpo">
            <?php
            //Si ha presionado el boton de dar de baja...
            if (isset($_POST["enviarBaja"])) {
                //Recojo el id que he introducido en el formulario
                $id = $_POST["id"];
                //Compruebo si ese usuario existe...
                if (comprobarUsuarioPorID($id)) {
                    $conexion = conectar();
                    // Si el usuario existe, se borrar
                    $consultaBaja = "DELETE FROM usuarios WHERE id = '$id'";
                    $resultadoBaja = mysqli_query($conexion, $consultaBaja);
                    if (mysqli_affected_rows($conexion)) {
                        $mensaje = "El usuario ha sido eliminado correctamente";
                    } else {

                        $mensaje = "Ha habido un error al dar de baja el usuario";
                    }
                   desconectar($conexion);
                }else{
                    $mensaje = "El usuario no existe";
                }
            }
            ?>

            <!--Formulario para recoger el id del usuario y darlo de baja-->
            <div class="recuadro">
                <h3>BAJA USUARIO</h3>
                <form action="borradoUsuario.php" method="POST">
                    <table>
                        <tr>
                            <td><label for="id">Introduzca el ID del usuario que desea borrar: </label></td>
                            <td><input type="text" name="id"></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="botonAdmin"><input type="submit" name="enviarBaja" value="BAJA"></div>
                            </td>
                        </tr>

                    </table>
                </form>
                <?php echo $mensaje; ?>
            </div>
        </main>
        <?php include("../plantillas/fotter.php"); ?>
    </div>
</body>

</html>