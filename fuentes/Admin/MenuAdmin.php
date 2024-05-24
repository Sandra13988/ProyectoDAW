<?php include('../funciones.php'); ?>
<?php mantener_sesion()?>
<?php permisoAdmin(); ?>

<?php $mensaje = ""; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../../assets/css/estiloMenuAdmin.css" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Protest+Riot&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/estiloMenus.css">
    <title>Noticias</title>
</head>

<body>
    <!--Menu del administrador donde tendremos todas las opciones para
        administrar los libros, usuarios y actualizar novedades-->
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>
        <div id="cuerpo">
            
            <div class="administrarLibros">
                <h2>ADMINISTRAR LIBROS</h2>
                <div class="recuadro">
                    <h3>ALTA LIBRO</h3>
                    <div>Dar de alta libros nuevos</div>
                    <div class="botonAdmin"><input type="submit" onclick="window.location.href='./altaLibro.php'" value="ALTA" name="" /></div>
                </div>
                <div class="recuadro">
                    <h3>BAJA LIBRO</h3>
                    <div>Dar de baja libros antiguos</div>
                    <div class="botonAdmin"><input type="submit" onclick="window.location.href='./borradoLibro.php'" value="BAJA" name="" /></div>
                </div>
                <div class="recuadro">
                    <h3>MODIFICAR LIBRO</h3>
                    <div>Modificar libros que tenemos en Librex</div>
                    <div class="botonAdmin"><input type="submit" onclick="window.location.href='./modificarLibro.php'" value="MODIFICAR" name="" /></div>
                </div>
                <div class="recuadro">
                    <h3>LISTAR LIBROS</h3>
                    <div>Consultar los libros que tenemos en Librex</div>
                    <div class="botonAdmin"><input type="submit" onclick="window.location.href='./listadoLibro.php'" value="LISTAR" name="" /></div>
                </div>
            </div>
            <div class="administrarLibros">
                <h2>ADMINISTRAR USUARIOS</h2>
                
                <div class="recuadro">
                    <h3>ALTA USUARIO</h3>
                    <div>Dar de alta usuario</div>
                    <div class="botonAdmin"><input type="submit" onclick="window.location.href='./altaUsuario.php'" value="ALTA" name="" /></div>
                </div>
                <div class="recuadro">
                    <h3>BAJA USUARIO</h3>
                    <div>Dar de baja usuario</div>
                    <div class="botonAdmin"><input type="submit" onclick="window.location.href='./borradoUsuario.php'" value="BAJA" name="" /></div>
                </div>
                <div class="recuadro">
                    <h3>MODIFICAR USUARIO</h3>
                    <div>Modificar usuario existente</div>
                    <div class="botonAdmin"><input type="submit" onclick="window.location.href='./modificarUsuario.php'" value="MODIFICAR" name="" /></div>
                </div>
                <div class="recuadro">
                    <h3>LISTAR USUARIOS</h3>
                    <div>Lista de usuarios registrados</div>
                    <div class="botonAdmin"><input type="submit" onclick="window.location.href='./listadoUsuarios.php'" value="LISTAR USUARIOS" name="" /></div>
                </div>
            </div>
            <div class="administrarLibros" id="recuadroCarrousel">
                <h2>ADMINISTRAR CARROUSEL</h2>
                <div class="recuadro">
                    <h3>ACTUALIZAR NOVEDADES</h3>
                    <div>Actualizar carrousel</div>
                    <div class="botonAdmin"><button id="actualizarBtn">Actualizar Datos</button></div>
                    <script src="./InsertarNovedades.js"></script>
                </div>
            </div>
        </div>
        <?php include('../plantillas/fotter.php'); ?>
    </div>


</body>



</html>