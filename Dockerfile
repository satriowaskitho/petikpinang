FROM php:8.2-apache

# Install system deps and PHP extensions as needed (pdo_mysql shown; add intl, pgsql, gd, zip if required)
RUN apt-get update && apt-get install -y \
  && docker-php-ext-install intl

# Enable Apache modules
RUN a2enmod rewrite

# Set Apache DocumentRoot to /var/www/html/public (CodeIgniter 4 public dir)
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf \
 && sed -ri "s!/var/www/!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/apache2.conf \
 && sed -ri "s!<Directory /var/www/>!<Directory ${APACHE_DOCUMENT_ROOT}/>!g" /etc/apache2/apache2.conf

# Copy source
COPY . /var/www/html

# Recommended: production .htaccess already present in public/. Ensure CI_ENVIRONMENT=production at runtime.
EXPOSE 8080

# Optional: composer install if repository lacks vendor
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN cd /var/www/html && composer install --no-dev --prefer-dist --no-interaction

# Health: Apache foreground
CMD ["apache2-foreground"]