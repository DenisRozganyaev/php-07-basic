FROM php:8.2-apache

RUN docker-php-ext-install -j$(nproc) pdo_mysql

RUN apt-get update && apt-get upgrade -y && apt-get install -y git zlib1g-dev libzip-dev
RUN apt-get update && apt-get install -q -y ssmtp mailutils

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN /usr/sbin/a2enmod rewrite

COPY app.conf /etc/apache2/sites-available/000-default.conf

RUN chmod -R 777 /var/www/html

RUN echo "hostname=$(hostname).localhost" > /etc/ssmtp/ssmtp.conf
RUN echo "root=admin@admin.com" >> /etc/ssmtp/ssmtp.conf
RUN echo "mailhub=mailpit:1025" >> /etc/ssmtp/ssmtp.conf

RUN echo "sendmail_path=/usr/sbin/ssmtp -t" >> /usr/local/etc/php/conf.d/php-sendmail.ini
