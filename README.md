
## About Me

Mahmoud Reda, Software Engineer with +6 years experience:

- [Linked In](https://www.linkedin.com/in/mahmoud-reda-90784b129/).

## Overview

Restaurant management system application, That allows users to place an orders for food, update the ingredients stock and notify the merchants before the ingredients run out.

## Technologies

### Back-End

- **[PHP 8]**
- **[Laravel 10]**

### Database

- **[MySQL]**

## Installation


> Download Project

``` bash
git clone git@github.com:Mahmoud-Elkebeer/restaurant-management-system.git
```

> Install Composer Packages

``` bash
composer install
```
> Create MySQL database file for the application
```
choose database name yourself
```
> Migrate & Seed Database

``` bash
php artisan migrate --seed
```

> Generate Key

``` bash
php artisan key:generate
```

> Run On Local Machine

``` bash
php artisan serve
```

## API Endpoints

The following API endpoints are available in the application:

| Method | URL | Response |
| ------ | --- | -------- |
| POST   | /api/orders             | Create a new order     