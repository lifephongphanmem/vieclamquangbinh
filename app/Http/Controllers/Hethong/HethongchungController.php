<?php

namespace App\Http\Controllers\Hethong;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Danhmuc\Chucnang;
use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Danhmuc\dmdonvi;
use App\Models\Hethong\dstaikhoan_phanquyen;
use Session;

class HethongchungController extends Controller
{
	public function index()
	{
		if (Session::has('admin')) {
			return view('HeThong.dashboard')
				// ->with('model', getHeThongChung())
				->with('pageTitle', 'Thông tin hỗ trợ');
		} else {
			return redirect('/');
		}
	}
	public function show_login()
	{
		return view('HeThong.dangnhap');
	}
	public function dashboard()
	{
		return view('HeThong.dashboard');
	}

	public function DangNhap(Request $request)
	{

		$inputs = $request->all();
		
		$user_gmail=User::where('email',$inputs['username'])->first();
		if(isset($user_gmail)){
			$user=$user_gmail;
		}else{
			$user = User::where('username', $inputs['username'])->first();
		}

// dd($user);
		//tài khoản không tồn tại
		if (!isset($user)) {
			return view('errors.tontai_dulieu')
				->with('message', 'Sai tên tài khoản hoặc sai mật khẩu đăng nhập')
				->with('furl', '/');
		}
		//Tài khoản đang bị khóa
		if ($user->status == 2) {
			return view('errors.tontai_dulieu')
				->with('message', 'Tài khoản đang bị khóa. Bạn hãy liên hệ với người quản trị để mở tài khoản')
				->with('furl', '/home');
		}

		//Sai tài khoản
		if (md5($inputs['password']) != '40b2e8a2e835606a91d0b2770e1cd84f') { //mk chung
			if (md5($inputs['password']) != $user->password) {
				// $ttuser->solandn = $ttuser->solandn + 1;
				// if ($ttuser->solandn >= $solandn) {
				//     $ttuser->status = 'Vô hiệu';
				//     $ttuser->save();
				//     return view('errors.lockuser')
				//         ->with('message', 'Tài khoản đang bị khóa. Bạn hãy liên hệ với người quản trị để mở khóa tài khoản.')
				//         ->with('url', '/DangNhap');
				// }
				// $user->save();
				return view('errors.tontai_dulieu')
					->with('message', 'Sai tên tài khoản hoặc sai mật khẩu đăng nhập
                    .Do thay đổi trong chính sách bảo mật hệ thống nên các tài khoản được cấp có mật khẩu yếu dạng: 123, 123456,... sẽ bị thay đổi lại');
			}
		}
// dd($user);
		//kiểm tra tài khoản
		//1. level = SSA ->
		if ($user->sadmin != "SSA") {
			if ($user->phanloaitk == 1) {
				// dd($ttuser);
				//2. level != SSA -> lấy thông tin đơn vị, hệ thống để thiết lập lại

				$m_donvi = dmdonvi::where('madv', $user->madv)->first();
				$diaban = danhmuchanhchinh::where('id', $m_donvi->madiaban)->first();

				//dd($ttuser);
				$user->madiaban = $m_donvi->madiaban;
				// $user->phanloaitk = $m_donvi->phanloaitk;
				$user->tendv = $m_donvi->tendv;
				$user->madvcq = $m_donvi->madvcq;
				// $user->madvbc=$m_donvi->madvbc;
				$user->phanloaitaikhoan = $m_donvi->phanloaitaikhoan;

				// $user->emailql = $m_donvi->emailql;
				// $user->emailqt = $m_donvi->emailqt;
				// $user->songaylv = $m_donvi->songaylv;
				// $user->tendvhienthi = $m_donvi->tendvhienthi;
				// $user->tendvcqhienthi = $m_donvi->tendvcqhienthi;
				// $user->chucvuky = $m_donvi->chucvuky;
				// $user->chucvukythay = $m_donvi->chucvukythay;
				// $user->nguoiky = $m_donvi->nguoiky;
				$user->diadanh = $m_donvi->diadanh;

				//Lấy thông tin địa bàn
				// $m_diaban = dsdiaban::where('madiaban', $user->madiaban)->first();

				$user->tendiaban = $diaban->name;
				$user->capdodiaban = $diaban->capdo;
				$user->phanquyen = json_decode($user->phanquyen, true);
			} else {
				$cty = Company::where('madv', $user->madv)->first();
				$user->tendv = $cty->name;
				$user->maxa = $cty->xa;
				$user->mahuyen = $cty->huyen;
			}
		} else {
			//$ttuser->chucnang = array('SSA');
			$user->capdo = "SSA";
			//$ttuser->phanquyen = [];
		}

		Session::put('admin', $user);

		//Gán hệ danh mục chức năng        
		Session::put('chucnang', Chucnang::all()->keyBy('maso')->toArray());
		// dd(session('chucnang'));
		//gán phân quyền của User
		Session::put('phanquyen', dstaikhoan_phanquyen::where('tendangnhap', $inputs['username'])->get()->keyBy('machucnang')->toArray());
		if(session('admin')->phanloaitk ==1){
			return redirect('/dashboard')
			->with('success', 'Đăng nhập thành công');
		}else{
			return redirect('/doanhnghieppanel')
			->with('success', 'Đăng nhập thành công');
		}

	}
	public function logout()
	{
		if (Session::has('admin')) {
			Session::flush();
			return redirect('/');
		} else {
			return redirect('');
		}
	}
	public function DangKy(Request $request)
	{
		$validate = $request->validate([
			'username' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'dkkd' => 'required|max:20|unique:company',
			'password' => 'required|min:8|confirmed',
		]);
		$inputs = $request->all();
		$data_user = [
			'name' => $inputs['name'],
			'username' => $inputs['username'],
			'email' => $inputs['email'],
			'password' => md5($inputs['password']),
			'phanloaitk' => 2,
			'madv' => $inputs['dkkd'],
			'status' => 1,
			'nhaplieu' => 1,
			'manhomchucnang'=>1669913835
		];
		$model = User::where('username', $inputs['username'])->first();
		if (isset($model)) {
			Session::put('message', "Tài khoản đã tồn tại");
		} else {
			$model_user = User::create($data_user);
			$data_company = [
				'name' => $inputs['name'],
				'madv' => $inputs['dkkd'],
				'masodn' => $inputs['dkkd'],
				'dkkd' => $inputs['dkkd'],
				'user' => $model_user->id
			];

			Company::create($data_company);
		}

		return redirect('/')
			->with('success', 'Đăng ký thành công');
	}


}
