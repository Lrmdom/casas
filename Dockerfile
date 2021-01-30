FROM php:5.6.14-fpm
RUN sudo -E docker-php-ext-install pdo_mysql
