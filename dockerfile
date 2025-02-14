FROM php:8.2-apache

# Enable mod_rewrite for .htaccess support
RUN a2enmod rewrite

# Set AllowOverride to All in Apache config
# Voeg de aangepaste Apache-configuratie toe
# COPY apache2.conf /etc/apache2/apache2.conf

RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Restart Apache
CMD ["apache2-foreground"]