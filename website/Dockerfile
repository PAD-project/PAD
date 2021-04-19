FROM php:8.0-apache
# COPY src/ /app/public
# RUN chown -R www-data:www-data /app/public
COPY conf/vhost.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite
RUN docker-php-ext-install mysqli pdo pdo_mysql