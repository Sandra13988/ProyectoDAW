<header>
    <img id="logotipo" src="../assets/imagenes/logotipo/logo.png" alt="logotipo">
    <!--Menu tablet-->
    <div class="iconos">
        <a href="../Pages/Indice.php" class="iconito">
            <ion-icon name="home-outline"></ion-icon>
        </a>
        <a href="../Pages/Libros.php" class="iconito">
            <ion-icon name="book-outline"></ion-icon>
        </a>
        <a href="../Pages/Noticias.php" class="iconito">
            <ion-icon name="newspaper-outline"></ion-icon>
        </a>
        <a href="../Pages/Contacto.php" class="iconito">
            <ion-icon name="call-outline"></ion-icon>
        </a>
    </div>
    
    <!--Menu en escritorio-->
    <div class="iconos2">
        <a href="../Pages/Indice.php" class="iconito">
            <?php echo "HOME"; ?>
        </a>
        <a href="../Pages/Libros.php" class="iconito">
            <?php echo "LIBROS"; ?>
        </a>
        <a href="../Pages/Noticias.php" class="iconito">
            <?php echo "NOTICIAS"; ?>
        </a>
        <a href="../Pages/Contacto.php" class="iconito">
            <?php echo "CONTACTO"; ?>
        </a>
    </div>
    <!--Menu en movil-->
    <div class="menuCompleto">
        <input type="checkbox" id="hamburguesa">
        <label for="hamburguesa" id="icono"><ion-icon name="menu-outline"></ion-icon></label>
        <ul class="menu">
            <li><a href="../Pages/Indice.php">INDICE</a></li>
            <li><a href="../Pages/Libros.php">LIBROS</a></li>
            <li><a href="../Pages/Noticias.php">NOTICIAS</a></li>
            <li><a href="../Pages/Contacto.php">CONTACTO</a></li>
        </ul>
    </div>
</header>
