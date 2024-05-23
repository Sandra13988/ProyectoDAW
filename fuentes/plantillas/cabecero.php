<?php include('../funciones.php'); ?>

<!--Header para todas las paginas menos el login-->
<header>
    <!--Logotipo de la empresa-->
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
        <div class="menu-container-escritorio">
            <div class="menu-item">
                <button class="menu-btn"><?php echo $_COOKIE['nombre_usuario'] ?></button>
                <div class="submenu" id="submenu">
                    <a href="../Pages/Perfil.php">Perfil</a>
                    <a href="../Pages/Suscripcion.php">Suscripcion</a>
                    <a href="../Pages/WishList.php">WishList</a>
                    <?php
                    //Si el usuario conectado es el administrador le aparecerá una opcion mas en el menu que
                    //es la del panel del administrador
                    if (comprobarRol()) {
                        echo '<a href="../Admin/MenuAdmin.php">Panel Administrador</a>';
                    }
                    ?>

                    <a href="../../cerrar.php">Cerrar sesión</a>


                </div>
            </div>
        </div>
    </div>

    <!--Menu en escritorio-->
    <div class="iconos2">
        <a href="../Pages/Indice.php" class="iconito">
            <?php echo "NOVEDADES"; ?>
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
                <button class="menu-btn"><?php echo $_COOKIE['nombre_usuario'] ?></button>
                <div class="submenu" id="submenu">
                    <a href="../Pages/Perfil.php">Perfil</a>
                    <a href="../Pages/Suscripcion.php">Suscripcion</a>
                    <a href="../Pages/WishList.php">WishList</a>
                    <?php
                    if (comprobarRol()) {
                        echo '<a href="../Admin/MenuAdmin.php">Panel Administrador</a>';
                    }
                    ?>

                    <a href="../../cerrar.php">Cerrar sesión</a>


                </div>
            </div>
        </div>

        <script src="scriptMenu.js"></script>
    </div>
    <!--Menu en movil-->
    <div class="menu-container-movil" >
        <div class="menu-item">
            <button class="menu-btn"><?php echo $_COOKIE['nombre_usuario'] ?></button>
            <div class="submenu" id="submenu">
                <a href="../Pages/Indice.php">Novedades</a>
                <a href="../Pages/Libros.php">Libros</a>
                <a href="../Pages/Noticias.php">Noticias</a>
                <a href="../Pages/Contacto.php">Contacto</a>
                <a href="../Pages/Perfil.php">Perfil</a>
                <a href="../Pages/Suscripcion.php">Suscripcion</a>
                <a href="../Pages/WishList.php">WishList</a>
                <?php
                if (comprobarRol()) {
                    echo '<a href="../Admin/MenuAdmin.php">Panel Administrador</a>';
                }
                ?>

                <a href="../../cerrar.php">Cerrar sesión</a>
            </div>
        </div>
    </div>
</header>