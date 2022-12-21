<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tinhhinhsudunglaodong\thongbaotinhhinhsudungldController;
use App\Http\Controllers\Tinhhinhsudunglaodong\tinhhinhsudungldController;
use App\Http\Controllers\Tinhhinhsudunglaodong\tonghop_tinhhinhsudungldController;



//Quản lý tình hình sử dụng lao động
Route::prefix('tinhhinhsudungld')->group(function () {
    Route::prefix('thongbao')->group(function () {
        Route::get('/', [thongbaotinhhinhsudungldController::class, 'index']);
        Route::get('/edit/{id}', [thongbaotinhhinhsudungldController::class, 'edit']);
        Route::post('/store', [thongbaotinhhinhsudungldController::class, 'store']);
        Route::post('/update/{id}', [thongbaotinhhinhsudungldController::class, 'update']);
        Route::get('/delete/{id}', [thongbaotinhhinhsudungldController::class, 'destroy']);
        Route::post('/send/{id}', [thongbaotinhhinhsudungldController::class, 'sendData']);
    });
    Route::prefix('don_vi')->group(function () {
        Route::get('/thongbao', [tinhhinhsudungldController::class, 'index']);
        Route::get('/danhsach', [tinhhinhsudungldController::class, 'danhsach']);
        Route::post('/store', [tinhhinhsudungldController::class, 'store']);
        Route::get('/delete/{id}', [tinhhinhsudungldController::class, 'destroy']);
        Route::post('/send/{id}', [tinhhinhsudungldController::class, 'sendData']);
        Route::get('/lydo/{id}', [tinhhinhsudungldController::class, 'lydo']);
        Route::get('/intonghop',[tinhhinhsudungldController::class,'intonghop']);
        Route::get('/tonghop',[tinhhinhsudungldController::class,'tonghop']);
    });
    Route::prefix('tinh')->group(function () {
        Route::get('/tonghop', [tonghop_tinhhinhsudungldController::class, 'index']);
        Route::get('/xem_du_lieu', [tonghop_tinhhinhsudungldController::class, 'show']);
        Route::post('/tralai', [tonghop_tinhhinhsudungldController::class, 'tralai']);
        Route::get('/intonghop', [tonghop_tinhhinhsudungldController::class, 'tonghop']);
    });
});