<?php

use App\Http\Controllers\BagController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard',['name' => 'Hermos@']);
})->middleware(['auth', 'verified'])->name('dashboard');

//Bags Catalog route
Route::middleware(['auth:sanctum'])->group(function(){
    Route::controller(BagController::class)->group(function(){
        Route::get('/bags','index');
        Route::post('/bags','addProduct');
        Route::get('/bags/{id}','read');
        Route::post('/bags/edit','update');
        Route::delete('/bags/{id}','delete');
    });
});

//Bags cart route
//Bags route
Route::middleware(['auth:sanctum'])->group(function(){
    Route::controller(CartController::class)->group(function(){
        Route::get('/cart','index');
        Route::get('/cart/{id}','read');
        Route::post('/cart/edit','update');
        Route::delete('/bags/{id}','delete')->name('cart.delete');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
