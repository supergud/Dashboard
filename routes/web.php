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

Route::get('/', 'StoreController@index')->name('home');

Route::resource('store', 'StoreController');

Route::get('/store/report/{store}', 'StoreController@report')->name('store.report');

Route::get('/line', 'LineController@index')->name('line');