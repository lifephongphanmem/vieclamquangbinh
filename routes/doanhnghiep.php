<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doanhnghiep\CompanyController;



//Doanh nghiệp
Route::prefix('doanh_nghiep')->group(function () {
    Route::get('/danh_sach', [CompanyController::class, 'danhsach']);
    Route::get('/cap_nhat/{id}', [CompanyController::class, 'edit']);
    Route::get('/them_moi', [CompanyController::class, 'create']);
    Route::post('/store', [CompanyController::class, 'store']);
    Route::post('/update/{id}', [CompanyController::class, 'update_dn']);
    Route::get('/delete/{id}', [CompanyController::class, 'destroy']);
    Route::get('/in', [CompanyController::class, 'intonghop']);
    Route::get('/in/{id}', [CompanyController::class, 'indanhsach']);
    Route::get('/thongtin', [CompanyController::class, 'thongtin']);
});