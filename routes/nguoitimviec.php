<?php

use App\Http\Controllers\AdminNhankhau;
use Illuminate\Support\Facades\Route;

Route::prefix('nguoitimviec')->group(function(){
    Route::get('/danhsach',[AdminNhankhau::class,'nguoitimviec']);
});