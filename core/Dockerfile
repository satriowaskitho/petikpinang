FROM php:8.2-apache

# 1) PHP extensions (intl first)
RUN apt-get update \
 && apt-get install -y --no-install-recommends libicu-dev g++ pkg-config \
 && docker-php-ext-configure intl \
 && docker-php-ext-install -j"$(nproc)" intl \
 && rm -rf /var/lib/apt/lists/*

# 2) Apache rewrite + DocumentRoot -> public
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf \
 && sed -ri "s!<Directory /var/www/>!<Directory ${APACHE_DOCUMENT_ROOT}/>!g" /etc/apache2/apache2.conf

# 3) Composer install (Dockerfile is in core/, so workdir is app root)
WORKDIR /var/www/html
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY composer.json composer.lock* ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-ansi --no-progress

# 4) Copy the rest
COPY . .

EXPOSE 80
CMD ["apache2-foreground"]
