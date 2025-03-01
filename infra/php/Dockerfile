FROM php:8.2-fpm

RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pgsql pdo_pgsql pdo \
    && apt-get install -y zip unzip git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY ../ /var/www/project

WORKDIR /var/www/project

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www

RUN chmod -R 775 /var/www
RUN chmod -R 777 /var/www/project/storage/


# RUN composer install