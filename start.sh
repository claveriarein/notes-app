#!/bin/bash

echo "Clearing config..."
php artisan config:clear

echo "Running fresh migrations..."
php artisan migrate:fresh --force 2>&1 || echo "Migration failed but continuing..."

echo "Starting Apache..."
rm -f /var/run/apache2/apache2.pid
a2dismod mpm_event mpm_worker 2>/dev/null || true
a2enmod mpm_prefork 2>/dev/null || true
apache2-foreground