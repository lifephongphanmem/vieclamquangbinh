<?php

use App\Http\Controllers\AdminDieutra;
use App\Http\Controllers\AdminNhankhau;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cunglaodong\cunglaodong_huyenController;
use App\Http\Controllers\Cunglaodong\cunglaodong_tinhController;
use App\Http\Controllers\Cunglaodong\cunglaodongController;
use App\Http\Controllers\Cunglaodong\messageCotroller;


Route::prefix('cungld')->group(function () {
    Route::prefix('thongbao')->group(function () {
        Route::get('/', [messageCotroller::class, 'index']);
        Route::get('/create', [messageCotroller::class, 'create']);
        Route::get('/edit/{id}', [messageCotroller::class, 'edit']);
        Route::post('/store', [messageCotroller::class, 'store']);
        Route::post('/update/{id}', [messageCotroller::class, 'update']);
        Route::get('/delete/{id}', [messageCotroller::class, 'destroy']);
        Route::get('/chitiet/{id}', [messageCotroller::class, 'show']);
        Route::post('/send/{id}', [messageCotroller::class, 'guithongbao']);
    });
    // Tổng hợp danh sách  cung lao động
    Route::prefix('danh_sach')->group(function () {
        Route::prefix('don_vi')->group(function () {
            Route::get('/', [cunglaodongController::class, 'index']);
            Route::get('/thongbao', [cunglaodongController::class, 'nhanthongbao']);
            Route::get('/create', [cunglaodongController::class, 'create']);
            Route::get('/edit/{id}', [cunglaodongController::class, 'edit']);
            Route::post('/store', [cunglaodongController::class, 'store']);
            Route::post('/update/{id}', [cunglaodongController::class, 'update']);
            Route::get('/delete/{id}', [cunglaodongController::class, 'destroy']);
            Route::post('/chi_tiet/{id}', [cunglaodongController::class, 'show']);
            Route::post('/send/{id}', [cunglaodongController::class, 'senddata']);
            Route::get('/lydo/{id}', [cunglaodongController::class, 'lydo']);
            Route::get('/tonghop', [cunglaodongController::class, 'tonghop']);
        });
        Route::prefix('huyen')->group(function () {
            Route::get('/', [cunglaodong_huyenController::class, 'index']);
            Route::get('/tong_hop', [cunglaodong_huyenController::class, 'tonghop']);
            Route::post('/send', [cunglaodong_huyenController::class, 'sendata']);
            Route::post('/tralai', [cunglaodong_huyenController::class, 'tralai']);
            Route::get('/lydo', [cunglaodong_huyenController::class, 'lydo']);

            Route::get('/in', [cunglaodong_huyenController::class, 'indanhsach']);
            Route::post('/intonghop', [cunglaodong_huyenController::class, 'intonghop']);
        });

        Route::prefix('tinh')->group(function () {
            Route::get('/', [cunglaodong_tinhController::class, 'index']);
            Route::get('/tong_hop', [cunglaodong_tinhController::class, 'show']);
            Route::post('/tralai', [cunglaodong_tinhController::class, 'tralai']);

            Route::get('/intonghop', [cunglaodong_tinhController::class, 'intonghop']);
            Route::post('/intonghop_tinh', [cunglaodong_tinhController::class, 'intonghop_tinh']);
        });
    });
});

// Dieu tra

Route::get('/dieutra-ba/', [AdminDieutra::class, 'show_all']); // all

Route::get('/dieutra-bn/', [AdminDieutra::class, 'new']); // 
Route::post('/dieutra-bs', [AdminDieutra::class, 'save']);

Route::get('/dieutra-be/{dtid}', [AdminDieutra::class, 'edit']); // edit

Route::prefix('dieutra')->group(function () {
    Route::get('/danhsach', [AdminDieutra::class, 'show_all']); // all
    Route::get('/ThemMoi', [AdminDieutra::class, 'new']); // 
    Route::get('/create', [AdminDieutra::class, 'create']);
    Route::post('/store', [AdminDieutra::class, 'store']);
    Route::post('/XoaDanhSach/{id}', [AdminDieutra::class, 'XoaDanhSach']);
    Route::post('/intonghop', [AdminDieutra::class, 'intonghop']); //in tổng hợp cung lao động mẫu 03 xã  cũ
    Route::post('/inbaocaohuyen', [AdminDieutra::class, 'inbaocaohuyen']); //in tổng hợp cung lao động mẫu 03 huyện cũ
    Route::post('/inbaocaotinh', [AdminDieutra::class, 'inbaocaotinh']); //in tổng hợp cung lao động mẫu 03 tỉnh cũ

    Route::post('/intonghop-mau01b', [AdminDieutra::class, 'intonghop_mau01b']); //in tổng hợp cung lao động mẫu 01b xã
    Route::post('/inbaocaohuyen-mau01b', [AdminDieutra::class, 'inbaocaohuyen_mau01b']); //in tổng hợp cung lao động mẫu 01b huyện
    Route::post('/inbaocaotinh-mau01b', [AdminDieutra::class, 'inbaocaotinh_mau01b']); //in tổng hợp cung lao động mẫu 01b tỉnh
    Route::get('/getxa', [AdminDieutra::class, 'getxa']);// lấy danh sách xã mẫu 01b


    Route::post('/mau03_xa', [AdminDieutra::class, 'mau03_xa']); //in tổng hợp cung lao động mẫu 03 xã 
    Route::post('/mau03_huyen', [AdminDieutra::class, 'mau03_huyen']); //in tổng hợp cung lao động mẫu 03 huyện 
    Route::get('/getxa_mau03', [AdminDieutra::class, 'getxa_mau03']);// lấy danh sách xã mẫu 03

    Route::get('/danhsachloi/{id}', [AdminDieutra::class, 'danhsachloi']);
    Route::get('/danhsachloi_chitiet', [AdminDieutra::class, 'danhsachloi_chitiet']);
    Route::post('/indanhsachloi', [AdminDieutra::class, 'indanhsachloi']);
    Route::post('/TaoMoi', [AdminDieutra::class, 'TaoMoi']);
});

// Nhan khau

Route::get('/nhankhau-ba/{cid?}', [AdminNhankhau::class, 'show_all']); // all
Route::get('/nhankhau-bho/{cid?}', [AdminNhankhau::class, 'show_ho']); // all
Route::get('/nhankhau-beho/{cid?}', [AdminNhankhau::class, 'editho']); // all

Route::get('/nhankhau-be/{nkid}', [AdminNhankhau::class, 'edit']); // edit
Route::get('/nhankhau-in', [AdminNhankhau::class, 'inchitiet']); // in chi tiết
Route::get('/nhankhau-inhgd', [AdminNhankhau::class, 'inchitiethgd']); // in chi tiết
Route::get('/nhankhau-innguoilaodong', [AdminNhankhau::class, 'innguoilaodong']); // in chi tiết
Route::get('/nhankhau-dskhongthongtin', [AdminNhankhau::class, 'dskhongthongtin']); // in chi tiết
Route::prefix('nhankhau')->group(function () {
    Route::get('/danhsach/{cid?}', [AdminNhankhau::class, 'show_all']); // all
    Route::get('/hogiadinh/{cid?}', [AdminNhankhau::class, 'show_ho']); // all
    Route::get('/ChiTietHoGiaDinh/{cid?}', [AdminNhankhau::class, 'editho']); // all
    Route::get('/ChiTiet/{nkid}', [AdminNhankhau::class, 'edit']); // edit
    Route::get('/get_xa', [AdminNhankhau::class, 'ajax_getxa']); // lấy xã
    Route::post('/update/{id}', [AdminNhankhau::class, 'update']);
    Route::post('/danhsach_tinhtrang', [AdminNhankhau::class, 'danhsach']);
    Route::post('/delete', [AdminNhankhau::class, 'XoaHoGD']);
    Route::post('/XoaNhanKhau/{id}', [AdminNhankhau::class, 'XoaNhanKhau']);
});

