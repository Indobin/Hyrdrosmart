#!/bin/bash

# Jalankan migration dan scheduler
php artisan migrate --force
php artisan storage:link

# Start queue dan scheduler (jika perlu bisa di background pakai &)
php artisan schedule:work &

# Jalankan Laravel dengan PHP server di Railway
php -S 0.0.0.0:8080 -t public
