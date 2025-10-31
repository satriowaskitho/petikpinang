FROM php:7.4-apache

# System packages and PHP 7.4 extensions
RUN apt-get update \
 && apt-get install -y --no-install-recommends \
      libicu-dev g++ pkg-config libzip-dev unzip git libpq-dev \
 && docker-php-ext-configure intl \
 && docker-php-ext-install -j"$(nproc)" intl zip pdo pdo_mysql pdo_pgsql pgsql \
 && rm -rf /var/lib/apt/lists/*

# Apache config for CI3 at repo root
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT=/var/www/html
RUN sed -ri "s!DocumentRoot .*!DocumentRoot ${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf \
 && sed -ri "s!<Directory /var/www/>!<Directory ${APACHE_DOCUMENT_ROOT}/>!g" /etc/apache2/apache2.conf
RUN printf "\n<Directory ${APACHE_DOCUMENT_ROOT}>\n    Options -Indexes\n    AllowOverride All\n    Require all granted\n</Directory>\n" > /etc/apache2/conf-available/ci3-override.conf \
 && a2enconf ci3-override

# App source
WORKDIR /var/www/html
COPY . .

# Composer (only if core/composer.json exists)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN if [ -f core/composer.json ]; then \
      cd core && composer install --no-dev --prefer-dist --no-interaction --no-ansi --no-progress; \
    fi

# Permissions for CI3
RUN chown -R www-data:www-data /var/www/html \
 && find /var/www/html -type d -exec chmod 755 {} \; \
 && find /var/www/html -type f -exec chmod 644 {} \; \
 && [ -d /var/www/html/application/cache ] && chmod -R 775 /var/www/html/application/cache || true \
 && [ -d /var/www/html/application/logs ] && chmod -R 775 /var/www/html/application/logs || true

EXPOSE 80
CMD ["apache2-foreground"]
