<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Danhmuc\dmchucvuController;
use App\Http\Controllers\Danhmuc\dmchuyenmondaotaoController;

use App\Http\Controllers\Danhmuc\dmhinhthuclamviecController;
use App\Http\Controllers\Danhmuc\dmdoituonguutienController;
use App\Http\Controllers\Danhmuc\dmloaihieuluchdldController;
use App\Http\Controllers\Danhmuc\dmloaihinhhdktController;
use App\Http\Controllers\Danhmuc\dmloailaodongController;
use App\Http\Controllers\Danhmuc\dmmanghetrinhdoController;
use App\Http\Controllers\Danhmuc\dmnganhsxkdController;
use App\Http\Controllers\Danhmuc\dmthoigianthatnghiepController;
use App\Http\Controllers\Danhmuc\dmtinhtrangthamgiahdktController;
use App\Http\Controllers\Danhmuc\dmtrinhdogdptController;
use App\Http\Controllers\Danhmuc\dmtrinhdokythuatController;
use App\Http\Controllers\Danhmuc\dsdiabanController;
use App\Http\Controllers\Danhmuc\dsdonviController;
use App\Http\Controllers\Danhmuc\nghecongviecController;


Route::prefix('danh_muc')->group(function () {
    // đối tượng ưu tiên
    Route::prefix('/dm_doi_tuong')->group(function () {
        Route::get('', [dmdoituonguutienController::class, 'index']);
        Route::post('/store_update', [dmdoituonguutienController::class, 'store_update']);
        Route::get('/delete/{id}', [dmdoituonguutienController::class, 'delete']);
        Route::get('/edit/{id}', [dmdoituonguutienController::class, 'edit']);
    });
    // loại lao động
    Route::prefix('/dm_loai_lao_dong')->group(function () {
        Route::get('', [dmloailaodongController::class, 'index']);
        Route::post('/store_update', [dmloailaodongController::class, 'store_update']);
        Route::get('/delete/{id}', [dmloailaodongController::class, 'delete']);
        Route::get('/edit/{id}', [dmloailaodongController::class, 'edit']);
    });

    // trình độ GDPT đạt được
    Route::prefix('/dm_trinh_do_gdpt')->group(function () {
        Route::get('', [dmtrinhdogdptController::class, 'index']);
        Route::post('/store_update', [dmtrinhdogdptController::class, 'store_update']);
        Route::get('/delete/{id}', [dmtrinhdogdptController::class, 'delete']);
        Route::get('/edit/{id}', [dmtrinhdogdptController::class, 'edit']);
    });
    // trình độ chuyên môn kỹ thuật
    Route::prefix('/dm_trinh_do_ky_thuat')->group(function () {
        Route::get('', [dmtrinhdokythuatController::class, 'index']);
        Route::post('/store_update', [dmtrinhdokythuatController::class, 'store_update']);
        Route::get('/delete/{id}', [dmtrinhdokythuatController::class, 'delete']);
        Route::get('/edit/{id}', [dmtrinhdokythuatController::class, 'edit']);
    });
    // tình trạng tham gia hoạt động kin tế
    Route::prefix('/dm_tinh_trang_tham_gia_hdkt')->group(function () {
        Route::get('', [dmtinhtrangthamgiahdktController::class, 'index']);
        Route::post('/store_update', [dmtinhtrangthamgiahdktController::class, 'store_update']);
        Route::get('/delete/{id}', [dmtinhtrangthamgiahdktController::class, 'delete']);
        Route::get('/edit/{id}', [dmtinhtrangthamgiahdktController::class, 'edit']);
        // chi tiết
        Route::prefix('/chi_tiet')->group(function () {
            Route::get('', [dmtinhtrangthamgiahdktController::class, 'index_ct']);
            Route::post('/store_update', [dmtinhtrangthamgiahdktController::class, 'store_update_ct']);
            Route::get('/delete/{manhom}', [dmtinhtrangthamgiahdktController::class, 'delete_ct']);
            Route::get('/edit/{id}', [dmtinhtrangthamgiahdktController::class, 'edit_ct']);
        });
        // chi tiết 2
        Route::prefix('/chi_tiet_2')->group(function () {
            Route::get('', [dmtinhtrangthamgiahdktController::class, 'index_ct2']);
            Route::post('/store_update', [dmtinhtrangthamgiahdktController::class, 'store_update_ct2']);
            Route::get('/delete/{manhom}', [dmtinhtrangthamgiahdktController::class, 'delete_ct2']);
            Route::get('/edit/{id}', [dmtinhtrangthamgiahdktController::class, 'edit_ct2']);
        });
    });

    // loại hình hoạt động kinh tế
    Route::prefix('/dm_loai_hinh_hdkt')->group(function () {
        Route::get('', [dmloaihinhhdktController::class, 'index']);
        Route::post('/store_update', [dmloaihinhhdktController::class, 'store_update']);
        Route::get('/delete/{id}', [dmloaihinhhdktController::class, 'delete']);
        Route::get('/edit/{id}', [dmloaihinhhdktController::class, 'edit']);
    });

    Route::prefix('dm_chuc_vu')->group(function () {
        Route::get('/', [dmchucvuController::class, 'index']);
        Route::post('/store', [dmchucvuController::class, 'store']);
        Route::post('/update/{id}', [dmchucvuController::class, 'update']);
        Route::get('/delete/{id}', [dmchucvuController::class, 'destroy']);
    });


    // thười gian thất nghiệp
    Route::prefix('/dm_thoi_gian_that_nghiep')->group(function () {
        Route::get('', [dmthoigianthatnghiepController::class, 'index']);
        Route::post('/store_update', [dmthoigianthatnghiepController::class, 'store_update']);
        Route::get('/delete/{id}', [dmthoigianthatnghiepController::class, 'delete']);
        Route::get('/edit/{id}', [dmthoigianthatnghiepController::class, 'edit']);
    });
    // ngành sản xuất kinh doanh
    Route::prefix('/dm_nganh_san_xuat_kinh_doanh')->group(function () {
        Route::get('', [dmnganhsxkdController::class, 'index']);
        Route::post('/store_update', [dmnganhsxkdController::class, 'store_update']);
        Route::get('/delete/{id}', [dmnganhsxkdController::class, 'delete']);
        Route::get('/edit/{id}', [dmnganhsxkdController::class, 'edit']);
    });
    // loai hiệu lực hợp đồng lao động
    Route::prefix('/dm_loai_hieu_luc_hdld')->group(function () {
        Route::get('', [dmloaihieuluchdldController::class, 'index']);
        Route::post('/store_update', [dmloaihieuluchdldController::class, 'store_update']);
        Route::get('/delete/{id}', [dmloaihieuluchdldController::class, 'delete']);
        Route::get('/edit/{id}', [dmloaihieuluchdldController::class, 'edit']);
    });
    // mã nghề, trình độ
    Route::prefix('/dm_ma_nghe_trinh_do')->group(function () {
        Route::get('', [dmmanghetrinhdoController::class, 'index']);
        Route::post('/store_update', [dmmanghetrinhdoController::class, 'store_update']);
        Route::get('/delete/{id}', [dmmanghetrinhdoController::class, 'delete']);
        Route::get('/edit/{id}', [dmmanghetrinhdoController::class, 'edit']);
    });
    //Danh mục chuyên môn đào tạo
    Route::prefix('dm_chuyen_mon_dao_tao')->group(function () {
        Route::get('/', [dmchuyenmondaotaoController::class, 'index']);
        Route::post('/store', [dmchuyenmondaotaoController::class, 'store']);
        Route::post('/update/{id}', [dmchuyenmondaotaoController::class, 'update']);
        Route::get('/delete/{id}', [dmchuyenmondaotaoController::class, 'destroy']);
    });

    Route::prefix('nghe_cong_viec')->group(function () {
        Route::get('/', [nghecongviecController::class, 'index']);
        Route::post('/store', [nghecongviecController::class, 'store']);
        Route::post('/update/{id}', [nghecongviecController::class, 'update']);
        Route::get('/delete/{id}', [nghecongviecController::class, 'destroy']);
    });

    Route::prefix('dm_hinh_thuc_cong_viec')->group(function () {
        Route::get('/', [dmhinhthuclamviecController::class, 'index']);
        Route::post('/store', [dmhinhthuclamviecController::class, 'store']);
        Route::post('/update/{id}', [dmhinhthuclamviecController::class, 'update']);
        Route::get('/delete/{id}', [dmhinhthuclamviecController::class, 'destroy']);
    });

    // Route::prefix('/dsdiaban')->group(function(){
    //     Route::get('/danhsach',[dsdiabanController::class,'index']);
    //     Route::post('/store',[dsdiabanController::class,'store']);
    //     Route::get('/delete/{id}',[dsdiabanController::class,'destroy']);
    // });

    // Route::prefix('/dsdonvi')->group(function(){
    //     Route::get('/danhsach',[dsdonviController::class,'index']);
    //     Route::get('/danhsach_donvi',[dsdonviController::class,'DanhSach']);
    //     Route::get('/them',[dsdonviController::class,'create']);
    //     Route::post('/store',[dsdonviController::class,'store']);
    //     Route::get('/delete/{id}',[dsdonviController::class,'destroy']);
    // });
});