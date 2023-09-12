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
        Route::get('/',[PageController::class,'index']);
        Route::get('/thongtinungvien',[PageController::class,'thongtinungvien']);
    });
    Route::get('/gioithieu',[PageController::class,'gioithieu']);
    Route::get('/dangnhap',[PageController::class,'viewlogin']);
});

Route::prefix('ungvien')->group(function(){
    Route::get('/',[ungvienController::class,'index']);
    Route::get('/create',[ungvienController::class,'create']);
    Route::post('/storecoban',[ungvienController::class,'storecoban']);
    Route::post('/storehocvan',[ungvienController::class,'storehocvan']);
    Route::get('/edit',[ungvienController::class,'edit']);
    Route::post('/update',[ungvienController::class,'update']);
    Route::get('/delete/{user}',[ungvienController::class,'delete']);
});