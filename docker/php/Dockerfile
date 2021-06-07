FROM php:7.3.28-fpm
RUN apt-get update && apt-get install -y libmcrypt-dev git libzip-dev zip --no-install-recommends \
    && docker-php-ext-install zip && pecl install mcrypt-1.0.3 && docker-php-ext-enable mcrypt
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
