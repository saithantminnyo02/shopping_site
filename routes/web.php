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
    // return view('admin.productsTable');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'IndexController@index');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('products', "ProductController");
    Route::resource('categories', "CategoryController");
    Route::resource('admin/roles','RoleController');
    Route::resource('admin/users','UserController');

    Route::post('cart', "CartController@add");
    Route::get('cart', "CartController@list");

    Route::delete('/cart/{rowId}', "CartController@delete")->name('cart.destroy');
    Route::post('/charge/{total}', 'CheckoutController@charge')->name('charge');
    Route::get('/cashOnDelivery', 'CheckoutController@storeInOrderHistory');

    Route::get('admin/dashboard', "AdminController@index");
    Route::get('admin/productsTable', "AdminController@products");
    Route::get('admin/categoriesTable', "CategoryController@index");

    Route::get('product/{cat}', "ProductController@bycategory");

    Route::get('/orderHistory', "UserController@showOrderHistory")->name('orderHistory');
});

// Route::get('/test', "CheckoutController@storeInOrderHistory");