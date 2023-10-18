FROM php:7.4-apache
COPY public /var/www/html
# Copy config
COPY config/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY config/php.ini /usr/local/etc/php/php.ini
# Setup and run the server
COPY config/start-challenge /start-challenge
RUN chown -R www-data:www-data /var/www
# recreate log files
RUN rm /var/log/apache2/*
RUN touch /var/log/apache2/access.log
RUN touch /var/log/apache2/error.log
RUN chmod 755 /start-challenge
CMD ["/start-challenge"]