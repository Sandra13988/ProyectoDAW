<?php session_start();?>
<?php require '../../conexion.php';?>
<?php include('../funciones.php'); ?>
<?php mantener_sesion()?>
<?php permisoAdmin() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../../assets/css/estiloListado.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/estiloMenus.css" />
    <title>Lista de libros</title>
</head>
<title>Listado de los artículos</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="generator" content="Geany 1.38" />
</head>

<body>
    <!--Codigo para listar los libros que tenemos en la BBDD, paginarlos, filtrarlos y sacar la lista en PDF -->
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>
        <main id="cuerpo">
            <?php
            $conexion = conectar();

            // Consulta para obtener los diferentes generos y formar el select
            $consultaGeneros = "SELECT DISTINCT genero FROM libros";
            $resultadoGeneros = mysqli_query($conexion, $consultaGeneros);
            ?>
            <div class="formularioFiltro">
                <!--Formulario para mostrar el filtro-->
                <form method="GET" action="listadoLibro.php">
                    <label for="genero">GENERO:</label>
                    <select name="genero" id="genero">
                        <option value="">Todos</option>
                        <?php
                        while ($filaGenero = mysqli_fetch_assoc($resultadoGeneros)) {
                            $generoOption = $filaGenero['genero'];
                            //Por cada genero que saque, monta una opcion
                            echo "<option value='$generoOption'>" . htmlspecialchars($generoOption) . "</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" value="Filtrar">
                </form>
            </div>

            <?php
            //Si se ha seleccionado un genero, guardamos la variable y guardamos el numero de pagina
            $genero = isset($_GET['genero']) ? $_GET['genero'] : '';
            $indice = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

            //Empezamos a montar la consulta, declarando el where
            $filtroGenero = $genero ? " WHERE genero='$genero'" : '';
            //Conectamos a la base de datos y generamos la consulta para saber el numero de 
            //registros que tenemos y averiguar el total de paginas que vamos a necesitar
            $consultaRegistros = "SELECT * FROM libros" . $filtroGenero;
            $resultadoRegistros = mysqli_query($conexion, $consultaRegistros);

            //Montamos la paginacion
            $numeroDeRegistros = mysqli_num_rows($resultadoRegistros);
            //Hemos puesto que tenga 2 registros por pagina pero podemos cambiarlo si queremos
            $numeroDeRegistrosPorPagina = 2;
            $totalPaginas = ceil($numeroDeRegistros / $numeroDeRegistrosPorPagina);
            $limite = " LIMIT " . (($indice - 1) * $numeroDeRegistrosPorPagina) . " , " . $numeroDeRegistrosPorPagina;
            //Montamos la consulta
            $consultaLibros = "SELECT * FROM libros" . $filtroGenero . $limite;
            $resultadoLibros = mysqli_query($conexion, $consultaLibros);

            //Si la consulta tiene resultados, los imprimimos
            if ($resultadoLibros && mysqli_num_rows($resultadoLibros) > 0) {
                //TABLA MOVIL
                echo "<div class='posicionDivMovil'>";
                echo "<table class='tablaListado'>";
                echo "<tr>";
                echo "<th class='cuadroPDF'>NOMBRE</th>";
				echo "<th>GENERO</th>";
                echo "</tr>";

                while ($filaLibros = mysqli_fetch_assoc($resultadoLibros)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($filaLibros['nombre']) . "</td>";
					echo "<td>" . htmlspecialchars($filaLibros['genero']) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";

                // Resetear el resultado para reutilizarlo en la segunda tabla
                mysqli_data_seek($resultadoLibros, 0);

                //TABLA ESCRITORIO Y TABLET
                echo "<div class='posicionDiv'>";
                echo "<table class='tablaListado'>";
                echo "<tr>";
                echo "<th>ISBN</th>";
                echo "<th>NOMBRE</th>";
                echo "<th>AUTOR</th>";
                echo "<th>GENERO</th>";
                echo "<th class='cuadroPDF'>PDF</th>";
                echo "</tr>";

                while ($filaLibros = mysqli_fetch_assoc($resultadoLibros)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($filaLibros['isbn']) . "</td>";
                    echo "<td>" . htmlspecialchars($filaLibros['nombre']) . "</td>";
                    echo "<td>" . htmlspecialchars($filaLibros['autor']) . "</td>";
                    echo "<td>" . htmlspecialchars($filaLibros['genero']) . "</td>";
                    echo "<td>" . htmlspecialchars($filaLibros['pdf']) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
                echo "<div class='botonesPaginacion'>";
                //botones de paginacion y el de crear la lista de PDF
                echo "<a href='listadoLibro.php?pagina=" . (($indice - 1 < 1) ? 1 : $indice - 1) . "&genero=" . htmlspecialchars($genero) . "'>ATRAS</a>";
                echo "<a href='fpdf.php'>Descargar PDF</a>";
                echo "<a href='listadoLibro.php?pagina=" . (($indice + 1 > $totalPaginas) ? $totalPaginas : $indice + 1) . "&genero=" . htmlspecialchars($genero) . "'>SIGUIENTE</a>";
                echo "</div>";
            } else {
                echo "<p>No se encontraron resultados.</p>";
            }
            desconectar($conexion);
            ?>
        </main>
        <?php include("../plantillas/fotter.php"); ?>
    </div>
</body>

</html>
