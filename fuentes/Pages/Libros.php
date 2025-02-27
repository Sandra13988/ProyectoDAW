<?php session_start();?>
<?php require '../../conexion.php';?>
<?php include('../funciones.php'); ?>
<?php mantener_sesion()?>

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
    <!-- Catalogo de los libros disponibles-->
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>
        <main class="todoLibros">
            <h1>LIBROS</h1>
            <?php
            //Hacemos conexion y generamos una consulta para que nos de todos los libros
            $conexion = conectar();

            $query = "SELECT * FROM libros";
            $result = mysqli_query($conexion, $query);

            //Si la consulta encuentra resultados...
            if ($result) {
                // Generamos un contenedor para cada libro
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="libro" id="libro-' . $row['isbn'] . '">';
                    echo '<h2>' . strtoupper($row['nombre']) . '</h2>';
                    echo '<div class="imagenLibro" id="imagenLibro-' . $row['isbn'] . '"></div>';
                    echo '<div class="contenidoLibro">';
                    echo '<strong>Genero: </strong>' . $row['genero'] . '<br>';
                    echo '<strong>Autor: </strong>' . $row['autor'] . '<br>';
                    echo '<p class="sinopsis">';
                    echo '<strong>Sinopsis: </strong>' . $row['sinopsis'];
                    echo '</p>';
                    echo '</div>';
                    echo '<div class="botonesLibros">';
                    
                    //Generamos una variable para comprobar si el usuario está suscrito
                    $suscrito = comprobarSuscripcion();

                    //Si lo está aparecerá el boton habilitado
                    if ($suscrito) {
                        echo '<a href="../Admin/pdf/' . $row['pdf'] . '" download><input type="button" value="Descargar Libro"></a>';
                    } else {
                        // Si el usuario no está suscrito, mostrar el botón deshabilitado con el mensaje
                        echo '<input type="button" value="Descargar Libro" title="Debes suscribirte para poder descargar este libro" disabled>';
                    }
                    
                    // Formulario para agregar el libro a la lista de deseos
                    echo '<form action="agregar_deseo.php" method="POST">';
                    echo '<input type="hidden" name="id_libro" value="' . $row['isbn'] . '">';
                    echo '<input type="hidden" name="nombre_libro" value="' . $row['nombre'] . '">';
                    echo '<input type="hidden" name="genero_libro" value="' . $row['genero'] . '">';
                    echo '<input type="hidden" name="autor_libro" value="' . $row['autor'] . '">';
                    echo '<input type="hidden" name="pdf_libro" value="' . $row['pdf'] . '">';
                    echo '<input type="submit" name="agregar_deseo" value="Añadir a deseado">';
                    echo '</form>';
                    
                    echo '</div>';
                    echo '</div>';
                }
            }
            desconectar($conexion);
            ?>
        </main>
        <?php include('../plantillas/fotter.php'); ?>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            // Generamos el código JavaScript para cada imagen
            if ($result) {
                mysqli_data_seek($result, 0); // Resetear el puntero de resultados
                while ($row = mysqli_fetch_assoc($result)) {
                    $isbn = $row['isbn'];
                    $portada = '../Admin/portada/' . $row['portada'];
                    echo "var img = new Image();\n";
                    echo "img.src = '$portada';\n";
                    echo "img.width = 200;\n";
                    echo "img.height = 300;\n";
                    echo "document.getElementById('imagenLibro-$isbn').appendChild(img);\n";
                }
            }
            ?>
        });
    </script>
</body>

</html>
