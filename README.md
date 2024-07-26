# REST API

This repository contains a REST API project for PT ADW test.

## Getting Started

To get started with this repository, follow the steps below:

1. Clone the repository to your local machine.
```sh
git clone https://github.com/hasbifirasyan/php-adw-be-test.git
``` 
2. Install the necessary dependencies.
```sh
composer install
```
3. Set Up Environment File
Later you need to config your database and JWT_SECRET
```sh
cp .env.example .env
```
4. Generate Application Key
```sh
php artisan key:generate
```

5. configure your database 
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=testing
DB_USERNAME=your_pg_username
DB_PASSWORD=your_pg_password
```
6. Run Migrations and seed
```sh
php artisan migrate
```
```sh
php artisan db:seed --class=UserSeeder
```

7. Run the project locally.
```sh
php artisan serve
```