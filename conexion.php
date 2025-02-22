<?php
//Funcion que conecta a la base de datos
function conectar() {
    $host = "sql201.infinityfree.com";
    $user = "if0_38334858";
    $pass = "Siemprejuntos88";
    $db = "if0_38334858_librex";
    $conexion = mysqli_connect($host, $user, $pass, $db, 3306);
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