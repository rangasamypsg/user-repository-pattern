
STEP 1 : Create the database

    DB_DATABASE=repository

STEP 2 : Migrate the database  

    C:\xampp\htdocs\repository>php artisan migrate

STEP 3 : Create the class

    C:\xampp\htdocs\repository>php artisan make:controller UserController --resource

STEP 4 : Route declations

    Route::resource('user', UserController::class);

STEP 5 : Enable the user database seeder

    \App\Models\User::factory(10)->create();

STEP 6 : Run the seed

    C:\xampp\htdocs\repository>php artisan db:seed


STEP 7 : Make the service prodiver

    C:\xampp\htdocs\repository>php artisan make:provider RepositoryServiceProvider

STEP 8 : Create the interface folder and class

    C:\xampp\htdocs\repo\app\Repository\UserRepository.php
    C:\xampp\htdocs\repo\app\Repository\UserRepositoryInterface.php

STEP 9 : Run the project 

    C:\xampp\htdocs\repository>php artisan serve
