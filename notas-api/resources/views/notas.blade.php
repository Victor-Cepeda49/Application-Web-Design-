<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Notas Personales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h1 class="mb-4 text-center">Notas Personales</h1>

    <!-- Formulario de nueva nota -->
    <form id="notaForm" class="mb-5">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Autor</label>
                <input type="text" class="form-control" id="autor" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Fecha y hora</label>
                <input type="datetime-local" class="form-control" id="fecha_hora" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Clasificación</label>
                <select class="form-select" id="clasificacion" required>
                    <option value="personal">Personal</option>
                    <option value="laboral">Laboral</option>
                    <option value="escolar">Escolar</option>
                </select>
            </div>
            <div class="col-12 mb-3">
                <label class="form-label">Cuerpo</label>
                <textarea class="form-control" id="cuerpo" rows="3" required></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Nota</button>
    </form>

    <h2 class="mb-3">Listado de Notas</h2>
    <div id="notasList" class="row"></div>

    <!-- Modal para editar nota -->
    <div class="modal fade" id="editarNotaModal" tabindex="-1" aria-labelledby="editarNotaModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form id="editarNotaForm">
            <div class="modal-header">
              <h5 class="modal-title" id="editarNotaModalLabel">Editar Nota</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
              <input type="hidden" id="editId">
              <div class="mb-3">
                  <label class="form-label">Título</label>
                  <input type="text" class="form-control" id="editTitulo" required>
              </div>
              <div class="mb-3">
                  <label class="form-label">Autor</label>
                  <input type="text" class="form-control" id="editAutor" required>
              </div>
              <div class="mb-3">
                  <label class="form-label">Fecha y hora</label>
                  <input type="datetime-local" class="form-control" id="editFecha" required>
              </div>
              <div class="mb-3">
                  <label class="form-label">Cuerpo</label>
                  <textarea class="form-control" id="editCuerpo" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                  <label class="form-label">Clasificación</label>
                  <select class="form-select" id="editClasificacion" required>
                      <option value="personal">Personal</option>
                      <option value="laboral">Laboral</option>
                      <option value="escolar">Escolar</option>
                  </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Guardar cambios</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS y lógica de interacción -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Crear nueva nota
        document.getElementById('notaForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const nota = {
                titulo: document.getElementById('titulo').value,
                autor: document.getElementById('autor').value,
                fecha_hora: document.getElementById('fecha_hora').value,
                cuerpo: document.getElementById('cuerpo').value,
                clasificacion: document.getElementById('clasificacion').value
            };
            const response = await fetch('/api/notas', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(nota)
            });
            if (response.ok) {
                alert('Nota guardada correctamente');
                location.reload();
            } else {
                alert('Error al guardar');
            }
        });

        // Mostrar notas
        async function cargarNotas() {
            const response = await fetch('/api/notas');
            const notas = await response.json();
            const contenedor = document.getElementById('notasList');
            contenedor.innerHTML = '';

            notas.forEach(nota => {
                const div = document.createElement('div');
                div.className = 'col-md-4 mb-3';
                div.innerHTML = `
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">${nota.titulo}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">${nota.autor}</h6>
                            <p class="card-text">${nota.cuerpo}</p>
                            <small class="text-muted">${nota.fecha_hora}</small><br>
                            <span class="badge bg-info">${nota.clasificacion}</span><br><br>
                            <button class="btn btn-sm btn-warning" onclick='cargarNotaEditar(${JSON.stringify(nota)})' data-bs-toggle="modal" data-bs-target="#editarNotaModal">Editar</button>
                        </div>
                    </div>
                `;
                contenedor.appendChild(div);
            });
        }

        // Cargar nota al modal
        function cargarNotaEditar(nota) {
            document.getElementById('editId').value = nota.id;
            document.getElementById('editTitulo').value = nota.titulo;
            document.getElementById('editAutor').value = nota.autor;
            document.getElementById('editFecha').value = nota.fecha_hora;
            document.getElementById('editCuerpo').value = nota.cuerpo;
            document.getElementById('editClasificacion').value = nota.clasificacion;
        }

        // Enviar actualización
        document.getElementById('editarNotaForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const id = document.getElementById('editId').value;
            const nota = {
                titulo: document.getElementById('editTitulo').value,
                autor: document.getElementById('editAutor').value,
                fecha_hora: document.getElementById('editFecha').value,
                cuerpo: document.getElementById('editCuerpo').value,
                clasificacion: document.getElementById('editClasificacion').value
            };

            const response = await fetch(`/api/notas/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(nota)
            });

            if (response.ok) {
                alert('Nota actualizada correctamente');
                location.reload();
            } else {
                alert('Error al actualizar la nota');
            }
        });

        // Inicializar carga
        cargarNotas();
    </script>
</body>
</html>
