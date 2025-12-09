# Gunakan PHP-FPM 8.2
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
    curl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install dependencies (production)
RUN composer install --optimize-autoloader --no-interaction --no-dev

# Generate Laravel app key (opsional, jika belum ada)
# RUN php artisan key:generate

# Permissions (penting untuk Laravel)
RUN chmod -R 775 storage bootstrap/cache

# Expose port (Railway akan override ini)
EXPOSE 8000

# Jalankan PHP-FPM (production-ready)
CMD ["php-fpm"]
