<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Setting up

Assuming your project is in a folder named "Project" on your Desktop.

-   **[admin]**
-   show user list and active or Inactive
-   create offer
-   offer list and active or Inactive
-   comment list and reject or accept
-   show notification list and active or Inactive
-   email:amirrajabali1999@gmail.com
-   password:12345678

-   **[shopper]**
-   show Total Revenue on home page
-   add restaurant and show restaurant list and active or Inactive or edited
-   add food by restaurant and show food list and active or Inactive or edited
-   add food category by restaurant and show ..
-   show order list and accept or reject
-   show transactions history
-   show archive list order
-   show comment on order and accept or reject
-   email:shopper123@gmail.com
-   password:12345678

-   **[user(api-side)]**
-   **[visit decimation](https://documenter.getpostman.com/view/21723981/UzXSwvw9)**
-   email:user123@gmail.com
-   password:12345678

### Starting ..

    .env.example -> .env
    add MAPBOX_TOKEN .env
    CACHE_DRIVER:database
    FILESYSTEM_DISK:local
    DB_CONNECTION:mysql
    DB_HOST:your_domain
    DB_PORT:your_db_port
    DB_DATABASE:snappfood
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    composer install
    composer dump-autoload
    php artisan key:generate
    php artisan migrate:install
    php artisan migrate
    php artisan db:seed
    php artisan serve

### Package Usage

-   **[bavix/laravel-wallet](https://bavix.github.io/laravel-wallet/#/)**
-   **[darryldecode/cart]**
-   **[guzzlehttp/guzzle]**
-   **[koossaayy/laravel-mapbox]**
-   **[laravel/framework]**
-   **[laravel/sanctum]**
-   **[laravel/tinker]**
-   **[nesbot/carbon]**
-   **[spatie/laravel-medialibrary](https://spatie.be/docs/laravel-medialibrary/v10/installation-setup)**
-   **[stevebauman/location]**

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
