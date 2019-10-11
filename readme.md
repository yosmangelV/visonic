# VISONIC

Formulario para la busqueda y estatus del equipo en reparación, este recibe un numero de serie
y muestra en pantalla un mensaje con su resultado.

Es algo simple, solo que tiene condicionales, no se interactua en terminos de 
agregar o eliminar sino que solo es para consulta, ya que el cliente proporcionara
los datos en la BD mediante su API.

***
##Pasos de intalación

### *Proyecto de en Laravel 5.7
Luego de clonar el proyecto realizamos el 

* `composer install`

Creamos nuestro **.env** haciendo una copia del archivo **.env.example** y sustituimos los valores 
de conexión para la BD.

* `php artisan key:generate`

Luego de terminar la configuración, procedemos a correr las migraciones con el comando:

 `php artisan migrate:refresh --seed`
*IMPORTANTE: Se debe correr este comando si se trabajara en un entorno de prueba sin 
la conexion a la BD del cliente*

Y luego de esto podemos arrancar el servidor para poder jugar 
* `php artisan serve`


###DISFRUTA!!

