
const API_KEY = '$2a$10$AIjaA8Tho0hI8s8uxoMEBOfgSlgXj0TVHwaK0uHEPIIUe8zuDBISe';  // Reemplaza con tu clave de API
const BIN_ID = '664bba2cad19ca34f86c91ba';    // Reemplaza con el ID de tu bin

console.log("Tira")

// Función para obtener los datos actuales del bin
async function getJsonData() {
    try {
        const response = await fetch(`https://api.jsonbin.io/v3/b/664bba2cad19ca34f86c91ba`, {
            method: 'GET',
            headers: {
                'X-Master-Key': '$2a$10$8Ls7wNx8qPs98jugz8slSeaydaYTVGx6/Ctqlk7FhMuYPNKF4nNNu'
            }
        });
        if (!response.ok) {
            throw new Error(`Error al obtener los datos: ${response.statusText}`);
        }
        const data = await response.json();
        return data.record;
    } catch (error) {
        console.error('Error en getJsonData:', error);
    }
}

// Función para actualizar los datos en el bin
async function updateJsonData(newData) {
    console.log(newData)
    try {
        const response = await fetch(`https://api.jsonbin.io/v3/b/664bba2cad19ca34f86c91ba`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-Master-Key': '$2a$10$8Ls7wNx8qPs98jugz8slSeaydaYTVGx6/Ctqlk7FhMuYPNKF4nNNu'
            },
            body: JSON.stringify({ record: newData })
        });
        if (!response.ok) {
            throw new Error(`Error al actualizar los datos: ${response.statusText}`);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error en updateJsonData:', error);
    }
}

// Función para obtener los datos de la base de datos desde el script PHP
async function getLibrosData() {
    try {
        const response = await fetch('./obtenerLibros.php');
        if (!response.ok) {
            throw new Error(`Error al obtener los datos de libros: ${response.statusText}`);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error en getLibrosData:', error);
    }
}

// Función para manejar el evento de clic en el botón de actualización
async function handleUpdateButtonClick() {
    try {
        // Obtener los datos de la base de datos
        const librosData = await getLibrosData();
        console.log('Datos de la base de datos:', librosData);

        // Verificar si hay datos de libros
        if (!librosData || librosData.length === 0) {
            throw new Error('No se obtuvieron datos de la base de datos');
        }

        // Actualizar los datos en el bin con los datos obtenidos de la base de datos
        const updatedData = await updateJsonData(librosData);
        console.log('Datos actualizados en json.bin:', updatedData);
    } catch (error) {
        console.error('Error en el proceso:', error);
    }
}

// Obtener referencia al botón de actualización
const actualizarBtn = document.getElementById('actualizarBtn');

// Agregar evento de clic al botón de actualización
actualizarBtn.addEventListener('click', handleUpdateButtonClick);
