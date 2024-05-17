<?php
$mensaje = "";

?>
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
    <title>ALTA LIBRO</title>
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
                $target_dir = "uploads/";

                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0755, true);
                }

                $pdf = $_FILES["pdf"]["name"];
                $target_file = $target_dir . basename($pdf);
                $uploadOk = 1;
                $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Verificar si el archivo es un PDF
                if ($fileType != "pdf") {
                    $mensaje = "Solo se permiten archivos PDF.";
                    $uploadOk = 0;
                }

                if ($uploadOk && move_uploaded_file($_FILES["pdf"]["tmp_name"], $target_file)) {
                    if (comprobarExistencias($isbn)) {
                        $mensaje = "Este libro ya existe";
                    } else {
                        $conexion = conectar();
                        $consultaAlta = "INSERT INTO `libros`(`isbn`, `nombre`, `autor`, `genero`, `sinopsis`, `pdf`) VALUES ('$isbn','$nombre','$autor','$genero','$sinopsis','$target_file')";
                        $resultadoAlta = mysqli_query($conexion, $consultaAlta);
                        if (mysqli_affected_rows($conexion)) {
                            $mensaje = "El libro ha sido dado de alta correctamente";
                        } else {
                            $mensaje = "Ha habido un error al dar de alta el libro";
                        }
                    }
                } else {
                    $mensaje = "Ha habido un error al subir el archivo PDF.";
                }
            }
            ?>
            <div class="recuadro">
                <h3>ALTA LIBRO</h3>
                <form action="alta.php" method="POST" enctype="multipart/form-data">
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
                            <td><textarea name="sinopsis" required></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="pdf">PDF: </label></td>
                            <td><input type="file" name="pdf" accept="application/pdf" required></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="botonAdmin"><input type="submit" name="altaLibro" value="ALTA"></div>
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
