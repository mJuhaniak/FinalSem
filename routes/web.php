<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
    return view('home', ['name' => 'Úvod', 'info' => 'textÚvod']);
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/info', [HomeController::class, 'info'])->name('info');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/reservations', [HomeController::class, 'reservations'])->name('reservations');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('user', UserController::class);
    Route::get('user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');
});
