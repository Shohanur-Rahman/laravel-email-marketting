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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@sendEmail')->name('sendEmail');
Route::get('/test', 'HomeController@testMail')->name('testMail');
/*
Route::get('/register', 'AccountsController@register')->name('register');
Route::post('/register', 'AccountsController@store')->name('register.store');*/