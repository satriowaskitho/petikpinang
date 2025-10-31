FROM php:8.2-apache

# System deps for intl and common PHP builds
RUN apt-get update \
  && apt-get install -y --no-install-recommends \
  && docker-php-ext-configure intl \
  && docker-php-ext-install -j$(nproc) intl \
  && rm -rf /var/lib/apt/lists/*

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
EXPOSE 80

# Optional: composer install if repository lacks vendor
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN cd /var/www/html && composer install --no-dev --prefer-dist --no-interaction

# Health: Apache foreground
CMD ["apache2-foreground"]