const form = document.getElementById('form-ingreso');
const programaSelect = document.getElementById('programa');
const salaSelect = document.getElementById('sala');
const responsableSelect = document.getElementById('responsable');


form.addEventListener('submit', async (event) => {
    event.preventDefault(); 

    console.log('Enviando solicitud al backend...');

  
    const codigoEstudiante = document.getElementById('codigo').value;
    const nombreEstudiante = document.getElementById('nombre').value;
    const fechaIngreso = document.getElementById('fechaIngreso').value;
    const horaIngreso = document.getElementById('horaIngreso').value;
    const horaSalida = document.getElementById('horaSalida').value;
    const programaId = programaSelect.value;
    const salaId = salaSelect.value;
    const responsableId = responsableSelect.value;


    const data = {
        codigoEstudiante: codigoEstudiante,
        nombreEstudiante: nombreEstudiante,
        fechaIngreso: fechaIngreso,
        horaIngreso: horaIngreso,
        horaSalida: horaSalida,
        idPrograma: programaId,
        idSala: salaId,
        idResponsable: responsableId
    };

    try {
        const response = await fetch('/ingresos', { 
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        if (response.ok) {
            alert('Datos guardados exitosamente');
        } else {
            throw new Error('Error al guardar los datos');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Ocurrió un error al guardar los datos');
    }
});

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
