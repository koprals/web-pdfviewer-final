FROM php:8.2-apache

# Install GD dan ekstensi lain yang dibutuhkan
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git libpng-dev libonig-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Salin source code Anda ke dalam container
COPY . /var/www/html/
WORKDIR /var/www/html/

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install

# Beri permission agar folder `files/` bisa ditulis
RUN mkdir -p files && chmod -R 755 files && chown -R www-data:www-data files

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/files
