# docker/php-fpm/Dockerfile

# Use an official PHP-FPM image as the base
FROM php:8.3-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install necessary system dependencies and PHP extensions
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    mysql-client \
    shadow \
    postgresql-client \
    build-base \
    autoconf \
    nginx \
    oniguruma-dev \
    libmemcached-dev \
    zlib-dev \
    php83-dev # <--- CORRECTED: Changed from php-dev to php83-dev for Alpine

RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mysqli \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    xml
    # redis # <--- COMMENTED OUT: As we are using pecl for redis

# Install Redis extension via pecl
RUN pecl install redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis # <--- REDIS VIA PECL

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Clear cache
RUN rm -rf /var/cache/apk/*

# Create storage and bootstrap/cache directories if they don't exist
RUN mkdir -p /var/www/html/storage \
    && mkdir -p /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]