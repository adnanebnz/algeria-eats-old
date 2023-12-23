<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Comment lancer le projet

1 - Ouvrir 2 terminals 1 pour npm et l'autre pour php artisan et composer

-   Installer les depandances npm: `npm install`
-   Installer les depandances composer : `composer install`
-   lancer les migrations de la BDD : `php artisan migrate`
-   Lancer le projet dans les 2 terminals : `npm run dev` et `php artisan serve`
-   Vous pouvez faire un seed aprés la migration pour remplire la BDD avec des données random en executant la
    commande: `php artisan db:seed --class="NomDeClasse"`
    <u>Les Noms de Classes pour le seed</u> : **ArtisanSeeder, AdminSeeder, DeliveryManSeeder, ConsumerSeeder
    ProductSeeder.**
- injecter les villes et communes algériennes dans la base de données :
`php artisan db:seed --class="AnouarTouati\AlgerianCitiesLaravel\Database\Seeders\AlgerianCitiesSeeder"`

## TODO

-   ADD BACK ARROW NAVIGATION IN DASHOBARDS
-   ADD SHOW PRODUCT PAGE IN ADMIN DASHBOARD
-   STYLE USER PROFILE
-   ADD AFFECTED LIVRAISONS PAGE FOR DELIVERYMAN
-   NOTIFY USER when the traetement of his order is done and for delivery too
-   ADD MAPS FOR DELIVERES AND CACHING SYSTEM

ORDER STATUSES:
not_started
processing
cancelled
completed

Delivery STATUSES:
pending
delivering
delivered
