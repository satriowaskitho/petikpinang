# core/Dockerfile
FROM php:7.4-apache

RUN apt-get update \
 && apt-get install -y --no-install-recommends libicu-dev g++ pkg-config libzip-dev unzip git libpq-dev \
 && docker-php-ext-configure intl \
 && docker-php-ext-install -j"$(nproc)" intl zip pdo pdo_mysql pdo_pgsql pgsql \
 && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite
# Serve repository root where index.php resides
ENV APACHE_DOCUMENT_ROOT=/var/www/html
RUN sed -ri "s!DocumentRoot .*!DocumentRoot ${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf \
 && sed -ri "s!<Directory /var/www/>!<Directory ${APACHE_DOCUMENT_ROOT}/>!g" /etc/apache2/apache2.conf
RUN printf "DirectoryIndex index.php index.html\n" > /etc/apache2/conf-available/dirindex.conf \
 && a2enconf dirindex
RUN printf "\n<Directory ${APACHE_DOCUMENT_ROOT}>\n  Options -Indexes\n  AllowOverride All\n  Require all granted\n</Directory>\n" > /etc/apache2/conf-available/app-override.conf \
 && a2enconf app-override

# IMPORTANT: copy the entire repository so root index.php is included
WORKDIR /var/www/html
COPY .. .    # from core/Dockerfile, ".." refers to repo root in the build context [web:99]

# Composer only if core/composer.json exists
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN if [ -f core/composer.json ]; then \
      cd core && composer install --no-dev --prefer-dist --no-interaction --no-ansi --no-progress; \
    fi

RUN chown -R www-data:www-data /var/www/html \
 && find /var/www/html -type d -exec chmod 755 {} \; \
 && find /var/www/html -type f -exec chmod 644 {} \;

EXPOSE 80
CMD ["apache2-foreground"]
