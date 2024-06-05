// Obtener referencias a los elementos del formulario
const form = document.getElementById('formulario');
const programaSelect = document.getElementById('programa');
const salaSelect = document.getElementById('sala');
const responsableSelect = document.getElementById('responsable');

// Agregar evento de envío al formulario
form.addEventListener('submit', async (event) => {
    event.preventDefault(); // Evitar que el formulario se envíe normalmente

    // Obtener los valores seleccionados por el usuario
    const programaId = programaSelect.value;
    const salaId = salaSelect.value;
    const responsableId = responsableSelect.value;

    // Crear objeto con los datos a enviar al servidor
    const data = {
        idPrograma: programaId,
        idSala: salaId,
        idResponsable: responsableId
        // Agrega otros campos del formulario aquí si es necesario
    };

    try {
        // Enviar los datos al servidor utilizando Fetch API
        const response = await fetch('/guardar-datos', {
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
