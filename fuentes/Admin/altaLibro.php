<?php $mensaje = ""; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../../assets/css/estiloComponentesAdminAlta.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/estiloMenus.css" />
    <title>ALTA LIBRO</title>
</head>

<body>
    <!--Codigo para dar de alta un libro-->
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>
        <main id="cuerpo">
            <?php
            // Recoger los datos enviados por el formulario y almacenarlos en variables
            if (isset($_POST["altaLibro"])) {
                $isbn = $_POST["isbn"];
                $nombre = $_POST["nombre"];
                $autor = $_POST["autor"];
                $genero = $_POST["genero"];
                $sinopsis = $_POST["sinopsis"];

                // Limpieza del nombre para usarlo como nombre del pdf y de la portada
                $nombreLimpio = preg_replace('/[^A-Za-z0-9_\-]/', '_', $nombre);

                // Obtener los archivos
                $pdf = $_FILES["pdf"];
                $portada = $_FILES["portada"];

                // Comprobar si ya existe ese libro
                if (comprobarExistencias($isbn)) {
                    $mensaje = "Este libro ya existe";
                } else {
                    // Manejo del PDF
                    $pdfPermitidos = array("application/pdf");
                    $pdfTemp = $pdf['tmp_name'];
                    $pdfTipo = $pdf['type'];
                    $pdfRuta = './pdf/';
                    $pdfNombre = $nombreLimpio . '.pdf';
                    $pdfSubido = false;

                    // Manejo de la imagen de portada
                    $imgPermitidos = array("image/jpeg", "image/png", "image/gif");
                    $imgTemp = $portada['tmp_name'];
                    $imgTipo = $portada['type'];
                    $imgRuta = './portada/';
                    $imgNombre = $nombreLimpio . '.jpg';
                    $imgSubida = false;

                    // Verificar tipos de archivo
                    if (in_array($pdfTipo, $pdfPermitidos) && in_array($imgTipo, $imgPermitidos)) {
                        // Intentar subir archivos
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

                        // Si ambos archivos se subieron correctamente, insertar en la base de datos
                        if ($pdfSubido && $imgSubida) {
                            $conexion = conectar();
                            $consultaAlta = "INSERT INTO `libros`(`isbn`, `nombre`, `autor`, `genero`, `sinopsis`, `pdf`, `portada`) VALUES ('$isbn','$nombre','$autor','$genero','$sinopsis','$nombreLimpio.pdf', '$nombreLimpio.jpg')";
                            $resultadoAlta = mysqli_query($conexion, $consultaAlta);

                            if (mysqli_affected_rows($conexion)) {
                                $mensaje = "El libro ha sido dado de alta correctamente.";
                            } else {
                                $mensaje = "Ha habido un error al dar de alta el libro.";
                            }
                            desconectar($conexion);
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
            <!--Formulario para dar de alta un libro -->
            <div class="recuadro">
                <h3>ALTA LIBRO</h3>
                <form action="altaLibro.php" method="POST" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td><label for="isbn">ISBN: </label></td>
                            <td><input type="text" name="isbn"></td>
                        </tr>
                        <tr>
                            <td><label for="nombre">NOMBRE: </label></td>
                            <td><input type="text" name="nombre"></td>
                        </tr>
                        <tr>
                            <td><label for="autor">AUTOR: </label></td>
                            <td><input type="text" name="autor"></td>
                        </tr>
                        <tr>
                            <td><label for="genero">GENERO: </label></td>
                            <td><input type="text" name="genero"></td>
                        </tr>
                        <tr>
                            <td><label for="sinopsis">SINOPSIS: </label></td>
                            <td><textarea name="sinopsis" style="width: 350px; height: 200px;"></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="pdf">PDF: </label></td>
                            <td><input type="file" name="pdf"></td>
                        </tr>
                        <tr>
                            <td><label for="portada">Portada: </label></td>
                            <td><input type="file" name="portada"></td>
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
