<?php

// Route::get('/', function () {
//     return view('welcome');
// });

//front Of

Route::group(['namespace'=>'Front','as' => 'front.'], function () {
    Route::get('/','FrontController@index')->name('index');
    
    Route::get('/grafik','GrafikController@index')->name('grafik.index');
    
    Route::get('/daftar_alumni','AlumniController@index')->name('alumni.index');
    
    Route::get('/ikatan_alumni','IkatanAlumniController@index')->name('ikatan_alumni.index');
    Route::get('/ikatan_alumni/{id}','IkatanAlumniController@show')->name('ikatan_alumni.show');
});



//route admin

// Route::group(['middleware' => 'auth:admin'], function () {
    
    Route::group(['prefix' => 'admin','as'=>'admin.'], function () {
        
        Route::namespace('Admin')->group(function () {
            
            Route::get('/', 'HomeController@index')->name('home');    
            
            route::get('/alumni','AlumniController@index')->name('alumni.index');
            route::get('/alumni/create','AlumniController@create')->name('alumni.create');
            route::post('/alumni','AlumniController@store')->name('alumni.store');
            Route::PUT('/alumni/{id}','AlumniController@update')->name('alumni.update');
            Route::get('/{id}/edit','AlumniController@edit')->name('alumni.edit');
            Route::get('/alumni/{id}','AlumniController@show')->name('alumni.show');
            Route::delete('/alumni/{id}','AlumniController@destroy')->name('alumni.delete');
            Route::post('/alumni/import_excel', 'AlumniController@import_excel')->name('alumni.import_excel');
            
            route::get('/ikatan_alumni','IkatanAlumniController@index')->name('ikatan_alumni.index');
            route::get('/ikatan_alumni/create','IkatanAlumniController@create')->name('ikatan_alumni.create');
            route::post('/ikatan_alumni','IkatanAlumniController@store')->name('ikatan_alumni.store');
            route::get('/ikatan_alumni/{id}/edit','IkatanAlumniController@edit')->name('ikatan_alumni.edit');
            Route::PUT('/ikatan_alumni/{id}','IkatanAlumniController@update')->name('ikatan_alumni.update');
            Route::delete('/ikatan_alumni/{id}','IkatanAlumniController@destroy')->name('ikatan_alumni.delete');
            Route::post('/images', 'IkatanAlumniController@uploadImage')->name('post.image');
            
            Route::resource('prodi', 'ProdiController');
    
            Route::resource('jurusan', 'JurusanController');
    
            Route::resource('kelulusan', 'KelulusanController');
    
            Route::resource('bidang_pekerjaan', 'BidangPekerjaanController');
    
            Route::get('laporan/alumni','LaporanController@alumni')->name('laporan_alumni');
            Route::get('laporan/jurusan','LaporanController@jurusan')->name('laporan_jurusan');
            Route::get('laporan/prodi','LaporanController@prodi')->name('laporan_prodi');
            Route::get('laporan/angkatan','LaporanController@angkatan')->name('laporan_angkatan');
        });
    
        Route::group(['namespace' => 'AuthAdmin'], function () {
            Route::post('/login', 'LoginController@login')->name('login.submit');    
            Route::get('/login', 'LoginController@showLoginForm')->name('login');
            route::get('/logout','LoginController@logout')->name('logout');    
        });
    
    });

// });


// route login alumni

Route::group(['middleware' => 'web'], function () {
    
    Auth::routes([

        'register' => false
        
        ]);
     
    Route::get('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');
    
    Route::group(['prefix'=>'alumni','namespace' => 'Alumni','as'=>'alumni.'], function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::PUT('/{id}', 'HomeController@update')->name('update');
        Route::get('/{id}/edit', 'HomeController@edit')->name('edit');
        
    });
});


