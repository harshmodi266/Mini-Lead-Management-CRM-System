FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip

RUN docker-php-ext-install pdo pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

EXPOSE 10000

# CMD php artisan config:clear && php artisan serve --host=0.0.0.0 --port=10000
CMD ["sh", "-c", "php artisan optimize:clear && php -S 0.0.0.0:10000 -t public"]