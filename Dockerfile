# Utiliser une image PHP avec les extensions nécessaires
FROM php:8.2-fpm

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    mariadb-client \
    && docker-php-ext-configure gd \
    && docker-php-ext-install pdo pdo_mysql gd

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer Node.js et npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm

# Définir le dossier de travail
WORKDIR /var/www

# Copier les fichiers Laravel
COPY . .

# Installer les dépendances PHP et JS
RUN composer install --no-dev --no-interaction
RUN npm install && npm run build

# Donner les permissions aux fichiers Laravel
RUN chown -R www-data:www-data storage bootstrap/cache public/build

# Exposer le port PHP-FPM
EXPOSE 9000

# Lancer le serveur PHP-FPM
CMD ["php-fpm"]
