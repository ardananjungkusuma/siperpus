<?php

Route::get('/', 'AuthController@login');

Route::get('/auth/login', 'AuthController@login')->middleware('guest')->name('login');
Route::post('/auth/postLogin', 'AuthController@postLogin');

Route::get('/auth/register', 'AuthController@registerAnggota')->middleware('guest')->name('register');
Route::post('/auth/postRegister', 'AuthController@postRegisterAnggota');

Route::get('/auth/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth', 'role:pegawai']], function () {
    Route::get('/pegawai', 'PegawaiController@index');
    Route::get('/pegawai/profile/settings', 'PegawaiController@setting');

    Route::get('/kelola/buku/daftar', 'BukuController@index');
    Route::post('/kelola/buku/tambah', 'BukuController@tambah');
    Route::get('/kelola/buku/detail/{slug}', 'BukuController@detail');
    Route::post('/kelola/buku/edit', 'BukuController@edit');
    Route::get('/kelola/buku/delete/{slug}', 'BukuController@delete');

    Route::get('/kelola/peminjaman/daftar', 'PeminjamanController@index');
    Route::post('/kelola/peminjaman/tambah', 'PeminjamanController@tambah');
    Route::get('/kelola/peminjaman/detail/{id}', 'PeminjamanController@detail');
    Route::post('/kelola/peminjaman/pengembalian', 'PeminjamanController@pengembalian');
    Route::get('/kelola/peminjaman/delete/{id}', 'PeminjamanController@delete');

    Route::get('/kelola/anggota/daftar', 'PegawaiController@daftarAnggota');
    Route::get('/kelola/anggota/status/{status}/{id}', 'PegawaiController@statusAnggota');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/kelola/pegawai/daftar', 'AdminController@daftarPegawai');
    Route::post('/kelola/pegawai/tambah', 'AdminController@tambahPegawai');
    Route::get('/kelola/pegawai/hapus/{id}', 'AdminController@hapusPegawai');
});
