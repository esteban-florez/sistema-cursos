# Departamento de Vinculación Social

Este es un componente web para la gestión de los procesos administrativos del Departamento de Vinculación Social en la UPTA La Victoria.

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