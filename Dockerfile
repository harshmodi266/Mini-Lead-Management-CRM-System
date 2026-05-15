FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl unzip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd mbstring

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permissions for sessions & storage
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

EXPOSE 8000

CMD php artisan config:clear && php artisan cache:clear && php artisan route:clear && php artisan view:clear && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=$PORT