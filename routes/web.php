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

Route::get('/', 'ArticlesController@index')->name('home');
Route::get('contact', 'WelcomeController@contact')->name('contact');
Route::get('about', 'PagesController@about')->name('about');

Route::resource('articles', 'ArticlesController');
