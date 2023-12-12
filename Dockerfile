FROM php:8.2-fpm

WORKDIR /var/www/html

# Instalando depedências do PHP
RUN apt-get update \
  && apt-get install -y \
  git \
  curl \
  libpng-dev \
  libonig-dev \
  libxml2-dev \
  zip \
  unzip \
  zlib1g-dev \
  libpq-dev \
  libzip-dev

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
  && docker-php-ext-install pdo pdo_pgsql pgsql zip bcmath gd

COPY . /var/www/html

# Instalando o composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install

# Executando o servidor PHP do Laravel
CMD php artisan serve --host=0.0.0.0 --port=8080

EXPOSE 8080