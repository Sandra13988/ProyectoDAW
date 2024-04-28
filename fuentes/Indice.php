<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../assets/css/estiloIndice.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../fuentes/slider/slider.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <title>Indice</title>
</head>

<body>
    <div id="contenedor">
        <?php include('./plantillas/cabecero.php'); ?>

        <section id="tranding">
            <div class="container">
                <h1 class="text-center section-heading">NOVEDADES</h1>
            </div>
            <div class="container">
                <div class="swiper tranding-slider">
                    <div class="swiper-wrapper">
                        <!-- Slide-start -->
                        <div class="swiper-slide tranding-slide">
                            <div class="tranding-slide-img">
                                <img src="../Grandes/almas.jpg" alt="Tranding">
                            </div>
                            <div class="tranding-slide-content">
                                <div class="tranding-slide-content-bottom">
                                    <h2 class="food-name">
                                        Special Pizza
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <!-- Slide-end -->
                        <!-- Slide-start -->
                        <div class="swiper-slide tranding-slide">
                            <div class="tranding-slide-img">
                                <img src="../Grandes/bodas.jpg" alt="Tranding">
                            </div>
                            <div class="tranding-slide-content">
                                <div class="tranding-slide-content-bottom">
                                    <h2 class="food-name">
                                        Meat Ball
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <!-- Slide-end -->
                        <!-- Slide-start -->
                        <div class="swiper-slide tranding-slide">
                            <div class="tranding-slide-img">
                                <img src="../Grandes/dulce.jpg" alt="Tranding">
                            </div>
                            <div class="tranding-slide-content">
                                <div class="tranding-slide-content-bottom">
                                    <h2 class="food-name">
                                        Burger
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <!-- Slide-end -->
                        <!-- Slide-start -->
                        <div class="swiper-slide tranding-slide">
                            <div class="tranding-slide-img">
                                <img src="../Grandes/games.jpg" alt="Tranding">
                            </div>
                            <div class="tranding-slide-content">
                                <div class="tranding-slide-content-bottom">
                                    <h2 class="food-name">
                                        Frish Curry
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <!-- Slide-end -->
                        <!-- Slide-start -->
                        <div class="swiper-slide tranding-slide">
                            <div class="tranding-slide-img">
                                <img src="../Grandes/harry.jpg" alt="Tranding">
                            </div>
                            <div class="tranding-slide-content">
                                <div class="tranding-slide-content-bottom">
                                    <h2 class="food-name">
                                        Pane Cake
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <!-- Slide-end -->
                        <!-- Slide-start -->
                        <div class="swiper-slide tranding-slide">
                            <div class="tranding-slide-img">
                                <img src="../Grandes/hija.jpg" alt="Tranding">
                            </div>
                            <div class="tranding-slide-content">
                                <div class="tranding-slide-content-bottom">
                                    <h2 class="food-name">
                                        Vanilla cake
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <!-- Slide-end -->
                        <!-- Slide-start -->
                        <div class="swiper-slide tranding-slide">
                            <div class="tranding-slide-img">
                                <img src="../Grandes/hija.jpg" alt="Tranding">
                            </div>
                            <div class="tranding-slide-content">
                                <div class="tranding-slide-content-bottom">
                                    <h2 class="food-name">
                                        Straw Cake
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <!-- Slide-end -->
                    </div>

                    <br>
                    <br>
                    <br>
                    <div class="tranding-slider-control">
                        <div class="swiper-button-prev slider-arrow">
                            <ion-icon name="arrow-back-outline"></ion-icon>
                        </div>
                        <div class="swiper-button-next slider-arrow">
                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>
            </div>
        </section>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <script src="./slider/script.js"></script>
        <?php include('./plantillas/fotter.php'); ?>
    </div>
</body>

</html>