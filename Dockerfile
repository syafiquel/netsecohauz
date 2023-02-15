ARG PHP_VERSION=8.0
ARG COMPOSER_VERSION=2.1.3

#ENV COMPOSER_ALLOW_SUPERUSER=1

FROM composer:${COMPOSER_VERSION}
FROM php:${PHP_VERSION}-cli

RUN apt-get update && \
    apt-get install -y autoconf pkg-config libssl-dev git libzip-dev zlib1g-dev && \
    pecl install xdebug && docker-php-ext-enable xdebug && \
    docker-php-ext-install -j$(nproc) pdo_mysql zip

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

RUN ls

WORKDIR /code

#RUN composer install

#ENTRYPOINT [ "php", "artisan", "serve", "--host", "0.0.0.0", "--port", "80" ]
