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
Route::get('/line/note', 'LineController@note')->name('line.note');
Route::get('/line/log/message', 'LineController@message_log')->name('line.message.log');
Route::get('/line/log/follow', 'LineController@follow_log')->name('line.follow.log');
Route::get('/line/log/unfollow', 'LineController@unfollow_log')->name('line.unfollow.log');
Route::get('/line/log/unfollow', 'LineController@unfollow_log')->name('line.unfollow.log');
Route::get('/line/store', 'LineController@store_list')->name('line.store');
Route::get('/line/store/code/{store}', 'LineController@generate_code')->name('line.store.code');

Route::get('/line/user', 'LineController@user_list')->name('line.user');
Route::get('/line/user/message/{line}', 'LineController@user_message')->name('line.user.message');
Route::post('/line/user/message', 'LineController@send_message')->name('line.send.user.message');
