# Cosas a tener en cuenta:

- Quizás pueda haber conflictos entre algunos nombres de atributos que se repiten en distintas tablas (lang/es/validation.attributes), pero me imagino que se pueden sustituir en los sitios según sea necesario.

- Posibilidad de tener varias credenciales de pago (varios pago movil, varios datos de transferencia)

- Posible rol de secretaria (preguntar a Edeblangel).

- Realmente no sé si sea conveniente poner lo de "after:now" en las reglas de validación de fechas de curso, por ahora no lo pondré.

- También ocurre que los cursos y clubes podrían tener horario distintos en diferentes días de la semana. Una solucion es implementar lo del horario de forma mas compleja, con Drag'n Drop maybe.

- Pensar un poco en la naturaleza concurrente del proyecto, y errores que pueden haber y tal.

- También está la cuestión de recuperación de base de datos, me dijeron que con "tarea programada", hay que investigar.

- Crear una opción para recuperar cupos expirados y ya pagados, con notificación al usuario de que su cupo expiro y que si ya pago haga contacto con el Departamento, y restauración del cupo por el admin (de ser necesario se modifica el student_limit del curso).
