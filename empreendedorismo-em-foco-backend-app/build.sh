#!/usr/bin/env bash
# Exit on error
set -o errexit

# Install Composer dependencies
composer install --no-dev --optimize-autoloader

# Generate application key
php artisan key:generate --force

# Clear configuration cache
php artisan config:cache

# Clear route cache
php artisan route:cache

# Run database migrations
php artisan migrate --force

# Install NPM dependencies (if applicable)
# npm install

# Build assets (if applicable)
# npm run production

# Start the application server
# php -S 0.0.0.0:8000 -t public
