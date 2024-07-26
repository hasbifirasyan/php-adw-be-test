# REST API

This repository contains a REST API project for PT ADW test.

## Getting Started

To get started with this repository, follow the steps below:

1. Clone the repository to your local machine.
```sh
git clone https://restapi-hasbi-adw-admin@bitbucket.org/hasbifirasyan/restapi-hasbi-adw.git
```
2. Open the project in your preferred code editor and change directory to api-testing.
```sh
cd api-testing
```
3. Install the necessary dependencies.
```sh
composer install
```
4. Set Up Environment File
Later you need to config your database and JWT_SECRET
```sh
cp .env.example .env
```
5. Generate Application Key
```sh
php artisan key:generate
```

6. configure your database 
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=testing
DB_USERNAME=your_pg_username
DB_PASSWORD=your_pg_password
```
7. Run Migrations and seed
```sh
php artisan migrate
```
```sh
php artisan db:seed --class=UserSeeder
```

5. Run the project locally.
```sh
php artisan serve
```