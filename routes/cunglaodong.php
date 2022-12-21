<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cunglaodong\cunglaodong_huyenController;
use App\Http\Controllers\Cunglaodong\cunglaodong_tinhController;
use App\Http\Controllers\Cunglaodong\cunglaodongController;
use App\Http\Controllers\Cunglaodong\messageCotroller;

Route::prefix('cungld')->group(function () {
    Route::prefix('thongbao')->group(function () {
        Route::get('/', [messageCotroller::class, 'index']);
        Route::get('/create', [messageCotroller::class, 'create']);
        Route::get('/edit/{id}', [messageCotroller::class, 'edit']);
        Route::post('/store', [messageCotroller::class, 'store']);
        Route::post('/update/{id}', [messageCotroller::class, 'update']);
        Route::get('/delete/{id}', [messageCotroller::class, 'destroy']);
        Route::get('/chitiet/{id}', [messageCotroller::class, 'show']);
        Route::post('/send/{id}', [messageCotroller::class, 'guithongbao']);
    });
    // Tổng hợp danh sách  cung lao động
    Route::prefix('danh_sach')->group(function () {
        Route::prefix('don_vi')->group(function () {
            Route::get('/', [cunglaodongController::class, 'index']);
            Route::get('/thongbao', [cunglaodongController::class, 'nhanthongbao']);
            Route::get('/create', [cunglaodongController::class, 'create']);
            Route::get('/edit/{id}', [cunglaodongController::class, 'edit']);
            Route::post('/store', [cunglaodongController::class, 'store']);
            Route::post('/update/{id}', [cunglaodongController::class, 'update']);
            Route::get('/delete/{id}', [cunglaodongController::class, 'destroy']);
            Route::post('/chi_tiet/{id}', [cunglaodongController::class, 'show']);
            Route::post('/send/{id}', [cunglaodongController::class, 'senddata']);
            Route::get('/lydo/{id}', [cunglaodongController::class, 'lydo']);
            Route::get('/tonghop', [cunglaodongController::class, 'tonghop']);
        });
        Route::prefix('huyen')->group(function () {
            Route::get('/', [cunglaodong_huyenController::class, 'index']);
            Route::get('/tong_hop', [cunglaodong_huyenController::class, 'tonghop']);
            Route::post('/send', [cunglaodong_huyenController::class, 'sendata']);
            Route::post('/tralai', [cunglaodong_huyenController::class, 'tralai']);
            Route::get('/lydo', [cunglaodong_huyenController::class, 'lydo']);

            Route::get('/in', [cunglaodong_huyenController::class, 'indanhsach']);
            Route::post('/intonghop', [cunglaodong_huyenController::class, 'intonghop']);
        });

        Route::prefix('tinh')->group(function () {
            Route::get('/', [cunglaodong_tinhController::class, 'index']);
            Route::get('/tong_hop', [cunglaodong_tinhController::class, 'show']);
            Route::post('/tralai', [cunglaodong_tinhController::class, 'tralai']);

            Route::get('/intonghop', [cunglaodong_tinhController::class, 'intonghop']);
            Route::post('/intonghop_tinh', [cunglaodong_tinhController::class, 'intonghop_tinh']);
        });
    });
});