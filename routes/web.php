<?php

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

Auth::routes();

Route::get('/user/profile/{user}', 'UserProfileController')->name('user.profile')->middleware('auth');

Route::resource('tours', 'ToursController')->middleware(['auth', 'admin']);
Route::resource('services', 'ServicesController')->only(['index', 'store', 'destroy'])->middleware(['auth', 'admin']);