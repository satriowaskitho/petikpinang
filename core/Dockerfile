# core/Dockerfile — build with context = repo root
FROM php:7.4-apache

# 1) System packages and PHP 7.4 extensions (intl, zip, PDO MySQL, PostgreSQL)
RUN apt-get update \
 && apt-get install -y --no-install-recommends \
      libicu-dev g++ pkg-config libzip-dev unzip git libpq-dev \
 && docker-php-ext-configure intl \
 && docker-php-ext-install -j"$(nproc)" intl zip pdo pdo_mysql pdo_pgsql pgsql \
 && rm -rf /var/lib/apt/lists/*  [web:145][web:151]

# 2) Apache: enable rewrite, serve repo root, allow .htaccess, set DirectoryIndex, set ServerName
RUN a2enmod rewrite \
 && printf "ServerName petikpinang-dev.gurind.am\n" > /etc/apache2/conf-available/servername.conf \
 && a2enconf servername  [web:135]
ENV APACHE_DOCUMENT_ROOT=/var/www/html
RUN sed -ri "s!DocumentRoot .*!DocumentRoot ${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf \
 && sed -ri "s!<Directory /var/www/>!<Directory ${APACHE_DOCUMENT_ROOT}/>!g" /etc/apache2/apache2.conf  [web:135]
RUN printf "DirectoryIndex index.php index.html\n" > /etc/apache2/conf-available/dirindex.conf \
 && a2enconf dirindex  [web:135]
RUN printf "\n<Directory ${APACHE_DOCUMENT_ROOT}>\n  Options -Indexes\n  AllowOverride All\n  Require all granted\n</Directory>\n" > /etc/apache2/conf-available/app-override.conf \
 && a2enconf app-override  [web:135]

# 3) App source — copy root front controller and .htaccess explicitly, plus core subtree
WORKDIR /var/www/html
# These files are at the repository root in the build context
COPY index.php .          # front controller at repo root [web:99]
COPY .htaccess .          # root rewrite rules (ensure no LiteSpeed SetHandler) [web:150]
# Copy the application subtree
COPY core/ core/          # copies repo core/ to /var/www/html/core/ [web:99]

# 4) Composer (only if core/composer.json exists)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN if [ -f core/composer.json ]; then \
      cd core && composer install --no-dev --prefer-dist --no-interaction --no-ansi --no-progress; \
    fi  [web:151]

# 5) Permissions (adjust writable paths as needed)
RUN chown -R www-data:www-data /var/www/html \
 && find /var/www/html -type d -exec chmod 755 {} \; \
 && find /var/www/html -type f -exec chmod 644 {} \;  [web:135]

EXPOSE 80
CMD ["apache2-foreground"]
