<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;

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

Route::redirect('/', 'login');

// Register new staff
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store']);

// User list, view profile and update profile
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/profile/{id}', [UserController::class, 'show']);
Route::get('users/profile/edit/{id}', [UserController::class, 'edit']);
Route::get('users/profile/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('users/profile/edit/{id}', [UserController::class, 'update']);
Route::get('history', [UserController::class, 'history']);

Route::get('/cart', [ItemController::class, 'myCart'])->name('item.mycart');
Route::post('/add_to_cart', [ItemController::class, 'addToCart']);
Route::get('/sales', [ItemController::class, 'index'])->name('item.index');
Route::get('/sales/edit/{id}', [ItemController::class, 'edit'])->name('item.edit');
Route::delete('/sales/{id}', [ItemController::class, 'destroy'])->name('item.destroy');
Route::put('/sales/{id}', [ItemController::class, 'update'])->name('item.update');

// Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
// Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');

Route::get('/detail/item/{id}', [ItemController::class, 'detail'])->name('item.detail');
Route::post('/sales', [ItemController::class, 'store']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::fallback(function () {
        return view('pages/utility/404');
    });
});
