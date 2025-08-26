FROM php:8.2-apache

# MySQL-Erweiterungen für PHP
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Rewrite aktivieren (falls .htaccess/Smarty genutzt wird)
RUN a2enmod rewrite

# App-Code aus dem aktuellen Ordner (easywash/) in den Webroot
COPY . /var/www/html/

# (Optional – falls Smarty/TCPDF Caches brauchen)
RUN mkdir -p /var/www/html/templates_c /var/www/html/cache \
    && chown -R www-data:www-data /var/www/html

# EntryPoint sorgt dafür, dass Apache auf dem von Railway vorgegebenen $PORT lauscht
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

CMD ["/entrypoint.sh"]
