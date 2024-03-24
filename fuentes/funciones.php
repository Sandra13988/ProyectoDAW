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
function mantener_sesion(){
    if(!isset($_SESSION["usuarioConectado"])){
        header("location:../index.php");
      
    }
}

mantener_sesion();

//Funcion que comprueba si un libro ya está registrado
function comprobarExistencias($id){
    $conexion = conectar();
    $consultaExistencias = "SELECT * FROM libros WHERE id = '$id'";
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
    $consultaUsuario = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
    $resultadoExistencias = mysqli_query($conexion, $consultaUsuario);
    $filaUsuario = mysqli_fetch_assoc($resultadoExistencias);
    if($filaUsuario){
        return TRUE;
    }else{
        return FALSE;
    }
}

//Funcion que comprueba si el usuario está suscrito
function comprobarSuscripcion($id){


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