<?php

use App\Http\Controllers\CauHinh\chuandoansucoController;
use Illuminate\Support\Facades\Route;

Route::prefix('ChuanDoanSuCo')->group(function(){
    Route::get('ThongTin',[chuandoansucoController::class,'ThongTin']);
});