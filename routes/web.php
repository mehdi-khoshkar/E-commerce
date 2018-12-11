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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('adminPanel')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'AuthAdmin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AuthAdmin\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'AuthAdmin\AdminLoginController@logout')->name('admin.logout');
    Route::get('/product', 'ProductController@index')->name('admin.product.index');
    Route::get('/addProduct', 'ProductController@add')->name('admin.product.add');
    Route::post('/saveProduct', 'ProductController@save')->name('admin.product.save');


});


    Route::get('/', 'FrontController@index')->name('front.index');
    Route::get('product/{product}', 'FrontController@showSingleProduct')->name('front.single.product');


















