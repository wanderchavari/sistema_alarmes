FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
libpng-dev \
libjpeg-dev \
libfreetype6-dev \
&& docker-php-ext-configure gd --with-freetype --with-jpeg \
&& docker-php-ext-install pdo pdo_mysql gd

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . .

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80