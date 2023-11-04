<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


/* PAGES AND INDEX SECTION*/

Route::view('/', "index")->name("index");
/* PAGES AND INDEX SECTION END*/

/* PRODUCTS SECTION*/
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get("/products/{product}", [ProductController::class, 'show'])->name('product.show');
/* PRODUCTS SECTION END*/

/*AUTH AND PROFILE SECTION*/
Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [LoginController::class, 'login']);
Route::view("/auth/register", 'auth.register')->name('register');
Route::match(['get', 'post'], '/auth/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('profile/{user}', [ProfileController::class, 'index'])->name('profile');
/*AUTH AND PROFILE SECTION END*/

/*ARTISAN DASHBOARD*/
Route::get('artisan/dashboard', [ArtisanController::class, 'index'])->name("artisan.index");
Route::get('artisan/dashboard/products', [ArtisanController::class, 'products'])->name("artisan.products");
Route::get('artisan/dashboard/products/create', [ArtisanController::class, 'create'])->name("artisan.products.create");
Route::post('artisan/dashboard/products', [ArtisanController::class, 'store'])->name("artisan.products.store");
Route::get('artisan/dashboard/products/{product}/edit', [ArtisanController::class, 'edit'])->name("artisan.products.edit");
Route::put('artisan/dashboard/products/{product}/edit', [ArtisanController::class, 'update'])->name("artisan.products.update");
Route::delete('artisan/dashboard/products/{product}', [ArtisanController::class, 'destroy'])->name("artisan.products.destroy");
/*ARTISAN DASHBOARD END*/

/*ADMIN DASHBOARD*/
Route::get('admin/dashboard', [AdminController::class, 'index'])->name("admin.index");
Route::get('admin/dashboard/users', [AdminController::class, 'users'])->name("admin.users");
// TODO TO CREATE
Route::get('admin/dashboard/users/{user}/edit', [AdminController::class, 'edit'])->name("admin.edit");
// TODO TO CREATE
Route::put('admin/dashboard/users/{user}', [AdminController::class, 'update'])->name("admin.update");
// TODO TO CREATE
Route::delete('admin/dashboard/users/{user}', [AdminController::class, 'destroy'])->name("admin.destroy");
// TODO TO CREATE
/*ADMIN END*/

/*DELIVERY MAN*/
Route::get('deliveryMan/dashboard', [DeliveryManController::class, 'index'])->name("deliveryMan.index");
/*DELIVERY MAN END*/

/*PRODUCTS */
Route::get("/products", [ProductController::class, 'index'])->name('product.index');
Route::get("/products/{product}", [ProductController::class, 'show'])->name('product.show');
/*PRODUCTS END*/

/*CONTACT*/
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
/*CONTACT END*/
