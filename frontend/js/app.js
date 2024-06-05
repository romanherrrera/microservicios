document.addEventListener("DOMContentLoaded", function() {
    // Obtener referencias a los elementos del DOM
    const formIngreso = document.getElementById('form-ingreso');
    const programaSelect = document.getElementById('programa');
    const salaSelect = document.getElementById('sala');
    const responsableSelect = document.getElementById('responsable');
    const resultsTableBody = document.getElementById('results-table').getElementsByTagName('tbody')[0];
    const baseUrl = 'http://localhost:8000/api'; // URL base de la API

    // Cargar datos de programas, salas y responsables
    fetch(`${baseUrl}/programas`)
        .then(response => response.json())
        .then(data => populateSelect(programaSelect, data))
        .catch(error => console.error('Error:', error));

    fetch(`${baseUrl}/salas`)
        .then(response => response.json())
        .then(data => populateSelect(salaSelect, data))
        .catch(error => console.error('Error:', error));

    fetch(`${baseUrl}/responsables`)
        .then(response => response.json())
        .then(data => populateSelect(responsableSelect, data))
        .catch(error => console.error('Error:', error));

    // Función para rellenar un select con datos
    function populateSelect(select, data) {
        console.log(`Populating select ${select.id} with data`, data); // Depuración
        select.innerHTML = ''; // Limpiar opciones existentes
        data.forEach(item => {
            const option = document.createElement('option');
            option.value = item.id;
            option.text = item.nombre;
            select.add(option);
        });
    }

    // Registrar ingreso
    formIngreso.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(formIngreso);
        const data = Object.fromEntries(formData.entries());

        console.log('Submitting data:', data); // Depuración

        fetch(`${baseUrl}/ingresos`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            alert('Ingreso registrado con éxito');
            formIngreso.reset();
            loadIngresosToday(); // Recargar ingresos del día
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    // Cargar ingresos del día actual
    function loadIngresosToday() {
        const today = new Date().toISOString().split('T')[0]; // Obtener fecha actual en formato YYYY-MM-DD
        fetch(`${baseUrl}/ingresos?date=${today}`)
            .then(response => response.json())
            .then(data => {
                populateResultsTable(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    // Función para rellenar la tabla de resultados
    function populateResultsTable(data) {
        resultsTableBody.innerHTML = ''; // Limpiar tabla

        data.forEach(item => {
            const row = resultsTableBody.insertRow();

            const cellCodigo = row.insertCell(0);
            const cellNombre = row.insertCell(1);
            const cellPrograma = row.insertCell(2);
            const cellFechaIngreso = row.insertCell(3);
            const cellHoraIngreso = row.insertCell(4);
            const cellHoraSalida = row.insertCell(5);
            const cellSala = row.insertCell(6);
            const cellResponsable = row.insertCell(7);

            cellCodigo.innerText = item.codigoEstudiante;
            cellNombre.innerText = item.nombreEstudiante;
            cellPrograma.innerText = item.programa.nombre;
            cellFechaIngreso.innerText = item.fechaIngreso;
            cellHoraIngreso.innerText = item.horaIngreso;
            cellHoraSalida.innerText = item.horaSalida || '';
            cellSala.innerText = item.sala.nombre;
            cellResponsable.innerText = item.responsable.nombre;
        });
    }

    // Inicializar la carga de ingresos del día
    loadIngresosToday();
});
