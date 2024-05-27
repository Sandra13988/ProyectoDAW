
<?php
session_start();
require '../../conexion.php';
include("../funciones.php");
mantener_sesion();
permisoAdmin();
header('Content-Type: application/json');


//Este codigo forma parte de la actualizacion de la seccion de novedades
//Selecciona los 5 ultimos libros que se han registrado
//Para posteriormente recogerlos con el bin y recogerlos con peticiones API en novedades
$conexion = conectar();
$consultaRegistros = "SELECT * FROM libros ORDER BY tiempo DESC LIMIT 5";


$resultadoRegistros = mysqli_query($conexion, $consultaRegistros);

$libros = array();
while ($row = mysqli_fetch_assoc($resultadoRegistros)) {
    $libros[] = array(
        'id' => $row['isbn'],
        'src' => '../Admin/portada/'.$row['portada']  
    );
}
desconectar($conexion);


echo json_encode($libros);
