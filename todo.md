# Cosas por hacer/bugs por corregir.

- Cuando toooodo este listo, ver cada una de las cosas que están en layout, y si alguna se usa en solo un archivo, sacarla a un archivo aparte. Igual en listados.
- Si es posible, mejorar la interfaz de artículos.
- Rework a pagos, con dos tabs tanto en admin como en user, y no se si en instructor.
- Bug de "registro.html".
- Decidir nomenclatura e idioma para atributos "id, name, value", y verificar los required y placeholders donde van. En resumen, revisar todos los form.
- Clase "text" en algunas "p" de los sidebar que no hace nada.
- Agregar "ascen/descen" en ordenar por.
- Ver donde coño ponemos el link hacia el registro de áreas de formación.
- Agregar "name" a las barras de busqueda.
- Hacer que los "label" tengan fw-normal por defecto. Cambiar todos.
- Decidir donde poner el link a los ciclos finalizados. 
- Margenes y responsive en filtros de algunas paginas.
- Quitar el link de Eventos de todos los sidebar.
- Poner data-search en los select que necesiten.
- Revisar los title de cada pagina.
- Agregar link a añadir profesores en registro curso
- Decidir lo de las table-hover
- Clase "thead-dark" en todos los thead
- Rows con col-12 y mas nada adentro en algunas interfaces de tablas.
- Paginaciones que faltan en ciertas interfaces
- Actualizar sidebar con todos los links necesarios.
- Quitar "inscripciones" de los detalles de club.
- Cambiar "expediente.html" de singular a plural (en todo).
- Agregar aviso de hacer click para ver detalle de expediente en "expedientes.html".
- Cambiar "materiales" por "artículos" en historial.html
- Ver donde es necesario poner botones de "volver" y así.
- Artículos se quita el codigo.
- Interfaz de inventario, que tenga todos, un link dentro de Sidebar->Clubes->Inventarios.
- Pagos con collapse (mirian).

# Problemas generales / ideas rikolinas:

- Depurar el css al final del proyecto.

- Añadir slugs.

- ¿Cuando borras un registro, que pasa con sus registros relacionados?

- También ocurre que los cursos y clubes podrían no ser solamente un día a la semana, sino multiples, y cada día quizas tendría horas propias. Una solucion es implementar lo del horario de forma mas compleja, con Drag'n Drop maybe.

- Pensar un poco en la naturaleza concurrente del proyecto, y errores que pueden haber y tal.

- También está la cuestión de recuperación de base de datos, me dijeron que con "tarea programada", hay que investigar.

- Quizas hagamos tables y modelos pivot para facilitar la relación de pagos-cursos-estudiantes-matriculas. (Relacion no binaria).

- Quizás sea innecesario tener los set y los enum en inglés en la base de datos, podríamos ponerlos de una en español y con el formato listo para mostrar, así nos ahorraríamos arrays asociativos de traducción y tal. Realmente para esto sería bueno un Enum de PHP pero no existen en esta versión xd.

- Hacer diferentes las rutas de la matrícula para cada estado de curso.

# Correciones Anyerg:

## Myriam:

- Hacer hoja con datos reales para hacer los registros el día de la presentación.

## Esteban: 

- Meter un precio del dolar farso pa la presentación porque weno, no va a haber internet (probar alla).
- Bug en edición de cosa con fechas, horas y días. Pasar todo a casts de dates.
- Terminar el perfil, tanto de estudiante como instructor.

## Tareas a largo plazo:

- Correciones de la interfaz que mandó la profe de proyecto.
- Hacer las breadcrumbs.
- Hacer tabla de roles de usuario. Poner los que sean necesarios, y luego dejar lo demás a "actualizaciones" (lol).
- Hacer sistema de permisos, después de la creación de usuario el admin selecciona con una interfaz los permisos de dicho usuario.
- Crear rol de preparador, posible rol de secretaria.
- Traducir los errores de validación. Y mejorar como se muestran en algunas vistas.
- Cursos y clubes en perfil.
- Correos con Gmail.

## Indicaciones generales:

- Hacer que se pueda hacer una reservación de curso, con monto de reservación. Tiempo para formalizar inscripción y finalizar pago. El monto de reservación es opcional en caso de pagos completos (hay que convencer a Edeblangel de esto xd).

- Se deben mostrar el estado de inscripción en matrícula (reservado, inscrito). Que el sistema liberar el cupo reservado si no se ha confirmado la inscripción en un tiempo, preguntar a Edeblangel el tiempo antes de liberar un cupo reservado.

- Para los certificados: si el curso no es ligado a un PNF firma el instructor y firma el coordinador del DVS. Cuando es ligado a un PNF firman el instructor, la rectora y firma el jefe de departamento del PNF.

- El proceso de inventario depende los artículos, al no tratarse de consumibles inmediatos sino con el tiempo, deberían registrarse en el inventario ingresos de artículos y "desincorporación" de artículo. Un solo inventario, del DVS.

- Fecha de adquisición, fecha de desincorporación y el por qué de la desincorporación del artículo. Lo cual nos lleva a un estado actual de inventario, y a un historial de inventario.

- El inventario sale un préstamo a los clubs, y se liga al responsable del mismo ya sea instructor o preparador. Control de prestamos.