<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UrlShorterController;
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


Route::get('/', fn () => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

// route for urls
Route::resource('urls', UrlShorterController::class)->middleware(['auth', 'verified']);

// route for hit shortener url and update visit count
Route::get('{short_url}', [UrlShorterController::class, 'hitAndUpdateCount'])->name('short_url')->where('short_url', '.*q\.tec.*');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
