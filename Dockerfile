FROM php:8.3-fpm

ARG user
ARG uid

RUN apt-get update && apt-get install -y libzip-dev libpng-dev libjpeg-dev libfreetype6-dev libpq-dev git unzip && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd zip pdo pdo_mysql && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug

WORKDIR /var/www

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

RUN chown -R 777 www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 777 /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]
