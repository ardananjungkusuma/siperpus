<?php

Route::get('/', 'AuthController@login');

Route::get('/auth/login', 'AuthController@login')->middleware('guest')->name('login');
Route::post('/auth/postLogin', 'AuthController@postLogin');

Route::get('/auth/register', 'AuthController@registerAnggota')->middleware('guest')->name('register');
Route::post('/auth/postRegister', 'AuthController@postRegisterAnggota');

Route::get('/auth/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth', 'role:pegawai']], function () {
    Route::get('/pegawai', 'PegawaiController@index');

    Route::get('/kelola/buku/daftar', 'BukuController@index');
    Route::post('/kelola/buku/tambah', 'BukuController@tambah');
    Route::get('/kelola/buku/detail/{id}', 'BukuController@detail');
    // Route::get('/kelola/anggota/daftar', 'BukuController@index');

    // Route::get('/kelola/anggota/daftar', 'BukuController@index');
});
