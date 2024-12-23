<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('/admin')->group(function () {
    Route::resource('/product', ProductController::class);
    Route::resource('/category', CategoryController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [WebController::class, 'home'])->name('home');
//Route::get('/fashion', [WebController::class, 'Fashion'])->name('fashion');
//Route::get('/electronics', [WebController::class, 'Electronic'])->name('electronics');
//Route::get('/jewellery', [WebController::class, 'Jewellery'])->name('jewellery');
Route::get('/about-us', [WebController::class, 'About'])->name('about');
Route::get('/products', [WebController::class, 'Products'])->name('products');
Route::get('/search', [WebController::class, 'search'])->name('search');
Route::get('/product-detail/{id}', [WebController::class, 'product_detail'])->name('product_detail');
Route::get('/add_to_cart', [WebController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/cart_details', [WebController::class, 'cart_details'])->name('cart_details');
Route::post('/remove-from-cart', [WebController::class, 'remove_from_cart'])->name('remove_from_cart');

Route::post('/place-order', [WebController::class, 'place_order'])->middleware('auth');
Route::get('/orders', [WebController::class, 'get_orders'])->middleware('auth');
Route::post('/cancel-order', [WebController::class, 'cancel_order'])->middleware('auth');




require __DIR__.'/auth.php';
