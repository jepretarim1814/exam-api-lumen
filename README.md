# Exam Api Lumen

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

### Table of Contents
- [Instruction](#instruction)
- [Requirements](#requirements)
- [Installation](#installation)
- [Installed Route](#installed-routes)

### Instruction
- Lumen (latest)
- JWT or anything you are familiar with to generate token
- Use datatables for the BACKEND
  - backend: https://github.com/yajra/laravel-datatables
- Sample Users Schema (You can add if needed)
  - Table name: users
  ```
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(191) NOT NULL COMMENT 'token_key' COLLATE 'utf8mb4_unicode_ci',
  `password` VARCHAR(191) NOT NULL COMMENT 'token_password' COLLATE 'utf8mb4_unicode_ci',
  `remember_token` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  ```
### Requirements
- Latest version of Lumen

### Installation
1. Run the composer installation:
    ```
    composer install
    ```
2. Create a copy `.env.example` and make your changes.
3. Migrate the database.
    ```
    php artisan migrate
    ```
4. Serve the application by using [Laravel Homestead](http://laravel.com/docs/homestead), 
   [Laravel Valet](http://laravel.com/docs/valet) or the built-in PHP development server:
   ```sh
   php -S localhost:8002 -t public
   ```
```
Note: In exam-front-end repository, change the "target" url property on vue.config.js file to your defined base url. Default is http://localhost:8002.
```

### Installed routes
Verb | Path | Controller | Action | Middleware
-----|------|------------|--------|-----------
POST | user/login | App\Http\Controllers\AuthController | issueToken | -
POST | user/register | App\Http\Controllers\AuthController | registerUser | -
GET | user/search | App\Http\Controllers\UserController | allUser | auth
POST | user/logout | App\Http\Controllers\AuthController | destroyToken | auth
GET | token/refresh | App\Http\Controllers\AuthController | refreshToken | auth
GET | token/generate_captcha | App\Http\Controllers\CaptchaController | issueCaptcha | -


