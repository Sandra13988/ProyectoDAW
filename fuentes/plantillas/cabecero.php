<header>
    <img id="logotipo" src="../../assets/imagenes/logotipo/librex2.png" alt="logotipo">
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
        <div class="menu-container-escritorio">
            <div class="menu-item">
                <button class="menu-btn">PERFIL</button>
                <div class="submenu" id="submenu">
                    <a href="#">Perfil</a>
                    <a href="#">Suscripcion</a>
                    <a href="#">WishList</a>
                    <a href="#">Logout</a>
                </div>
            </div>
        </div>

        <script src="scriptMenu.js"></script>
    </div>
    <!--Menu en movil-->
    <div class="menu-container-movil">
        <div class="menu-item">
            <button class="menu-btn">Menú</button>
            <div class="submenu" id="submenu">
                <a href="#">Indice</a>
                <a href="#">Libros</a>
                <a href="#">Noticias</a>
                <a href="#">Contacto</a>
            </div>
        </div>
    </div>
</header>