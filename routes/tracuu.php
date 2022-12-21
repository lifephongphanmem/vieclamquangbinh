<?php

use App\Http\Controllers\Tracuu\tracuuCaulaodongController;
use App\Http\Controllers\Tracuu\tracuuController;
use App\Http\Controllers\Tracuu\tracuuCunglaodongController;
use App\Http\Controllers\Tracuu\tracuulaodongnuocngoaiController;
use App\Http\Controllers\Tracuu\tracuutinhhinhsudunglaodongController;
use Illuminate\Support\Facades\Route;


Route::prefix('TimKiem')->group(function(){
    Route::prefix('CungLaoDong')->group(function(){
        Route::get('/ThongTin',[tracuuCunglaodongController::class,'ThongTin']);
        Route::post('/KetQua',[tracuuCunglaodongController::class,'KetQua']);
        Route::post('/InKetQua',[tracuuCunglaodongController::class,'InKetQua']);
    });

    Route::prefix('TinhHinhSuDungLaoDong')->group(function(){
        Route::get('/ThongTin',[tracuutinhhinhsudunglaodongController::class,'ThongTin']);
        Route::post('/KetQua',[tracuutinhhinhsudunglaodongController::class,'KetQua']);
        Route::post('/InKetQua',[tracuutinhhinhsudunglaodongController::class,'InKetQua']);
    });

    Route::prefix('LaoDongNuocNgoai')->group(function(){
        Route::get('/ThongTin',[tracuulaodongnuocngoaiController::class,'ThongTin']);
        Route::post('/KetQua',[tracuulaodongnuocngoaiController::class,'KetQua']);
        Route::post('/InKetQua',[tracuulaodongnuocngoaiController::class,'InKetQua']);
    });
    Route::prefix('CauLaoDong')->group(function(){
        Route::get('/ThongTin',[tracuuCaulaodongController::class,'ThongTin']);
        Route::post('/KetQua',[tracuuCaulaodongController::class,'KetQua']);
        Route::post('/InKetQua',[tracuuCaulaodongController::class,'InKetQua']);
    });
});