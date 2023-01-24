# Bugs detectados:

- Eliminación de cosas causa errores debido a las consecuencias en las relaciones. Añadir onDelete('cascade') a todo basically.

- Eliminación con SoftDeletes causa que los campos únicos den problemas.
