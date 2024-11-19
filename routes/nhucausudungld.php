<?php

use App\Http\Controllers\SuDungLD\sudungldController;
use Illuminate\Support\Facades\Route;

Route::prefix('SuDungLD')->group(function(){
    Route::get('ThongTin',[sudungldController::class,'ThongTin']);
    Route::post('Them',[sudungldController::class,'Them']);
});