# Bugs detectados:

- Que pasa si estás en la última página de una paginación, y "desapareces" (borrar o editar), todos los elementos de esa página? Pues puede suceder que te quedas con la página vacía xD. Hasta ahora solo me apareció en pagos por verificar debido su redirect()->back()

- Eliminación de cosas causa errores debido a las consecuencias en las relaciones. Añadir onDelete('cascade') a todo basically.

- Eliminación con SoftDeletes causa que los campos únicos den problemas.

 - Los errores de validación de contraseñas no están traducidos.

### Bugs roles-revamp

- Cuando creas un área de formación desde un formulario con select de areas, se pierden los datos que ya has metido hasta ese momento.
