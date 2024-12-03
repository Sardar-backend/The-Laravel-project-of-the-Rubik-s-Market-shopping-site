# مرحله 1: استفاده از ایمیج پایه
FROM php:8.2-fpm

# مرحله 2: نصب وابستگی‌ها
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# مرحله 3: نصب Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# مرحله 4: کپی کردن فایل‌های پروژه
WORKDIR /var/www
COPY . .

# مرحله 5: نصب پکیج‌های لاراول
RUN composer install --optimize-autoloader --no-dev

# مرحله 6: تنظیمات دسترسی‌ها و کلید اپلیکیشن
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# مرحله 7: اجرا
CMD php artisan serve --host=0.0.0.0 --port=8000

EXPOSE 8000
