# Setup This Project

1. `composer install`
2. `cp .env.example .env`
3. `php artisan key:generate`
4. `php artisan migrate:fresh --seed`
5. `php artisan jwt:secret`
6. `php artisan serve`

# APP Documentation

- Auth Model API Use JWT Token
- Role Permission use <a href="https://spatie.be/docs/laravel-permission/v5/introduction">Spatie Permission</a>
- 
