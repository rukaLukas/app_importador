# FROM php:7.4-fpm-alpine

# RUN docker-php-ext-install pdo pdo_mysql sockets
# RUN curl -sS https://getcomposer.org/installer | php -- \
#      --install-dir=/usr/local/bin --filename=composer

# WORKDIR /app
# COPY . .
# RUN composer install


FROM php:7.4-apache

RUN apt-get update

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
COPY . .     

RUN composer install