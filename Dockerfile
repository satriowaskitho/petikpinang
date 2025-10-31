FROM php:8.2-apache

# System deps for intl and common PHP builds
RUN apt-get update \
  && apt-get install -y --no-install-recommends \
  && rm -rf /var/lib/apt/lists/*

# Enable Apache rewrite and point DocumentRoot to core/public
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT=/var/www/html/core/public
RUN sed -ri "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf \
 && sed -ri "s!<Directory /var/www/>!<Directory ${APACHE_DOCUMENT_ROOT}/>!g" /etc/apache2/apache2.conf

# Composer binary
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Ensure destination exists, set workdir (creates dir if missing)
RUN mkdir -p /var/www/html/core
WORKDIR /var/www/html/core

# Copy composer files from repo's core/ (adjust if your Dockerfile is not at repo root)
COPY core/composer.json ./  [web:69]
# If present:
# COPY core/composer.lock ./  [web:69]

# Install vendors
RUN composer install --no-dev --prefer-dist --no-interaction --no-ansi --no-progress  [web:67]

# Copy the rest of the repo
WORKDIR /var/www/html
COPY . .  [web:74]

EXPOSE 80
CMD ["apache2-foreground"]
