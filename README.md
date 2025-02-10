## JWT Authentication in Laravel 11

### Install JWT-Auth package 
> composer require tymon/jwt-auth

### Publish config file 
> php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider”

### Generate JWT Secret Key 
> php artisan jwt:secret 


