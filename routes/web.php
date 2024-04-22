<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['role:admin|superadmin', 'auth', 'verified'], 'prefix' => '/admin'], function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    Route::get('/product', [ProductController::class, 'index'])->name('indexProduct');
    Route::get('/product/add', [ProductController::class, 'create'])->name('addProduct');
    Route::post('/storeProduct', [ProductController::class, 'store'])->name('storeProduct');
    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('editProduct');
    Route::put('/updateProduct/{product}', [ProductController::class, 'update'])->name('updateProduct');
    Route::delete('/deleteProduct/{product}', [ProductController::class, 'destroy'])->name('deleteProduct');
    
    Route::get('/banner', [BannerController::class, 'index'])->name('indexBanner');
    Route::get('/banner/add', [BannerController::class, 'create'])->name('addBanner');
    Route::post('/banner/add', [BannerController::class, 'store'])->name('storeBanner');
    Route::get('/banner/edit/{id}', [BannerController::class, 'edit'])->name('editBanner');
    Route::put('/banner/edit/{id}', [BannerController::class, 'update'])->name('updateBanner');
    Route::get('/deleteBanner/{id}', [BannerController::class, 'destroy'])->name('deleteBanner');


    Route::get('/category', [CategoryController::class, 'index'])->name('indexCategory');
    Route::post('/storeCategory', [CategoryController::class, 'store'])->name('storeCategory');
    Route::get('/deleteCategory/{category}', [CategoryController::class, 'destroy'])->name('deleteCategory');
    Route::post('/editCategory/{category}', [CategoryController::class, 'update'])->name('editCategory');

    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::get('/indexAdmin', [AdminController::class, 'index'])->name('indexAdmin');
        Route::get('/showAdmin/{admin}', [AdminController::class, 'show'])->name('viewAdmin');
        Route::get('/addAdmin', [AdminController::class, 'create'])->name('addAdmin');
        Route::post('/storeAdmin', [AdminController::class, 'store'])->name('storeAdmin');
        Route::get('/deleteAdmin/{admin}', [AdminController::class, 'destroy'])->name('deleteAdmin');
    });

    Route::get('/orders', function () {
        return view('admin.page.orders');
    })->name('admin.orders');
});

Route::group(['middleware' => ['role:user', 'auth', 'verified']], function () {
    Route::post('/decreaseCart/{id}', [ProductController::class, 'decrease'])->name(('decreaseCart'));
    Route::post('/increaseCart/{id}', [ProductController::class, 'increase'])->name(('increaseCart'));
    Route::get('/shopCart/{id}', [ProductController::class, 'deleteCart'])->name(('deleteCart'));
    Route::post('/shopCart/{id}', [ProductController::class, 'addCart'])->name(('addCart'));
    Route::get('/shopCart', [ProductController::class, 'shopCart'])->name('shopCart');
});

Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/{product}/detail', [ProductController::class, 'single'])->name('singleProduct');
Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkoutProduct');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
