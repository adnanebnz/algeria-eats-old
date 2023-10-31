<?php

use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* PRODUCTS SECTION*/

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get("/products/{product}", [ProductController::class, 'show'])->name('product.show');
/* PRODUCTS SECTION END*/

/*AUTH SECTION*/

Route::view('/', "index")->name("index");
Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/auth/login', [LoginController::class, 'login']);
Route::get("/auth/register", [RegisterController::class, 'showRegisterForm'])->name('auth.register');
Route::post("/auth/register", [RegisterController::class, 'register']);
Route::match(['get', 'post'], '/auth/logout', [LoginController::class, 'logout'])->name('auth.logout');
Route::get('profile/{user}', [ProfileController::class, 'index'])->name('profile');
/*AUTH SECTION END*/

/*ARTISAN DASHBOARD*/

// TODO CHECK WHY THIS ISNT WORKING
Route::get('artisan/dashboard', [ArtisanController::class, 'index'])->name("artisan.index");
Route::get('artisan/dashboard/produits', [ArtisanController::class, 'products'])->name("artisan.products");
Route::post('artisan/dashboard/produits', [ArtisanController::class, 'store'])->name("artisan.store");
Route::get('artisan/dashboard/produits/create', [ArtisanController::class, 'create'])->name("artisan.create");
Route::get('artisan/dashboard/produits/{product}/edit', [ArtisanController::class, 'edit'])->name("artisan.edit");
Route::put('artisan/dashboard/produits/{product}', [ArtisanController::class, 'update'])->name("artisan.update");
Route::delete('artisan/dashboard/produits/{product}', [ArtisanController::class, 'destroy'])->name("artisan.destroy");
/*ARTISAN DASHBOARD END*/

Route::get("/artisan/dashboard", function () {
    return view("artisan.dashboard");
});
