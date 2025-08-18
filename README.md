# Sistema de Cursos y Clubes Universitarios

Este es un sistema web para la gestión de cursos y clubes universitarios. Es un proyecto universitario realizado por [Esteban Florez](https://github.com/esteban-florez), [Myriam Yaqueno](https://github.com/MariYaqueno) y [Angélica Abache](https://github.com/angelabache10).

### Tecnologías usadas:

* PHP 7.3 o superior
* Laravel 8
* MariaDB 10.4.24
* Bootstrap 4.3

### Instalación:

- Clonar este repositorio.
- Renombrar el archivo ".env.example" a ".env".
- Configurar la conexión a la base de datos en el archivo ".env". 
- Ejecutar los siguientes comandos:
```sh
composer update
php artisan migrate --seed
php artisan optimize
```
