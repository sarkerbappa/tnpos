<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::resource('api/product_category', 'ProductCategoryController');
Route::get('/autocomplete/{id}', 'ProductCategoryController@autocomplete')->name('autocomplete');
Route::get('/autocomplete_sub_cat/{id}/{sv}', 'ProductCategoryController@autocompleteSubCat')->name('autocomplete_sub_cat');
Route::resource('api/product_sub_category', 'ProductSubCategoryController');