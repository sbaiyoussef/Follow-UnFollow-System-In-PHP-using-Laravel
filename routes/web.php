<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/index', 'HomeController@index')->name('index');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/useraction', 'HomeController@useraction')->name('useraction');
Route::get('/checkNotification', 'HomeController@checkNotification')->name('checkNotification');
Route::get('/reloadfollowers', 'HomeController@reloadfollowers')->name('reloadfollowers');

