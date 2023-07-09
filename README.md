## Prueba de nivel intermedio
# Proyecto de Lista de Tareas

Este proyecto es una aplicación web que te permite crear, editar, marcar como lista y eliminar tareas. También proporciona una API para realizar estas operaciones. Puedes interactuar con la aplicación tanto desde la web como a través del API.

## Instalación

Sigue los pasos a continuación para instalar el proyecto utilizando Composer:

1. Clona el repositorio en tu máquina local:

   ```shell
   git clone https://github.com/tu-usuario/tu-proyecto.git

2. Navega hasta el directorio del proyecto:
    ```shell
    cd tu-proyecto

3. Instala las dependencias del proyecto utilizando Composer:
    ```shell
    composer install

4. Crea un archivo .env y configura las variables de entorno, como la conexión a la base de datos y las credenciales de API.

5. Genera una clave de aplicación:
    ```shell
    php artisan key:generate

6. Ejecuta las migraciones para crear las tablas de la base de datos:
    ```shell
    php artisan migrate

7. Inicia el servidor de desarrollo:
    ```shell
    php artisan serve

#### Ahora podrás acceder a la aplicación en http://localhost:8000.

### Paquetes adicionales

El proyecto utiliza dos paquetes adicionales:

**kra8/laravel-snowflake:** Este paquete proporciona una implementación de ID único basado en nieve para Laravel. Permite generar IDs únicos en entornos distribuidos. Es útil cuando se necesita generar IDs en diferentes servidores sin riesgo de colisiones.

**yajra/laravel-datatables-oracle:** Este paquete proporciona una integración fácil de DataTables en Laravel. Permite construir tablas de datos interactivas con funciones de filtrado, ordenamiento y paginación. Es útil cuando se necesita mostrar y manipular grandes conjuntos de datos en la interfaz de usuario.


### API

El proyecto proporciona una API con las siguientes rutas:

    GET http://localhost:8000//v1/tasks: Obtiene todas las tareas.
    POST http://localhost:8000//v1/tasks/store: Crea una nueva tarea.
    POST http://localhost:8000//v1/tasks/update/{id}: Actualiza una tarea   existente.
    POST http://localhost:8000//v1/tasks/ready-task/{id}: Marca una tarea como lista.
    DELETE http://localhost:8000//v1/tasks/delete/{id}: Elimina una tarea.
    

### Pruebas unitarias en el proyecto:

Una vez que todas las dependencias estén instaladas, puedes ejecutar las pruebas unitarias utilizando el siguiente comando.
```shell
    php artisan test
