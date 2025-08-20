FROM php:8.3-apache

# Instala extensiones de PHP
RUN docker-php-ext-install pdo_mysql

# Copia tus archivos de configuración
COPY app/conf/apache2.conf /etc/apache2/

# Copia el virtual host de tu sitio en el directorio de Apache
COPY app/conf/010-ramfarfotografia.conf /etc/apache2/sites-enabled/010-ramfarfotografia.conf

# Copia tu código fuente
COPY app/www/ /srv/ramfarfotografia/

# Exponemos el puerto
EXPOSE 80
