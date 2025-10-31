# Use Apache + PHP 8.2
FROM php:8.2-apache

# 1) System dependencies and PHP extensions
# - intl requires libicu-dev and a C++ compiler
# - zip requires libzip-dev and unzip for Composer dist installs
# - git is needed if Composer falls back to source
RUN apt-get update \
 && apt-get install -y --no-install-recommends \
      libicu-dev g++ pkg-config libzip-dev unzip git \
 && docker-php-ext-configure intl \
 && docker-php-ext-install -j"$(nproc)" intl zip pdo pdo_mysql \
 && rm -rf /var/lib/apt/lists/*

# 2) Apache: enable mod_rewrite and point DocumentRoot to public/
RUN a2enmod rewrite
# If Dockerfile is inside the app root (e.g., inside core/), the app root in the image will be /var/www/html
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf \
 && sed -ri "s!<Directory /var/www/>!<Directory ${APACHE_DOCUMENT_ROOT}/>!g" /etc/apache2/apache2.conf

# Allow .htaccess overrides for CI4 routing
RUN printf "\n<Directory ${APACHE_DOCUMENT_ROOT}>\n    AllowOverride All\n    Require all granted\n</Directory>\n" > /etc/apache2/conf-available/ci4-override.conf \
 && a2enconf ci4-override

# 3) Composer install with caching
# - If your composer.json/lock live in this directory (Dockerfile placed in app root), this works as-is
# - If composer.lock is absent, the glob will be ignored
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY composer.json composer.lock* ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-ansi --no-progress

# 4) Copy the rest of the source code
COPY . .

# 5) File permissions (Apache must read files; writable/ must be writable)
RUN chown -R www-data:www-data /var/www/html \
 && find /var/www/html -type d -exec chmod 755 {} \; \
 && find /var/www/html -type f -exec chmod 644 {} \; \
 && chmod -R 775 /var/www/html/writable || true

# 6) Expose and start Apache
EXPOSE 80
CMD ["apache2-foreground"]
