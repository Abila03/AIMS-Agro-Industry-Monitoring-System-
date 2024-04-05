<?php

use Illuminate\Support\Facades\Route;


/*

Note:

Untuk setiap fitur bagusnya dibuatkan controller untuk mengelola -
proses yang akan dilakukan sebelum diarahkan ke suatu halaman/view

*/

Route::get('/', function(){
    return view('welcome');
});

// Routing halaman login
Route::get('/login', function () {
    return view('login');
});

// Routing halaman home
Route::get('/home', function () {
    return view('home');
});

// Routing fitur suhu
Route::get('/suhu', function(){
    return view('suhu.suhu');
});
Route::get('/riwayat-suhu', function(){
    return view('suhu.riwayat');
});
