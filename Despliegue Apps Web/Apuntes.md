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
No me he enterado de mucho, repasar
- **docker run [nombre_contenedor] [imagen]** Lanza un contenedor a partir de una imagen. La imagen es obligatoria siempre.
    - **docker run --detach [imagen] // docker run -d [imagen]** Evita que se ligue el contenedor lanzado a la terminal desde la que se lanza. Lo lanza en modo background (?)
    - **docker run --port X:Y [imagen] // docker run -p [imagen]** Redirecciona las peticiones al puerto X al puerto Y.
        - **docker run -d -p X:Y [imagen]** Combina los dos efectos (En verdad todo se puede combinar así que no voy a poner todas las combinaciones)
    - **docker run --name [nombre_contenedor] [imagen]** Lanza un contenedor con el nombre deseado.
    - **docker run --env [nombre_variable_entorno]=[valor_deseado] [imagen] // docker run -e [nombre_variable_entorno]=[valor_deseado] [imagen]** Asigna a una variable de entorno del contenedor lanzado un valor.
- **docker ps (-a)** Muestra una lista de los contenedores lanzados (y sin lanzar)
- **docker logs [nombre_contenedor]** Mostrar logs del contenedor
- **docker rm [nombre_contenedor]** Elimina el contenedor.