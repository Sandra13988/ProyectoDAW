<?php
/*
 * 
 * Copyleft 2022 Pepe Sánchez 
 *
 * 
 * 
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Listado de los artículos</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.38" />
</head>

<body>
	<?php 
		include("funciones.php");
		include("encabezado.php");

	 echo "aquí hacemos un listado de los artículos de la pastelería PAGINADOS";

	if(isset($_SERVER["REQUEST_METHOD"])== "GET" && isset($_GET["pagina"])){
		$indice = (int)$_GET["pagina"];
	}else{
		$indice = 1;
	}


	$conexion = conectar();
	$consultaRegistros = "SELECT * FROM articulos";
	$resultadoRegistros = mysqli_query($conexion, $consultaRegistros);

	$numeroDeRegistros = mysqli_num_rows($resultadoRegistros);
	$numeroDeRegistrosPorPagina = 2;
	$totalPaginas = ceil($numeroDeRegistros/$numeroDeRegistrosPorPagina);
	$limite = " limit ".(($indice-1)*$numeroDeRegistrosPorPagina)." , ".$numeroDeRegistrosPorPagina;

	$consultaListado = "SELECT * FROM articulos $limite";
	$resultadoListado = mysqli_query($conexion, $consultaListado);
	$filaListado = mysqli_fetch_assoc($resultadoListado);
	if($filaListado){
		echo "<table>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>NOMBRE</th>";
		echo "<th>CATEGORIA</th>";
		echo "<th>PRECIO</th>";
		echo "<th>PROCEDENCIA</th>";
		echo "</tr>";

		do{
			echo "<tr>";
			echo "<td>".$filaListado['id']."</td>";
			echo "<td>".$filaListado['nombre']."</td>";
			echo "<td>".$filaListado['categoría']."</td>";
			echo "<td>".$filaListado['precio']."</td>";
			echo "<td>".$filaListado['procedencia']."</td>";
			echo "</tr>";
		}while($filaListado = mysqli_fetch_assoc($resultadoListado));
		echo "</table>";
		echo "<a href='listado.php?pagina=".(($indice-1< 1)? 1 : $indice-1)."'>ATRAS</a>";
		echo "<a href='listado.php?pagina=".(($indice+1> $totalPaginas)? $totalPaginas : $indice+1)."'>SIGUIENTE</a>";
	}


	?>

	
	
	
</body>

</html>

