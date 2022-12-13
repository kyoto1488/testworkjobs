FROM php:8.1-fpm-alpine

ARG ROOT_DIR_PATH=.

RUN docker-php-ext-install bcmath \
    && docker-php-ext-configure bcmath --enable-bcmath

RUN apk add --no-cache \
    libpng-dev  \
    libwebp-dev  \
    libjpeg-turbo-dev  \
    freetype-dev \
    && docker-php-ext-install gd \
    && docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY ${ROOT_DIR_PATH}/conf/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY ${ROOT_DIR_PATH}/conf/docker-vars.ini /usr/local/etc/php/conf.d/docker-vars.ini
COPY ${ROOT_DIR_PATH}/conf/php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www

EXPOSE 9000
