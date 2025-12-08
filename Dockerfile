FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

WORKDIR /var/www/html

COPY . .

RUN composer install --optimize-autoloader --no-interaction

CMD php artisan serve --host=0.0.0.0 --port=8000
