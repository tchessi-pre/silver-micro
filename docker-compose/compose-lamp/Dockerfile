# Utilisation de l'image PHP Apache officielle
FROM php:7.4-apache

# Installation des extensions PHP nécessaires pour la connectivité avec MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Configuration Apache pour activer la réécriture d'URL (si nécessaire)
RUN a2enmod rewrite

# Copier les fichiers de l'application dans le conteneur
COPY . /var/www/html/

# Configuration des permissions pour le répertoire de l'application
RUN chown -R www-data:www-data /var/www/html/
