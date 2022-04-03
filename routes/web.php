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

// Route::get('/', function () {
//     return view('welcome');
// });

// Returns the home view.
Route::get('/', 'App\Http\Controllers\ViewController@getHomeView')
    ->name('home-view');

// Returns the products view with refreshed data.
Route::get('/productos', 'App\Http\Controllers\ViewController@getProductsView')
    ->name('products-view');

// Returns the orders view with refreshed data.
Route::get('/cesta', 'App\Http\Controllers\ViewController@getOrderView')
    ->name('order-view');

// Inserts a new product and refreshes/loads the products view.
Route::post('/postProduct', 'App\Http\Controllers\ViewController@postProduct')
    ->name('post-product');

// Inserts a new order line and refreshes/loads the orders view.
Route::post('/postOrder', 'App\Http\Controllers\ViewController@postOrder')
    ->name('post-order');

// Updates the quantity of a given order line
Route::post('/updateOrderQuantity', 'App\Http\Controllers\ViewController@updateOrderQuantity')
    ->name('update-order-quantity');
