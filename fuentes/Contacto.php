<?php include('cabecero.php'); ?>
    <h1>CONTACTO</h1>
    <div id="main">
        <form method="post" action="#">
            <label for="nombre">Nombre</label><br>
            <input type="text" id="nombre" name="nombre" autofocus required placeholder="Nombre"><br><br>
            <label for="email">E-mail</label><br>
            <input type="email" id="email" name="email" required placeholder="correo@gmail.com"><br><br>
            <label for="edad">Edad</label><br>
            <input type="number" id="edad" name="edad" required placeholder="18"><br><br>
            <label for="telefono">Telefono</label><br>
            <input type="text" id="telefono" name="telefono" required placeholder=" 122 344 566"><br><br>

            <label for="consulta">Consulta</label><br>
            <textarea id="consulta" name="consulta" required rows="4" cols="40"
                placeholder="Escriba su consulta"></textarea><br><br>
            <label for="politicaYCookies">Politica de privacidad y cookies</label><br>
            <input type="checkbox" id="politicaYCookies" name="politicaYCookies"><br><br>

            <input type="submit" id="enviar" name="enviar" required><br><br>
        </form>
        <div class="mapa">   
            <h2>Y tambien estamos aquí!</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12548.599042593361!2d-0.8032001939331055!3d38.159958883464256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1707048334320!5m2!1ses!2ses" width="385" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>      
        </div>
        <div class="mapa2">   
            <h2>Y tambien estamos aquí!</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12548.124259212533!2d-0.8107732375726806!3d38.162717569731996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd63bb24b1bc1467%3A0x9a9de53a3857566a!2s03158%20Catral%2C%20Alicante!5e0!3m2!1ses!2ses!4v1707125421088!5m2!1ses!2ses" width="800" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    
        </div>
    </div>
<?php include('fotter.php'); ?>