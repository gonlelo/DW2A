# Apuntes Despliegue de Aplicaciones Web

### Conexión HTTP

Primero el cliente establece una conexión con el servidor. Después realiza una **petición** HTTP solicitando una página web. El servidor devuelve lo solicitado y se cierra la conexión.
Tipos de peticiones: GET, POST, PUT, DELETE...

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
El archivo se llamará Dockerfile
- **FROM [imagen]** Indica a partir de qué imagen vamos a construir (por ejemplo ubuntu)
- **RUN [comando]** Ejecuta comandos dentro de la imagen (por ejemplo "apt update")
- **CMD ["comando", "flags"]** Indica el comando que se ejecuta primero al crearse el contenedor. Este comando le da sentido al resto del Dockerfile. Siempre va último.
- **EXPOSE [numero_puerto]** Especifica el número de puerto que va a usar la imagen.

### Ficheros
La gran mayoría de ficheros de configuración de Apache están en **/etc/apache2**
Los logs se almacenan casi siempre en **/var/log/apache2/...**. Para saber la dirección exacta hay que buscar la variable de entorno que la almacena.
- **etc/apache2/envvars** - Aquí se almacenan las variables de entorno.
- **etc/apache2/apache2.conf** - Fichero de configuración principal.
- **etc/apache2/sites-available** - Aquí se encuentran las páginas disponibles.
- **etc/apache2/sites-enabled** - Aquí se encuentran las páginas activas.

#### Comandos Apache
- **a2enmod [nombre_mod]** Activa un mod, por ejemplo php.
- **a2dismod [nombre_mod]** Desactiva un mod.
- **a2ensite [nombre_sitio]** Activa un sitio web. (Se va a etc/apache2/sites-enabled)
- **a2dissite [nombre_sitio]** Desactiva un sitio web. (Se va a etc/apache2/sites-available)
- **systemctl reload apache2**