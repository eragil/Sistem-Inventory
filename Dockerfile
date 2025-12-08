FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    curl

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install dependencies
RUN composer install --optimize-autoloader --no-interaction --no-dev

# Storage & cache permissions
RUN chmod -R 775 storage bootstrap/cache

# Expose default Laravel port (optional)
EXPOSE 8000

# Run Laravel using dynamic hosting port
CMD php artisan serve --host=0.0.0.0 --port=${PORT}
