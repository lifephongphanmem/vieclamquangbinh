<?php

use App\Http\Controllers\DuDoan\dudoanthitruongldController;
use Illuminate\Support\Facades\Route;

Route::prefix('DuDoan')->group(function(){
    Route::get('ThongTin',[dudoanthitruongldController::class,'ThongTin']);
});