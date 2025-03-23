FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    nodejs \
    npm

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring zip gd

RUN pecl install redis && docker-php-ext-enable redis

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set environment variables for Redis cache
ENV CACHE_DRIVER=redis \
    CACHE_STORE=redis \
    REDIS_CLIENT=phpredis \
    REDIS_HOST=social_feed_redis \
    REDIS_PORT=6379 \
    REDIS_DB=0 \
    REDIS_CACHE_DB=1 \
    SESSION_DRIVER=redis \
    SESSION_STORE=redis

WORKDIR /app

COPY . /app

RUN composer install 
RUN npm install && npm run build

COPY .env.example .env

RUN php artisan key:generate

EXPOSE 8000
CMD bash -c "php artisan config:cache && php artisan migrate && php artisan serve --host=0.0.0.0 --port=8000"
