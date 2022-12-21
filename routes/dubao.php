<?php

use App\Http\Controllers\DuBao\dubaonhucaulaodongController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tinhhinhsudunglaodong\thongbaotinhhinhsudungldController;

//Dự báo nhu cầu lao động
Route::prefix('dubaonhucaulaodong')->group(function () {
    Route::get('danhsach', [dubaonhucaulaodongController::class, 'index']);
    Route::get('them', [dubaonhucaulaodongController::class, 'them']);
    Route::get('thaydoi', [dubaonhucaulaodongController::class, 'thaydoi']);
    Route::post('thaydoi', [dubaonhucaulaodongController::class, 'luudubao']);
    Route::post('themchitiet', [dubaonhucaulaodongController::class, 'themchitiet']);
    Route::get('indubao', [dubaonhucaulaodongController::class, 'indubao']);
    
    Route::post('/store', [thongbaotinhhinhsudungldController::class, 'store']);
    Route::post('/update/{id}', [thongbaotinhhinhsudungldController::class, 'update']);
    Route::get('/delete/{id}', [thongbaotinhhinhsudungldController::class, 'destroy']);
    Route::post('/send/{id}', [thongbaotinhhinhsudungldController::class, 'sendData']);
});