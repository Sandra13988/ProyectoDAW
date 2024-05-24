<?php include('../funciones.php'); ?>
<?php mantener_sesion()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
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
        /*  Estilos para el modal 
            No entiendo muy bien porque no se aplican en el archivo de css
            es por eso que los he puesto aqui
        */
        #mostrarModal {
            width: 300px;
            height: 50px;
        }

        #mostrarModal {
            margin: 0 auto;
            display: block;
        }


        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            display: flex;
            flex-direction: column;
            background-color: #fefefe;
            margin: 5% auto;
            border: 3px solid black;
            border-radius: 10px;
            width: 400px;
            font-size: 30px;
        }

        .modal-content>h2 {
            margin-top: 0;
            background-color: black;
            color: white;
            text-align: center;
        }

        .modal-content>form {
            padding: 20px;
            padding-top: 0px;
        }

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
    <!-- Seccion de noticias -->
    <div id="contenedor">
        <?php include('../plantillas/cabecero.php'); ?>
        <main id="cuerpo">
            <h1>NOTICIAS</h1>
            <!--Boton para mostrar el modal-->
            <!--Solo será visible si el usuario conectado es Admin-->
            <?php if (comprobarRol()) : ?>
                <button id="mostrarModal">Añadir Noticia</button>
            <?php endif; ?>
            <!--Modal -->
            <div id="modal" class="modal">
                <div class="modal-content">
                    <!-- Formulario para agregar noticias -->
                    <h2>NUEVA NOTICIA</h2>
                    <span class="close" id="cerrar"></span>
                    <form id="formulario" action="../../Pages/Noticias.php" method="post">
                        <label for="titulo">Título:</label><br>
                        <input type="text" id="titulo" name="titulo"><br>
                        <label for="descripcion">Descripción:</label><br>
                        <textarea id="descripcion" name="descripcion" style="width: 300px; height: 150px;"></textarea><br>
                        <button type="submit">Crear Noticia</button>
                    </form>
                </div>
            </div>
            <!-- Lista de noticias -->
            <div class="noticias">

                <div class="noticia">
                    <strong class="fecha">
                        <p>Lunes 31 de Mayo de 2024</p>
                    </strong>
                    <div class="contenidoNoticia">
                        <h2>Librería Vino a por Letras: centro de la comunidad literaria de Getafe</h2>
                        <p>
                            Hace cuatro años, las hermanas López Pavón decidieron emprender con el negocio que siempre les había llamado: una librería. Desde el principio se esmeraron en tener una selección de vinos y cafés con la que poder propiciar esos momentos en los que los lectores charlan, comparten, se conocen y empiezan a recomendarse.
                            Se preocuparon mucho, además, de que su catálogo fuera un espejo de la personalidad del barrio getafense que las rodea. Cristina y Silvia, a base de amabilidad y dedicación se han ganado una confianza tal que, muchas veces, los libros que ellas piden tienen ya un lector escogido.

                            Sus presentaciones de poesía, micros abiertos, o clubes infantiles y el afecto desde el que los organizan, unido a unos vecinos ávidos de cultura, contribuyen a formar la cada vez más impetuosa comunidad literaria de Getafe (Madrid).
                        </p>
                    </div>
                </div>
                <div class="noticia">
                    <strong class="fecha">
                        <p>Lunes 25 de Mayo de 2024</p>
                    </strong>
                    <div class="contenidoNoticia">
                        <h2>Luis López Carrasco gana el Premio Herralde con la novela 'El desierto blanco'</h2>
                        <p>
                            El cineasta y escritor murciano Luis López Carrasco ha ganado el 41º Premio Herralde de novela, convocado por editorial Anagrama y dotado con 25.000 euros, con la obra El desierto blanco.
                            Además de la novela ganadora, que el autor había presentado bajo el seudónimo de F. Román, el jurado ha escogido como finalista La reina del baile, de la escritora y directora argentina Camila Fabbri, que se había presentado bajo el sobrenombre de Sarah Connorr.
                            El jurado compuesto por la librera Ana Cañellas (librería Cálamo, Zaragoza), Gonzalo Pontón Gijón, Marta Sanz, Juan Pablo Villalobos y la editora Silvia Sesé, proclamó ganador a López Carrasco de entre las cinco finalistas que se habían seleccionado entre las 1.566 obras presentadas al galardón.
                        </p>
                    </div>
                </div>
                <div class="noticia">
                    <strong class="fecha">
                        <p>Lunes 22 de Mayo de 2024</p>
                    </strong>
                    <div class="contenidoNoticia">
                        <h2>'La ciudad de la piel de plata', de Félix G. Modroño</h2>
                        <p>
                            Félix G. Modroño (Portugalete, 1965) ha necesitado escribir ocho novelas para enfrentarse a una historia que siempre estuvo en su cabeza. "Antes incluso de plantearme que algún día sería escritor. Así que esta va ser la primera vez que tenga clara mi respuesta cuando alguien me pregunte cuánto tiempo he tardado en escribir La ciudad de la piel de plata: una vida", añade.

                            Su nueva y brillante novela cuenta la historia de Alberto Cepeda tras su regreso a Bilbao, después de haberlo tenido que abandonar 10 años atrás, para trabajar en un nuevo proyecto del que nadie podía imaginar la gigantesca dimensión que alcanzaría: el museo Guggenheim, cuya influencia en la transformación de la capital vizcaína ya ha sido reconocida por la historia. De hecho, su diseño vanguardista y el efecto de su construcción le han llevado a ser considerado como el edificio más importante de nuestra era.

                            Bien valía, pues, que tuviera su propia novela. Alberto es un joven que representa "a toda una generación de vascos, hijos de emigrantes castellanos, gallegos, leoneses, andaluces, extremeños…, que tuvieron que dejar sus pueblos de origen con lágrimas en los ojos para tratar de conseguir un futuro mejor para su familia. Sirva esta historia, pues, como homenaje a todos ellos".
                        </p>
                    </div>
                </div>
                <div class="noticia">
                    <strong class="fecha">
                        <p>Lunes 15 de Mayo de 2024</p>
                    </strong>
                    <div class="contenidoNoticia">
                        <h2>Kate Mosse, escritora: "En cada país, las mujeres lo han hecho todo, aunque la historia haya decidido no contarlo"</h2>
                        <p>
                            "Alguien / En un futuro / Pensará en nosotras". Lo escribió la poeta Safo (630 - 570 a. C.), una de las pocas voces femeninas que nos ha llegado de la Antigüedad, y lo recuerda una escritora actual, Kate Mosse (Sussex Occidental, Inglaterra, 1961), en un libro en el que trata de celebrar la vida de muchas mujeres que, pese a que fueron relevantes y marcaron a la sociedad de su época, es difícil encontrar su rastro hoy. Cómo las mujeres (también) construyeron el mundo (Roca Editorial, 2023), nació de una sencilla pregunta: "¿Quién es la mujer número uno de la historia a la que os gustaría celebrar o que pensaís que debería ser más conocida?". La lanzó Mosse en Twitter durante la pandemia y la respuesta que obtuvo fue tan abrumadora que decidió escribir este libro con cerca de mil nombres de grandes mujeres olvidadas. Con él, esta afamada autora súperventas de novela histórica regresa a la no ficción, después de haber recibido numerosos premios y vender millones de libros en todo el mundo con su trilogía de Languedoc, The Burning Chambers Series, y otros números uno en ventas de ficción gótica. Sus libros se han traducido a 38 idiomas y publicados en más de 40 países. Mosse atiende a EL PERIÓDICO DE ESPAÑA por videoconferencia desde el sur de Inglaterra, donde reside, y en un segundo intento, después de uno primero fallido por quedarse sin luz buena parte del día a causa de la borrasca Ciarán.

                            -Pregunta: El libro contiene alrededor de mil historias de mujeres que en su día fueron relevantes pero que ahora la Historia ha olvidado. Es inevitable ir pensando en otras mujeres que podrían estar también en él...

                            En realidad, la idea de este libro es iniciar la conversación. Ahora que ha comenzado a traducirse y publicarse en otros países fuera de Reino Unido, me dicen: "deberías incluir a tal o cual mujer en la próxima versión del libro" y en realidad esa es la idea, porque hay millones de mujeres olvidadas por la Historia, así que tengo una amplia lista de gente nueva.
                        </p>
                    </div>
                </div>
                <div class="noticia">
                    <strong class="fecha">
                        <p>Lunes 12 de Mayo de 2024</p>
                    </strong>
                    <div class="contenidoNoticia">
                        <h2>Los libros de la semana: Sylvia Plath, Ricardo Piglia y María Tena</h2>
                        <p>
                            Cartas a mi madre
                            Sylvia Plath. Random House. 25,90 €

                            Tan reveladoras como un diario, las cartas que Sylvia Plath dirigió a su madre cubren los años más importantes de su vida, desde el ingreso en la universidad, en 1950, hasta unos días antes de su suicidio, en 1963. Misiva tras misiva, en las páginas de este libro se van perfilando las emociones y los sentimientos de una escritora que ya es un mito de la literatura contemporánea.
                        </p>
                    </div>
                </div>
                <div class="noticia">
                    <strong class="fecha">
                        <p>Lunes 8 de Mayo de 2024</p>
                    </strong>
                    <div class="contenidoNoticia">
                        <h2>Los mejores libros de fantasía de todos los tiempos: de 'El señor de los anillos' a 'Una llama entre cenizas'</h2>
                        <p>
                            La fantasía es un género que comenzó a popularizarse hace relativamente poco tiempo. Nos permite viajar a mundos únicos llenos de criaturas fantásticas y entramados políticos que parecen hablar más de nuestra realidad que de su propia ficción. Sin duda, han marcado los gustos de miles de lectores por todo el mundo pues muchos niños y adolescentes crecieron leyendo estas sagas que, aún así, siempre pueden ser disfrutadas por los adultos. Estos son los mejores libros de fantasía de todos los tiempos.

                            'El señor de los anillos'

                            Sin Tolkien hoy la fantasía no sería tal y como la conocemos. Si este autor no hubiera rescatado la mitología para crear el mundo de El señor de los anillos, o creado un lenguaje específico para darle fundamento, sería difícil encontrar criaturas fantásticas en los libros actuales. Esta trilogía, ampliada con El Hobbit y Silmarillion, entre otras obras, tiene como núcleo las aventuras del joven Frodo, encargado de custodiar el Anillo Único y destruirlo antes de que la amenaza de Sauron sea imparable. Sólo así podrá salvar la Tierra Media y detener el avance del mal.
                            <br>
                            <br>
                            <strong>'El camino de los reyes'</strong>
                            <br>

                            Es el primer volumen de El Archivo de las Tormentas, considerado obra maestra de la fantasía contemporánea. Cuenta con un total de 10 libros y logró convertir a Sanderson en uno de los escritores más leídos en todo el mundo. Después de la Última Desolación, esta novela tiene como protagonistas a un médico que se acabó convirtiendo en soldado durante la guerra, a un asesino que cada vez que tiene que matar llora, una mentirosa que se hace pasar por erudita y un príncipe que va perdiendo su sed de guerra.
                            <br>
                            <br>
                            <strong>'Libros de Terramar'</strong>
                            <br>

                            Ursula K. Le Guin también es una de las precursoras del género fantástico en la ficción contemporánea, inspirando historias como el mundo mágico de Harry Potter. El mago de Terramar es la primera parte de la saga de Los libros de Terramar, también conocida como Las historias de Terramar. En el mundo de Terramar la magia es un elemento indispensable. Un principio fundamental rige ese mundo: el equilibrio entre la vida y la muerte, que pocos pueden alterar. Pasados diez años, Ged capaz ya de actuar en beneficio de otros, decide recobrar la mitad de un anillo perdido en las tumbas de Atuan; sin embargo la sacerdotisa le involucrará en las profundidades de Terramar. ". ¡Déjate llevar por la magia de Terramar!

                        </p>
                    </div>
                </div>
            </div>
        </main>
        <?php include('../plantillas/fotter.php'); ?>
    </div>
    <!--Script para manejar el modal-->
    <script>
        var modal = document.getElementById("modal");
        var mostrarModalBtn = document.getElementById("mostrarModal");
        var cerrarBtn = document.getElementById("cerrar");

        // Mostrar el modal al hacer clic en el botón
        mostrarModalBtn.onclick = function() {
            modal.style.display = "block";
        }

        // Ocultar el modal al hacer clic fuera del modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        //Generar la noticia en funcion de los datos insertados 
        //Ademas de los datos, se agregara con la funcion date la fecha de la noticia

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
            noticiasDiv.insertBefore(noticia, noticiasDiv.firstChild); // Insertar la nueva noticia al principio

            var noticias = document.querySelectorAll(".noticia");
            if (noticias.length > 5) {  // El 5 ese representa la cantidad de noticias que se pueden ver
                                        //Si hay mas de 5 noticias, se eliminara la ultima para dar paso a la nueva
                var ultimaNoticia = noticias[noticias.length - 1];
                ultimaNoticia.parentNode.removeChild(ultimaNoticia); 
            }

            document.getElementById("formulario").reset();
            modal.style.display = "none"; // Oculta el modal después de agregar la noticia
        });
    </script>
</body>

</html>