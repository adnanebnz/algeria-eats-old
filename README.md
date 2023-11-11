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
-   Vous pouvez faire un seed aprés la migration pour remplire la BDD avec des données random en executant la commande: `php artisan db:seed --class="NomDeClasse"`
    <u>Les Noms de Classes pour le seed</u> : **ArtisanSeeder, AdminSeeder, DeliveryManSeeder, ConsumerSeeder ProductSeeder.**

## Méthode de travail :

1. **Cloner le projet** :

    Chaque membre de l'équipe doit cloner le projet sur sa machine locale. Cela donne à chacun une copie du projet sur laquelle travailler.

    ```bash
    git clone https://github.com/adnanebnz/projet-web
    ```

2. **Gestion des branches** :

Chacun doit travailler sur des branches de fonctionnalités. Cela permet de maintenir la branche principal ( `main`) propre et stable.

```bash
git checkout -b votre-branche
```

3. **Codage et validation** :

Vous devez travailler sur vos tâches assignées de manière indépendante. et valider leurs modifications sur leurs branches locales à l'aide de `git commit`.

```bash
git add .
git commit -m "Description des modifications"
```

4. **Récupération des modifications** :

    Avant de commencer à travailler chaque jour ou lorsque vous êtes prêt à pousser des modifications, vous devez récupérer les dernières modifications du projet sur vos branche locale.

    ```bash
    git pull origin main
    ```

5. **Résolution des conflits** :

    Si plusieurs membres de l'équipe apportent des modifications à la même partie du code, des conflits peuvent survenir lors de la récupération. Les conflits doivent être résolus en modifiant manuellement les fichiers en conflit, puis en validant les fichiers résolus.

6. **Pousser les modifications** :

    Une fois le code prêt et les modifications validées, poussez les changements vers le référentiel central.

    ```bash
    git push origin branche-de-fonctionnalité
    ```

7. **Revues de code** :

    On va effectuer des revues de code pour garantir la qualité et la cohérence du code.

8. **Fusion dans la branche principale** :

    Lorsqu'une fonctionnalité ou une tâche est terminée et a été revue, fusionnez-la dans la branche principale.

    ```bash
    git checkout main
    git merge branche-de-fonctionnalité
    git push origin main
    ```

9. **Nettoyage des branches** :

    Lorsqu'une branche de fonctionnalités n'est plus nécessaire, elle peut être supprimée localement et à distance.

    ```bash
    git branch -d branche-de-fonctionnalité  # localement
    git push origin --delete branche-de-fonctionnalité  # à distance
    ```

### TODO

-   [x] Create Middlewares for admin organizer consumer and deliveryman
-   [x] CHANGE THE NAVBAR ELEMENTS
-   [x] WORK ON PRODUCTS LOGIC AND VIEWS
-   [x] ARTISANS CAN SEE EVERY ORDERS OF EVERY ARTISAN FIX THIS
-   [x] ADD PROFILE PIC TO USERS
-   [x] FIX PROFILE RESPONSIVENESS
-   [x] ADD MIDDLEWARE TO PREVENT USERS TO MODIFY OTHER USERS PROFILE
-   [x] EDIT ARTISAN DASHBOARD INDEX PAGE TO DISPLAY REAL DATA AND STATISTICS AND IMPROVE UI
-   [x] Navigation mobile pour dashboards pour les liens Profile et Logout POUR MOBILE
-   [x] Add Sweet alerts
-   [x] CRAETE ERROR PAGES 500,404,401,403
-   [x] CRAETE CART AND DISPLAY IT ON THE LAYOUT READ MORE HERE https://jackiedo.github.io/Laravel-Cart
-   [x] MAKE THE CART COUNTER WORK
-   [x] CREATE CART PAGE
-   [ ] FIX QUANTITY FOR CART
-   [ ] WORK ON DELIVERYMAN DASHBOARD
-   [ ] WORK ON USER DASHBOARD
-   [ ] WORK ON ADMIN DASHBOARD
-   [ ] MODIFY PRODUCT PAGE AND CREATE SHOW PAGE FOR SINGLE PRODUCT
-   [ ] WORK ON THE LOGIC OF ORDERS FOR CONSUMERS
-   [ ] WORK ON THE AFFECTATION OF THE ORDER TO A DELIVERYMAN WHO IS AVAILABLE AND WITH HIGH RATING with accept and decline choices
-   [ ] WORK ON THE HOMEPAGE STYLE AND ADD ELEMENTS TO IT AND SEARCH BAR WITH FILTERS ALOT OF FILTERS
