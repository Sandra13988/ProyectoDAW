<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="assets/css/estiloLibros.css"/>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
        <title>Lista de descargas</title>
    </head>
	<title>Listado de los artículos</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.38" />
</head>

<body>
	<?php
	include("funciones.php");
	include("../plantillas/cabecero.php");

	if (isset($_SERVER["REQUEST_METHOD"]) == "GET" && isset($_GET["pagina"])) {
		$indice = (int)$_GET["pagina"];
	} else {
		$indice = 1;
	}


	$conexion = conectar();
	$consultaRegistros = "SELECT * FROM descargas";
	$resultadoRegistros = mysqli_query($conexion, $consultaRegistros);

	$numeroDeRegistros = mysqli_num_rows($resultadoRegistros);
	$numeroDeRegistrosPorPagina = 5;
	$totalPaginas = ceil($numeroDeRegistros / $numeroDeRegistrosPorPagina);
	$limite = " limit " . (($indice - 1) * $numeroDeRegistrosPorPagina) . " , " . $numeroDeRegistrosPorPagina;

	$consultaDescargas = "SELECT * FROM descargas $limite";
	$resultadoDescargas = mysqli_query($conexion, $consultaDescargas);
	$filaDescargas = mysqli_fetch_assoc($resultadoDescargas);
	if ($filaDescargas) {
		echo "<table>";
		echo "<tr>";
		if (comprobarRol() == "admin") {
			echo "<th>ID</th>";
		}
		echo "<th>ISBN</th>";
		echo "<th>NOMBRE</th>";
		echo "<th>FECHA</th>";
		if (comprobarRol() == "usuario") {
			echo "<th></th>";
		}
		echo "</tr>";

		do {
			echo "<tr>";
			if (comprobarRol() == "admin") {
				echo "<td>" . $filaDescargas['id'] . "</td>";
			}
			echo "<td>" . $filaDescargas['isbn'] . "</td>";
			echo "<td>" . $filaDescargas['nombre'] . "</td>";
			echo "<td>" . $filaDescargas['fecha'] . "</td>";

			if (comprobarRol() == "usuario") {
				echo "<td>" . "BOTON DESCARGAR" . "</td>"; //Hay que agregar el boton de descargar
			}
			
			echo "</tr>";
		} while ($filaDescargas = mysqli_fetch_assoc($resultadoListado));
		echo "</table>";
		echo "<a href='listadoDeseos.php?pagina=" . (($indice - 1 < 1) ? 1 : $indice - 1) . "'>ATRAS</a>";
		echo "<a href='listadoDeseos.php?pagina=" . (($indice + 1 > $totalPaginas) ? $totalPaginas : $indice + 1) . "'>SIGUIENTE</a>";
	}
	?>
</body>
<?php include("../plantillas/fotter.php.php"); ?>

</html>