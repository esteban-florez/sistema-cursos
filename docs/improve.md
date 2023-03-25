# Cosas que es opcional mejorar

1. Mover lógica a una clase de componente

2. Añadir búsqueda de estudiantes.

3. Renombrar accesor a getConfirmation

4. Almacenar respuesta en cache para optimizar.

5. Un archivo de JavaScript aparte que haga eso mismo para todos los input type number xD.

- En "public/js/charts/" y en "ChartController" se puede hacer una cantidad insana de DRY y mejorar los algoritmos porque ahorita son O(n2) 

- Marcar notificaciones leídas con AJAX.

- Mejoras de formularios con JavaScript en el Frontend (validación, comodidad, formatos).

- En pagos, renombrar "tipo" a "método", y "categoría" a "tipo".

- Quizás sea mejor semánticamente poner CourseEnrollmentController@index en vez de EnrollmentController@index, no se. 

- En todos los filtros, hay que mejorar un poco el HTML, en el sentido de que se repite mucho al momento de la implementación, casi todo se pasa por slots, hay que hacerlo más DRY.

- Los componentes de seleccionar opciones, cuyas opciones pueden venir desde
una tabla, se podría hacer que tengan una clase propia de componente, y que ellos mismos agarren su info, ademas que este bicho tiene demasiada logica xd

- En todos los sorts, que se puedan hacer tanto ascendente como descendente.

- Añadir slugs.

- Buscar en toooodo el código y aplicar DRY

- Los push en blade se repiten burda, y tienen mucho boilerplate

- Nestear más cosas en los sitios que se requiera para que no sean puros controladores de index (semánticamente hablando)

- Salirnos de select2 y pasarnos a algo vanilla

- Imagen del certificado pixeliá

- Mover enums y sets de helpers a otro sitio.

- Mejorar el mensaje que se muestra tras busquedas y filtros que no traen ningún dato.

- En los componentes de inputs, hacer optional en vez de required, y hacer que el id por defecto sea el mismo name.

- Estandarizar nombres de modales, y hacer que tengan una prop id por defecto.