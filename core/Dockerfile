FROM php:7.4-apache

# PHP 7.4 extensions and tools
RUN apt-get update \
 && apt-get install -y --no-install-recommends \
      libicu-dev g++ pkg-config libzip-dev unzip git libpq-dev \
 && docker-php-ext-configure intl \
 && docker-php-ext-install -j"$(nproc)" intl zip pdo pdo_mysql pdo_pgsql pgsql \
 && rm -rf /var/lib/apt/lists/*

# Enable rewrite
RUN a2enmod rewrite

# Explicit vhost for your domain with correct permissions and overrides
RUN printf "<VirtualHost *:80>\n\
  ServerName petikpinang-dev.gurind.am\n\
  DocumentRoot /var/www/html\n\
  <Directory /var/www/html>\n\
    Options -Indexes\n\
    AllowOverride All\n\
    Require all granted\n\
  </Directory>\n\
  ErrorLog \${APACHE_LOG_DIR}/error.log\n\
  CustomLog \${APACHE_LOG_DIR}/access.log combined\n\
</VirtualHost>\n" > /etc/apache2/sites-available/app.conf \
 && a2dissite 000-default \
 && a2ensite app

WORKDIR /var/www/html
COPY . .

# Composer (only if core/composer.json exists)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN if [ -f core/composer.json ]; then \
      cd core && composer install --no-dev --prefer-dist --no-interaction --no-ansi --no-progress; \
    fi

# Permissions
RUN chown -R www-data:www-data /var/www/html \
 && find /var/www/html -type d -exec chmod 755 {} \; \
 && find /var/www/html -type f -exec chmod 644 {} \; \
 && [ -d /var/www/html/application/cache ] && chmod -R 775 /var/www/html/application/cache || true \
 && [ -d /var/www/html/application/logs ] && chmod -R 775 /var/www/html/application/logs || true

EXPOSE 80
CMD ["apache2-foreground"]
