<?php
session_start();
require '../../conexion.php';
include('../funciones.php');

mantener_sesion();
permisoAdmin();

$mensaje = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags and links -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../../assets/css/estiloComponentesAdminAlta.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/estiloMenus.css" />
    <title>Alta Libro</title>
</head>

<body>
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>
        <main id="cuerpo">
            <?php
            if (isset($_POST["altaLibro"])) {
                $isbn = $_POST["isbn"];
                $nombre = $_POST["nombre"];
                $autor = $_POST["autor"];
                $genero = $_POST["genero"];
                $sinopsis = $_POST["sinopsis"];

                $nombreLimpio = preg_replace('/[^A-Za-z0-9_\-]/', '_', $nombre);

                $pdf = $_FILES["pdf"];
                $portada = $_FILES["portada"];

                if (comprobarExistencias($isbn)) {
                    $mensaje = "Este libro ya existe";
                } else {
                    $pdfPermitidos = array("application/pdf");
                    $pdfTemp = $pdf['tmp_name'];
                    $pdfTipo = $pdf['type'];
                    $pdfRuta = './pdf/';
                    $pdfNombre = $nombreLimpio . '.pdf';
                    $pdfSubido = false;

                    $imgPermitidos = array("image/jpeg", "image/png", "image/gif");
                    $imgTemp = $portada['tmp_name'];
                    $imgTipo = $portada['type'];
                    $imgRuta = './portada/';
                    $imgNombre = $nombreLimpio . '.jpg';
                    $imgSubida = false;

                    if (in_array($pdfTipo, $pdfPermitidos) && in_array($imgTipo, $imgPermitidos)) {
                        if (move_uploaded_file($pdfTemp, $pdfRuta . $pdfNombre)) {
                            $pdfSubido = true;
                        } else {
                            $mensaje .= "Ha habido un error al subir el archivo PDF. ";
                        }

                        if (move_uploaded_file($imgTemp, $imgRuta . $imgNombre)) {
                            $imgSubida = true;
                        } else {
                            $mensaje .= "Ha habido un error al subir la imagen de portada. ";
                        }

                        if ($pdfSubido && $imgSubida) {
                            $conexion = conectar();
                            if ($conexion) {
                                $consultaAlta = "INSERT INTO `libros`(`isbn`, `nombre`, `autor`, `genero`, `sinopsis`, `pdf`, `portada`) VALUES ('$isbn','$nombre','$autor','$genero','$sinopsis','$nombreLimpio.pdf', '$nombreLimpio.jpg')";
                                $resultadoAlta = mysqli_query($conexion, $consultaAlta);

                                if ($resultadoAlta) {
                                    $mensaje = "El libro ha sido dado de alta correctamente.";
                                } else {
                                    $mensaje = "Error en la consulta: " . mysqli_error($conexion);
                                }
                                desconectar($conexion);
                            } else {
                                $mensaje = "Error al conectar con la base de datos.";
                            }
                        }
                    } else {
                        if (!in_array($pdfTipo, $pdfPermitidos)) {
                            $mensaje .= "Tipo de archivo PDF no permitido. ";
                        }
                        if (!in_array($imgTipo, $imgPermitidos)) {
                            $mensaje .= "Tipo de archivo de imagen no permitido. ";
                        }
                    }
                }
            }
            ?>
            <div class="recuadro">
                <h3>ALTA LIBRO</h3>
                <form action="altaLibro.php" method="POST" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td><label for="isbn">ISBN: </label></td>
                            <td><input type="text" name="isbn" required></td>
                        </tr>
                        <tr>
                            <td><label for="nombre">NOMBRE: </label></td>
                            <td><input type="text" name="nombre" required></td>
                        </tr>
                        <tr>
                            <td><label for="autor">AUTOR: </label></td>
                            <td><input type="text" name="autor" required></td>
                        </tr>
                        <tr>
                            <td><label for="genero">GENERO: </label></td>
                            <td><input type="text" name="genero" required></td>
                        </tr>
                        <tr>
                            <td><label for="sinopsis">SINOPSIS: </label></td>
                            <td><textarea name="sinopsis" style="width: 170px; height: 100px;" required></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2"><label for="pdf">PDF: </label></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="file" name="pdf" required></td>
                        </tr>
                        <tr>
                            <td colspan="2"><label for="portada">Portada: </label></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="file" name="portada" required></td>
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
