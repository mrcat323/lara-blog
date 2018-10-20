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

// Simple pages; home, about, dashboard

Route::get('/','AboutController@index');
Route::get('/about','AboutController@about');
Route::get('/home', 'HomeController@index')->name('home');

// posts all-in-one

Route::resource('posts', 'PostsController');

// password reset; forgot and etc

Route::get('/api/user/reset/', '\App\Http\Controllers\Api\ForgotPasswordController@showLinkResetForm');
Route::post('/api/user/email/', '\App\Http\Controllers\Api\ForgotPasswordController@sendResetLinkEmail');
Route::get('/api/user/reset/{token}', '\App\Http\Controllers\Api\ResetPasswordController@showResetsForm');
Route::post('/api/user/reset', '\App\Http\Controllers\Api\ResetPasswordController@reset');

// auth routes

Auth::routes();
