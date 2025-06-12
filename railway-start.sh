#!/bin/bash

# Clear dan cache ulang config (pakai .env dari Railway dashboard)
php artisan config:clear
php artisan config:cache

# Jalankan database migration dan storage symlink
php artisan migrate --force
php artisan storage:link

# Jalankan scheduler di background
php artisan schedule:work &

# Jalankan Laravel server
php artisan serve --host=0.0.0.0 --port=$PORT
