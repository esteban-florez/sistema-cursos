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
- Añadir slugs.

# Cosas mas como de arquitectura que hay que decidir/solucionar:

- Arreglar el hecho de que un ciclo esté linkeado a un curso, hace que dicho ciclo pueda cambiar parte de sus datos cuando sea editado dicho curso:
  - Opción 1: hacer que el ciclo no tenga el id del curso, sino que tome todos sus datos dentro de su propia tabla. Lo chimbo es la duplicación de información.
  - Opción 2: hacer que el ciclo tenga el id del curso, y al momento de finalizar se mueva el ciclo a una tabla de ciclos finalizados, teniendo en ese caso si los datos del curso. Igual se duplica la info, pero un poquititititito menos.
  - Opción 3: se me está ocurriendo buscar un mecanismo para que la referencia del ciclo finalizado al curso, *detecte* el cambio en el curso al que referencia y cree un registro con los datos anteriores al cambio, para así mantener sus datos originales. O algo así.

- También ocurre que los cursos y clubes podrían no ser solamente un día a la semana, sino multiples, y cada día quizas tendría horas propias. Una solucion es implementar lo del horario de forma mas compleja, con Drag'n Drop maybe.

- Pensar un poco en la naturaleza concurrente del proyecto, y errores que pueden haber y tal.

- También está la cuestión de recuperación de base de datos, me dijeron que con "tarea programada", hay que investigar.