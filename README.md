# Setup This Project

1. `composer install`
2. `cp .env.example .env`
3. `php artisan key:generate`
4. `php artisan jwt:secret`

# Setup Database
1. Create Database
2. Change Database Name in .env file
    - DB_DATABASE={database_name}
    - DB_USERNAME={database_username}
    - DB_PASSWORD={database_password}
    - DB_HOST={database_host}
3. Run `php artisan migrate:fresh --seed`

# Run Project
1. `php artisan serve`

# Run With Specific Port
1. `php artisan serve --port={port_number}`

# Run With Specific Host
1. `php artisan serve --host={host_name}`

# APP Documentation

- Auth Model API Use JWT Token
- Role Permission use <a href="https://spatie.be/docs/laravel-permission/v5/introduction">Spatie Permission</a>
- Data Dummy Role Permission in database/seeders/System/RolePermissionSeeder.php
