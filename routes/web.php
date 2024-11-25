<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/admin')->group(function () {
    Route::resource('/product', ProductController::class);
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', [WebController::class, 'home'])->name('home');
Route::get('/fashion', [WebController::class, 'Fashion'])->name('fashion');
Route::get('/electronics', [WebController::class, 'Electronic'])->name('electronics');
Route::get('/jewellery', [WebController::class, 'Jewellery'])->name('jewellery');
Route::get('/about-us', [WebController::class, 'About'])->name('about');
Route::get('/products', [WebController::class, 'Products'])->name('products');


require __DIR__.'/auth.php';
