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
Route::any('/addProduct', 'ProductsController@addProduct')->name('addProduct');
Route::any('/productEditForm/{id}', 'ProductsController@productEditForm')->name('productEditForm');
Route::any('/productEditForm', 'ProductsController@productEditSave')->name('productEditSave');
Route::any('/productDelete/{id}', 'ProductsController@productDelete')->name('productDelete');


// Stock in
Route::get('/allStokIn', 'stockInFormController@allStokIn')->name('allStokIn');
Route::any('/stockInForm', 'stockInFormController@stockInForm')->name('stockInForm');




