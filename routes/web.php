<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\ArtisanInvoicesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


/* PAGES AND INDEX SECTION*/

Route::get('/', [HomeController::class, 'index'])->name("index");
/* PAGES AND INDEX SECTION END*/


/*AUTH AND PROFILE SECTION*/
Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [LoginController::class, 'login']);
Route::view("/auth/register", 'auth.register')->name('register');
Route::match(['get', 'post'], '/auth/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('profile/{user}', [ProfileController::class, 'index'])->name('profile');
Route::put('profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('profile/{user}', [ProfileController::class, 'destroy'])->name('profile.destroy');
/*AUTH AND PROFILE SECTION END*/

/*ARTISAN DASHBOARD*/
Route::get('artisan/dashboard', [ArtisanController::class, 'index'])->name("artisan.index");

// PRODUCTS SECTION
Route::get('artisan/dashboard/products', [ArtisanController::class, 'productsIndex'])->name("artisan.products");
Route::get('artisan/dashboard/products/new', [ArtisanController::class, 'createProduct'])->name("artisan.products.new");
Route::get('artisan/dashboard/products/{product}', [ArtisanController::class, 'showProduct'])->name("artisan.products.show");
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

//DELIVERIES SECTION

Route::post('artisan/dashboard/{order}/delivery', [ArtisanController::class, 'affectDelivery'])->name("artisan.deliveries.affect");
// TODO TO CREATE

//DELIVERIES SECTION END

// PDF INVOICES
Route::post('artisan/dashboard/orders/{order}/invoice', [ArtisanInvoicesController::class, 'create'])->name("artisan.orders.invoice");
// PDF INVOICES END

/*ARTISAN DASHBOARD END*/

/*ADMIN DASHBOARD*/
Route::get('admin/dashboard', [AdminController::class, 'index'])->name("admin.index");
Route::get('admin/dashboard/users', [AdminController::class, 'users'])->name("admin.users");
Route::get('admin/dashboard/users/{user}',[AdminController::class,'indexOne'])->name("admin.indexOne");
Route::get('admin/dashboard/users/{user}/edit', [AdminController::class, 'edit'])->name("admin.edit");
Route::put('admin/dashboard/users/{user}', [AdminController::class, 'update'])->name("admin.update");
Route::delete('admin/dashboard/users/{user}', [AdminController::class, 'destroy'])->name("admin.destroy");
Route::get('admin/dashboard/users/{user}/products',[AdminController::class, 'user_products'])->name('admin.user_products');
Route::get('admin/dashboard/products',[AdminController::class, 'products'])->name('admin.products');

//afficher les statistiques

/*ADMIN END*/

/*DELIVERY MAN*/
Route::get('deliveryMan/dashboard', [DeliveryManController::class, 'index'])->name("deliveryMan.index");
//deliveries  SECTION
Route::get('deliveryMan/dashboard/deliveries', [DeliveryManController::class, 'deliveriesIndex'])->name("deliveryMan.deliveries");
Route::get('delivery/{delivery_id}/accept', [DeliveryController::class, 'accept'])->name('delivery.accept');
Route::get('delivery/{delivery_id}/reject', [DeliveryController::class, 'reject'])->name('delivery.reject');
Route::get('delivery/{delivery_id}/complete', [DeliveryController::class, 'complete'])->name('delivery.complete');


//ORDERS SECTION END
/*DELIVERY MAN END*/

/*PRODUCTS */
Route::match(['get', 'post'], "/products", [ProductController::class, 'index'])->name('product.index');
Route::get("/products/{product}", [ProductController::class, 'show'])->name('product.show');
/*PRODUCTS END*/

/*CONTACT*/
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
/*CONTACT END*/

// CART SECTION
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// CART SECTION END

// CHECKOUT SECTION
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout.index');
Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
Route::post('/checkout/cancel', [OrderController::class, 'cancel'])->name('checkout.cancel');
// CHECKOUT SECTION END