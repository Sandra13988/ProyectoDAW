<?php

include("../funciones.php");

header('Content-Type: application/json');



$conexion = conectar();
$consultaRegistros = "SELECT * FROM libros";
$resultadoRegistros = mysqli_query($conexion, $consultaRegistros);

$libros = array();
while ($row = mysqli_fetch_assoc($resultadoRegistros)) {
    $libros[] = array(
        'id' => $row['isbn'],
        'src' => '../Admin/portada/'.$row['portada']  // Asegúrate de que 'src' es el nombre de la columna en tu base de datos
    );
}

mysqli_close($conexion);

echo json_encode($libros);
