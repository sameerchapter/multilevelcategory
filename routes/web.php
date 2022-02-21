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

Route::group(['middleware' => ['auth']], function () { 
Route::get('/add-category','CategoryController@create');
Route::post('/store-category','CategoryController@store');
Route::get('/order/{id}','CategoryController@order');
Route::post('/stripe','StripeController@index');
Route::get('/categories','CategoryController@list_categories');
Route::post('/delete-cat','CategoryController@delete');
Route::get('/category/edit/{id}','CategoryController@edit');
Route::post('/update-category/{id}','CategoryController@update');
});

Route::get('/','CategoryController@index');
Route::get('/category/{id}','CategoryController@subcategory');
Route::get('login', 'CustomAuthController@index')->name('login');
Route::post('/login','CustomAuthController@customLogin');
Route::get('/registration','CustomAuthController@adduser');
Route::post('/registration','CustomAuthController@updateuser');