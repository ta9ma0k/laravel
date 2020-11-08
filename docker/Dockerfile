FROM php:7.4-apache
COPY ./php/php.ini /usr/local/etc/php/
COPY ./apache/*.conf /etc/apache2/sites-enabled/

RUN apt-get update \
  && apt-get install -y vim libzip-dev libpq-dev mariadb-client unzip\
  && docker-php-ext-install zip pdo_mysql mysqli \
  && docker-php-ext-enable mysqli \
  && mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled 

RUN /bin/sh -c a2enmod rewrite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

WORKDIR /var/www/html/sample

RUN composer global require "laravel/installer"

RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev
RUN docker-php-ext-configure gd --with-jpeg
RUN docker-php-ext-install gd
RUN apt-get install -y libxrender1 libfontconfig1 libxext6 fonts-ipafont