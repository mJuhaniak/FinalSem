<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CabinController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
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
Route::get('/cab', [CabinController::class, 'show'])->name('cabin');
Route::get('/calendar', [HomeController::class, 'calendar'])->name('calendar');
Route::post('/checkEmail', [RegisterController::class, 'checkEmailAvailability'])->name('email_available.check');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('user', UserController::class);
    Route::get('user/{id}/profile',  [UserController::class, 'profile'])->name('user.profile');
    Route::get('user/{id}/profile/reservations', [ReservationController::class, 'show'])->name('user.reservations');
    Route::get('user/{user}/delete', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('/getData/{id}','\App\Http\Controllers\UserController@getUserData');
    Route::resource('reservation', ReservationController::class);
    Route::get('reservations/{reservation}/delete',  [ReservationController::class, 'destroy'])->name('reservations.delete');
});

Route::resource('reservation', ReservationController::class);
Route::get('reservations/{cabin}',  [ReservationController::class, 'index'])->name('reservations');
Route::resource('cabin', CabinController::class);
Route::get('cabin/{cabin}/delete', [CabinController::class, 'destroy'])->name('cabin.delete');


