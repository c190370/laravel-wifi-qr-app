#!/bin/bash

# Laravel Deployment Script
echo "🚀 Starting Laravel deployment..."

# Pull latest changes
git pull origin main

# Install/Update Composer dependencies
composer install --no-dev --optimize-autoloader

# Clear and cache config
php artisan config:clear
php artisan config:cache

# Clear and cache routes
php artisan route:clear
php artisan route:cache

# Clear and cache views
php artisan view:clear
php artisan view:cache

# Run migrations
php artisan migrate --force

# Seed database (optional)
php artisan db:seed --force

# Clear application cache
php artisan cache:clear

# Optimize application
php artisan optimize

echo "✅ Deployment completed successfully!"