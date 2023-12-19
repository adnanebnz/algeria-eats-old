<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\ArtisanInvoicesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PasswordResetService;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*-----------PAGES AND INDEX SECTION-----------*/

Route::view('/', 'index')->name('index');

/*-----------PAGES AND INDEX SECTION END-----------*/

/*-----------AUTH AND PROFILE SECTION-----------*/

Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name(
    'login'
);

Route::post('/auth/login', [LoginController::class, 'login']);

Route::view('/auth/register', 'auth.register')->name('register');

Route::match(['get', 'post'], '/auth/logout', [
    LoginController::class,
    'logout',
])->name('logout');

Route::get('profile/{user}', [ProfileController::class, 'index'])->name(
    'profile'
);

Route::put('profile/{user}', [ProfileController::class, 'update'])->name(
    'profile.update'
);

Route::delete('profile/{user}', [ProfileController::class, 'destroy'])->name(
    'profile.destroy'
);

// FORGOT PASSWORD
Route::get('/forgot-password', [PasswordResetService::class, 'index'])->name(
    'password.request'
);

Route::post('/forgot-password', [PasswordResetService::class, 'store'])->name(
    'password.email'
);

Route::get('/reset-password/{token}', [
    PasswordResetService::class,
    'showResetForm',
])->name('password.reset');

Route::post('/reset-password', [
    PasswordResetService::class,
    'resetPassword',
])->name('password.update');
// FORGOT PASSWORD END

/*-----------AUTH AND PROFILE SECTION END-----------*/

/*-----------USER DASHBOARD-----------*/

Route::get('user/dashobard', [UserController::class, 'index'])->name(
    'user.dashobard'
);

Route::get('user/dashobard/orders', [
    UserController::class,
    'ordersIndex',
])->name('user.orders');

Route::get('user/dashobard/orders/{order}', [
    UserController::class,
    'showOrder',
])->name('user.orders.show');

Route::post('user/dashobard/orders/{order}/cancel', [
    UserController::class,
    'cancelOrder',
])->name('user.orders.cancel');

Route::get('user/dashboard/delivery/{delivery}', [
    UserController::class,
    'showDelivery',
])->name('user.delivery.show');

/*-----------USER DASHBOARD END-----------*/

/*-----------ARTISAN DASHBOARD-----------*/

Route::get('artisan/dashboard', [ArtisanController::class, 'index'])->name(
    'artisan.index'
);

// PRODUCTS SECTION
Route::get('artisan/dashboard/products', [
    ArtisanController::class,
    'productsIndex',
])->name('artisan.products');

Route::get('artisan/dashboard/products/new', [
    ArtisanController::class,
    'createProduct',
])->name('artisan.products.new');

Route::get('artisan/dashboard/products/{product}', [
    ArtisanController::class,
    'showProduct',
])->name('artisan.products.show');

Route::post('artisan/dashboard/products', [
    ArtisanController::class,
    'storeProduct',
])->name('artisan.products.store');

Route::get('artisan/dashboard/products/{product}/edit', [
    ArtisanController::class,
    'editProduct',
])->name('artisan.products.edit');

Route::put('artisan/dashboard/products/{product}/edit', [
    ArtisanController::class,
    'updateProduct',
])->name('artisan.products.update');

Route::delete('artisan/dashboard/products/{product}', [
    ArtisanController::class,
    'destroyProduct',
])->name('artisan.products.destroy');
// PRODUCTS SECTION END

//ORDERS SECTION
Route::get('artisan/dashboard/orders', [
    ArtisanController::class,
    'ordersIndex',
])->name('artisan.orders');

Route::get('artisan/dashboard/orders/{order}', [
    ArtisanController::class,
    'showOrder',
])->name('artisan.orders.show');

Route::put('artisan/dashboard/orders/{order}', [
    ArtisanController::class,
    'updateOrder',
])->name('artisan.orders.update');

Route::delete('artisan/dashboard/orders/{order}', [
    ArtisanController::class,
    'destroyOrder',
])->name('artisan.orders.destroy');
//ORDERS SECTION END

//DELIVERIES SECTION
Route::get('artisan/dashboard/deliveries', [
    ArtisanController::class,
    'deliveriesIndex',
])->name('artisan.deliveries');

Route::get('artisan/dashboard/deliveries/{delivery}', [
    ArtisanController::class,
    'showDelivery',
])->name('artisan.deliveries.show');

Route::post('artisan/dashboard/{order}/delivery', [
    ArtisanController::class,
    'affectDelivery',
])->name('artisan.deliveries.affect');

Route::post('artisan/dashboard/deliveries/{delivery}/unaffect', [
    ArtisanController::class,
    'unaffectDelivery',
])->name('artisan.deliveries.unaffect');
//DELIVERIES SECTION END

// PDF INVOICES
Route::post('artisan/dashboard/orders/{order}/invoice', [
    ArtisanInvoicesController::class,
    'create',
])->name('artisan.orders.invoice');
// PDF INVOICES END

/*-----------ARTISAN DASHBOARD END-----------*/

/*-----------ADMIN DASHBOARD-----------*/

Route::get('admin/dashboard', [AdminController::class, 'index'])->name(
    'admin.index'
);

Route::get('admin/dashboard/users', [AdminController::class, 'users'])->name(
    'admin.users'
);

Route::get('admin/dashboard/users/{user}', [
    AdminController::class,
    'showUser',
])->name('admin.indexOne');

Route::get('admin/dashboard/users/{user}/edit', [
    AdminController::class,
    'edit',
])->name('admin.edit');

Route::put('admin/dashboard/users/{user}', [
    AdminController::class,
    'update',
])->name('admin.update');

Route::delete('admin/dashboard/users/{user}', [
    AdminController::class,
    'destroy',
])->name('admin.destroy');

Route::get('admin/dashboard/users/{user}/products', [
    AdminController::class,
    'user_products',
])->name('admin.user_products');

Route::get('admin/dashboard/products', [
    AdminController::class,
    'products',
])->name('admin.products');

/*-----------ADMIN END-----------*/

/*-----------DELIVERY MAN-----------*/

Route::get('deliveryMan/dashboard', [
    DeliveryManController::class,
    'index',
])->name('deliveryMan.index');

//deliveries  SECTION
Route::get('deliveryMan/dashboard/deliveries', [
    DeliveryManController::class,
    'deliveriesIndex',
])->name('deliveryMan.deliveries');

Route::get('deliveryMan/dashboard/deliveries/{delivery}', [
    DeliveryManController::class,
    'showDelivery',
])->name('deliveryMan.deliveries.showDelivery');

Route::get('deliveryMan/dashboard/finished-deliveries', [
    DeliveryManController::class,
    'finishedDeliveries',
])->name('deliveryMan.deliveries.showFinishedDeliveries');

Route::post('deliveryMan/{delivery}/accept', [
    DeliveryManController::class,
    'accept',
])->name('delivery.accept');

Route::post('deliveryMan/{delivery}/generate-ticket', [
    DeliveryManController::class,
    'generateTicket',
])->name('delivery.generateTicket');

Route::put('deliveryMan/{delivery}/update', [
    DeliveryManController::class,
    'updateDelivery',
])->name('delivery.updateDelivery');
//ORDERS SECTION END

/*-----------DELIVERY MAN END-----------*/

/*-----------PRODUCTS-----------*/

Route::match(['get', 'post'], '/products', [
    ProductController::class,
    'index',
])->name('product.index');

Route::get('/products/{product}', [ProductController::class, 'show'])->name(
    'product.show'
);

/*-----------PRODUCTS END-----------*/

/*ARTISANS PAGE */
Route::view('artisans', 'artisan.page')->name('artisan.page');
/*ARTISANS PAGE END*/

/*-----------CONTACT-----------*/

Route::get('/contact', [ContactController::class, 'index'])->name(
    'contact.index'
);

Route::post('/contact', [ContactController::class, 'store'])->name(
    'contact.store'
);

/*-----------CONTACT END-----------*/

// CART SECTION
Route::view('/cart', 'cart.cart')->name('cart.index');
// CART SECTION END

// CHECKOUT SECTION
Route::get('/checkout', [OrderController::class, 'checkout'])->name(
    'checkout.index'
);

Route::post('/checkout', [OrderController::class, 'store'])->name(
    'checkout.store'
);

Route::post('/checkout/cancel', [OrderController::class, 'cancel'])->name(
    'checkout.cancel'
);
// CHECKOUT SECTION END
