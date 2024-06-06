document.addEventListener('DOMContentLoaded', async () => {
    const programaSelect = document.getElementById('programa');
    const salaSelect = document.getElementById('sala');
    const responsableSelect = document.getElementById('responsable');

    try {
        const programaResponse = await fetch('/backend/api/programas');
        const programas = await programaResponse.json();
        programaSelect.innerHTML = ''; // Limpiar opciones existentes
        programas.forEach(programa => {
            const option = document.createElement('option');
            option.value = programa.id;
            option.textContent = programa.nombre;
            programaSelect.appendChild(option);
        });

        const salaResponse = await fetch('/backend/api/salas');
        const salas = await salaResponse.json();
        salaSelect.innerHTML = ''; // Limpiar opciones existentes
        salas.forEach(sala => {
            const option = document.createElement('option');
            option.value = sala.id;
            option.textContent = sala.nombre;
            salaSelect.appendChild(option);
        });

        const responsableResponse = await fetch('/backend/api/responsables');
        const responsables = await responsableResponse.json();
        responsableSelect.innerHTML = ''; // Limpiar opciones existentes
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
