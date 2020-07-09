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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin','as'=>'admin.'], function () {
    
    Route::get('/', 'AdminController@index')->name('home');    
    
    route::get('/alumni','AlumniController@index')->name('alumni.index');
    route::get('/alumni/create','AlumniController@create')->name('alumni.create');
    route::post('/alumni','AlumniController@store')->name('alumni.store');

    Route::group(['namespace' => 'AuthAdmin'], function () {
        Route::post('/login', 'LoginController@login')->name('login.submit');    
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        route::get('/logout','LoginController@logout')->name('logout');    
    });
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');