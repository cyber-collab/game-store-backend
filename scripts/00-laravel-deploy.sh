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

echo "Update swagger json..."
php artisan l5-swagger:generate

echo "Import categories..."
php artisan import:categories

echo "Running npm install..."
npm install

echo "Running npm build..."
npm run build
