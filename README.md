# Laravel Address Package

A comprehensive address management package for Laravel applications, providing countries, provinces, districts, and cities with multilingual support (English and Nepali).

## Features

- 📍 **Hierarchical Address Structure**: Country → Province → District → City
- 🌐 **Multilingual Support**: English and Nepali (name_np) fields
- 📦 **Composer Ready**: Easy installation via Composer

## Requirements

- PHP 8.2 or higher
- Laravel 12.x
- SQLite

## Installation

### 1. Install via Composer

```bash
composer require manohar/address

### 2. Publish the Sqlite database

```bash
php artisan vendor:publish --tag=address-database

### 6. Database Structure

```sql
countries
  ├── id
  ├── name
  ├── name_np
  └── code
  

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

// return pluck ('name', 'id') for select option
$cities = City::getCityCache();

// Get full address like: [Kathmandu Metropolitan City, Kathmandu, Bagmati Pradesh]
$fullAddress = City::fullAddressByCityId(299);
  
```

