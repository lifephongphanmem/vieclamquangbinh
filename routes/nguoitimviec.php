<?php

use App\Http\Controllers\AdminNhankhau;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ungvienController;
use Illuminate\Support\Facades\Route;

Route::prefix('nguoitimviec')->group(function(){
    Route::get('/danhsach',[AdminNhankhau::class,'nguoitimviec']);
});

Route::prefix('page')->group(function(){
    Route::get('/trangchu',[PageController::class,'home']);
    Route::get('/gioithieu',[PageController::class,'gioithieu']);
    Route::get('/dangnhap',[PageController::class,'viewlogin']);
    Route::get('/dangky',[PageController::class,'viewregister']);
    Route::post('/register',[PageController::class,'register']);


    Route::prefix('ungvien')->group(function(){
        Route::get('/',[PageController::class,'index_ungvien']);
        Route::get('/thongtin',[PageController::class,'thongtin_ungvien']);
        Route::get('/filter',[PageController::class,'filter_ungvien']);

        Route::get('/vi-tri-da-ung-tuyen',[PageController::class,'danhsach_apply']);
        Route::post('/apply',[PageController::class,'apply']);
        Route::get('/delete_apply',[PageController::class,'delete_apply']);

        Route::get('/iframe_coban',[PageController::class,'iframe_coban']);
        Route::post('/update_coban',[PageController::class,'update_coban']);

        Route::get('/iframe_hocvan',[PageController::class,'iframe_hocvan']);
        Route::post('/store_hocvan',[PageController::class,'store_hocvan']);
        Route::post('/update_hocvan',[PageController::class,'update_hocvan']);
        Route::get('/delete_hocvan',[PageController::class,'delete_hocvan']);

        Route::get('/iframe_kinhnghiem',[PageController::class,'iframe_kinhnghiem']);
        Route::post('/store_kinhnghiem',[PageController::class,'store_kinhnghiem']);
        Route::post('/update_kinhnghiem',[PageController::class,'update_kinhnghiem']);
        Route::get('/delete_kinhnghiem',[PageController::class,'delete_kinhnghiem']);

    });
    Route::prefix('vieclam')->group(function(){
        Route::get('/',[PageController::class,'index_vieclam']);
        Route::get('/thongtin',[PageController::class,'thongtin_vieclam']);
        Route::get('/congty',[PageController::class,'congty']);
        Route::get('/filter',[PageController::class,'filter_vieclam']);
    });
 
});

Route::prefix('ungvien')->group(function(){
    Route::get('/',[ungvienController::class,'index']);
    Route::post('/trangthai',[ungvienController::class,'trangthai']);
    Route::get('/create',[ungvienController::class,'create']);
    Route::post('/storecoban',[ungvienController::class,'storecoban']);
    Route::get('/edit',[ungvienController::class,'edit']);
    Route::post('/updatecoban',[ungvienController::class,'updatecoban']);
    Route::get('/delete/{user}',[ungvienController::class,'delete']);


    Route::get('/createhocvan',[ungvienController::class,'createhocvan']);
    Route::post('/storehocvan',[ungvienController::class,'storehocvan']);
    Route::get('/edithocvan',[ungvienController::class,'edithocvan']);
    Route::post('/updatehocvan',[ungvienController::class,'updatehocvan']);
    Route::get('/deletehocvan',[ungvienController::class,'deletehocvan']);
    Route::get('/huyedithocvan',[ungvienController::class,'huyedithocvan']);


    Route::get('/createkinhnghiem',[ungvienController::class,'createkinhnghiem']);
    Route::post('/storekinhnghiem',[ungvienController::class,'storekinhnghiem']);
    Route::get('/editkinhnghiem',[ungvienController::class,'editkinhnghiem']);
    Route::post('/updatekinhnghiem',[ungvienController::class,'updatekinhnghiem']);
    Route::get('/deletekinhnghiem',[ungvienController::class,'deletekinhnghiem']);
    Route::get('/huyeditkinhnghiem',[ungvienController::class,'huyeditkinhnghiem']);
});

Route::prefix('ungtuyen')->group(function(){
    Route::get('/',[ungvienController::class,'index_ungtuyen']);
});