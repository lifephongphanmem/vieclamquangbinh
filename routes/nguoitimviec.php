<?php

use App\Http\Controllers\AdminNhankhau;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ungvienController;
use Illuminate\Support\Facades\Route;

Route::prefix('nguoitimviec')->group(function(){
    Route::get('/danhsach',[AdminNhankhau::class,'nguoitimviec']);
});

Route::prefix('page')->group(function(){
    Route::prefix('ungvien')->group(function(){
        Route::get('/',[PageController::class,'index_ungvien']);
        Route::get('/thongtin',[PageController::class,'thongtin_ungvien']);
        Route::get('/filter',[PageController::class,'filter_ungvien']);
    });
    Route::prefix('vieclam')->group(function(){
        Route::get('/',[PageController::class,'index_vieclam']);
        Route::get('/thongtin',[PageController::class,'thongtin_vieclam']);
        Route::get('/congty',[PageController::class,'congty']);
        Route::get('/filter',[PageController::class,'filter_vieclam']);
    });
    Route::get('/gioithieu',[PageController::class,'gioithieu']);
    Route::get('/dangnhap',[PageController::class,'viewlogin']);
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


    Route::get('/createkinhnghiem',[ungvienController::class,'createkinhnghiem']);
    Route::post('/storekinhnghiem',[ungvienController::class,'storekinhnghiem']);
    Route::get('/editkinhnghiem',[ungvienController::class,'editkinhnghiem']);
    Route::post('/updatekinhnghiem',[ungvienController::class,'updatekinhnghiem']);
    Route::get('/deletekinhnghiem',[ungvienController::class,'deletekinhnghiem']);

});