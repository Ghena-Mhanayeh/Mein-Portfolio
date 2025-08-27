# --- Basis-Image 
FROM php:8.2-apache

# PHP-Extensions für Bilder
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-png \
    && docker-php-ext-install -j$(nproc) gd


# PHP-Extensions & Apache-Module
RUN docker-php-ext-install pdo pdo_mysql mysqli \
 && a2enmod rewrite

# Composer ins Image kopieren (aus offiziellem Composer-Image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1

# App-Code in den Webroot kopieren
COPY . /var/www/html/

# Arbeitsverzeichnis setzen (für composer install)
WORKDIR /var/www/html

# Abhängigkeiten für Composer (git, unzip) + Composer installieren
RUN apt-get update \
 && apt-get install -y git unzip \
 && composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist \
 && rm -rf /var/lib/apt/lists/*

# MySQL-Client für Migrationen (MariaDB-Client reicht; nutzt --ssl / --ssl-verify-server-cert=OFF)
RUN apt-get update \
 && apt-get install -y default-mysql-client \
 && rm -rf /var/lib/apt/lists/*

# Schreibverzeichnisse (Smarty-Cache/Compile)
RUN mkdir -p /var/www/html/templates_c /var/www/html/cache \
 && chown -R www-data:www-data /var/www/html

# Entrypoint (setzt Port, AllowOverride, führt Migrationen aus)
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

CMD ["/entrypoint.sh"]
