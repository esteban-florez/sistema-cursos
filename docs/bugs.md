# Bugs detectados:

- Que pasa si estás en la última página de una paginación, y "desapareces" (borrar o editar), todos los elementos de esa página? Pues puede suceder que te quedas con la página vacía xD. Hasta ahora solo me apareció en pagos por verificar debido su redirect()->back()

- Sucede que cuando borras un registro de inscriptions debido a que expiro la inscripción, al ser "soft deleted", se mantiene el campo único y el estudiante no puede intentar volver a registrarse en el curso.

- Los correos de reseteo de contraseña no funcionan con instructores.

- Las "x" de las alertas están chuecas.