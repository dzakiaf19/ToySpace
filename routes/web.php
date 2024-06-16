<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\MidtransController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\UserAddressController;
use App\Models\Category;

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
    Route::get('/dashboard', [OrderController::class, 'dashboard'])->name('admin.dashboard');
    Route::put('/dashboard/{order}', [OrderController::class, 'noresi'])->name('order.resi');

    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('product.images', ProductImageController::class)->shallow()->only([
        'index', 'create', 'store', 'destroy',
    ]);

    // Route::get('/banner', [BannerController::class, 'index'])->name('indexBanner');
    // Route::get('/banner/add', [BannerController::class, 'create'])->name('addBanner');
    // Route::post('/banner/add', [BannerController::class, 'store'])->name('storeBanner');
    // Route::get('/banner/edit/{id}', [BannerController::class, 'edit'])->name('editBanner');
    // Route::put('/banner/edit/{id}', [BannerController::class, 'update'])->name('updateBanner');
    // Route::get('/deleteBanner/{id}', [BannerController::class, 'destroy'])->name('deleteBanner');

    Route::group(['middleware' => ['role:superadmin']], function () {
        Route::resource('admin', AdminController::class);
        // Route::get('/indexAdmin', [AdminController::class, 'index'])->name('indexAdmin');
        // Route::get('/showAdmin/{admin}', [AdminController::class, 'show'])->name('viewAdmin');
        // Route::get('/addAdmin', [AdminController::class, 'create'])->name('addAdmin');
        // Route::post('/storeAdmin', [AdminController::class, 'store'])->name('storeAdmin');
        // Route::get('/editAdmin/{admin}', [AdminController::class, 'edit'])->name('editAdmin');
        // Route::get('/deleteAdmin/{admin}', [AdminController::class, 'destroy'])->name('deleteAdmin');
    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/editPassword', [AdminController::class, 'editPassword'])->name('editPassword');
        Route::get('/updatePassword', [AdminController::class, 'updatePassword'])->name('updatePassword');
    });

    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders');
});

Route::group(['middleware' => ['role:user', 'auth', 'verified']], function () {
    Route::post('/decreaseCart/{id}', [CartController::class, 'decrease'])->name(('decreaseCart'));
    Route::post('/increaseCart/{id}', [CartController::class, 'increase'])->name(('increaseCart'));
    Route::delete('/deleteCart/{id}', [CartController::class, 'deleteCart'])->name(('deleteCart'));
    Route::post('/shopCart/{product}', [CartController::class, 'addCart'])->name(('addCart'));
    Route::get('/shopCart', [CartController::class, 'shopCart'])->name('shopCart');
    Route::get('/checkout/{id}-{address}', [CartController::class, 'checkout'])->name('checkoutProduct');
    Route::post('/checkout/payment/{id}-{address}', [OrderController::class, 'store'])->name('paymentProduct');

    Route::resource('address', UserAddressController::class);
    
    Route::get('/orderhistory', [OrderController::class, 'history'])->name('pesananSaya');
    //detail order history
    Route::get('/{order}/ohdetails', [OrderController::class, 'historyDetails'])->name('psDetails');
    Route::get('/{order}/selesai', [OrderController::class, 'finishorder'])->name('selesai.pesan');
    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/invoice/{order}', [OrderController::class, 'show'])->name('invoice.show');
    Route::get('/invoice/{order}/pdf', [OrderController::class, 'downloadPDF'])->name('invoice.pdf');
});

Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/{product}/detail', [ProductController::class, 'single'])->name('singleProduct');
Route::get('/pageProducts', [ProductController::class, 'pageProducts'])->name('pageProducts');
//contactUs
Route::get('/contact', [OrderController::class, 'contactUs'])->name('contactUs');
//aboutUs
Route::get('/about', [OrderController::class, 'aboutUs'])->name('aboutUs');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__ . '/auth.php';
