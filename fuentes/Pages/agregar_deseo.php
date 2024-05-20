<?php
include('../funciones.php');

$mensaje = ""; // Variable para almacenar mensajes de éxito o error

if (isset($_POST['agregar_deseo'])) {
    // Verificar si el usuario tiene una sesión activa
    if (isset($_SESSION['id'])) {
        // Obtener los datos del formulario
        $id_libro = $_POST['id_libro'];
        $nombre_libro = $_POST['nombre_libro'];
        $genero_libro = $_POST['genero_libro'];
        $autor_libro = $_POST['autor_libro'];
        $id_usuario = $_SESSION['id']; // Obtener el ID del usuario de la sesión

        // Realizar la inserción en la tabla de deseos
        $conexion = conectar();
        $query = "INSERT INTO deseos (id_usuario, isbn, nombre, genero, autor) 
                  VALUES ('$id_usuario', '$id_libro', '$nombre_libro', '$genero_libro', '$autor_libro')";
        $result = mysqli_query($conexion, $query);

        if ($result) {
            $mensaje = "Libro agregado a la lista de deseos correctamente";
        } else {
            $mensaje = "Error al agregar el libro a la lista de deseos";
        }
    } else {
        $mensaje = "Debes iniciar sesión para agregar libros a tu lista de deseos";
    }
}

// Redireccionar de vuelta a la página de libros con el mensaje
header("Location: ./Libros.php?mensaje=" . urlencode($mensaje));
exit();
?>
