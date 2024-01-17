FROM php:8.1-fpm

# setup workdir
WORKDIR /var/www/html

# RUN apt-get update \
#     && apt-get install -y \
#         apt-utils \
#     && apt-get install -y \
#         libpq-dev \
#         libzip-dev \
#     && pecl install xdebug \
#     && docker-php-ext-enable xdebug \
#     && docker-php-ext-install -j$(nproc) zip

# install environment dependencies
RUN apt-get update \
    # gd
    && apt-get install -y build-essential  openssl nginx libfreetype6-dev libjpeg-dev libpng-dev libwebp-dev zlib1g-dev libzip-dev gcc g++ make vim unzip curl git jpegoptim optipng pngquant gifsicle locales libonig-dev nodejs  \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd \
    # phpunit
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    # redis
    && pecl install redis \
    && docker-php-ext-enable redis \
    # gmp
    && apt-get install -y --no-install-recommends libgmp-dev \
    && docker-php-ext-install gmp \
    # pdo_mysql
    && docker-php-ext-install pdo_mysql mbstring \
    # pdo
    && docker-php-ext-install pdo \
    # opcache
    && docker-php-ext-enable opcache \
    # exif
    && docker-php-ext-install exif \
    && docker-php-ext-install sockets \
    && docker-php-ext-install pcntl \
    && docker-php-ext-install bcmath \
    # zip
    && docker-php-ext-install zip \
    #redis
    #clear cache
    && apt-get autoclean -y \
    && rm -rf /var/lib/apt/lists/* \
    && rm -rf /tmp/pear/

# copy files
# copy only necessary files
# COPY ./src/ /var/www/html/

COPY ./src/composer.json ./src/composer.lock /var/www/html/

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# run composer
RUN composer install --working-dir="/var/www/html" --no-dev --optimize-autoloader
RUN composer dump-autoload --working-dir="/var/www/html" --no-dev

COPY ./src/ /var/www/html/
EXPOSE 9000

# Comandos para iniciar o php-fpm e o Nginx
CMD ["sh", "-c", "echo 'starting php-fpm' && php-fpm -D && echo 'starting nginx server' && nginx -g 'daemon off;'"]