# Apuntes Despliegue de Aplicaciones Web

### Conexión HTTP

Primero el cliente establece una conexión con el servidor. Después realiza una **petición** HTTP solicitando una página web. El servidor devuelve lo solicitado y se cierra la conexión.
Tipos de peticiones: **GET, POST, PUT, DELETE...**

¿Cómo sabe el cliente a quién hacer la petición? No se puede aprender uno todas las IPs del mundo: mediante un **Servidor DNS**
**Servidor DNS:** Traduce nombres de dominio a IPs y las IPs a nombres de dominio.

##### Frontend
* HTML
* CSS
* JS

##### Backend
* Servidor (Cloud/local, PHP/Python/ JS, docker)
* Base de datos (MySQL, PostgressSQL, MongoDB)

#### Docker

- **docker help** Lista los comandos disponibles y su descripción
- **docker run [nombre_contenedor] [imagen]** Lanza un contenedor a partir de una imagen. La imagen es obligatoria siempre.
    - **docker run --detach [imagen] // docker run -d [imagen]** Evita que se ligue el contenedor lanzado a la terminal desde la que se lanza. Lo lanza en modo background (?)
    - **docker run --port X:Y [imagen] // docker run -p [imagen]** Redirecciona las peticiones al puerto X al puerto Y.
        - **docker run -d -p X:Y [imagen]** Combina los dos efectos (En verdad todo se puede combinar así que no voy a poner todas las combinaciones)
    - **docker run --name [nombre_contenedor] [imagen]** Lanza un contenedor con el nombre deseado.
    - **docker run --env [nombre_variable_entorno]=[valor_deseado] [imagen] // docker run -e [nombre_variable_entorno]=[valor_deseado] [imagen]** Asigna a una variable de entorno del contenedor lanzado un valor.
    - **docker run -v** [host] [contenedor] Mapeo bidireccional del host y el contenedor. (?)
- **docker ps (-a)** Muestra una lista de los contenedores lanzados (y sin lanzar)
- **docker logs [nombre_contenedor]** Mostrar logs del contenedor.
- **docker rm [nombre_contenedor]** Elimina el contenedor.
- **docker images** Lista todas las imagenes disponibles.
- **docker build [archivo]** Construye una imagen a partir de un archivo. Para usar el archivo Dockerfile (el nombre que se usa normalmente por convenio) se escribe **docker build .** (Nótese el punto).
    - **docker build -t [nombre_imagen] [archivo]** Con -t (de tag) le pones el nombre que quieras a la imagen que estás creando.
- **docker rmi [nombre_imagen]** Elimina una imagen.
- **docker exec [comando]** Ejecuta un comando dentro de un contenedor (ESTE ESTÁ MAL FALTAN COSAS)
- **docker inspect [nombre_contenedor]** Muestra mucha información de un contenedor.
### Programación en Docker
El archivo se llamará Dockerfile y contendrá todas las instrucciones y comandos para crear una imagen personalizada.
- **FROM [imagen]** Indica a partir de qué imagen vamos a construir (por ejemplo ubuntu)
- **RUN [comando]** Ejecuta comandos dentro de la imagen (por ejemplo "apt update")
- **EXPOSE [numero_puerto]** Especifica el número de puerto que va a usar la imagen.
- **CMD ["comando", "flags"]** Indica el comando que se ejecuta primero al crearse el contenedor. Este comando le da sentido al resto del Dockerfile. Siempre va último.


### Ficheros
La gran mayoría de ficheros de configuración de Apache están en **/etc/apache2/**
Los logs se almacenan casi siempre en **/var/log/apache2/...**. Para saber la dirección exacta hay que buscar la variable de entorno que la almacena por defecto o, si lo hemos configurad, lo podremos encontrar en el archivo .conf de la web deseada.
- **etc/apache2/envvars** - Aquí se almacenan las variables de entorno.
- **etc/apache2/apache2.conf** - Fichero de configuración principal.
- **etc/apache2/sites-available** - Aquí se encuentran las páginas disponibles.
- **etc/apache2/sites-enabled** - Aquí se encuentran las páginas activas.
- **etc/hosts** - Aquí se configuran cosas 

#### Comandos Apache
- **a2enmod [nombre_mod]** Activa un mod, por ejemplo php.
- **a2dismod [nombre_mod]** Desactiva un mod.
- **a2ensite [nombre_sitio]** Activa un sitio web. (Se va a etc/apache2/sites-enabled)
- **a2dissite [nombre_sitio]** Desactiva un sitio web. (Se va a etc/apache2/sites-available)
- **systemctl reload apache2** Recarga apache2 para aplicar cambios, guardar configuraciones...

##### Pasos para crear una web en apache y accedera a ella en local
1. Crear **[nombre_web].conf** en **etc/apache2/sites-available**
    - En este documento hay que tener mucho cuidado con las mayúsculas ya que si hay un error no funcionará (Saldrá un error al hacer systemctl reload apache2).
    - Debe empezar y acabar con **&lt;VirtualHost 	&#42;:[puerto_deseado]> y &lt;/VirtualHost>**
    - Incluye:
        - **ServerAdmin [correo_electrónico_deseado]** Indica el correo electrónico del admin, supongo que para errores o actualizaciones
        - **DocumentRoot [ruta_web]** Indica el directorio en el que el servidor buscará el archivo principal de la web (normalmente index.html/index.php). **Por ejemplo /var/www/web1** .
        - **ServerName [nombre_web_deseado]** Por ejemplo **web1.io**
        - **ServerAlias [alias_deseado]** **Por ejemplo www.web1.io**
        - **Errorlog [ruta_logs]** Indica dónde se deben guardar los logs y errores de la web. **Por ejemplo &dollar;{APACHE_LOG_DIR}/web3.error.log** En este caso &dollar;{APACHE_LOG_DIR} es la variable de entorno de apache que guarda el directorio de los logs (y que podemos cambiar en envvar) y /web3.error.log indica el fichero en el que se almacenarán.
2. En **/etc/apache2/ports.con**f** nos aseguramos de que el servidor esté escuchando el puerto que hemos asignado al principio del documento. Si no, añadimos **Listen [puerto_deseado]** como ya está hecho con el 80 (predeterminado). 
3. Crear un directorio en **/var/www/** con el mismo nombre que hayamos especificado en **DocumentRoot**.
4. Copiar/crear los documentos necesarios para nuestra página web en este directorio. Asegúrate de nombrar a la página principal index.html, index.php, default.html o algún otro nombre que el servidor reconozca como página predeterminada.
5. En el **fichero /etc/hosts** asignamos a nuestra IP el nombre de dominio que hemos especificado en ServerName. Para esto añadimos una nueva línea con la IP local y el dominio. Por ejemplo:
**127.0.0.1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; web1.io**
6. Para activar la página web usamos el comando **a2ensite [nombre_sitio]**.
7. Recargamos apache con **systemctl reload apache2**
8. Ahora deberíamos poder acceder a la página desde el navegador tanto desde **localhost:[puerto_usado]** como desde **[nombre_sitio]:[puerto_usado]**

Si tenemos varias páginas web usando el mismo puerto, si se accede mediante localhost[puerto_usado] se mostrará la primera página creada que use este puerto. Para distinguir entre páginas en un mismo puerto habrá que usar el nombre del sitio seguido del puerto. **Cuidado con no olvidarse de añadir cada página a /etc/hosts.**