<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Baocao\baocaotonghopController;



Route::prefix('bao_cao_tong_hop')->group(function () {
    Route::get('', [baocaotonghopController::class, 'index']);
    // tổng hợp
    Route::get('nguoi_su_dung_lao_dong', [baocaotonghopController::class, 'doanhnghiep']);
    Route::get('so_lao_dong_thuong_binh_xa_hoi', [baocaotonghopController::class, 'soldtbxh']);
    //mẫu báo cáo
    Route::get('ds_thong_tin_cung_ld', [baocaotonghopController::class, 'dsttcungld']);

    Route::get('tong_hop_cung_ld_cap_xa_huyen', [baocaotonghopController::class, 'cungldcapxahuyen']);
    Route::get('thonh_tin_thi_truong_ld', [baocaotonghopController::class, 'thongtinthitruongld']);
});

Route::prefix('vanban')->group(function(){
    Route::get('/danhsach',[baocaotonghopController::class,'vanban']);
    Route::get('/thong_tin_cung_lao_dong', [baocaotonghopController::class, 'thongtincungld']);
    Route::get('/thong_tin_nhu_cau_tuyen_dung', [baocaotonghopController::class, 'nhucautuyendungld']);
    Route::get('/thong_tin_nguoi_lao_dong_nuoc_ngoai', [baocaotonghopController::class, 'laodongnuocngoai']);
    Route::get('/tinh_hinh_su_dung_lao_dong', [baocaotonghopController::class, 'tinhhinhsudungld']);
});