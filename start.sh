#!/bin/bash

echo "Clearing config..."
php artisan config:clear

echo "Running migrations..."
php artisan migrate --force 2>&1 || echo "Migration failed but continuing..."

echo "Starting Apache..."
apache2-foreground