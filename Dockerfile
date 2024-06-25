FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
  libpng-dev \
  libjpeg-dev \
  libfreetype6-dev \
  libonig-dev \
  libxml2-dev \
  zip \
  curl \
  unzip \
  git \
  && docker-php-ext-install pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www

COPY . .
RUN composer install

COPY ./docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

RUN chown -R www-data:www-data /var/www \
  && chmod -R 755 /var/www/storage

ENV APACHE_DOCUMENT_ROOT /var/www/public

EXPOSE 80

CMD ["apache2-foreground"]
