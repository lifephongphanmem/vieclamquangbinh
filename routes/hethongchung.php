<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Danhmuc\DmdonviController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Hethong\ChucnangController;
use App\Http\Controllers\Danhmuc\danhmuchanhchinhController;
use App\Http\Controllers\Danhmuc\dmthonxomController;
use App\Http\Controllers\Hethong\dsnhomtaikhoanController;
use App\Http\Controllers\Hethong\HethongchungController;

//Đăng nhập

Route::get('/', [HethongchungController::class, 'show_login']);
// Route::get('/dashboard',[HethongchungController::class,'dashboard']);
Route::get('/DangNhap',[HethongchungController::class,'show_login']);
Route::post('/DangNhap',[HethongchungController::class,'DangNhap']);
Route::post('/DangKy',[HethongchungController::class,'DangKy']);
Route::get('/DangXuat',[HethongchungController::class,'logout']);

//kích hoạt tài khoản
Route::get('/kichhoat',[HethongchungController::class,'kichhoat']);



//dmdonvi
Route::prefix('dmdonvi')->group(function () {
    Route::get('/danhsach', [DmdonviController::class, 'index']);
    Route::get('/danh_sach_don_vi/{id}', [DmdonviController::class, 'detail']);
    Route::get('/create', [DmdonviController::class, 'create']);
    Route::post('/store', [DmdonviController::class, 'store']);
    Route::get('/edit/{id}', [DmdonviController::class, 'edit']);
    Route::post('/update/{id}', [DmdonviController::class, 'update']);
    Route::get('/delete/{id}', [DmdonviController::class, 'destroy']);
    Route::get('/dvql/{id}', [DmdonviController::class, 'dvql']);
    Route::post('/update_dvql/{id}', [DmdonviController::class, 'update_dvql']);
});

//Tài khoản
Route::prefix('TaiKhoan')->group(function () {
    Route::get('/ThongTin', [UserController::class, 'index_nn']);
    Route::get('/DanhSach', [UserController::class, 'chitiet']);
    Route::get('/ThemMoi', [UserController::class, 'create']);
    Route::post('/store', [UserController::class, 'store']);
    Route::post('/delete/{id}', [UserController::class, 'destroy']);
    Route::get('/edit_tk/{id}', [UserController::class, 'edit_tk']);
    Route::post('/update_tk/{id}', [UserController::class, 'update_tk']);

    Route::get('/PhanQuyen',[UserController::class,'phanquyen']);
    Route::post('/PhanQuyen',[UserController::class,'luuphanquyen']);

    Route::post('/NhomChucNang',[UserController::class,'NhomChucNang']);
    Route::get('/DoiMatKhau',[UserController::class,'DoiMatKhau']);
    Route::post('/DoiMatKhau',[UserController::class,'capnhatdoimatkhau']);
    Route::post('XuatExcel',[UserController::class,'XuatExcel']);
});

//danh mục chức năng
Route::prefix('Chuc_nang')->group(function () {
    Route::get('/Thong_tin', [ChucnangController::class, 'index']);
    Route::get('/create', [ChucnangController::class, 'create']);
    Route::post('/store', [ChucnangController::class, 'store']);
    Route::get('/edit/{id}', [ChucnangController::class, 'edit']);
    Route::post('/update/{id}', [ChucnangController::class, 'update']);
    Route::get('/destroy/{id}', [ChucnangController::class, 'destroy']);
});

Route::prefix('dia_ban')->group(function () {
    Route::get('/danhsach', [danhmuchanhchinhController::class, 'index']);
    Route::get('/edit/{id}', [danhmuchanhchinhController::class, 'edit']);
    Route::post('/store', [danhmuchanhchinhController::class, 'store']);
    Route::post('/update/{id}', [danhmuchanhchinhController::class, 'update']);
    Route::get('/delete/{id}', [danhmuchanhchinhController::class, 'destroy']);
});

Route::prefix('nhomchucnang')->group(function(){
    Route::get('/danhsach',[dsnhomtaikhoanController::class,'index']);
    Route::post('/store',[dsnhomtaikhoanController::class,'store']);
    Route::get('/delete/{id}',[dsnhomtaikhoanController::class,'destroy']);

    Route::get('/PhanQuyen',[dsnhomtaikhoanController::class,'PhanQuyen']);
    Route::post('/PhanQuyen',[dsnhomtaikhoanController::class,'LuuPhanQuyen']);

    Route::get('/danhsach_donvi',[dsnhomtaikhoanController::class,'DanhSachDonVi']);
    Route::post('/ThietLapLai', [dsnhomtaikhoanController::class, 'ThietLapLai']);
});

Route::prefix('dmthonxom')->group(function(){
    Route::get('/danhsach',[dmthonxomController::class,'index']);
    Route::post('/store',[dmthonxomController::class,'store']);
    Route::get('/delete/{id}',[dmthonxomController::class,'destroy']);
});