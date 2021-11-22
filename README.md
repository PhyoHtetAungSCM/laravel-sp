# Laravel Spa
## Installation
```
1. composer install

2. npm install && npm run dev

3. cp .env.example .env

4. php artisan key:generate
```
## Database Configuration
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_spa
DB_USERNAME=root
DB_PASSWORD=
```
**Database migration:**
```
php artisan migrate
```
**Database seeder:**
```
php artisan db:seed
```
## Run Server
```
php artisan serve
```
