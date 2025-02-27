<?php session_start();?>
<?php require '../../conexion.php';?>
<?php include('../funciones.php'); ?>
<?php mantener_sesion()?>

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
    <!--Seccion de lista de deseos-->
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>
        <main id="cuerpo">
            <h1>LISTA DE DESEOS</h1>
            <?php

           
            
            // Obtener el ID del usuario de la sesión
            $id_usuario = $_SESSION['id'];

            // Realizar la consulta para obtener los libros en la lista de deseos del usuario
            $conexion = conectar();
            $query = "SELECT * FROM deseos WHERE id_usuario = '$id_usuario'";
            $result = mysqli_query($conexion, $query);
          

            // Consulta que elimina el boton de la lista de deseos 
            if (isset($_POST['borrarDeseo'])) {
                $nombre_deseo = $_POST['nombre_deseo'];
                $borrarDeseo = "DELETE FROM deseos WHERE nombre = '$nombre_deseo' AND id_usuario = '$id_usuario'";
                mysqli_query($conexion, $borrarDeseo);
            }

            desconectar($conexion);
            ?>


            <?php

            //Si el usuario conectado tiene libros en su lista de deseos, los mostrará
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
                    //En la lista de deseo tendremos un boton de descargar libro y otro de borrar libro de la lista
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
                //Y sino, aparecerá el mensaje indicando que no tiene ninguno 
                echo "No tienes ningún libro en tu lista de deseos.";
            }
            echo "</table>";
            echo "</div>";

            // Segunda tabla solo con el título y los botones de descargar y borrar
            if (mysqli_num_rows($result) > 0) {
                mysqli_data_seek($result, 0); // Volver al principio de los resultados
                echo "<div class='posicionDivMovil'>";
                echo "<table class='tablaListado'>";
                echo "<tr>";
                echo '<th style="width: 400px;">TITULO</th>';
                echo "<th></th>";
                echo "<th></th>";
                echo "</tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    //En la lista de deseo tendremos un boton de descargar libro y otro de borrar libro de la lista
                    echo '<td><a href="../Admin/pdf/' . $row['pdf'] . '" download><input type="button" value="Descargar Libro" class="boton-accion"></a></td>';
                    echo '<td>
                                <form method="post" action="#">
                                    <input type="hidden" name="nombre_deseo" value="' . $row['nombre'] . '">
                                    <input type="submit" name="borrarDeseo" value="Borrar Deseo" class="boton-accion">
                                </form>
                              </td>';
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            }
            ?>
        </main>
        <?php include('../plantillas/fotter.php'); ?>
    </div>
</body>

</html>
