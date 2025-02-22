# 📚 Plataforma de Streaming de Libros 📖

## 🚀 Descripción  
Este proyecto es una plataforma de streaming de libros que permite a los usuarios descargar libros en formato **PDF**.  
La aplicación está desarrollada en **PHP, JavaScript, HTML y CSS** y utiliza **MySQL** para la gestión de datos.  

## 🛠️ Tecnologías Utilizadas  
- **Backend**: PHP  
- **Frontend**: HTML, CSS, JavaScript  
- **Base de Datos**: MySQL  

## 📥 Instalación y Configuración  

1️⃣ Clonar el repositorio  
git clone https://github.com/tu-usuario/tu-repositorio.git
cd tu-repositorio

2️⃣ Configurar la Base de Datos
Importa el archivo database.sql en MySQL.
Configura la conexión en el archivo conexion.php:
$host = "localhost";
    $user = "root";
    $pass = "";
    $db = "nombre_de_tu_BBDD";

3️⃣ Iniciar el Servidor
Si usas XAMPP, mueve el proyecto a la carpeta htdocs y accede a:
http://localhost/nombre_del_proyecto

🗄️ Estructura de la Base de Datos

-- Tabla contacto
CREATE TABLE contacto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    telefono VARCHAR(20),
    consulta TEXT NOT NULL
);

-- Tabla deseos
CREATE TABLE deseos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    isbn VARCHAR(20) NOT NULL,
    nombre VARCHAR(200) NOT NULL,
    genero VARCHAR(100) NOT NULL,
    autor VARCHAR(200) NOT NULL,
    pdf VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

-- Tabla libros
CREATE TABLE libros (
    isbn VARCHAR(20) PRIMARY KEY,
    nombre VARCHAR(200) NOT NULL,
    autor VARCHAR(200) NOT NULL,
    genero VARCHAR(100) NOT NULL,
    sinopsis TEXT NOT NULL,
    pdf VARCHAR(255) NOT NULL,
    portada VARCHAR(255) NOT NULL
);

-- Tabla usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(100) NOT NULL UNIQUE,
    pass VARCHAR(255) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    suscripcion TINYINT(1) DEFAULT 0,
    rol VARCHAR(50) NOT NULL
);

🎨 Funcionalidades
✅ Registro e inicio de sesión de usuarios.
✅ Búsqueda y descarga de libros en formato PDF.
✅ Gestión de libros y lista de deseos.
✅ Interfaz amigable y responsive.

📌 Mejoras Futuras
Integración con API de Google Books.
Sistema de recomendaciones personalizadas.
Opción de lectura en línea sin descarga.
📝 Licencia
Este proyecto es de código abierto. Puedes modificarlo y distribuirlo libremente.

📌 Autor: Sandra Rubio Sánchez
