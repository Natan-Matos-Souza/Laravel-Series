FROM php:8.1.2

WORKDIR /app

COPY . .

EXPOSE 8000

RUN apt-get update && docker-php-ext-install pdo_mysql && php artisan migrate && php artisan storage:link

ENTRYPOINT php artisan serve --host 0.0.0.0
