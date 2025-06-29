# Base PHP image with FPM
FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    libzip-dev libpq-dev && \
    docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd

# Install Composer (latest version)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy Laravel project files to the container
COPY . .

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev

# Generate app key if needed (you can also set this via env var in Render)
RUN php artisan config:clear

# Set permissions
RUN chmod -R 775 storage bootstrap/cache

# Expose port Laravel will run on
EXPOSE 8000

# Start Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
