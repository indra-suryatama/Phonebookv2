FROM php:8.1-apache

RUN apt-get update
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get install libzip-dev zip libicu-dev libpq-dev -y
RUN docker-php-ext-install zip && docker-php-ext-configure intl && docker-php-ext-install intl
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && docker-php-ext-install pdo_pgsql pgsql

COPY . /var/www/html
RUN a2enmod rewrite