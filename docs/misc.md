# Problemas generales / ideas rikolinas:

- Quizás pueda haber conflictos entre algunos nombres de atributos que se repiten en distintas tablas (lang/es/validation.attributes), pero me imagino que se pueden sustituir en los sitios según sea necesario.

- Posibilidad de tener varias credenciales de pago (varios pago movil, varios datos de transferencia)

- Posible rol de secretaria (preguntar a Edeblangel).

- Realmente no sé si sea conveniente poner lo de "after:now" en las reglas de validación de fechas de curso, por ahora no lo pondré.

- Depurar el css al final del proyecto.

- Añadir slugs.

- Sistema de notificaciones.

- También ocurre que los cursos y clubes podrían tener horario distintos en diferentes días de la semana. Una solucion es implementar lo del horario de forma mas compleja, con Drag'n Drop maybe.

- Pensar un poco en la naturaleza concurrente del proyecto, y errores que pueden haber y tal.

- También está la cuestión de recuperación de base de datos, me dijeron que con "tarea programada", hay que investigar.

- Quizás sea mejor hacer diferentes las rutas de la matrícula para cada estado de curso. Pero habría que ver si vale la pena.

- Revisar el proceso de inscripción en un curso y ver que se puede optimizar, si es posible que no sea tan JS. O por el contrario, hacerlo full JS con Ajax. También me molesta un poco semánticamente hablando que en la ruta de Enrollment@create se cree el pago, porque en sí para crear la inscripción se necesita crear el pago. Quizás separar en múltiples rutas o no sé.

- Crear una opción para recuperar cupos expirados y ya pagados, con notificación al usuario de que su cupo expiro y que si ya pago haga contacto con el Departamento, y restauración del cupo por el admin (de ser necesario se modifica el student_limit del cursoi).
