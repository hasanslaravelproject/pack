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

/* Route::get('/', function () {
    return view('backend.dashboard.admin');
}); */
Route::get('subscriptionpacks', [\App\Http\Controllers\SubscriptionController::class, 'index']);

Route::post('subscriptionpacks/create', [\App\Http\Controllers\SubscriptionController::class, 'create']);
Route::get('subscriptionpacks/edit/{id}', [\App\Http\Controllers\SubscriptionController::class, 'edit']);
Route::post('subscriptionpacks/update', [\App\Http\Controllers\SubscriptionController::class, 'update']);
Route::post('subscriptionpacks/delete', [\App\Http\Controllers\SubscriptionController::class, 'delete']);
Route::get('subscriptionpacks/status/{id}', [\App\Http\Controllers\SubscriptionController::class, 'status']);
Route::get('subscribe/{id}', [\App\Http\Controllers\SubcribeController::class, 'index']);
Route::get('subscribe/create/{id}', [\App\Http\Controllers\SubcribeController::class, 'create']);

Route::get('clients', [\App\Http\Controllers\ClientController::class, 'index']);
Route::post('clients/create', [\App\Http\Controllers\ClientController::class, 'create']);
Route::get('clients/edit/{id}', [\App\Http\Controllers\ClientController::class, 'edit']);
Route::post('clients/update', [\App\Http\Controllers\ClientController::class, 'update']);
Route::post('clients/delete', [\App\Http\Controllers\ClientController::class, 'delete']);
//Route::get('clients/status/{id}', [\App\Http\Controllers\ClientController::class, 'status']);

Route::get('stripe/{total}', [\App\Http\Controllers\StripePaymentController::class, 'stripe']);
Route::post('stripe', [\App\Http\Controllers\StripePaymentController::class, 'stripePost'])->name('stripe.post');
Route::get('admin', [\App\Http\Controllers\StripePaymentController::class, 'stripe']);


Route::get('/', [\App\Http\Controllers\ProductsController::class, 'index']);
Route::get('cart', [\App\Http\Controllers\ProductsController::class, 'cart']);
Route::get('/paymentpage', [\App\Http\Controllers\ProductsController::class, 'paymentpage']);
Route::get('add-to-cart/{id}', [\App\Http\Controllers\ProductsController::class, 'addToCart']);
Route::get('update-cart', [\App\Http\Controllers\ProductsController::class, 'index']);
Route::get('remove-from-cart', [\App\Http\Controllers\ProductsController::class, 'index']);


