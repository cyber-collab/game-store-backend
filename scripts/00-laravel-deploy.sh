#!/usr/bin/env bash
echo "Running composer"
cp /etc/secrets/.env .env
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

echo "Clearing caches..."
php artisan optimize:clear

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running fresh migrations..."
php artisan migrate:fresh

echo "Running migrations..."
php artisan migrate --force

echo "Create storage link..."
php artisan storage:link

echo "Import categories..."
php artisan import:categories

echo "Import partners..."
php artisan import:partners

echo "Import banners..."
php artisan import:banners

echo "Import block hero..."
php artisan import:home-hero

echo "Import products..."
php artisan import:products

echo "Clear cache after deploying"
php artisan optimize

echo "done deploying"
