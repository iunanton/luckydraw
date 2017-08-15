FROM php:7.0-apache
RUN a2enmod rewrite
RUN mkdir /var/www/config/
RUN mkdir /var/www/lib/
COPY ./config/ /var/www/config/
COPY ./lib/ /var/www/lib/
COPY ./public_html/ /var/www/html/
EXPOSE 80
