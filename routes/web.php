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

Route::get('/','Controller@welcome');
Route::get('/home', 'HomeController@index')->name('home');

// Auth Routes:
    // Login Routes:
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    // Registration Routes:
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    Route::delete('register', 'Auth\RegisterController@delete');
    // Password Routes:
    Route::get('password', 'Auth\RegisterController@showPasswordForm')->name('password');
    Route::post('password', 'Auth\RegisterController@Password');

// School Route
Route::get('school','SchoolController@index')->name('school');
Route::post('school','SchoolController@create');

// Report Routes
Route::get('report/{id}','ReportController@index')->name('report');
Route::post('report','ReportController@create')->name('report_post');
Route::patch('report','ReportController@patch');

// Trainer Routes