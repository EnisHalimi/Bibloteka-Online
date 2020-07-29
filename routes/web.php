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

Route::get('/', 'HomeController@index');
Auth::routes();
Route::resource('users', 'UsersController');
Route::resource('libri', 'LibriController');
Route::resource('autor', 'AutoriController');
Route::resource('zhaner', 'ZhanriController');
Route::get('/kartoni', 'UsersController@kartoni');
Route::get('/librat', 'LibriController@librat');
Route::get('/zhanret', 'ZhanriController@zhanret');
Route::get('/autoret', 'AutoriController@autoret');
Route::get('/zhanret-list', 'ZhanriController@zhanretList');
Route::get('/autoret-list', 'AutoriController@autoretList');
Route::post('/rent', 'LibriController@rent')->name('rent');
Route::post('/return', 'LibriController@return')->name('return');
