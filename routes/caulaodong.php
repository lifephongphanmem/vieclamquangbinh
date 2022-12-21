<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Caulaodong\thongbaoController;
use App\Http\Controllers\Caulaodong\nhucautuyendungController;
use App\Http\Controllers\Caulaodong\nhucautuyendungctController;



Route::prefix('tuyen_dung')->group(function () {
    //thông báo
    Route::get('damh_sach_thong_bao', [thongbaoController::class, 'thongbaodagui']);
    Route::get('hopthucauld',[ThongbaoController::class,'hopthucauld']);

    Route::get('/them_moi', [thongbaoController::class, 'create']);
    Route::post('/store', [thongbaoController::class, 'store']);
    Route::get('/chinh_sua', [thongbaoController::class, 'edit']);
    Route::post('/update', [thongbaoController::class, 'update']);
    Route::get('/delete/{id}', [thongbaoController::class, 'delete']);
    Route::post('/chuyen', [thongbaoController::class, 'chuyen']);
    Route::get('/indanhsachcauld', [thongbaoController::class, 'indanhsachcauld']);
    Route::post('/nhanExcel',[nhucautuyendungController::class,'nhanExcel']);
    // khai bao
    Route::prefix('/khai_bao_nhu_cau')->group(function () {
        Route::get('dot_thu_thap', [thongbaoController::class, 'khaibao']);

        Route::get('', [nhucautuyendungController::class, 'index_khaibao']);
        Route::get('/them_moi', [nhucautuyendungController::class, 'create']);
        Route::post('/store', [nhucautuyendungController::class, 'store']);
        Route::get('/chinh_sua', [nhucautuyendungController::class, 'edit']);
        Route::post('/update', [nhucautuyendungController::class, 'update']);
        Route::post('/chuyen', [nhucautuyendungController::class, 'chuyen']);
        Route::get('/xem', [nhucautuyendungController::class, 'show']);
        Route::get('/delete/{id}', [nhucautuyendungController::class, 'delete']);
        //chi tiết
        Route::post('/store_ct', [nhucautuyendungctController::class, 'store']);
        Route::get('/edit_ct', [nhucautuyendungctController::class, 'edit']);
        Route::post('/update_ct', [nhucautuyendungctController::class, 'update']);
        Route::get('/delete_ct', [nhucautuyendungctController::class, 'delete']);
    });
    // tổng hợp
    Route::prefix('/thong_tin_tong_hop')->group(function () {
        Route::get('dot_thu_thap', [thongbaoController::class, 'tonghop']);


        Route::get('', [nhucautuyendungController::class, 'index_tonghop']);
        Route::post('/tralai', [nhucautuyendungController::class, 'tralai']);
    });
});

