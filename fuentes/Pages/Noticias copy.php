<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../../assets/css/estiloNoticias.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/estiloMenus.css" />
    <title>Noticias</title>
    <style>
        /* Estilos para el modal */
        .modal {
            display: none;
            /* Por defecto, el modal está oculto */
            position: fixed;
            /* Posicionamiento fijo para mantener el modal en pantalla */
            z-index: 1;
            /* Hace que el modal esté por encima del resto del contenido */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            /* Habilita el desplazamiento cuando el contenido del modal es demasiado grande */
            background-color: rgb(0, 0, 0);
            /* Fondo oscuro semi-transparente */
            background-color: rgba(0, 0, 0, 0.4);
            /* Fondo oscuro semi-transparente */
            padding-top: 60px;
            /* Distancia desde la parte superior */
        }

        .modal-content {
            background-color: #fefefe;
            /* Fondo del modal */
            margin: 5% auto;
            /* Margen vertical y horizontal */
            padding: 20px;
            border: 1px solid #888;
            width: 20%;
            /* Ancho del modal */
        }

        /* Cerrar el modal */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>
        <main id="cuerpo">
            <h1>NOTICIAS</h1>
            <!-- Botón para mostrar el modal -->
            <button id="mostrarModal">Añadir Noticia</button>
            <button id="eliminarAntigua">Eliminar Noticia Más Antigua</button>
            <!-- Estructura del modal -->
            <div id="modal" class="modal">
                <div class="modal-content">
                    <span class="close" id="cerrar">&times;</span>
                    <!-- Formulario para agregar noticias -->
                    <form id="formulario" action="../../Pages/Noticias.php" method="post">
                        <label for="titulo">Título:</label><br>
                        <input type="text" id="titulo" name="titulo"><br>
                        <label for="descripcion">Descripción:</label><br>
                        <textarea id="descripcion" name="descripcion"></textarea><br>
                        <button type="submit">Crear Noticia</button>
                    </form>
                </div>
            </div>
            <!-- Contenedor de noticias -->
            <div class="noticias">
                <div class="noticia">
                    <strong class="fecha">
                        <p>Lunes 31 de Mayo de 2024</p>
                    </strong>
                    <div class="contenidoNoticia">
                        <h2>Librería Vino a por Letras: centro de la comunidad literaria de Getafe</h2>
                        <p>...</p>
                    </div>
                </div>
                <!-- Otras noticias -->
            </div>
        </main>
        <?php include('../plantillas/fotter.php'); ?>
    </div>

    <script>
        var modal = document.getElementById("modal");
        var mostrarModalBtn = document.getElementById("mostrarModal");
        var cerrarBtn = document.getElementById("cerrar");

        // Mostrar el modal al hacer clic en el botón
        mostrarModalBtn.onclick = function() {
            modal.style.display = "block";
        }

        // Ocultar el modal al hacer clic en el botón de cerrar
        cerrarBtn.onclick = function() {
            modal.style.display = "none";
        }

        // Ocultar el modal al hacer clic fuera del modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        document.getElementById("formulario").addEventListener("submit", function(event) {
            event.preventDefault();

            var titulo = document.getElementById("titulo").value;
            var descripcion = document.getElementById("descripcion").value;

            var fecha = new Date();
            var options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            var fechaString = fecha.toLocaleDateString('es-ES', options);

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

            var noticiasDiv = document.querySelector(".noticias");
            noticiasDiv.appendChild(noticia);

            document.getElementById("formulario").reset();
            modal.style.display = "none"; // Oculta el modal después de agregar la noticia
        });

        document.getElementById("eliminarAntigua").addEventListener("click", function() {
            var noticias = document.querySelectorAll(".noticia");
            if (noticias.length > 0) {
                var primeraNoticia = noticias[0];
                primeraNoticia.parentNode.removeChild(primeraNoticia);
            }
        });
    </script>
</body>

</html>