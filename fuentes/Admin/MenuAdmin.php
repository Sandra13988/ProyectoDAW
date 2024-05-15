<?php $mensaje = ""; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
	<link rel="stylesheet" href="../../assets/css/estiloContacto.css" />
    <link rel="stylesheet" href="../../assets/css/estiloLibros.css.css" />
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
	<title>Noticias</title>
</head>

<body>
	
<div id="contenedor">
<?php include('../plantillas/fotter.php'); ?>
    <div class="adminLibros">
        <h2>MENU ADMINISTRADOR</h2>
        <div class="">
            <h3>ALTA LIBRO</h3>
            <div>Dar de alta libros nuevos</div>
            <input type="submit" onclick="" value="Alta" name=""/>
        </div>
        <div class="">
            <h3>BAJA LIBRO</h3>
            <div>Dar de baja libros antiguos</div>
            <input type="submit" onclick="" value="" name=""/>
        </div>
        <div class="">
            <h3>MODIFICAR LIBRO</h3>
            <div>Modificar libros que tenemos en Librex</div>
            <input type="submit" onclick="" value="" name=""/>
        </div>
        <div class="">
            <h3>LISTAR LIBROS</h3>
            <div>Consultar los libros que tenemos en Librex</div>
            <input type="submit" onclick="" value="" name=""/>
        </div>
        <div class="">
                <h3>ALTA NOTICIA</h3>
                <div>Dar de alta libros nuevos</div>
                <input type="submit" onclick="" value="" name=""/>
        </div>
        <div class="">
            <h3>BAJA NOTICIA</h3>
            <div>Dar de baja noticias antiguas</div>
            <input type="submit" onclick="" value="" name=""/>
            </div>
        </div>
    <?php include('../plantillas/fotter.php'); ?>
</div>

	
</body>



</html>
