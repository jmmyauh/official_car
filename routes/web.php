<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::resource('reservations', ReservationController::class);
// ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

Route::resource('cars', CarController::class);
// ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

Route::post('/cars/search', [CarController::class, 'search'])->name('carsearch');

Route::post('/cars/keyword', [CarController::class, 'keyword'])->name('carkeyword');

