#!/bin/sh
    echo "Enter Maintenance Mode"
    cd /var/www/pterodactyl
    php artisan down

    echo "Download the Update"
    curl -L https://github.com/pterodactyl/panel/releases/latest/download/panel.tar.gz | tar -xzv
    chmod -R 755 storage/* bootstrap/cache

    echo "Update Dependencies"
    composer install --no-dev --optimize-autoloader

    echo "Clear Compiled Template Cache"
    php artisan view:clear
    php artisan config:clear

    echo "Database Updates"
    php artisan migrate --seed --force

    echo "Set Permissions (DONT WORK ON CENTOS)"
    chown -R www-data:www-data /var/www/pterodactyl/*
    
    echo "Restarting Queue Workers"
    php artisan queue:restart

    echo "Exit Maintenance Mode"
    php artisan up

    echo "Complete! Have a good day and dont forget to refresh your browser cache! (CTRL + F5)"
    echo "-Will"
