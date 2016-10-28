<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Dashboard
Route::get('/', function () {
    return view('admin.pages.dashboard.dashboard')->with('title','Dashboard');
})->name('dashboard');


//Product Options
Route::get('/allProductType', 'ProductsController@allProductType')->name('allProductType');
Route::get('/addNewProductTypeForm', 'ProductsController@addNewProductTypeForm')->name('addNewProductTypeForm');
Route::get('/addProductType', 'ProductsController@addProductType')->name('addProductType');

// Add Product Category
Route::post('/addCategory', 'ProductsController@addCategory')->name('addCategory');
