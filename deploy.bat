@echo off
REM Laravel Deployment Script for Windows
echo 🚀 Starting Laravel deployment...

REM Pull latest changes
git pull origin main

REM Install/Update Composer dependencies
composer install --no-dev --optimize-autoloader

REM Clear and cache config
php artisan config:clear
php artisan config:cache

REM Clear and cache routes
php artisan route:clear
php artisan route:cache

REM Clear and cache views
php artisan view:clear
php artisan view:cache

REM Run migrations
php artisan migrate --force

REM Seed database (optional)
php artisan db:seed --force

REM Clear application cache
php artisan cache:clear

REM Optimize application
php artisan optimize

echo ✅ Deployment completed successfully!
pause