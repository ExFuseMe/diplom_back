FROM php:8.4-fpm-alpine

# Установим системные пакеты + dev-зависимости
RUN set -eux; \
    apk add --no-cache \
      git curl zip unzip bash icu-dev oniguruma-dev libpq-dev libzip-dev libxml2-dev \
      # build-deps для phpize/pecl
      $PHPIZE_DEPS; \
    \
    docker-php-ext-configure intl; \
    docker-php-ext-install -j$(nproc) \
      intl mbstring pcntl bcmath opcache pdo pdo_pgsql; \
    \
    pecl install redis && docker-php-ext-enable redis; \
    \
    # подчистим мусор, чтобы образ был меньше
    apk del --no-network --purge $PHPIZE_DEPS; \
    rm -rf /tmp/pear /var/cache/apk/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
