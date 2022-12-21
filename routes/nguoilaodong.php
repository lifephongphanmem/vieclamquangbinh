<?php

use App\Http\Controllers\Cunglaodong\cunglaodongController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Nguoilaodong\nguoilaodongController;




//thông tin người lao động
Route::prefix('nguoilaodong')->group(function () {
    Route::get('/', [nguoilaodongController::class, 'index']);
    Route::get('/nuoc_ngoai', [nguoilaodongController::class, 'index_nuocngoai']);
    Route::get('/them_moi', [nguoilaodongController::class, 'create']);
    Route::get('/edit/{id}', [nguoilaodongController::class, 'edit']);
    Route::post('/store', [nguoilaodongController::class, 'store']);
    Route::post('/update/{id}', [nguoilaodongController::class, 'update']);
    Route::get('/delete/{id}', [nguoilaodongController::class, 'destroy']);
    Route::post('/import', [nguoilaodongController::class, 'importFile']);
    Route::get('/SuaDanhSach/{id}', [cunglaodongController::class, 'SuaDanhSach']);
    Route::post('/CapNhatDanhSach/{id}', [cunglaodongController::class, 'CapNhatDanhSach']);

    Route::prefix('nuoc_ngoai')->group(function () {
        Route::get('/', [nguoilaodongController::class, 'index_nuocngoai']);
        Route::get('/create', [nguoilaodongController::class, 'create_nuocngoai']);
        Route::get('/edit/{id}', [nguoilaodongController::class, 'edit_nuocngoai']);
        Route::post('/store', [nguoilaodongController::class, 'store_nuocngoai']);
        Route::post('/update/{id}', [nguoilaodongController::class, 'update_nuocngoai']);
        Route::get('/delete/{id}', [nguoilaodongController::class, 'destroy_nuocngoai']);
        Route::get('/in', [nguoilaodongController::class, 'danhsach_nuocngoai']);
        Route::post('/nhanexcel', [nguoilaodongController::class, 'nhanExcelNuocngoai']);
        Route::get('/tonghop',[nguoilaodongController::class,'tonghop_nuocngoai']);
        Route::post('/tonghop',[nguoilaodongController::class,'tonghop']);

        Route::get('/XoaTongHop/{id}',[nguoilaodongController::class,'XoaTongHop']);
        Route::get('/InTongHop',[nguoilaodongController::class,'InTongHop']);
    });
});