<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Project Steps

### Endpoints

1. Create Model
```
php artisan make:model
```
2. Name Model
3. Select: Factory, Form Requests, Migration, Policy, Resource Controller
```
factory, requests, migration, policy, resource
```
4. Set Migration for Tasks by adding columns.
5. Map the column names with values in factories/TaskFactory.php
6. Set Seeders in seeders/DatabaseSeeder.php
7. Migrate
```
php artisan migrate --seed
```
8. Create API endpoints
    - Create directory Api/v1 under qpp/Http/Controllers.
    - Move TaskController.php to v1 subfolder.
    - Update the namespace's path and import thyese base Controller namespace.
    - Create API methods inside TaskController.php
    - Install API routes (For Laravel > 10):
    ```
    php artisan install:api
    ```
    - Set routes in routes/api.php
    - Check routes
    ```
    php artisan route:list --path=api
    ```
9. Eloquent API Resources
    - Create Resource and set the toArray function (To transform models and model resources to JSON easily)
    ```
    php artisan make:resource TaskResource
    ```
    - Update TaskController.php's methods.
10. Inserting and Validating
    - Set rules in Requests/StoreTaskRequest.php
    - Set the store method in TaskController.php
    - Specify the fillable attribute in the Task model.
11. Updating
    - Update StoreTaskRequest.php and UpdateTaskRequest.php


### Sanctum
1. Install Sanctum (Only if API was not installed previously)
```
php artisan install:api
```
2. Set domains in config/sanctum
3. Define Sanctum's middlewares in bootstrap/app.php to instruct Laravel that incoming requests can authenticate using Laravel session cookies.
4. Run:
```
php artisan config:publish cors
```
5. In config/cors, change supports_credentials to true
6. Update .env file to allow subdomains
```
SESSION_DOMAIN=.domain.com
```
7. Create Auth Controller
8. Create a form request validation
```
php artisan make:request LoginRequest
```
9. Set routes in web.php
10. For testing purposes, creatw dummy users with Tinker
```
php artisan tinker
App\Models\User::factory()->create()
```
11. For testing purposes on Postman:
    - Add Pre-request Script
    ```
    pm.sendRequest({
    url: "http://localhost:8000/sanctum/csrf-cookie",
    method: "GET"
    }, function (err, res, { cookies }) {
        if (!err) {
            pm.globals.set('csrf-token', cookies.get('XSRF-TOKEN'))
        }
    })
    ```
    - Add Header:
    ```
    X-XSRF-TOKEN: {{csrf-token}}
    ```
    **IMPORTANT:** In Postman, make sure to use the same domain set in .env
12. Create the Logout and Register Endpoints (Registration will require a Request for form validation).
13. Implement Token Auth.
14. Create a new migration to add user_id foreign key to taks.
15. Update DatabaseSeeder to create Users with Tasks then execute
```
php artisan migrate:fresh --seed
```
16. API v2