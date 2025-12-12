# Laravel Address Package

A comprehensive address management package for Laravel applications, providing countries, provinces, districts, and cities with multilingual support (English and Nepali).

## Features

- 📍 **Hierarchical Address Structure**: Country → Province → District → City
- 🌐 **Multilingual Support**: English and Nepali (name_np) fields
- 🏗️ **Modular & Extensible**: Easy to integrate and extend
- 📊 **Seeder Included**: Pre-loaded with sample Nepali addresses
- 🔧 **Artisan Commands**: Convenient CLI tools
- 📦 **Composer Ready**: Easy installation via Composer

## Requirements

- PHP 8.2 or higher
- Laravel 12.x
- MySQL, PostgreSQL, or SQLite

## Installation

### 1. Install via Composer

```bash
composer require manohar/address

### 2. Publish the migration files

```bash
php artisan vendor:publish --provider="Manohar\Address\AddressServiceProvider" --tag="address-migrations"

### 3. Run the migrations

```bash
php artisan migrate

### 4. Publish the seeder files

```bash
php artisan vendor:publish --provider="Manohar\Address\AddressServiceProvider" --tag="address-seeders"

### 5. Run the seeder

```bash
php artisan db:seed --class="Manohar\\Address\\Database\\Seeders\\AddressSeeder"
```

### 6. Database Structure

```sql
countries
  ├── id
  ├── name
  └── name_np

provinces
  ├── id
  ├── name
  └── name_np

districts
  ├── id
  ├── province_id
  ├── name
  └── name_np

cities
  ├── id
  ├── district_id
  ├── name
  └── name_np
```

### 7. Basic uses in controller

```php
use Manohar\Address\Models\Country;
use Manohar\Address\Models\Province;
use Manohar\Address\Models\District;
use Manohar\Address\Models\City;

// Get all countries
$countries = Country::all();

// Get provinces by country
$provinces = Province::all();

// Get districts by province
$districts = District::where('province_id', 1)->get();

// Get cities by district
$cities = City::where('district_id', 1)->get();
  
```

