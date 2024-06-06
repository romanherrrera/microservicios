document.addEventListener('DOMContentLoaded', async () => {
    const programaSelect = document.getElementById('programa');
    const salaSelect = document.getElementById('sala');
    const responsableSelect = document.getElementById('responsable');

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

const form = document.getElementById('form-ingreso');
form.addEventListener('submit', async (event) => {
    event.preventDefault();

    const data = {
        codigoEstudiante: document.getElementById('codigo').value,
        nombreEstudiante: document.getElementById('nombre').value,
        fechaIngreso: document.getElementById('fechaIngreso').value,
        horaIngreso: document.getElementById('horaIngreso').value,
        idPrograma: document.getElementById('programa').value,
        idSala: document.getElementById('sala').value,
        idResponsable: document.getElementById('responsable').value
    };

    try {
        const response = await fetch('/api/ingresos', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        if (response.ok) {
            alert('Ingreso registrado correctamente');
        } else {
            throw new Error('Error al registrar el ingreso');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Ocurrió un error al registrar el ingreso');
    }
});

