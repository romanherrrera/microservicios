// Obtener referencias a los elementos del formulario
const form = document.getElementById('form-ingreso'); // Asegúrate de que este ID coincida con el del formulario en HTML
const programaSelect = document.getElementById('programa');
const salaSelect = document.getElementById('sala');
const responsableSelect = document.getElementById('responsable');

// Agregar evento de envío al formulario
form.addEventListener('submit', async (event) => {
    event.preventDefault(); // Evitar que el formulario se envíe normalmente

    console.log('Enviando solicitud al backend...');

    // Obtener los valores seleccionados por el usuario
    const codigoEstudiante = document.getElementById('codigo').value;
    const nombreEstudiante = document.getElementById('nombre').value;
    const fechaIngreso = document.getElementById('fechaIngreso').value;
    const horaIngreso = document.getElementById('horaIngreso').value;
    const horaSalida = document.getElementById('horaSalida').value;
    const programaId = programaSelect.value;
    const salaId = salaSelect.value;
    const responsableId = responsableSelect.value;

    // Crear objeto con los datos a enviar al servidor
    const data = {
        codigoEstudiante: codigoEstudiante,
        nombreEstudiante: nombreEstudiante,
        fechaIngreso: fechaIngreso,
        horaIngreso: horaIngreso,
        horaSalida: horaSalida, // Incluir hora de salida
        idPrograma: programaId,
        idSala: salaId,
        idResponsable: responsableId
    };

    try {
        // Enviar los datos al servidor utilizando Fetch API
        const response = await fetch('/api/ingresos', { // URL correcta para la API
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        if (response.ok) {
            alert('Datos guardados exitosamente');
            // Realizar cualquier acción adicional después de guardar los datos
        } else {
            throw new Error('Error al guardar los datos');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Ocurrió un error al guardar los datos');
    }
});

// Cargar opciones de selección
document.addEventListener('DOMContentLoaded', async () => {
    try {
        const programaResponse = await fetch('/api/programas');
        const programas = await programaResponse.json();
        programas.forEach(programa => {
            const option = document.createElement('option');
            option.value = programa.id;
            option.textContent = programa.nombre;
            programaSelect.appendChild(option);
        });

        const salaResponse = await fetch('/api/salas');
        const salas = await salaResponse.json();
        salas.forEach(sala => {
            const option = document.createElement('option');
            option.value = sala.id;
            option.textContent = sala.nombre;
            salaSelect.appendChild(option);
        });

        const responsableResponse = await fetch('/api/responsables');
        const responsables = await responsableResponse.json();
        responsables.forEach(responsable => {
            const option = document.createElement('option');
            option.value = responsable.id;
            option.textContent = responsable.nombre;
            responsableSelect.appendChild(option);
        });
    } catch (error) {
        console.error('Error al cargar opciones:', error);
    }
});
