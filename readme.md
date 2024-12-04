# Restaurant Management System

A Laravel-based restaurant management system that helps manage orders, menus, and staff.

## Requirements

- PHP >= 7.4
- MySQL >= 5.7
- Composer
- Node.js & NPM
- Git

## Installation Steps

1. Clone the repository

```bash
git clone https://github.com/neddy1298/restaurant-laravel.git
cd restaurant-laravel
```

2. Install PHP dependencies

```bash
composer install
```

3. Install NPM dependencies

```bash
npm install
```

4. Create and setup .env file

```bash
cp .env.example .env
php artisan key:generate
```

5. Configure your database in .env file

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_restaurant
DB_USERNAME=root
DB_PASSWORD=
```

6. Run database migrations and seeders

```bash
php artisan migrate:fresh --seed
```

7. Compile assets

```bash
npm run dev
```

8. Start the development server

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## Default Users

After running the seeders, you can login with these default credentials:

- Owner:

  - Email: owner@resto.com
  - Password: owner

- Administrator:

  - Email: admin@resto.com
  - Password: admin

- Waiter:

  - Email: waiter@resto.com
  - Password: waiter

- Cashier:

  - Email: kasir@resto.com
  - Password: kasir

- Customer:
  - Email: pelanggan@resto.com
  - Password: pelanggan

## Features

- User Management (Admin, Staff, etc.)
- Menu Management
- Order Processing
- Transaction History
- Reporting

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
