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

// PRODUCTS SECTION
Route::get('artisan/dashboard/products', [ArtisanController::class, 'productsIndex'])->name("artisan.products");
Route::get('artisan/dashboard/products/create', [ArtisanController::class, 'createProduct'])->name("artisan.products.create");
Route::post('artisan/dashboard/products', [ArtisanController::class, 'storeProduct'])->name("artisan.products.store");
Route::get('artisan/dashboard/products/{product}/edit', [ArtisanController::class, 'editProduct'])->name("artisan.products.edit");
Route::put('artisan/dashboard/products/{product}/edit', [ArtisanController::class, 'updateProduct'])->name("artisan.products.update");
Route::delete('artisan/dashboard/products/{product}', [ArtisanController::class, 'destroyProduct'])->name("artisan.products.destroy");
// PRODUCTS SECTION END

//ORDERS SECTION
Route::get('artisan/dashboard/orders', [ArtisanController::class, 'ordersIndex'])->name("artisan.orders");
Route::get('artisan/dashboard/orders/{order}', [ArtisanController::class, 'showOrder'])->name("artisan.orders.show");
Route::put('artisan/dashboard/orders/{order}', [ArtisanController::class, 'updateOrder'])->name("artisan.orders.update");
Route::delete('artisan/dashboard/orders/{order}', [ArtisanController::class, 'destroyOrder'])->name("artisan.orders.destroy");
//ORDERS SECTION END

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
