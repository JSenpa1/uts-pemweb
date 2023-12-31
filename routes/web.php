<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;
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
    return view('main');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/add_process', function () {
    return view('add_process');
});

Route::get('/UserMenu', function()
{
    return view('/UserMenu');
});


Route::get('/home', [HomeController::class,'index'])->middleware(['auth', 'verified'])->name('home');

Route::get('post', [HomeController::class,'post'])->middleware(['auth', 'admin']);

Route::get('addRestaurant', [HomeController::class,'addRestaurant'])->middleware(['auth', 'admin']);

Route::post('add_process', [RestaurantController::class, 'addProcess']);

Route::get('/getEditAdmin/{id}', [RestaurantController::class, 'getEditAdmin'])->name('getEditAdmin');

Route::post('edit_process', [RestaurantController::class, 'editProcess']);

Route::get('/getDeleteAdmin/{id}', [RestaurantController::class, 'getDeleteAdmin'])->name('getDeleteAdmin');

Route::get('/checkAuth1/{productId}', [UserController::class, 'checkAuth1'])->middleware(['auth', 'verified'])->name('checkAuth1');

Route::get('/UserCart', [UserController::class, 'viewCart'])->middleware(['auth', 'verified'])->name('UserCart');

Route::get('/deleteCart/{productId}', [UserController::class, 'deleteCart'])->middleware(['auth', 'verified'])->name('deleteCart');

Route::get('/checkOut', [UserController::class, 'checkOut'])->middleware(['auth', 'verified'])->name('checkOut');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
