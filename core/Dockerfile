# core/Dockerfile
FROM php:8.2-apache

# System deps for intl/zip/composer fetch
RUN apt-get update \
  && apt-get install -y --no-install-recommends \
  && rm -rf /var/lib/apt/lists/*

# Enable Apache rewrite and point DocumentRoot to core/public (now ./public)
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf \
 && sed -ri "s!<Directory /var/www/>!<Directory ${APACHE_DOCUMENT_ROOT}/>!g" /etc/apache2/apache2.conf  [web:100][web:83]

# Use core/ as workdir (Dockerfile is already here)
WORKDIR /var/www/html

# Bring in Composer and install vendors
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY composer.json composer.lock* ./  # lock is optional; pattern copies if present [web:104]
RUN composer install --no-dev --prefer-dist --no-interaction --no-ansi --no-progress  [web:67]

# Copy the rest of the app
COPY . .

EXPOSE 80
CMD ["apache2-foreground"]
