<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuhuController;
use App\Http\Controllers\PhController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;



/*

Note:

Untuk setiap fitur bagusnya dibuatkan controller untuk mengelola -
proses yang akan dilakukan sebelum diarahkan ke suatu halaman/view

*/


Route::get('/', [UserController::class, 'welcome'])->name('welcome');
Route::get('/home', [HomeController::class, 'homeData'])->name('home');

Route::get('/suhu', [SuhuController::class, 'latestSuhu']);
Route::post('/suhu', [SuhuController::class, 'updateparametersuhu']);

Route::get('/riwayat-suhu', [SuhuController::class, 'index'])->name('suhu.riwayat');

Route::get('/ph', [PhController::class, 'latestPh']);
Route::post('/ph', [PhController::class, 'updateparameterph']);

Route::get('/riwayat-ph', [PhController::class, 'index'])->name('ph.riwayat');


Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'create'])->name('register.submit');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/home', [UserController::class, 'login'])->name('login.submit');
Route::post('/login', [UserController::class, 'logout'])->name('logout');

Route::get('/get-notif', [NotificationController::class, 'checkNotifications'])->name('notifications');


// Routing halaman home


Route::get('/ppm', function () {
    return view('ppm.ppm');
});


// Route::get('/notifications', [NotificationController::class, 'index']);
// Route::post('/notifications/mark-all-as-read', [NotificationController::class, 'markAllAsRead']);
// Show registration form


// Route::get('/notifications/check', [NotificationController::class, 'checkThresholds']);


// Route::get('/riwayat-suhu', [SuhuController::class, 'index']);
;






// Route::get('/riwayat-suhu/filter/jam', [SuhuController::class, 'filterByJam'])->name('suhu.filter.jam');
// Route::get('/riwayat-suhu/filter/hari', [SuhuController::class, 'filterByHari'])->name('suhu.filter.hari');
// Route::get('/riwayat-suhu/filter/bulan', [SuhuController::class, 'filterByBulan'])->name('suhu.filter.bulan');


// Route::get('/suhu', [HomeController::class, ''])->name('home');

// Route::get('/bacasuhu', [SuhuController::class, 'bacasuhu']);

// Routing halaman login


// Route::get('/home', function () {
//     return view('home');
// });

// Routing fitur suhu
// Route::get('/suhu', function(){
//     return view('suhu.suhu');
// });
// Route::get('/riwayat-suhu', function(){
//     return view('suhu.riwayat');
// });