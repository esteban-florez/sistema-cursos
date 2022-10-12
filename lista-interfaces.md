# Lista de interfaces del componente

## General:

+ Login. 
+ Registro.
+ Recuperar contraseña.



## Administrador

### Cursos:
+ Ver todos los cursos (FSS). Link a editar. Link a registrar nuevo curso.
### Registrar nuevo curso:
+ Formulario para registrar nuevo curso, asignar instructor. Link a registrar área de formación.
### Areas de formacion:
+ CRUD de las áreas de formación. Bien simple (Se).
### Registrar area de formacion (modal):
+ Todavía no se donde poner link a esta verga, ahi bere. A lo mejo
r en configuración gracias mirian por tu ashuda. a tu casa pa'. También servirá pa editar.
<!-- ### Detalle curso:
* Ver detalles del curso. Editar sus datos. Link a matrícula si es activo. -->
### Control de matrícula:
+ Nota: este es el mismo del instructor, es "matricula.html", así que ya está listo, solo hay que ponerle el layout del admin.
### Clubes:
+ Ver todos los clubes, link a editar (FSS). Link a registrar nuevo club.
### Registrar nuevo club:
+ Formulario para registrar nuevo club, asignar instructor.
<!-- ### Detalle club:
- Ver detalle del club, editar sus datos. Link a inventario y lista de miembros. -->
### Inventario de club:
+ Listado de artículos de club, y sus cantidades (FSS).
### Historial de inventario:
+ Todas las operaciones hechas a lo largo de la existencia del inventario (FSo).
### Artículos del club
* CRUD simple de artículos (Se).
### Registrar artículo:
+ Modal, también para editar.
### Registrar operacion (maybe modal):
+ El form para registrar un cambio en el inventario.
### Lista de miembros club:
+ Literalmente eso, con CRUD y FSS i guess, y enlaces a los perfiles de la gente.
### Pagos:
+ Ver todos los pagos, confirmar y rechazar (FSS).
### Estadística:
+ * Ver estadísticas y gráficas de todo el sistema (FSo).
### Información de pagos:
+ CRUD de datos para pago. 
### Usuarios:
+ CRUD de usuarios del sistema (FSS).
### Registro de usuario:
+ Basicamente copypastear el registro pero con el layout de admin xd. Y ponerle el poder seleccionar el tipo de usuario.
### Expediente:
+ Un sitio para ver los ciclos finalizados.
### Detalle expediente:
+ Detalles del expediente y resumen de la matricula.



## Instructores

### Cursos:
+ Ver todos los cursos. Link a detalles. Link a editar los cursos asignados.
<!-- ### Detalle curso:
- Ver detalles, editar si es curso propio, iniciar inscripciones, designar fechas, etc. Link a matrícula si es propio y activo. -->
### Control de matrícula:
+ Interfaz pa aprobar y desaprobar gente (FSS). 
PD: no se si vaya a haber notas de evaluaciones y tal, si ese es el caso, entonces habría que modificar un poco, pero quizas no.
### Clubes:
+ Ver clubes, ver y editar clubes asignados (mismo del instructor xd).
<!-- ### Detalle club:
- Editar club asignado, link a inventario del club y listado de miembros. -->
### Inventario de club:
+ Listado de artículos del club, y sus cantidades (FSS).
### Historial de inventario:
+ Todas las operaciones hechas a lo largo de la existencia del inventario (FSo).
### Artículos del club:
* CRUD simple de artículos (Se).
### Registrar artículo:
+ Modal, también para editar.
### Registrar operacion (maybe modal):
+ El form para registrar un cambio en el inventario.
### Lista de miembros club:
+ Literalmente eso, con CRUD y FSS i guess, y enlaces a los perfiles de la gente.
### Perfil:
+ Perfil de usuario propio, con datos personales, y estadísticas de uso del sistema, editar datos, etc.
### Horario (a lo mejor no):
- Literalmente eso, un horario que muestre de una manera gráfica que días y horas te toca club y curso en la semana.


## Estudiante:

### Cursos:
+ Ver cursos en período de inscripción (FSS). Link a detalles de cada curso.
<!-- ### Detalle de curso:
+ Ver detalles de curso, inscribirse. -->
### Inscripcion:
+ Pasos para inscripcion en curso.
### Clubes:
+ Ver clubes, link a detalles de club.
<!-- ##### Detalle de club:
- Ver detalles de club, inscribirse. -->
### Pagos:
* Dos tabs: la primera con un CRUD de pagos realizados, y la segunda con cuotas pendientes y un link a pagar dichas cuotas.
### Pago de cuotas pendientes:
- Basada en inscripcion, pero solo para pagar una cuota.
### Perfil:
+ Perfil de usuario con datos propios y estadísticas de uso del sistema. Editar datos.
### Horario (a lo mejor no):
- Literalmente eso, un horario que muestre de una manera gráfica que días y horas te toca club y curso en la semana.
 
 * Registro de usuario desde dentro del sistema.
 * Modal editar pago.
 * Modal cierre de curso (izi)
 * Añadir miembro/estudiante (miembros, matricula).
 * Inventario (modal registro operacion)
 * Pagos (estudiante)
 - Pago de cuotas pendientes 
 - Horario
 * Estadística












## Esto no lo vamos a hacer pero lo dejo aqui porsia

### admin

#### Eventos:
- Ver todos los eventos (FSS). Link a editar. Registrar nuevo evento.
#### Registrar nuevo evento:
- Formulario para registrar nuevo evento.
#### Detalles eventos:
- Ver detalles del evento, editar sus datos.

### instr

#### Eventos:
- Ver eventos.
#### Detalles de eventos:
- Ver detalle de eventos (duhh).

### estudiante

#### Eventos:
- Ver eventos proximos. Link a detalles de eventos.
#### Detalle eventos:
- Ver detalle de eventos.