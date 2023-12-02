<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
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

Route::get('/', [HalamanController::class, 'showLandingPage'])->name('showlandingpage');
Route::get('/login', [HalamanController::class, 'showLogin'])->name('showlogin');
Route::post('/sign-in', [LoginController::class, 'signIn'])->name('signIn');
Route::post('/sign-up', [LoginController::class, 'signUp'])->name('signUp');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/auth/redirect', [LoginController::class, 'redirectToProvider'])->name('redirectoprovider');
Route::get('/auth/callback', [LoginController::class, 'handleProviderCallback'])->name('handleprovidercallback');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [HalamanController::class, 'showDashboard'])->name('dashboard');
    // Rute-rute admin lainnya

    // Route dashboard
    Route::get('/dashboard/product', [HalamanController::class, 'showReadProduct'])->name('readproduct');
    Route::get('/dashboard/product/create', [HalamanController::class, 'showCreateProduct'])->name('createproduct');
    Route::get('/dashboard/product/edit/{id}', [HalamanController::class, 'showEditProduct'])->name('editproduct');
    Route::post('/dashboard/product/create', [ProductController::class, 'storeProduct'])->name('storeproduct');
    Route::post('/dashboard/product/update', [ProductController::class, 'updateProduct'])->name('updateproduct');
    Route::get('/dashboard/product/destroy/{id}', [ProductController::class, 'destroy'])->name('destroyproduct');

    // route user
    Route::get('/user', [HalamanController::class, 'showUser'])->name('user');
});

Route::middleware(['authcheck'])->group(function () {
    Route::get('/myaccount', [HalamanController::class, 'showMyAccount'])->name('myaccount');
    Route::post('/savepersonalinfo', [UserController::class, 'savePersonalInfo'])->name('savepersonalinfo');
    Route::get('/katalog', [HalamanController::class, 'showKatalog'])->name('katalog');
    Route::get('/katalog/{id}', [HalamanController::class, 'showDetailed'])->name('showdetailkatalog');
    // Rute-rute yang hanya bisa diakses oleh pengguna yang sudah login
    Route::post('/order', [OrderController::class, 'orderNow'])->name('ordernow');
    Route::get('/myorder', [HalamanController::class, 'myOrder'])->name('myorder');
    Route::get('/invoice/{id}', [HalamanController::class, 'invoice'])->name('invoice');
    Route::get('/home', [HalamanController::class, 'showHomepage'])->name('home');
});


// Route::get('/dashboard', [HalamanController::class, 'showDashboard'])->name('dashboard');/
// Tambahkan rute lain yang hanya bisa diakses oleh admin di sini

/**
 * socialite auth
 */