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


Route::get('/normal','HQ_MainController@normal_display');
Route::get('/set/place','HQ_MainController@setting_place');
Route::post('/get/place','HQ_MainController@get_place');
Route::post('/store/placelist','HQ_MainController@store_placelist');
Route::get('/danger','HQ_MainController@rain_cal');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
