FROM node:20-alpine AS frontend

WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY resources ./resources
COPY public ./public
COPY vite.config.js ./
RUN npm run build

FROM composer:2 AS vendor

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --no-progress \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

FROM php:8.3-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends libonig-dev libpq-dev libzip-dev unzip \
    && docker-php-ext-install mbstring pdo_mysql pdo_pgsql zip \
    && a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

WORKDIR /var/www/html

COPY docker/apache-vhost.conf /etc/apache2/sites-available/000-default.conf
COPY --from=vendor /app/vendor ./vendor
COPY . .
COPY --from=frontend /app/public/build ./public/build

RUN mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && php artisan package:discover --ansi \
    && chown -R www-data:www-data storage bootstrap/cache

COPY docker/start.sh /usr/local/bin/abe-start
RUN chmod +x /usr/local/bin/abe-start

EXPOSE 10000

CMD ["abe-start"]
