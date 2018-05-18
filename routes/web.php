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

use Stripe\{Stripe, Charge, Customer};

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/user/profile/{user}', 'UserProfileController')->name('user.profile')->middleware('auth');

Route::resource('tours', 'ToursController')->middleware(['auth', 'admin']);
Route::resource('services', 'ServicesController')->only(['index', 'store', 'destroy'])->middleware(['auth', 'admin']);

Route::get('/user/order/tour', 'OrderToursController@index')->middleware('auth')->name('order.tour');
Route::get('/user/order/show/{tour}', 'OrderToursController@show')->middleware('auth')->name('order.tour.show');

Route::post('/purchases', function (\Illuminate\Http\Request $request) {
    Stripe::setApiKey(config('services.stripe.secret'));

    $customer = Customer::create([
        'email' => $request->stripeEmail,
        'source' => $request->stripeToken
    ]);

    Charge::create([
        'customer' => $customer->id,
        'amount' => 2500,
        'currency' => 'uah'
    ]);

    return 'All done';
});