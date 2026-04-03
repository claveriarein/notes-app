#!/bin/bash

echo "Clearing config..."
php artisan config:clear

echo "Checking database connection..."
php artisan db:show 2>&1 || echo "DB connection issue detected"

echo "Running migrations..."
php artisan migrate --force 2>&1 || echo "Migration failed but continuing..."

echo "Starting server on port ${PORT:-8000}..."
exec php artisan serve --host=0.0.0.0 --port=${PORT:-8000}