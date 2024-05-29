<?php

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
     if(!isset($_SESSION["nombre"])){
        header("location:/Proyecto_Sandra/ProyectoDAW/index.php");
        echo("no tienes la sesion iniciada");
        exit();
     }
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


//Funcion que comprueba si un usuario ya está registrado comprobado por el nombre
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

//Funcion que comprueba si un usuario ya está registrado comprobado por el ID
function comprobarUsuarioPorID($id){
    $conexion = conectar();
    $consultaUsuario = "SELECT * FROM usuarios WHERE id = '$id'";
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

//Funcion que le asigna una ID cuando das de alta un usuario nuevo
function asignarId(){
    $conexion = conectar();
    $consultaUsuario = "SELECT MAX(id) as ultimo_id FROM usuarios";
    $resultadoUsuario = mysqli_query($conexion, $consultaUsuario);
    $filaUsuario = mysqli_fetch_assoc($resultadoUsuario);
    if($filaUsuario){
        return $filaUsuario['ultimo_id']+1;
    }
}

//Funcion que te deniega el permiso de acceso si no eres admin
function permisoAdmin(){
    if($_SESSION["rol"] !== "admin"){
        header("location:/Proyecto_Sandra/ProyectoDAW/index.php");
        echo("no tienes permiso");
        exit();
     }
}

?>