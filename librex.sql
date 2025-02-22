-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2025 a las 17:45:10
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `librex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `edad` int(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `consulta` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`nombre`, `correo`, `edad`, `telefono`, `consulta`) VALUES
('Sandra', 'sandra@gmail.com', 35, '722192843', 'Esto es una consulta de prueba'),
('Sandra', 'sandra@gmail.com', 33, '722192843', 'Una consulta mandada desde el usuario de Pepita'),
('adasd', 'sandra@gmail.com', 33, '722192843', 'Esto es la consulta enviada desde el admin'),
('asd', 'sandra@gmail.com', 33, '722192843', '23e432'),
('asdasd', 'sandra@gmail.com', 33, '722192843asdasd', 'asdsad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deseos`
--

CREATE TABLE `deseos` (
  `id_usuario` varchar(50) NOT NULL,
  `isbn` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `pdf` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `deseos`
--

INSERT INTO `deseos` (`id_usuario`, `isbn`, `nombre`, `genero`, `autor`, `pdf`) VALUES
('1', 2147483647, 'Una corte de hielo y cenizas', 'Romance', 'LJ Andrews', 'Una_corte_de_hielo_y_cenizas.pdf'),
('2', 2147483647, 'Boda de sangre', 'Drama', 'Nanda Gaef', 'Boda_de_sangre.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `isbn` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `sinopsis` varchar(800) NOT NULL,
  `pdf` varchar(50) NOT NULL,
  `portada` varchar(50) NOT NULL,
  `tiempo` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`isbn`, `nombre`, `autor`, `genero`, `sinopsis`, `pdf`, `portada`, `tiempo`) VALUES
('9786070700242', 'La clase envenenada', 'Thomas Brezina', 'Misterio', 'En esta intrigante novela, Thomas Brezina nos lleva a una escuela donde los alumnos de una clase empiezan a enfermar misteriosamente. Nadie sabe quién o qué está detrás de estos incidentes. La protagonista, junto con sus amigos, decide investigar por su cuenta, enfrentándose a secretos oscuros y peligros inesperados. A medida que avanzan en su investigación, descubren que hay mucho más en juego de lo que inicialmente parecía, y se encuentran en una carrera contra el tiempo para detener al culpab', 'La_clase_envenenada.pdf', 'La_clase_envenenada.jpg', '2024-05-21 17:38:45.000000'),
('9781643605011', 'Boda de sangre', 'Nanda Gaef', 'Drama', 'Boda de sangre\" de Nanda Gaef es una novela que narra la intensa y complicada historia de amor entre los protagonistas, marcada por secretos, traiciones y pasiones desbordadas. La trama se desarrolla en un entorno en el que las relaciones familiares y las expectativas sociales juegan un papel crucial, complicando aún más el romance central. A través de giros inesperados y profundos conflictos emocionales, la novela explora temas de lealtad, sacrificio y el poder del amor para superar obstáculos ', 'Boda_de_sangre.pdf', 'Boda_de_sangre.jpg', '2024-05-21 17:38:40.000000'),
('9788418002225', 'Una corte de hielo y cenizas', 'LJ Andrews', 'Romance', 'En esta emocionante novela de fantasía, LJ Andrews nos sumerge en un mundo donde los reinos están en conflicto y la magia es una fuerza omnipresente. La historia sigue los pasos de una valiente protagonista que se ve arrastrada a un torbellino de intriga política y batallas épicas mientras lucha por proteger a su pueblo y descubrir la verdad sobre su propio destino. Con personajes complejos, un romance apasionado y un telón de fondo ricamente detallado, \"Un corte de hielo y cenizas\" es una lectu', 'Una_corte_de_hielo_y_cenizas.pdf', 'Una_corte_de_hielo_y_cenizas.jpg', '2024-05-21 17:38:45.000000'),
('9788417390162', 'La jaula de suenos', 'Rebecca Schaeffer', 'Thriller', 'Jaula de suelos\" es una novela que fusiona el suspenso del thriller con elementos de fantasía oscura. La historia sigue a una joven llamada Nita, quien vive en un mundo donde las almas pueden ser vendidas en el mercado negro. Después de ser asesinada, Nita despierta en un lugar llamado Orquídea, un purgatorio sombrío donde se encuentra atrapada en un ciclo de muerte y resurrección. Decidida a romper este ciclo y vengarse de aquellos que la han usado como mercancía, Nita se embarca en una peligro', 'La_jaula_de_suenos.pdf', 'La_jaula_de_suenos.jpg', '2024-05-21 17:38:45.000000'),
('9788416764593', 'Resiliencia', 'Jasmin Martinez', 'Autoayuda', '\"Resiliencia\", de Jasmin Martinez, es una guía práctica que explora cómo superar desafíos y desarrollar fortaleza emocional en tiempos difíciles. A través de ejercicios, reflexiones y consejos útiles, la autora proporciona herramientas para fortalecer la resiliencia y encontrar la fuerza interior necesaria para enfrentar situaciones adversas. Con historias inspiradoras y estrategias efectivas, este libro ofrece un camino hacia la recuperación y el crecimiento personal, ayudando a los lectores a ', 'Resiliencia.pdf', 'Resiliencia.jpg', '2024-05-21 17:38:45.000000'),
('9788423365289', 'El hombre sin rostro', 'Claudio Cerdán', 'Novela negra', 'Para un padre no hay mayor dolor que perder a un hijo. Y Roberto Cusac lo sabe bien: bastaron unos segundos para que Jaime desapareciera de un parque infantil sin dejar rastro. Años más tarde, en un intento por redimir su culpa, entra a trabajar como investigador privado en una fundación de personas desaparecidas junto con Inés Herrera, su esposa, quien se encarga de la parte legal. Tienen otro hijo, que ha crecido a la sombra de un hermano al que nunca conoció, pero que continúa presente en la ', 'El_hombre_sin_rostro.pdf', 'El_hombre_sin_rostro.jpg', '2024-05-21 17:38:45.000000'),
('9788401030673', 'El museo', 'Owen King', 'Fantasia', 'Para la joven Dora, una asistenta en la universidad, la revolución trae consigo la liberación. Pasa a frecuentar la compañía de uno de los estudiantes más radicales, Robert, y al fin puede investigar lo que le sucedió a Ambrose, su hermano, en el Instituto de Investigación Psíquica justo antes de morir.  No obstante, a Dora se le encarga cuidar de otra institución, el Museo de los Trabajadores: un extraño y olvidado edificio ocupado por figuras de cera de mineros, enfermeras, dependientes...', 'El_museo.pdf', 'El_museo.jpg', '2024-05-21 17:38:45.000000'),
('9798869194787', 'The Art Of Avoiding Your Werewolf', 'Lola Glass', 'Fantasia', 'Casi me acuesto con un hombre lobo... pero antes de que llegáramos a la tercera base, me arrastró a la cárcel.  Aparentemente, es el líder de la manada en la ciudad.  El hecho de que soy una loba de sangre ilegal, una híbrida de vampiro/hombre lobo, no ayuda a mi caso.  Y tampoco le gustó que lo mordiera accidentalmente mientras nos besábamos.  Por suerte, o por desgracia, parece creer que soy su verdadera compañera, lo que significa que no dejará que nadie me lastime.  Pero tampoco me dejará ir', 'The_Art_Of_Avoiding_Your_Werewolf.pdf', 'The_Art_Of_Avoiding_Your_Werewolf.jpg', '2024-05-21 17:38:45.000000'),
('9788412723786', 'Mareas tormentosas', 'Val E Lane', 'Fantasia', 'Katrina Delmar no tiene ni idea de que Milo, el encantador chico que conoció en una fiesta universitaria, murió en el mar hace trescientos años. Solo que se siente atraída hacia él desde el primer momento en que lo vio… al igual que con el misterioso Bellamy, cuyo atractivo es difícil de resistir. Pero enamorarse de piratas no muertos es la menor de sus preocupaciones… Cuando el despiadado capitán del barco pirata descubre que Katrina puede tener la llave para romper la maldición de su tripulaci', 'Mareas_tormentosas.pdf', 'Mareas_tormentosas.jpg', '2024-05-21 17:38:50.000000'),
('9788417247053', 'Para verte mejor', 'Lena Valenti', 'Romance', '\"Para verte mejor\" es una apasionante novela que combina romance y suspense. La historia sigue a Aurora Ríos, una joven que vive en un tranquilo pueblo costero. Sin embargo, su vida da un giro inesperado cuando se convierte en la principal testigo de un asesinato. Mientras intenta reconstruir su vida y superar el trauma, conoce a Elías, un misterioso y atractivo hombre con un pasado oscuro. A medida que Aurora y Elías se acercan, los secretos y peligros que los rodean se intensifican, y ambos de', 'Para_verte_mejor.pdf', 'Para_verte_mejor.jpg', '2024-05-21 17:38:50.000000'),
('9788408135874', 'Todas las hadas del reino', 'Laura Gallego', 'Fantasia', 'Camelia es un hada madrina que lleva trescientos años ayudando con gran eficacia a jóvenes doncellas y a aspirantes a héroe para que alcancen sus propios finales felices. Su magia y su ingenio nunca le han fallado, pero todo empieza a complicarse cuando le encomiendan a Simón, un mozo de cuadra que necesita su ayuda desesperadamente. Camelia ha solucionado casos más difíciles; pero, por algún motivo, con Simón las cosas comienzan a torcerse de forma inexplicable...', 'Todas_las_hadas_del_reino.pdf', 'Todas_las_hadas_del_reino.jpg', '2024-05-21 17:38:50.000000'),
('9798879432435', 'Todos mis silencios', 'Carlos Carvajal', 'Autobiografia', 'La mayoría de los días del 2023 fueron hermosamente catastróficos, muchas veces pasaron cosas que no tenía planeada y otras sucedieron de la manera que no esperaba.  Así que tuve una idea para salir de mi realidad y así salir del océano de mi desesperación. Decidí saltarme la medianoche y todas esas pesadillas para sumergirme por horas en atardeceres morados con mi mejor amigo. Corazones rotos, lazos rotos y otros indestructibles, enamoramientos prohibidos y algunos finales un poco agridulces.  ', 'Todos_mis_silencios.pdf', 'Todos_mis_silencios.jpg', '2024-05-21 17:38:50.000000'),
('9788419501660', 'El rey oscuro', 'Jessica Rivas', 'Fantasia', 'Alayna ya no está. Tras casi perder la vida, Luca Vitale se encuentra solo y abandonado. Pero, aun así, es incapaz de olvidarla. El recuerdo de la mariposa negra es lo que lo ayuda a seguir adelante, incluso sin saber qué ha sido de ella. Sumido en un mundo de oscuridad, tendrá que tomar las decisiones más difíciles de su vida.  ¿Elegirá el deber antes que el deseo? ¿El poder antes que la felicidad? Y lo más importante... ¿El amor antes que la familia?  Descubre el explosivo desenlace de la historia', 'El_rey_oscuro.pdf', 'El_rey_oscuro.jpg', '2024-05-21 17:38:50.000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripciones`
--

CREATE TABLE `suscripciones` (
  `id` varchar(50) NOT NULL,
  `suscripcion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `suscripcion` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pass`, `correo`, `suscripcion`, `rol`) VALUES
('1', 'sandra', '1234', 'sandra@gmail.com', 'none', 'admin'),
('2', 'eduardo', '123456', 'eduardo@gmail.com', 'basico', 'normal'),
('3', 'encarna', '2345', 'encarna@gmail.com', '', 'normal');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
