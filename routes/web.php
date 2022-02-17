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

Route::get('/','CategoryController@index');
Route::get('/add-category','CategoryController@create');
Route::post('/store-category','CategoryController@store');
Route::get('/{id}','CategoryController@subcategory');
Route::get('/order/{id}','CategoryController@order');
Route::post('/stripe','StripeController@index');