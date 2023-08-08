FROM php:8.2-apache

RUN docker-php-ext-install -j$(nproc) pdo_mysql

RUN /usr/sbin/a2enmod rewrite

COPY app.conf /etc/apache2/sites-available/000-default.conf

RUN chmod -R 777 /var/www/html
