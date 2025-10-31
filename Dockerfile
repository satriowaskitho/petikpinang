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

# Ensure target dir exists before copying
RUN mkdir -p /var/www/html/core

# Set workdir where composer.json lives
WORKDIR /var/www/html/core

# Copy composer files from repo's core/ folder
COPY core/composer.json ./  # required [web:67]
# Copy lock file only if present; otherwise skip this line in your Dockerfile
# COPY core/composer.lock ./  # optional but recommended for reproducible builds [web:67]

# Bring in Composer and install deps
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --prefer-dist --no-interaction --no-ansi --no-progress  # installs vendor/ under core/ [web:67]

# Copy the rest of the repository
WORKDIR /var/www/html
COPY . .

# Recommended: production .htaccess already present in public/. Ensure CI_ENVIRONMENT=production at runtime.
EXPOSE 80

# Health: Apache foreground
CMD ["apache2-foreground"]
