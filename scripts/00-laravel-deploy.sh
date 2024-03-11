#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Clear migrations..."
php artisan migrate:refresh

echo "Running migrations..."
php artisan migrate --force

echo "Import categories..."
php artisan import:categories
