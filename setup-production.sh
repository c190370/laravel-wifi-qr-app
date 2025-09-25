#!/bin/bash

# Laravel Production Setup Script
echo "🚀 Setting up Laravel for production..."

# Create database directory if it doesn't exist
mkdir -p /app/database

# Create SQLite database file
touch /app/database/database.sqlite

# Generate application key if not set
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

# Run database migrations (create tables)
php artisan migrate --force

# Cache configuration for performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Create storage link if needed
php artisan storage:link || echo "Storage link already exists"

echo "✅ Laravel production setup completed!"