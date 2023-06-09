# DTP-TKP
## Installation
1. Unzip the downloaded archive
2. Copy and paste soft-ui-dashboard-laravel-master folder in your projects folder. Rename the folder to your project's name
3. In your terminal run `composer install`
4. Copy `.env.example` to `.env` and updated the configurations (mainly the database configuration)
5. In your terminal run `php artisan key:generate`
6. Run `php artisan migrate --seed` to create the database tables and seed the roles and users tables
7. Run `php artisan storage:link` to create the storage symlink (if you are using Vagrant with Homestead for development, remember to ssh into your virtual machine and run the command from there).

## Extension PHP
- Laravel Mail Package
  - "<i>extension php imagemagick 3.7.0</i>"

## Extension Laravel
- Laravel Mail Package
  - "<i>composer require illuminate/mail</i>"
- Download PDF
  - "<i>composer require barryvdh/laravel-dompdf</i>"
- QR Code
  - "<i>composer require simplesoftwareio/simple-qrcode</i>"
