<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\TravelPackagesController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdditionalController;
use App\Http\Controllers\MorePackagesController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('detail');
Route::get('/more-packages',[MorePackagesController::class,'index'])->name('more.index');

Route::post('/checkout/{id}' , [CheckoutController::class, 'proccess'])->name('checkout-proccess')->middleware('auth','verified');
Route::get('/checkout/{id}' , [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');
Route::post('/checkout/create/{detail_id}' , [CheckoutController::class, 'create'])->name('checkout.create')->middleware('auth');
Route::get('/checkout/remove/{detail_id}' , [CheckoutController::class, 'remove'])->name('checkout.remove')->middleware('auth');
Route::get('/checkout/confirm/{id}' , [CheckoutController::class, 'success'])->name('checkout.success')->middleware('auth');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function() {
    Route::get('/', [DashController::class, 'index'])->name('dashboard');
    Route::resource('travel-package',TravelPackagesController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('transaction', TransactionController::class);
    Route::resource('additional', AdditionalController::class);
});


Auth::routes(['verify' => true]);
