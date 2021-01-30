FROM php:5.6.14-fpm
RUN    apt-get update -yqq && \
       apt-get install -yqq php-xmlrpc \
