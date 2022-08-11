<?php

use App\Http\Controllers\Admin\BannerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PageController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Client\OrderController as ClientOrderController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// CLIENT
Route::middleware('auth')->group(function () {
    Route::post('/addCart', [CartController::class, 'addToCart'])->name('addCart');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::delete('/carts/{id}', [CartController::class, 'destroy'])->name('carts.destroy');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('carts.checkout');
    Route::post('/applyCoupon', [CartController::class, 'applyCoupon'])->name('carts.applyCoupon');
    Route::post('process-checkout', [CartController::class, 'processCheckout'])->name('carts.process-checkout');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/my-dashboard', [ProfileController::class, 'dashboard'])->name('my_dashboard');
    Route::resource('my-orders', ClientOrderController::class);
    Route::put('/cancel/{id}', [ClientOrderController::class, 'cancel'])->name('cancel');
    Route::put('/updateProfile/{id}', [ProfileController::class, 'updateProfile'])->name('updateProfile');
    Route::put('/changePassword/{id}', [ProfileController::class, 'changePassword'])->name('changePassword');
});

// ADMIN
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('permission:dashboard');

    Route::prefix('roles')->controller(RoleController::class)->name('roles.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-role');
        Route::post('/', 'store')->name('store')->middleware('permission:create-role');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-role');
        Route::put('/{id}', 'update')->name('update')->middleware('permission:update-role');
        Route::delete('/{id}', 'destroy')->name('destroy')->middleware('permission:delete-role');
        Route::get('/{id}/edit', 'edit')->name('edit')->middleware('permission:update-role');
    });

    Route::prefix('users')->controller(UserController::class)->name('users.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-user');
        Route::post('/', 'store')->name('store')->middleware('permission:create-user');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-user');
        Route::put('/{id}', 'update')->name('update')->middleware('permission:update-user');
        Route::delete('/{id}', 'destroy')->name('destroy')->middleware('permission:delete-user');
        Route::get('/{id}/edit', 'edit')->name('edit')->middleware('permission:update-user');
    });

    Route::prefix('categories')->controller(CategoryController::class)->name('categories.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-category');
        Route::post('/', 'store')->name('store')->middleware('permission:create-category');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-category');
        Route::put('/{id}', 'update')->name('update')->middleware('permission:update-category');
        Route::delete('/{id}', 'destroy')->name('destroy')->middleware('permission:delete-category');
        Route::get('/{id}/edit', 'edit')->name('edit')->middleware('permission:update-category');
        Route::get('logout',)->name('logout');
    });

    Route::prefix('products')->controller(ProductController::class)->name('products.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-product');
        Route::post('/', 'store')->name('store')->middleware('permission:create-product');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-product');
        Route::get('/{id}', 'show')->name('show')->middleware('permission:show-product');
        Route::put('/{id}', 'update')->name('update')->middleware('permission:update-product');
        Route::delete('/{id}', 'destroy')->name('destroy')->middleware('permission:delete-product');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-product');
    });

    Route::prefix('coupons')->controller(CouponController::class)->name('coupons.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-coupon');
        Route::post('/', 'store')->name('store')->middleware('permission:create-coupon');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-coupon');
        Route::put('/{id}', 'update')->name('update')->middleware('permission:update-coupon');
        Route::delete('/{id}', 'destroy')->name('destroy')->middleware('permission:delete-coupon');
        Route::get('/{id}/edit', 'edit')->name('edit')->middleware('permission:update-coupon');
    });

    Route::prefix('orders')->controller(OrderController::class)->name('orders.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-order');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-order');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-order');
    });


    Route::get('logout',)->name('logout');
});



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [PageController::class, 'shop'])->name('shop');
Route::get('/single/{id}', [PageController::class, 'single'])->name('single');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/process_register', [RegisterController::class, 'process_register'])->name('process_register');


require __DIR__ . '/auth.php';