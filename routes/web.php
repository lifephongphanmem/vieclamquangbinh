<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\AdminBiendong;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TuyendungController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\DichvuController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCompany;
use App\Http\Controllers\AdminTuyendung;
use App\Http\Controllers\AdminDanhmuchanhchinh;
use App\Http\Controllers\AdminParamtype;
use App\Http\Controllers\AdminParam;
use App\Http\Controllers\AdminUser;
use App\Http\Controllers\AdminReport;
use App\Http\Controllers\AdminMessages;
use App\Http\Controllers\AdminDichvu;
use App\Http\Controllers\AdminEmployer;
use App\Http\Controllers\AdminDieutra;
use App\Http\Controllers\AdminNhankhau;
use App\Http\Controllers\Baocao\baocaotonghopController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\dangkytimviecController;
use App\Http\Controllers\dsthatnghiepController;
use App\Http\Controllers\Hethong\HethongchungController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HopThuController;
use App\Http\Controllers\kybaocaoController;
use App\Http\Controllers\vanbanController;
use App\Http\Controllers\vanphonghotroController;

// Frontend SECTION

include('hethongchung.php');
include('danhmuc.php');
include('baocao.php');
include('nguoitimviec.php');
include('nguoilaodong.php');
include('doanhnghiep.php');
include('cauhinh.php');
include('nhucausudungld.php');
include('cunglaodong.php');
// Route::get('/', [UserController::class, 'show_login' ]);

// Route::get('/home',[UserController::class, 'show_login' ]);

// Route::post('/login-user', [UserController::class, 'auth' ]);
// Route::post('/signup', [UserController::class, 'signup' ]);
// Route::get('/logout', [UserController::class, 'logout' ]);
// Route::get('/user-fe',[UserController::class, 'edit' ]);
// Route::post('/user-fu',[UserController::class, 'update' ]);

// Nguoi dung


// Doanh nghiep

Route::get('/doanhnghieppanel', [CompanyController::class, 'show']);
Route::post('/doanhnghiep-fu', [CompanyController::class, 'update']);

// nguoi lao dong
Route::get('/laodong-fa/{action?}', [EmployerController::class, 'show_all']);
Route::post('/laodong-fs', [EmployerController::class, 'save']);
Route::get('/laodong-fn', [EmployerController::class, 'new']);
Route::get('/laodong-fe/{eid?}/{action?}', [EmployerController::class, 'edit']);
Route::post('/laodong-fu', [EmployerController::class, 'update']);
Route::post('/laodong-fi', [EmployerController::class, 'import']);
Route::get('laodong-ex/', [EmployerController::class, 'export']);


Route::get('laodong-fnothing/', [EmployerController::class, 'noreport']);

// bao cao


Route::get('/report-fa', [ReportController::class, 'show_all']);
Route::get('/report-fa-delete/{id}', [ReportController::class, 'deleteReport']);
//tuyen dung
Route::get('/tuyendung-fa', [TuyendungController::class, 'show_all']);
Route::get('/tuyendung-fn', [TuyendungController::class, 'new']);
Route::get('/tuyendung-fe/{tdid}', [TuyendungController::class, 'edit']);
Route::post('/tuyendung-fs', [TuyendungController::class, 'save']);
Route::post('/tuyendung-fru', [TuyendungController::class, 'updatebaocao']);
Route::get('/tuyendung-fr/{tdid}', [TuyendungController::class, 'baocao']);
Route::get('/tuyendung-get_vitri_page', [TuyendungController::class, 'get_vitri']); //get vt page
Route::get('/tuyendung/vitri', [TuyendungController::class, 'get_vitri1']); //get vt page
Route::get('/tuyendung/vitri_upanh', [TuyendungController::class, 'get_vitri_upanh']); //get vt page
Route::get('/tuyendung/del/{id}',[TuyendungController::class,'destroy']);
//nhu cầu sử dụng lao động


Route::post('/tuyendung/uploadanh',[TuyendungController::class,'uploadanh']);

Route::get('/tuyendung-hosodanop', [TuyendungController::class, 'hosodanop']); // danh sách hồ sơ ứng tuyển
Route::get('/mau01',[baocaotonghopController::class,'mau_03pli']);

// messenger

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', [MessagesController::class, 'index'])->name('messages');
    Route::get('create', [MessagesController::class, 'create']);
    Route::post('store', [MessagesController::class, 'store']);
    Route::get('/{id}', [MessagesController::class, 'show'])->name('messages.show');
    Route::put('{id}', [MessagesController::class, 'update'])->name('messages.update');
    Route::get('download_url/{url1}/{url2}', [MessagesController::class, 'download_url']);
    Route::get('/del/{id}',[MessagesController::class,'destroy']);
});


//tuyen dung
Route::get('/dichvu-fa', [DichvuController::class, 'show_all']);
Route::get('/dichvu-fr/{eid?}', [DichvuController::class, 'dangky']);
// messenger


// Backend SECTION

// Route::get('/admin', [AdminController::class, 'login' ])->name('login');
Route::get('/dashboard', [AdminController::class, 'dashboard']);

// Route::post('/login-admin', [AdminController::class, 'auth' ]);
// Route::get('/logout-admin', [AdminController::class, 'logout' ]);

// Doanh nghiep

Route::get('/doanhnghiep-ba', [AdminCompany::class, 'show_all']);
Route::get('/doanhnghiep-delete/{id}', [AdminCompany::class, 'delete_company']);
Route::post('/doanhnghiep-up', [AdminCompany::class, 'up_company']);
Route::get('/doanhnghiep-bs', [AdminCompany::class, 'save']);
Route::get('/ doanhnghiep-bn', [AdminCompany::class, 'new']);
Route::get('/doanhnghiep-be', [AdminCompany::class, 'edit']);
Route::post('/doanhnghiep-bu/{cid}', [AdminCompany::class, 'update']);
Route::get('/doanhnghiep-br/{cid}', [AdminCompany::class, 'baocao145']);
Route::get('/doanh_nghiep/them_moi', [CompanyController::class, 'create']);

Route::prefix('doanhnghiep')->group(function () {
    Route::get('/baocao', [baocaotonghopController::class, 'BC_doanhnghiep']);
    Route::post('/import', [AdminCompany::class, 'import']);
    Route::post('/store', [AdminCompany::class, 'store']);
    Route::get('/mau01pli/{id}', [AdminCompany::class, 'Mau01PLI']);
});

// Người lao động

Route::get('/employer-ba/{cid?}', [AdminEmployer::class, 'show_all']);
Route::get('/employer-bs', [AdminEmployer::class, 'save']);
Route::get('/ employer-bn', [AdminEmployer::class, 'new']);
Route::get('/employer-be/{cid}', [AdminEmployer::class, 'edit']);
Route::post('/employer-bu/{cid}', [AdminEmployer::class, 'update']);

Route::prefix('nguoilaodong')->group(function () {
    Route::get('/danhsach', [AdminEmployer::class, 'show_all']);
    Route::get('/ChiTiet/{id}', [AdminEmployer::class, 'edit']);
    Route::post('/update', [AdminEmployer::class, 'update']);
    Route::get('/taonhanh', [AdminEmployer::class, 'taonhanh']);
    Route::get('/ds_khongthongtin', [AdminEmployer::class, 'ds_khongthongtin']);
    Route::get('TraCuu', [AdminEmployer::class, 'TraCuu']);
    Route::post('TraCuu', [AdminEmployer::class, 'KetQuaTraCuu']);
});

Route::prefix('laodongnuocngoai')->group(function () {
    Route::get('/danhsach', [AdminEmployer::class, 'DanhSach_NN']);
    Route::get('/ThemMoi', [AdminEmployer::class, 'ThemMoi_NN']);
    Route::get('/indanhsach', [AdminEmployer::class, 'indanhsach']);
});

// Tuyen dụng 

Route::get('/tuyendung-ba/{cid?}', [AdminTuyendung::class, 'show_all']); // all
Route::get('/tuyendung-get_vitri', [AdminTuyendung::class, 'get_vitri']); //get vt
Route::get('/tuyendung-bu/{tdid}', [AdminTuyendung::class, 'duyet']); // duyet

Route::get('/tuyendung-be/{tdid}', [AdminTuyendung::class, 'edit']); // edit
Route::get('/tuyendung-viectimnguoi/{cid?}', [AdminTuyendung::class, 'viectimnguoi']); // việc tìm người
Route::prefix('tuyendung')->group(function(){
    Route::get('TraCuu', [AdminTuyendung::class, 'TraCuu']);
    Route::post('TraCuu', [AdminTuyendung::class, 'KetQuaTraCuu']);
});


// Tham số
Route::get('/ptype-ba', [AdminParamtype::class, 'show_all']);

Route::get('/ptype-be/{catid}', [AdminParamtype::class, 'edit']);

Route::get('/ptype-bd/{catid}', [AdminParamtype::class, 'delete']);

Route::get('/ptype-bn/', [AdminParamtype::class, 'new']);

Route::post('/ptype-bs/', [AdminParamtype::class, 'save']);

Route::post('/ptype-bu/', [AdminParamtype::class, 'update']);

// gia tri tham so

Route::get('/param-ba/{catid}', [AdminParam::class, 'show_all']);

Route::get('/param-be/{pid}', [AdminParam::class, 'edit']);

Route::get('/param-bd/{pid}', [AdminParam::class, 'delete']);

Route::get('/param-bn/{catid}', [AdminParam::class, 'new']);

Route::post('/param-bs/', [AdminParam::class, 'save']);

Route::post('/param-bu/', [AdminParam::class, 'update']);


// Ngươi dung

Route::get('/user-ba/', [AdminUser::class, 'show_all']);

Route::get('/user-be/{uid}', [AdminUser::class, 'edit']);

Route::get('/user-bd/{uid}', [AdminUser::class, 'delete']);

Route::get('/user-bn/', [AdminUser::class, 'new']);

Route::post('/user-bs/', [AdminUser::class, 'save']);

Route::post('/user-bu/', [AdminUser::class, 'update']);


// danh muc hanh chinh

Route::get('/dmhc-ba', [AdminDanhmuchanhchinh::class, 'show_all']);

Route::get('/dmhc-bac/{catid}', [AdminDanhmuchanhchinh::class, 'show_allchild']);

Route::get('/dmhc-be/{catid}', [AdminDanhmuchanhchinh::class, 'edit']);

Route::get('/dmhc-bd/{catid}', [AdminDanhmuchanhchinh::class, 'delete']);

Route::get('/dmhc-bn/', [AdminDanhmuchanhchinh::class, 'new']);
Route::get('/dmhc-bnc/{catid}', [AdminDanhmuchanhchinh::class, 'newchild']);

Route::post('/dmhc-bs/', [AdminDanhmuchanhchinh::class, 'save']);

Route::post('/dmhc-bi/', [AdminDanhmuchanhchinh::class, 'import']);

Route::post('/dmhc-bu/', [AdminDanhmuchanhchinh::class, 'update']);

// Lao động Biến động
Route::get('/report-ba/{cid?}', [AdminReport::class, 'show_all']);
Route::get('/report-detail', [AdminReport::class, 'detail']);
Route::get('/report-detail-in', [AdminReport::class, 'detail_in']);
Route::get('/report-be/{id}', [AdminReport::class, 'edit']);
Route::get('/report-in-tonghop', [AdminReport::class, 'tonghop_in']);
Route::get('/report-in-doanhnghiep', [AdminReport::class, 'doanhnghiep_in']);


Route::group(['prefix' => 'admessages'], function () {
    Route::get('/', [AdminMessages::class, 'index'])->name('admessages');
    Route::get('create', [AdminMessages::class, 'create'])->name('admessages.create');
    Route::post('/', [AdminMessages::class, 'store'])->name('admessages.store');
    Route::get('{id}', [AdminMessages::class, 'show'])->name('admessages.show');
    Route::put('{id}', [AdminMessages::class, 'update'])->name('admessages.update');
});


Route::get('/dichvu-ba/{cid?}', [AdminDichvu::class, 'show_all']);
Route::get('/dichvudk-ba/{dvid}', [AdminDichvu::class, 'show_dk']);

Route::get('/dichvu-be/{uid}', [AdminDichvu::class, 'edit']);

Route::get('/dichvu-bd/{uid}', [AdminDichvu::class, 'delete']);

Route::get('/dichvu-bn/', [AdminDichvu::class, 'new']);

Route::post('/dichvu-bs/', [AdminDichvu::class, 'save']);

Route::post('/dichvu-bu/', [AdminDichvu::class, 'update']);

Route::prefix('hopthu')->group(function () {
    Route::get('/', [HopThuController::class, 'index']);
    Route::get('/create', [HopThuController::class, 'create']);
    Route::post('/store', [HopThuController::class, 'store']);
    Route::get('/delete/{id}', [HopThuController::class, 'destroy']);
    Route::post('/tralai/{id}', [HopThuController::class, 'tinh_tralai']);
    Route::get('/check/{id}', [HopThuController::class, 'checktn']);

    Route::prefix('/huyen')->group(function () {
        Route::get('/', [HopThuController::class, 'hopthu_huyen']);
        Route::post('/tralai/{id}', [HopThuController::class, 'huyen_tralai']);
        Route::post('/send/{id}', [HopThuController::class, 'huyen_send']);
        Route::get('/lydo/{id}', [HopThuController::class, 'huyen_lydo']);
    });

    Route::prefix('/xa')->group(function () {
        Route::get('/', [HopThuController::class, 'hopthu_xa']);
        Route::post('/send/{id}', [HopThuController::class, 'send']);
        Route::get('/lydo/{id}', [HopThuController::class, 'xa_lydo']);
    });
});

Route::get('/danh_sach_tai_khoan', [HomeController::class, 'listusser']);
Route::prefix('/biendong')->group(function () {
    Route::get('/', [AdminDieutra::class, 'biendong']);
    Route::get('/ChiTiet', [AdminDieutra::class, 'biendong_ct']);
    Route::get('/inbiendong', [AdminDieutra::class, 'inbiendong']);
    Route::post('/tonghopbiendong', [AdminDieutra::class, 'tonghopbiendong']);
    Route::post('/danhsach', [AdminDieutra::class, 'export_biendong']);

    Route::get('/danhsach_biendong', [AdminBiendong::class, 'index_cung']);
    Route::get('/thongtinthaydoi/{id}', [AdminBiendong::class, 'thongtinthaydoi']);
    Route::post('/baogiam/{id}', [AdminNhankhau::class, 'baogiam']);
});

Route::prefix('BaoCaoDN')->group(function () {
    Route::get('/', [baocaotonghopController::class, 'BaoCaoDN']);
});

Route::prefix('baocao_tonghop')->group(function () {
    Route::get('/', [baocaotonghopController::class, 'index_cung']);
    Route::post('/tonghop', [baocaotonghopController::class, 'tonghop']);
    Route::post('/tonghoptinh', [baocaotonghopController::class, 'tonghoptinh']);
    Route::post('/thongtincunglaodong', [baocaotonghopController::class, 'thongtincunglaodong']);

    Route::get('/mau02PLI', [baocaotonghopController::class, 'mau02']);
});
Route::get('thongtinhotro', [vanphonghotroController::class, 'thongtinhotro']);

Route::group(['prefix' => 'van_phong'], function () {
    Route::get('danh_sach', [vanphonghotroController::class, 'index']);
    Route::get('get_chucnang', [vanphonghotroController::class, 'edit']);
    Route::post('store', [vanphonghotroController::class, 'store']);
    Route::post('delete', [vanphonghotroController::class, 'destroy']);
});
Route::prefix('vanban_tailieu')->group(function () {
    Route::get('/danh_sach', [vanbanController::class, 'index']);
    Route::post('store', [vanbanController::class, 'store']);
    Route::get('edit', [vanbanController::class, 'edit']);
    Route::post('delete', [vanbanController::class, 'destroy']);
});

Route::group(['prefix' => 'kybaocao'], function () {
    Route::get('/', [kybaocaoController::class, 'index']);
    Route::post('/store', [kybaocaoController::class, 'store']);
    Route::get('/delete/{id}', [kybaocaoController::class, 'delete']);
    Route::post('/gui', [kybaocaoController::class, 'gui']);
    Route::post('/tralai', [kybaocaoController::class, 'tralai']);
    Route::post('/duyet', [kybaocaoController::class, 'duyet']);
    Route::post('/huyduyet', [kybaocaoController::class, 'huyduyet']);
});

Route::group(['prefix' => 'dsthatnghiep'], function () {
    Route::get('/', [dsthatnghiepController::class, 'index']);
    Route::get('/create', [dsthatnghiepController::class, 'create']);
    Route::post('/store', [dsthatnghiepController::class, 'store']);
    Route::get('/edit', [dsthatnghiepController::class, 'edit']);
    Route::post('/update', [dsthatnghiepController::class, 'update']);
    Route::get('/delete/{id}', [dsthatnghiepController::class, 'delete']);
    Route::get('/bcchitiet', [dsthatnghiepController::class, 'bcchitiet']);
    Route::get('/bctonghop', [dsthatnghiepController::class, 'bctonghop']);
});

Route::group(['prefix' => 'dangkytimviec'], function () {
    Route::get('/', [dangkytimviecController::class, 'index']);
    Route::get('/create', [dangkytimviecController::class, 'create']);
    Route::get('/store', [dangkytimviecController::class, 'store']);
    Route::get('/edit', [dangkytimviecController::class, 'edit']);
    Route::post('/update', [dangkytimviecController::class, 'update']);
    Route::get('/delete/{id}/{tungay}/{denngay}/{gioitinh_filter}/{age_filter}/{phien}', [dangkytimviecController::class, 'delete']);
    Route::get('/bcchitiet', [dangkytimviecController::class, 'bcchitiet']);
    Route::get('/bctonghop', [dangkytimviecController::class, 'bctonghop']);
    Route::post('/importexcel', [dangkytimviecController::class, 'importexcel']);
});

Route::prefix('TongHopSoLieu')->group(function(){
    Route::get('ThongTin',[HethongchungController::class,'tonghopsolieu_index']);
    Route::post('tonghopsolieu',[HethongchungController::class,'tonghopsolieu']);
});
