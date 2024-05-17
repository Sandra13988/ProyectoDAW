<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
    <input type="file" name="archivo"><br><br>
    <input type="submit" name="enviar" value="Enviar">
</form>

<?php
if(isset($_POST['enviar'])){
    $permitidos = array("application/pdf");
    $nombre = $_FILES['archivo']['name'];
    $nombreTemp = $_FILES['archivo']['tmp_name'];
    $tipoarchivo = $_FILES['archivo']['type'];
    $ruta = './pdf/';
    if(in_array($tipoarchivo, $permitidos)){
        if(move_uploaded_file($nombreTemp, $ruta.$nombre)){
            echo "Subido correctamente";
        }else{
            echo "No se ha podido subir";
        }
    }else{
        echo "Archivo no permitido";
    }
}
?>
