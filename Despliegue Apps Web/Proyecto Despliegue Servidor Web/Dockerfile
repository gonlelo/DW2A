FROM ubuntu
EXPOSE 80 443
RUN apt update
RUN apt install apache2 -y
RUN apt-get install -y php libapache2-mod-php
RUN apt-get update && apt-get install -y apache2-utils
RUN apt-get install -y php-pdo php-pdo-mysql php-mbstring php-xml php-curl
RUN apt-get install -y mariadb-server
RUN openssl req -x509 -newkey rsa:4096 -keyout key.pem -out cert.pem -sha256 -days 3650 -nodes -subj "/C=ES/ST=Madrid/L=Madrid/O=./OU=./CN=dawdb2.com"


RUN mkdir /var/www/dawdb2
ADD Fibonacci/000-default.conf /etc/apache2/sites-available/000-default.conf
ADD Fibonacci/restringido.php /var/www/html
RUN htpasswd -cb /etc/apache2/.htpasswd dev patata
ADD dawdb2/index.php /var/www/dawdb2
ADD dawdb2/dawdb2.conf /etc/apache2/sites-available/dawdb2.conf
RUN rm /var/www/html/index.html
ADD Fibonacci/index.php /var/www/html/index.php
ADD dawdb2/init.sql /var/sql/
RUN a2enmod ssl
RUN a2ensite default-ssl
RUN mkdir -p /etc/ssl/certs/etc/ssl/private
RUN mv key.pem /etc/ssl/private/server.key
RUN mv cert.pem /etc/ssl/certs/server.crt
RUN a2ensite dawdb2
CMD [ "/bin/bash", "-c", "service mariadb start && mariadb < /var/sql/init.sql && /usr/sbin/apache2ctl -D FOREGROUND" ]