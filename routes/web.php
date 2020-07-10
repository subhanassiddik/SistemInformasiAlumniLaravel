<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin','as'=>'admin.'], function () {
    
    Route::get('/', 'AdminController@index')->name('home');    

    Route::group(['namespace' => 'AuthAdmin'], function () {
        Route::post('/login', 'LoginController@login')->name('login.submit');    
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        route::get('/logout','LoginController@logout')->name('logout');    
    });

    route::get('/alumni','AlumniController@index')->name('alumni.index');
    route::get('/alumni/create','AlumniController@create')->name('alumni.create');
    route::post('/alumni','AlumniController@store')->name('alumni.store');
    Route::PUT('/alumni/{id}','AlumniController@update')->name('alumni.update');
    Route::get('/{id}/edit','AlumniController@edit')->name('alumni.edit');
    Route::delete('/alumni/{id}','AlumniController@destroy')->name('alumni.delete');
    Route::post('/alumni/import_excel', 'AlumniController@import_excel')->name('alumni.import_excel');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
