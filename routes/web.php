<?php

use App\Http\Controllers\Auth\LoginController;
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

/*AUTH SECTION*/

Route::view('/', "index")->name("index");
Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/auth/login', [LoginController::class, 'login']);
Route::get("/auth/register", [RegisterController::class, 'showRegisterForm'])->name('auth.register');
Route::post("/auth/register", [RegisterController::class, 'register']);
Route::match(['get', 'post'], '/auth/logout', [LoginController::class, 'logout'])->name('auth.logout');
/*AUTH SECTION END*/

Route::get("/artisan/dashboard", function () {
    return view("artisan.dashboard");
});
