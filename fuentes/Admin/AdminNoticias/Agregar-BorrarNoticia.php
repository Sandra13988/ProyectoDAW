<?php $mensaje = ""; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
	<link rel="stylesheet" href="assets/css/estiloNoticias.css" />
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
	<title>Noticias</title>
</head>

<body>
	
<form id="formulario">
    <label for="titulo">Título:</label><br>
    <input type="text" id="titulo" name="titulo"><br>
    <label for="descripcion">Descripción:</label><br>
    <textarea id="descripcion" name="descripcion"></textarea><br>
    <button type="submit">Crear Noticia</button>
</form>
<div id="noticias"></div>
<button id="borrarNoticia">Borrar Última Noticia</button>

	<script>
        document.getElementById("formulario").addEventListener("submit", function(event) {
    event.preventDefault(); // Evitar que el formulario se envíe

    // Obtener valores del formulario
    var titulo = document.getElementById("titulo").value;
    var descripcion = document.getElementById("descripcion").value;

    // Obtener fecha actual
    var fecha = new Date();
    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    var fechaString = fecha.toLocaleDateString('es-ES', options);

    // Crear elementos de noticia
    var noticia = document.createElement("div");
    noticia.classList.add("noticia");

    var fechaElement = document.createElement("strong");
    fechaElement.classList.add("fecha");
    var fechaParrafo = document.createElement("p");
    fechaParrafo.textContent = fechaString;
    fechaElement.appendChild(fechaParrafo);

    var contenidoNoticia = document.createElement("div");
    contenidoNoticia.classList.add("contenidoNoticia");

    var tituloElement = document.createElement("h2");
    tituloElement.textContent = titulo;

    var descripcionParrafo = document.createElement("p");
    descripcionParrafo.textContent = descripcion;

    contenidoNoticia.appendChild(tituloElement);
    contenidoNoticia.appendChild(descripcionParrafo);

    noticia.appendChild(fechaElement);
    noticia.appendChild(contenidoNoticia);

    // Agregar noticia al contenedor de noticias
    var noticiasDiv = document.getElementById("noticias");
    noticiasDiv.appendChild(noticia);

    // Limpiar formulario
    document.getElementById("formulario").reset();
});

document.getElementById("borrarNoticia").addEventListener("click", function() {
    var noticiasDiv = document.getElementById("noticias");
    var ultimaNoticia = noticiasDiv.lastChild;
    noticiasDiv.removeChild(ultimaNoticia);
});

    </script>
</body>



</html>
