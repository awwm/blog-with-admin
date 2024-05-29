# Use the official PHP image
FROM php:8.3-fpm

# Set the working directory
WORKDIR /var/www/html

# Copy the entire project
COPY . /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*
