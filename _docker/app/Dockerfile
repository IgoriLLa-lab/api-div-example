FROM php:8.2-fpm-alpine

# Установка зависимостей
RUN apk --update add --no-cache \
    libpq \
    libpq-dev \
    libpng \
    libpng-dev \
    libzip \
    libzip-dev \
    zip \
    unzip \
    git && \
    docker-php-ext-install pdo_mysql bcmath gd zip && \
    apk del libpq-dev libpng-dev libzip-dev && \
    rm -rf /var/cache/apk/*

# Копирование конфигурации PHP
COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

# Установка Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

# Установка рабочего каталога
WORKDIR /var/www
# Устанавливаем пользователя и группу по UID и GID
USER $UID:$GID
