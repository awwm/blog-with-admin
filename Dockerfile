# Use an official PHP runtime as a parent image
FROM php:8.3-apache

# Install necessary extensions and other dependencies
RUN apt-get update && apt-get install -y curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql \
    && docker-php-ext-install mysqli && docker-php-ext-enable mysqli \
    && a2enmod headers

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set session save path
RUN echo "session.save_path = '/tmp'" >> /usr/local/etc/php/php.ini

# Set permissions for the session directory
RUN chmod 733 /tmp

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
