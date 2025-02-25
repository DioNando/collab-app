# Utiliser PHP 8.2 avec FPM
FROM php:8.2-fpm

# Installer les dépendances système et extensions PHP
RUN apt-get update && apt-get install -y --no-install-recommends \
    libpng-dev libjpeg-dev libfreetype6-dev \
    zip unzip git curl mariadb-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer Node.js et npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm && \
    rm -rf /var/lib/apt/lists/*

# Définir le dossier de travail
WORKDIR /var/www

# Copier le code source
COPY . .

# Installer les dépendances PHP et JS
RUN composer install --no-dev --no-interaction --optimize-autoloader
RUN npm install && npm run build

# Fixer les permissions pour Laravel
RUN chown -R www-data:www-data storage bootstrap/cache public/build \
    && chmod -R 775 storage bootstrap/cache

# Exposer le port PHP-FPM
EXPOSE 9000

# Démarrer PHP-FPM
CMD ["php-fpm"]
