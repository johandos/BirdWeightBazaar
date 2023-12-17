FROM php:fpm-alpine
RUN docker-php-ext-install pdo pdo_mysql
RUN set -xe \
    && apk add --no-cache shadow \
    && usermod -u 1000 www-data \
    && groupmod -g 1000 www-data
COPY ../ /var/www/html
RUN chown -R www-data:www-data /var/www/html/storage
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache
