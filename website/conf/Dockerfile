FROM php:8.0-apache
COPY src/ /app/public
COPY conf/vhost.conf /etc/apache2/sites-available/000-default.conf
RUN chown -R www-data:www-data /app/public
RUN a2enmod rewrite