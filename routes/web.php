<?php

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
    return view('auth/login');
})->name('login-page');

Route::get('/register-page', function () {
    return view('auth/register');
})->name('register-page');

/* Les routes protégés */
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::inertia('/dashboard', 'Home')->name('dashboard');
    Route::inertia('/user', 'Profile/Show')->name('user.show');
});
