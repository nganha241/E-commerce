<?php

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
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Client\ProfileController;

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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('coupons', CouponController::class);
    Route::post('/addCart', [CartController::class, 'addToCart'])->name('addCart');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::delete('/carts/{id}', [CartController::class, 'destroy'])->name('carts.destroy');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('carts.checkout');
    Route::post('/applyCoupon', [CartController::class, 'applyCoupon'])->name('carts.applyCoupon');
    Route::post('process-checkout', [CartController::class, 'processCheckout'])->name('carts.process-checkout');
    Route::resource('orders', OrderController::class);
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/my-dashboard', [ProfileController::class, 'dashboard'])->name('my_dashboard');
    Route::get('/my-orders', [ProfileController::class, 'orders'])->name('my_orders');
    Route::post('/cancel', [ProfileController::class, 'cancel'])->name('cancel');
});



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [PageController::class, 'shop'])->name('shop');
Route::get('/single/{id}', [PageController::class, 'single'])->name('single');


require __DIR__ . '/auth.php';