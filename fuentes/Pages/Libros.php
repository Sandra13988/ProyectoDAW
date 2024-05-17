<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../../assets/css/estiloLibros.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/estiloMenus.css" />
    <title>Libros</title>
</head>

<body>
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>
        <main class="todoLibros">
        <h1>LIBROS</h1>
            <?php
            $conexion = conectar();

            $query = "SELECT * FROM libros";
            $result = mysqli_query($conexion, $query);

            if ($result) {
                // Comienza el bucle para mostrar cada libro
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="libro" id="' . $row['nombre'] . '">';
                    echo '<h2>' . $row['nombre'] . '</h2>';
                    echo ' <div class="imagenLibro"><img src="../Admin/portada/' . $row['portada'] . '" width="200" height="300"></div>';
                    echo '<div class="contenidoLibro">';
                    echo '<strong>Genero: </strong>' . $row['genero'] . '<br>';
                    echo '<strong>Autor: </strong>' . $row['autor'] . '<br>';
                    echo '<p class="sinopsis">';
                    echo '<strong>Sinopsis: </strong>' . $row['sinopsis'];
                    echo '</p>';
                    echo '</div>';
                    echo '<div class="botonesLibros">';
                    // Aquí se agrega el enlace al botón de Descargar Libro
                    echo '<a href="../Admin/pdf/' . $row['pdf'] . '" download><input type="button" value="Descargar Libro"></a>';
                    echo '<input type="button" value="Añadir a deseado">';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "Error al obtener los libros de la base de datos";
            }

            // Cierra la conexión a la base de datos

            ?>
        </main>
        <?php include('../plantillas/fotter.php'); ?>
    </div>
</body>

</html>