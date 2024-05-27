<?php session_start();?>
<?php require '../../conexion.php';?>
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
    <!--Codigo para borrar un libro-->
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>
        <main id="cuerpo">
            <?php
            //Si se ha pulsado el boton de dar de baja ...
            if (isset($_POST["enviarBaja"])) {
                $id = $_POST["id"];

                //Comprobamos si el usuario existe
                if (!comprobarExistencias($id)) {
                    $mensaje =  "Este libro NO existe";
                } else {
                    //Si existe...
                    $conexion = conectar();
                    // Obtener la ruta del PDF y la imagen asociada al libro que se va a eliminar
                    $consulta = "SELECT pdf, portada FROM libros WHERE isbn = '$id'";
                    $resultado = mysqli_query($conexion, $consulta);
                    if ($fila = mysqli_fetch_assoc($resultado)) {
                        $pdf = './pdf/' . $fila['pdf'];

						$imagen = './portada/' . $fila['portada'];

                        // Eliminar primero el registro de la base de datos
                        $consultaBaja = "DELETE FROM libros WHERE isbn = '$id'";
                        $resultadoBaja = mysqli_query($conexion, $consultaBaja);
                        if (mysqli_affected_rows($conexion)) {
                            // Eliminar los archivos PDF e imagen asociados
                            if (unlink($pdf) && unlink($imagen)) {
                                $mensaje = "El artículo y los archivos asociados han sido eliminados correctamente";
                            } else {
                                $mensaje = "Error al eliminar los archivos asociados al artículo";
                            }
                        } else {
                            $mensaje = "Ha habido un error al dar de baja el artículo";
                        }
                    }
                    desconectar($conexion);
                }
            }
            ?>
            <!--Formulario para dar de baja un libro por su ISBN-->
            <div class="recuadro">
                <h3>BAJA LIBRO</h3>
                <form action="borradoLibro.php" method="POST">
                    <table>
                        <tr>
                            <td><label for="id">Introduzca el ID del libro que desea borrar: </label></td>
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
