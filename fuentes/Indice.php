<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="assets/css/estiloIndice.css"/>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
        <title>Indice</title>
    </head>
    <body>
        <div id="contenedor">
        <?php include('cabecero.php'); ?>
        <main>
                <!--He intentado hacer esta seccion con picture, añadiendo en cada tamaño de la pagina la misma foto pero en tamaños
                diferentes, pero queda mal porque no cogen buena calidad-->
                <div class="libros">
                    <h2>NOVEDADES</h2>
                    <div class="unidad">
                        <h2>Almas</h2>
                        <a href="Libros.html#almas">
                            <img src="assets/imagenes/libros/Grandes/almas.jpg">
                        </a>
                    </div>
                    <div class="unidad">
                        <h2>Bodas de hueso</h2>
                        <a href="Libros.html#bodas">
                            <img src="assets/imagenes/libros/Grandes/bodas.jpg">
                        </a>
                    </div>
                    <div class="unidad">
                        <h2>Dulce Veneno</h2>
                        <a href="Libros.html#dulce">
                            <img src="assets/imagenes/libros/Grandes/dulce.jpg">
                        </a>
                    </div>
                    <div class="unidad">
                        <h2>Twisted Games</h2>
                        <a href="Libros.html#games">
                            <img src="assets/imagenes/libros/Grandes/games.jpg">
                        </a>
                    </div>
                    <div class="unidad">
                        <h2>Harry Potter</h2>
                        <a href="Libros.html#harryp">
                            <img src="assets/imagenes/libros/Grandes/harry.jpg">
                        </a>
                    </div>
                    <div class="unidad">
                        <h2>La hija del Rey pirata</h2>
                        <a href="Libros.html#hija">
                            <img src="assets/imagenes/libros/Grandes/hija.jpg">
                        </a>
                    </div>
                    <div class="unidad">
                        <h2>Mitología Japonesa</h2>
                        <a href="Libros.html#japon">
                            <img src="assets/imagenes/libros/Grandes/japon.jpg">
                        </a>
                    </div>
                    <div class="unidad">
                        <h2>Jaque al Rey</h2>
                        <a href="Libros.html#jaque">
                            <img src="assets/imagenes/libros/Grandes/jaque.jpg">
                        </a>    
                    </div>
                </div>
            </main>
            
            <?php include('fotter.php'); ?>
        </div>
    </body>
</html>

