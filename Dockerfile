# Use official PHP with Apache image
FROM php:8.2-apache

# Copy your app files to the web root
COPY . /var/www/html/

# Expose the default HTTP port
EXPOSE 10000

# Start Apache in foreground
CMD ["apache2-foreground"]
