<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../../assets/css/estiloListado.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/estiloMenus.css" />
    <title>Deseos</title>
</head>

<body>
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>
        <main id="cuerpo">
            <h1>LISTA DE DESEOS</h1>
            <?php


            if (!isset($_SESSION['id'])) {
                // Si el usuario no ha iniciado sesión, redirigirlo al inicio de sesión
                header("Location: iniciar_sesion.php");
                exit();
            }

            // Obtener el ID del usuario de la sesión
            $id_usuario = $_SESSION['id'];

            // Realizar la consulta para obtener los libros en la lista de deseos del usuario
            $conexion = conectar();
            $query = "SELECT * FROM deseos WHERE id_usuario = '$id_usuario'";
            $result = mysqli_query($conexion, $query);
          

            // Verificar si se ha enviado una solicitud de eliminación
            if (isset($_POST['borrarDeseo'])) {
                $nombre_deseo = $_POST['nombre_deseo'];
                $borrarDeseo = "DELETE FROM deseos WHERE nombre = '$nombre_deseo' AND id_usuario = '$id_usuario'";
                mysqli_query($conexion, $borrarDeseo);
            }

            ?>


            <?php

            echo "<div class='posicionDiv'>";
            echo "<table class='tablaListado'>";
            if (mysqli_num_rows($result) > 0) {
                echo "<tr>";
                echo '<th style="width: 400px;">TITULO</th>';
                echo "<th>GENERO</th>";
                echo "<th>AUTOR</th>";
                echo "<th></th>";
                echo "<th></th>";
                echo "</tr>";
                // Mostrar la lista de libros en la lista de deseos
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['genero'] . "</td>";
                    echo "<td>" . $row['autor'] . "</td>";
                    // Agregar botón de descarga
                    echo '<td><a href="../Admin/pdf/' . $row['pdf'] . '" download><input type="button" value="Descargar Libro" class="boton-accion"></a></td>';
                    echo '<td>
                                <form method="post" action="#">
                                    <input type="hidden" name="nombre_deseo" value="' . $row['nombre'] . '">
                                    <input type="submit" name="borrarDeseo" value="Borrar Deseo" class="boton-accion">
                                </form>
                              </td>';
                    echo "</tr>";
                }
            } else {
                echo "No tienes ningún libro en tu lista de deseos.";
            }
            echo "</table>";
            echo "</div>";
            ?>
        </main>
        <?php include('../plantillas/fotter.php'); ?>
    </div>
</body>

</html>