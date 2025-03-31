# Modificaciones Actividad 9

## Almacenamiento local para imagenes
Se modifico la vista de un nuevo registro para subir archivos.
Modificación en el controlador para guardar las imagenes en storage/app/public/superheroes
Se genera un enlace simbólico con php artisan storage


## Borrados logicos (soft deletes):
Se modifica la tabla superheroes con la columna deleted_at.
Se modifica el modelo para que maneje la función de Laravel SofDelete.
Se usa forceDelete para eliminar permanentemente un registro.


## Mostrar registros activos:
La opción SoftDeletes filtra automáticamente los registros eliminados con el valor de la columna deleted_at.
La vista index solo muestra los registros con un valor de null en la tabla.


## Vista de registros eliminados:
Creación de la vista trashed.blade.php para mostrar registros eliminados.
Dentro de la vista se agrega opción para borrar permanentemente.
