document.addEventListener('DOMContentLoaded', function() {
    const ingresoForm = document.getElementById('ingresoForm');

    ingresoForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const codigoEstudiante = document.getElementById('codigoEstudiante').value;
        const nombreEstudiante = document.getElementById('nombreEstudiante').value;
        const idPrograma = document.getElementById('programa').value;
        const fechaIngreso = document.getElementById('fechaIngreso').value;
        const horaIngreso = document.getElementById('horaIngreso').value;
        const idSala = document.getElementById('sala').value;
        const idResponsable = document.getElementById('responsable').value;

        const ingreso = {
            codigoEstudiante,
            nombreEstudiante,
            idPrograma,
            fechaIngreso,
            horaIngreso,
            idSala,
            idResponsable
        };

        fetch('http://localhost:8000/api/ingresos', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(ingreso)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Aquí podrías actualizar la lista de ingresos
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    // Función para cargar los ingresos del día actual
    function cargarIngresos() {
        fetch('http://localhost:8000/api/ingresos')
            .then(response => response.json())
            .then(data => {
                const ingresosDiv = document.getElementById('ingresos');
                ingresosDiv.innerHTML = '';
                data.forEach(ingreso => {
                    const ingresoItem = document.createElement('div');
                    ingresoItem.textContent = `${ingreso.codigoEstudiante} - ${ingreso.nombreEstudiante} - ${ingreso.fechaIngreso} - ${ingreso.horaIngreso}`;
                    ingresosDiv.appendChild(ingresoItem);
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    cargarIngresos();
});
