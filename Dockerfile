FROM php:8.2-apache

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN apt-get update && apt-get install -y \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev libxml2-dev libzip-dev \
    libmagickwand-dev --no-install-recommends \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd zip

RUN pecl install imagick-3.6.0 \
    && docker-php-ext-enable imagick

RUN a2enmod rewrite

RUN service apache2 restart

COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY . .
