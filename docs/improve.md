# Cosas que es opcional mejorar

1. Mover lógica a una clase de componente

2. Añadir búsqueda de estudiantes.

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