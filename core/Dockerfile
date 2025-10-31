FROM php:8.2-apache

# 1) System packages and PHP extensions
RUN apt-get update \
 && apt-get install -y --no-install-recommends \
      libicu-dev g++ pkg-config libzip-dev unzip git \
 && docker-php-ext-configure intl \
 && docker-php-ext-install -j"$(nproc)" intl zip pdo pdo_mysql \
 && rm -rf /var/lib/apt/lists/*

# 2) Apache: enable rewrite and point webroot to project root (no public/ folder in your repo)
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT=/var/www/html
RUN sed -ri "s!DocumentRoot .*!DocumentRoot ${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf \
 && sed -ri "s!<Directory /var/www/>!<Directory ${APACHE_DOCUMENT_ROOT}/>!g" /etc/apache2/apache2.conf

# Allow .htaccess at the root to handle routing
RUN printf "\n<Directory ${APACHE_DOCUMENT_ROOT}>\n    AllowOverride All\n    Require all granted\n</Directory>\n" > /etc/apache2/conf-available/app-override.conf \
 && a2enconf app-override

# 3) Copy repository
WORKDIR /var/www/html
COPY . .

# 4) If composer.json is inside core/, install vendors there (optional if app requires it)
# Guard composer install so it only runs if composer.json exists
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN if [ -f core/composer.json ]; then \
      cd core && composer install --no-dev --prefer-dist --no-interaction --no-ansi --no-progress; \
    fi

# 5) Permissions (root .htaccess and PHP files must be readable; writable/ if present needs write)
RUN chown -R www-data:www-data /var/www/html \
 && find /var/www/html -type d -exec chmod 755 {} \; \
 && find /var/www/html -type f -exec chmod 644 {} \; \
 && [ -d /var/www/html/writable ] && chmod -R 775 /var/www/html/writable || true

EXPOSE 80
CMD ["apache2-foreground"]
