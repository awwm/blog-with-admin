# Use the official Nginx image as the base image
FROM nginx:latest

# Copy Nginx configuration file
COPY nginx.conf /etc/nginx/nginx.conf

# Create a directory for scripts and copy the fastcgi-php.conf file
RUN mkdir -p /etc/nginx/scripts
COPY scripts/fastcgi-php.conf /etc/nginx/scripts/fastcgi-php.conf