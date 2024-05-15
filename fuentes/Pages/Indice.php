<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../../assets/css/estiloIndice.css" />
    <link rel="stylesheet" href="../../assets/css/carousel.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/estiloMenus.css">
    <title>Indice</title>
</head>

<body>
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>
        <div id="cuerpo">
            <h1>NOVEDADES</h1>
            <div class="carousel"></div>
            <script>
                <?php include('../Utiles/carousel.js'); ?>
            </script>
        </div>
        <?php include('../plantillas/fotter.php'); ?>
    </div>
</body>

</html>