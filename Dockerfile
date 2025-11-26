# Use official PHP with Apache
FROM php:8.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy your app files to Apache web root
COPY . /var/www/html/

# Expose HTTP port
EXPOSE 10000

# Start Apache in foreground
CMD ["apache2-foreground"]
