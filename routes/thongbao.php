<?php

use App\Http\Controllers\Thongbao\ThongbaoController;
use Illuminate\Support\Facades\Route;

Route::prefix('thongbao_khac')->group(function(){
    Route::get('/danhsach',[ThongbaoController::class,'index']);
    Route::post('/store',[ThongbaoController::class,'store']);
    Route::post('/update/{id}',[ThongbaoController::class,'update']);
    Route::get('/delete/{id}',[ThongbaoController::class,'destroy']);
});

