<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('API')->name('api.')->group(function () {
    // Outra forma de fazer
    // Route::get('/products', 'ProductController@index')->name('products');

    Route::prefix('products')->group(function () {

        Route::get('/', 'ProductController@index')->name('index_products');
        Route::get('/{id}', 'ProductController@show')->name('single_products');

        Route::post('/', 'ProductController@store')->name('store_products');
        Route::put('/{id}', 'ProductController@update')->name('update_products'); // update
    });
});

//TODO continuar video em 46:12