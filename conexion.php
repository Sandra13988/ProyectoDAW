<?php

$host    = "localhost";
$usuario = "root";
$pass    = "";
$db      = "librex";

//Funcion que conecta a la base de datos
function conectar() {
    global $host, $usuario, $pass, $db;
    $conexion = mysqli_connect($host, $usuario, $pass, $db);
    if (mysqli_connect_errno()) {
        echo "Error \n";
        echo "Errno: " . mysqli_connect_errno() . "\n";
        echo "Error: " . mysqli_connect_error() . "\n";
        exit;
    }

    return $conexion;
}


function desconectar($conexion) {
    mysqli_close($conexion);
}

?>