FROM php:8.2-apache
COPY . /var/www/html/
EXPOSE 80
RUN docker-php-ext-install pdo pdo_mysql
