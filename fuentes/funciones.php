<?php
session_start();
 
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

//Funcion para desconectar la base de datos
function desconectar($conexion) {
    mysqli_close($conexion);
}

//Funcion que comprueba el rol del usuario
function comprobarRol(){
    if($_SESSION["rol"] == "admin"){
        return TRUE;
    }else{
        return FALSE;
    }
}

//Funcion que comprueba si el usuario ha iniciado sesion
//en el caso de que no, lo redirige al login

//HAY QUE CORREGIR RUTA
 function mantener_sesion(){
     if(!isset($_SESSION["nombre"])){
        header("location:/Proyecto_DAW/login.php");
        echo("no tienes la sesion iniciada");
        exit();
     }
 }

 //mantener_sesion();

//HAY QUE CORREGIR RUTA
function cerrar_sesion(){
    session_destroy();
    header("location:/Proyecto_DAW/login.php");
    exit();
}

//Funcion que comprueba si un libro ya está registrado
function comprobarExistencias($isbn){
    $conexion = conectar();
    $consultaExistencias = "SELECT * FROM libros WHERE isbn = '$isbn'";
    $resultadoExistencias = mysqli_query($conexion, $consultaExistencias);
    $filaExistencias = mysqli_fetch_assoc($resultadoExistencias);
    if($filaExistencias){
        return TRUE;
    }else{
        return FALSE;
    }
}


//Funcion que comprueba si un usuario ya está registrado
function comprobarUsuario($nombre){
    $conexion = conectar();
    $consultaUsuario = "SELECT * FROM usuarios WHERE usuario = '$nombre'";
    $resultadoExistencias = mysqli_query($conexion, $consultaUsuario);
    $filaUsuario = mysqli_fetch_assoc($resultadoExistencias);
    if($filaUsuario){
        return TRUE;
    }else{
        return FALSE;
    }
}

//Funcion que comprueba si el usuario está suscrito
function comprobarSuscripcion(){
    $suscripcion = $_SESSION["suscripcion"];
    if($suscripcion !== "none"){
        return TRUE;
    }else{
        return FALSE;
    }

}

function asignarId(){
    $conexion = conectar();
    $consultaUsuario = "SELECT MAX(id) as ultimo_id FROM usuarios";
    $resultadoUsuario = mysqli_query($conexion, $consultaUsuario);
    $filaUsuario = mysqli_fetch_assoc($resultadoUsuario);
    if($filaUsuario){
        return $filaUsuario['ultimo_id']+1;
    }
}

?>