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
    <!--Codigo para listar los usuarios y paginarlos-->
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>
        <main id="cuerpo">
            <?php
            //Obtenemos la pagina que nos encontramos
            $indice = isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;

            //Conectamos a la base de datos y generamos la consulta para saber el numero de 
            //registros que tenemos y averiguar el total de paginas que vamos a necesitar
            $conexion = conectar();
            $consultaRegistros = "SELECT * FROM usuarios";
            $resultadoRegistros = mysqli_query($conexion, $consultaRegistros);

            $numeroDeRegistros = mysqli_num_rows($resultadoRegistros);
            //Declaramos los registros que queremos mostrar por pagina
            $numeroDeRegistrosPorPagina = 2;
            $totalPaginas = ceil($numeroDeRegistros / $numeroDeRegistrosPorPagina);
            $limite = " limit " . (($indice - 1) * $numeroDeRegistrosPorPagina) . " , " . $numeroDeRegistrosPorPagina;
            //Montamos la consulta
            $consultaUsuarios = "SELECT * FROM usuarios $limite";
            $resultadoUsuarios = mysqli_query($conexion, $consultaUsuarios);

            //Si hay resultados, los imprimimos
            if ($resultadoUsuarios && mysqli_num_rows($resultadoUsuarios) > 0) {
                // Tabla para escritorio y tablet
                echo "<div class='posicionDiv'>";
                echo "<table class='tablaListado'>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>USUARIO</th>";
                echo "<th>PASS</th>";
                echo "<th>CORREO</th>";
                echo "<th>SUSCRIPCION</th>";
                echo "<th>ROL</th>";
                echo "</tr>";

                while ($filaUsuarios = mysqli_fetch_assoc($resultadoUsuarios)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($filaUsuarios['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($filaUsuarios['usuario']) . "</td>";
                    echo "<td>" . htmlspecialchars($filaUsuarios['pass']) . "</td>";
                    echo "<td>" . htmlspecialchars($filaUsuarios['correo']) . "</td>";
                    echo "<td>" . htmlspecialchars($filaUsuarios['suscripcion']) . "</td>";
                    echo "<td>" . htmlspecialchars($filaUsuarios['rol']) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";

                // Reset result pointer and fetch again for second table
                mysqli_data_seek($resultadoUsuarios, 0);

                // Tabla para móvil
                echo "<div class='posicionDivMovil'>";
                echo "<table class='tablaListado'>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>USUARIO</th>";
                echo "</tr>";

                while ($filaUsuarios = mysqli_fetch_assoc($resultadoUsuarios)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($filaUsuarios['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($filaUsuarios['usuario']) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";

                echo "<div class='botonesPaginacion'>";
                // Paginacion hacia delante y hacia atras
                echo "<a href='listadoUsuarios.php?pagina=" . (($indice - 1 < 1) ? 1 : $indice - 1) . "'>ATRAS</a>";
                echo "<a href='listadoUsuarios.php?pagina=" . (($indice + 1 > $totalPaginas) ? $totalPaginas : $indice + 1) . "'>SIGUIENTE</a>";
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
