<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuhuController;
use App\Http\Controllers\NotificationController;


/*

Note:

Untuk setiap fitur bagusnya dibuatkan controller untuk mengelola -
proses yang akan dilakukan sebelum diarahkan ke suatu halaman/view

*/






// Route::get('/notifications/check', [NotificationController::class, 'checkThresholds']);
Route::post('/suhu', [SuhuController::class, 'updateparametersuhu']);
// Route::get('/suhu', [SuhuController::class, 'tampilparameterSuhu']);
Route::get('/riwayat-suhu', [SuhuController::class, 'index']);
Route::get('/suhu', [SuhuController::class, 'latestSuhu']);

Route::post('/update-notification-count', [NotificationController::class, 'updateNotificationCount'])->name('update.notification.count');



Route::get('/', [SuhuController::class, 'homeData']);
Route::get('/home', [SuhuController::class, 'homeData']);

// Route::get('/bacasuhu', [SuhuController::class, 'bacasuhu']);

// Routing halaman login
Route::get('/login', function () {
    return view('login');
});

// Routing halaman home
Route::get('/ph', function () {
    return view('ph.ph');
});

Route::get('/ppm', function () {
    return view('ppm.ppm');
});

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
