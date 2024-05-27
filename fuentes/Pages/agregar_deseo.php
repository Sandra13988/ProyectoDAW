<?php
session_start();
require '../../conexion.php';
include('../funciones.php');
mantener_sesion();
//Codigo para agregar libros a la lista de deseos
$mensaje = ""; // Variable para almacenar mensajes de éxito o error


//Si se ha pulsado el boton de agregar a la lista de deseos...
if (isset($_POST['agregar_deseo'])) {
   
        // Obtenemos los datos del formulario
        $id_libro = $_POST['id_libro'];
        $nombre_libro = $_POST['nombre_libro'];
        $genero_libro = $_POST['genero_libro'];
        $autor_libro = $_POST['autor_libro'];
        $pdf_libro = $_POST['pdf_libro'];
        // Obtenemos el ID del usuario de la sesión
        $id_usuario = $_SESSION['id'];

        // Generamos la actualizacion de la lista
        $conexion = conectar();
        $consulta = "INSERT INTO deseos (id_usuario, isbn, nombre, genero, autor, pdf) 
                  VALUES ('$id_usuario', '$id_libro', '$nombre_libro', '$genero_libro', '$autor_libro', '$pdf_libro')";
        $result = mysqli_query($conexion, $consulta);

        if ($result) {
            $mensaje = "Libro agregado a la lista de deseos correctamente";
        } else {
            $mensaje = "Error al agregar el libro a la lista de deseos";
        }
        desconectar($conexion);
}

// Redireccionar de vuelta a la página de libros con el mensaje
header("Location: ./Libros.php?mensaje=" . urlencode($mensaje));
exit();
?>
