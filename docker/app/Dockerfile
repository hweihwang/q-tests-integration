FROM php:8.2.4RC1-apache-bullseye

WORKDIR /var/www/html

RUN a2enmod rewrite \
    && apt-get update \
    && curl -sL https://deb.nodesource.com/setup_19.x | bash - \
    && apt-get install -y nodejs git zip unzip libzip-dev \
    && apt-get clean  \
    && rm -rf /var/lib/apt/lists/*

ENV COMPOSER_ALLOW_SUPERUSER 1

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf /etc/apache2/conf-available/*.conf

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache storage/logs bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache storage

EXPOSE 80 5173

ENTRYPOINT ["bash", "-c"]