<?php

use Illuminate\Support\Facades\Route;

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
});

Route::get('/register', 'Auth\AuthController@register')->name('register');
Route::post('/register', 'Auth\AuthController@storeUser');

Route::get('/login', 'Auth\AuthController@login')->name('login');
Route::post('/login', 'Auth\AuthController@authenticate');
Route::get('logout', 'Auth\AuthController@logout')->name('logout');

Route::get('home', 'Auth\AuthController@home')->name('home');


Route::get('/register-image', 'ImageController@register')->name('register_image');
Route::post('/store', 'ImageController@store')->name('store');
Route::get('/home-image', 'ImageController@index')->name('home_image');
Route::get('/home/{id}', 'ImageController@destroy')->name('delete_image');

