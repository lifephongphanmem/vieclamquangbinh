<?php 

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
// use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Doanhnghiep\CompanyController;

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


// Route::get('/', [UserController::class, 'show_login']);


// Route::get('/', [UserController::class, 'show_login']);


Route::post('/login-user', [UserController::class, 'auth']);
Route::post('/signup', [UserController::class, 'signup']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/user-fe', [UserController::class, 'edit']);
Route::post('/user-fu', [UserController::class, 'update']);

// Nguoi dung


// Doanh nghiep
Route::get('/doanhnghiep/thongtin', [CompanyController::class, 'show']);
Route::get('/doanhnghiep/nguoilaodong', [CompanyController::class, 'nguoilaodong']);
Route::get('/companydownload', [CompanyController::class, 'download']);
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

//tuyen dung
Route::get('/tuyendung-fa', [TuyendungController::class, 'show_all']);
Route::get('/tuyendung-fn', [TuyendungController::class, 'new']);
Route::get('/tuyendung-fe/{tdid}', [TuyendungController::class, 'edit']);
Route::post('/tuyendung-fs', [TuyendungController::class, 'save']);
Route::post('/tuyendung-fru', [TuyendungController::class, 'updatebaocao']);
Route::get('/tuyendung-fr/{tdid}', [TuyendungController::class, 'baocao']);
// messenger

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', [MessagesController::class, 'index'])->name('messages');
    Route::get('create', [MessagesController::class, 'create']);
    Route::post('store', [MessagesController::class, 'store']);
    Route::get('{id}', [MessagesController::class, 'show'])->name('messages.show');
    Route::put('{id}', [MessagesController::class, 'update'])->name('messages.update');
});


//tuyen dung
Route::get('/dichvu-fa', [DichvuController::class, 'show_all']);
Route::get('/dichvu-fr/{eid?}', [DichvuController::class, 'dangky']);
// messenger





// Backend SECTION

Route::get('/admin', [AdminController::class, 'login'])->name('login');
Route::get('/dashboard', [AdminController::class, 'dashboard']);

Route::post('/login-admin', [AdminController::class, 'auth']);
Route::get('/logout-admin', [AdminController::class, 'logout']);

// Doanh nghiep

Route::get('/doanhnghiep-ba', [AdminCompany::class, 'show_all']);
Route::get('/doanhnghiep-bs', [AdminCompany::class, 'save']);
Route::get('/ doanhnghiep-bn', [AdminCompany::class, 'new']);
Route::get('/doanhnghiep-be/{cid}', [AdminCompany::class, 'edit']);
Route::post('/doanhnghiep-bu/{cid}', [AdminCompany::class, 'update']);
Route::get('/doanhnghiep-br/{cid}', [AdminCompany::class, 'baocao145']);

// Người lao động

Route::get('/employer-ba/{cid?}', [AdminEmployer::class, 'show_all']);
Route::get('/employer-bs', [AdminEmployer::class, 'save']);
Route::get('/ employer-bn', [AdminEmployer::class, 'new']);
Route::get('/employer-be/{cid}', [AdminEmployer::class, 'edit']);
Route::post('/employer-bu/{cid}', [AdminEmployer::class, 'update']);

// Tuyen dụng 

Route::get('/tuyendung-ba/{cid?}', [AdminTuyendung::class, 'show_all']); // all

Route::get('/tuyendung-bu/{tdid}', [AdminTuyendung::class, 'duyet']); // duyet

Route::get('/tuyendung-be/{tdid}', [AdminTuyendung::class, 'edit']); // edit

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

Route::get('/report-be/{id}', [AdminReport::class, 'edit']);


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

Route::get('/dichvu-ba/{cid?}', [AdminDichvu::class, 'show_all']);
Route::get('/dichvudk-ba/{dvid}', [AdminDichvu::class, 'show_dk']);
Route::get('/dichvu-be/{uid}', [AdminDichvu::class, 'edit']);
Route::get('/dichvu-bd/{uid}', [AdminDichvu::class, 'delete']);
Route::get('/dichvu-bn/', [AdminDichvu::class, 'new']);
Route::post('/dichvu-bs/', [AdminDichvu::class, 'save']);
Route::post('/dichvu-bu/', [AdminDichvu::class, 'update']);