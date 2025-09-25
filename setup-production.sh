#!/bin/bash

# Laravel Production Setup Script
echo "🚀 Setting up Laravel for production..."

# Create SQLite database file
touch /app/database/database.sqlite

# Generate application key
php artisan key:generate --force

# Cache configuration for performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Create storage link if needed
php artisan storage:link

echo "✅ Laravel production setup completed!"