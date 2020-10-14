<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/', 'AppController@index')->name('home');
});

Route::prefix('users')->namespace('App\Http\Controllers')->group(function () {
    Route::get('/test', 'UserController@test');
    Route::get('/', 'UserController@index')->name('users.index');

    Route::get('/create', 'UserController@create');
    Route::post('/create', 'UserController@create');

    Route::get('/update/{id}', 'UserController@update');
    Route::post('/delete/{id}', 'UserController@delete');

    Route::post('/save', 'UserController@save');
    Route::post('/change/{id}', 'UserController@change');
});


Auth::routes();


