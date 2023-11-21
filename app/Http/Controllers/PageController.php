<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Models\apply;
use App\Models\Company;
use App\Models\User;
use App\Models\ungvien;
use App\Models\Danhmuc\capbac;
use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdonvi;
use App\Models\Danhmuc\dmtrinhdokythuat;
use App\Models\Tuyendung;
use App\Models\tuyendungModel;
use App\Models\ungvienhocvan;
use App\Models\ungvienkinhnghiem;
use App\Models\Vitrituyendung;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Http\Requests\UngVienCoBanRequest;
use App\Http\Requests\UngVienHocVanRequest;
use App\Http\Requests\UngVienKinhNghiemRequest;


class PageController extends Controller
{

    public function index_ungvien()
    {
        $model = User::leftjoin('ungvien', 'users.id', 'ungvien.user')
            ->select('ungvien.*', 'users.email', 'users.created_at ', 'users.status')
            ->where('phanloaitk', '3')
            ->orderBy('id', 'DESC')->get();
        $capbac = capbac::all();
        $dmtrinhdokythuat = dmtrinhdokythuat::all();
        return view('pages.page.ungvien.index')
            ->with('model', $model)
            ->with('capbac', $capbac)
            ->with('dmtrinhdokythuat', $dmtrinhdokythuat);
    }


    public function thongtin_ungvien(Request $request)
    {
        $inputs = $request->all();
        // dd($inputs);
        $model = User::find($request->user);
        $ungvien = ungvien::where('user', $inputs['user'])->first();
        // dd($ungvien);
        $ungvienhocvan = ungvienhocvan::where('user', $inputs['user'])->get();
        $ungvienkinhnghiem = ungvienkinhnghiem::where('user', $inputs['user'])->get();
        $trinhdocmkt = dmtrinhdokythuat::where('madmtdkt', $ungvien->trinhdocmkt)->first();
        $dmhanhchinh = danhmuchanhchinh::all();
        $huyen = $dmhanhchinh->where('maquocgia', $ungvien->huyen)->first();
        $xa = $dmhanhchinh->where('maquocgia', $ungvien->xa)->first();
        return view('pages.page.ungvien.thongtin')
            ->with('model', $model)
            ->with('ungvien', $ungvien)
            ->with('ungvienhocvan', $ungvienhocvan)
            ->with('ungvienkinhnghiem', $ungvienkinhnghiem)
            ->with('trinhdocmkt', $trinhdocmkt)
            ->with('huyen', $huyen)
            ->with('xa', $xa);
    }

    public function danhsach_apply()
    {

        $user =  session('admin')->id;

        $model = User::find($user);
        $ungvien = ungvien::where('user', $user)->first();

        $vitriungtuyen = apply::leftJoin('Vitrituyendung', 'Vitrituyendung.id', 'apply.vitri')
            ->leftJoin('Tuyendung', 'Tuyendung.id', 'Vitrituyendung.idtuyendung')
            ->leftJoin('Company', 'Company.user', 'Tuyendung.user')
            ->where('ungvien', $user)
            ->select('apply.*', 'Vitrituyendung.name as tenvitri', 'Company.name as tencongty')
            ->get();

        $trinhdocmkt = dmtrinhdokythuat::where('madmtdkt', $ungvien->trinhdocmkt)->first();
        $dmhanhchinh = danhmuchanhchinh::all();
        $huyen = $dmhanhchinh->where('maquocgia', $ungvien->huyen)->first();
        $xa = $dmhanhchinh->where('maquocgia', $ungvien->xa)->first();
        return view('pages.page.ungvien.vitridaungtuyen')
            ->with('model', $model)
            ->with('ungvien', $ungvien)
            ->with('vitriungtuyen', $vitriungtuyen)
            ->with('trinhdocmkt', $trinhdocmkt)
            ->with('huyen', $huyen)
            ->with('xa', $xa);
    }
    public function apply(Request $request)
    {

        $inputs = $request->all();
        $inputs['trangthai'] = 0;
        apply::create($inputs);
        return redirect('page/vieclam/thongtin?id=' . $inputs['vitri']);
    }

    public function delete_apply(Request $request)
    {
        apply::find($request->id)->delete();
        return redirect('page/ungvien/vi-tri-da-ung-tuyen');
    }

    public function filter_ungvien(Request $request)
    {
        $inputs = $request->all();
        $model = User::leftjoin('ungvien', 'users.id', 'ungvien.user')
            ->select('ungvien.*', 'users.email', 'users.created_at ', 'users.status')
            ->where('phanloaitk', '3')
            ->orderBy('id', 'DESC')->get();
        if (isset($inputs['luong'])) {
            foreach ($inputs['luong'] as $item) {
                if ($item == '1') {
                    $model = $model->where('luong', '<', '5');
                }
                if ($item == '2') {
                    $model = $model->where('luong', '>=', '5')->where('luong', '<=', '10');
                }
                if ($item == '3') {
                    $model = $model->where('luong', '>=', '10')->where('luong', '<=', '15');
                }
                if ($item == '4') {
                    $model = $model->where('luong', '>=', '15')->where('luong', '<=', '20');
                }
                if ($item == '5') {
                    $model = $model->where('luong', '>=', '20')->where('luong', '<=', '30');
                }
                if ($item == '6') {
                    $model = $model->where('luong', '>=', '30')->where('luong', '<=', '40');
                }
                if ($item == '7') {
                    $model = $model->where('luong', '>', '40');
                }
            }
        }
        if (isset($inputs['capbac'])) {
            $model = $model->whereIn('capbac', $inputs['capbac']);
        }
        if (isset($inputs['hinhthuclv'])) {
            $model = $model->whereIn('hinhthuclv', $inputs['hinhthuclv']);
        }
        if (isset($inputs['kinhnghiem'])) {
            $model = $model->whereIn('kinhnghiem', $inputs['kinhnghiem']);
        }
        if (isset($inputs['trinhdocmkt'])) {
            $model = $model->whereIn('trinhdocmkt', $inputs['trinhdocmkt']);
        }

        $result['count'] = $model->count();
        $result['content'] = '<div>';
        foreach ($model as $item) {
            $result['content'] .= '<div class="item_job d_flex d_flex_center wow fadeInUp"';
            $result['content'] .= ' style="visibility: visible; animation-name: fadeInUp;">';
            $result['content'] .= '<div class="img"><a href=""><img class="img-full-h" ';
            if (isset($item->avatar)) {
                $result['content'] .= 'src="uploads/ungvien/' . $item->avatar . '"';
            } else {
                $result['content'] .= ' src="/assets2/media/images/default/s100_100/defaultimage.jpg"';
            }
            $result['content'] .= ' title="' . $item->hoten . '">';
            $result['content'] .= '</a> </div>';

            $result['content'] .= '<div class="text">';
            $result['content'] .= '<a href="">';
            $result['content'] .= '<h3>' . $item->hoten . '</h3>';
            $result['content'] .= '</a>';
            $result['content'] .= '<div class="text_extra d_flex d_flex_center">';
            if (isset($item->luong)) {
                $result['content'] .= '<p><span>$</span>Tối thiểu ' . $item->luong . ' Triệu</p>';
            } else {
                $result['content'] .= '<p><span>$</span>Thỏa thuận </p>';
            }
            $result['content'] .= '<p><span><img src="/assets2/images/ft.png"></span>' . $item->hinhthuclv . '</p>';
            if (getDayVn($item->created_at) == date("d/m/Y")) {
                $result['content'] .= '<p><span><img src="/assets2/images/time_l.png"></span> Hôm nay</p>';
            } else {
                $result['content'] .= '<p><span><img src="/assets2/images/time_l.png"></span>' . getDayVn($item->created_at) . '</p>';
            }
            $result['content'] .= '<p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>';
            $result['content'] .= 'Quảng Bình </p>';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';

            $result['content'] .= '<div class="btn_submit_job">';
            $result['content'] .= '<a href="/page/ungvien/thongtin?user=' . $item->user . '" class="btn">Xem hồ sơ</a></div></div>';
        }
        $result['content'] .= '</div>';

        return response($result);
    }

    public function iframe_hocvan(Request $request)
    {
        $ungvienhocvan = ungvienhocvan::where('user', $request->user)->get();

        $dmtrinhdokythuat = dmtrinhdokythuat::all();

        return view('pages.page.ungvien.iframehocvan')
            ->with('ungvienhocvan', $ungvienhocvan)
            ->with('dmtrinhdokythuat', $dmtrinhdokythuat)
            ->with('user', $request->user);
    }
    public function store_hocvan(UngVienHocVanRequest $request)
    {
        $inputs = $request->all();
        ungvienhocvan::create($inputs);
        return redirect('/page/ungvien/iframe_hocvan?user=' . $inputs['user']);
    }
    public function update_hocvan(UngVienHocVanRequest $request)
    {
        $inputs = $request->all();
        ungvienhocvan::find($inputs['id'])->update($inputs);
        return redirect('/page/ungvien/iframe_hocvan?user=' . $inputs['user']);
    }
    public function delete_hocvan(Request $request)
    {
        $inputs = $request->all();
        $model = ungvienhocvan::find($inputs['id']);
        $user = $model->user;
        $model->delete();
        return redirect('/page/ungvien/iframe_hocvan?user=' . $user);
    }

    public function iframe_kinhnghiem(Request $request)
    {
        $ungvienkinhnghiem = ungvienkinhnghiem::where('user', $request->user)->get();

        $dmtrinhdokythuat = dmtrinhdokythuat::all();

        return view('pages.page.ungvien.iframekinhnghiem')
            ->with('ungvienkinhnghiem', $ungvienkinhnghiem)
            ->with('dmtrinhdokythuat', $dmtrinhdokythuat)
            ->with('user', $request->user);
    }
    public function store_kinhnghiem(UngVienKinhNghiemRequest $request)
    {

        $inputs = $request->all();
        ungvienkinhnghiem::create($inputs);
        return redirect('/page/ungvien/iframe_kinhnghiem?user=' . $inputs['user']);
    }
    public function update_kinhnghiem(UngVienKinhNghiemRequest $request)
    {
        $inputs = $request->all();
        ungvienkinhnghiem::find($inputs['id'])->update($inputs);
        return redirect('/page/ungvien/iframe_kinhnghiem?user=' . $inputs['user']);
    }
    public function delete_kinhnghiem(Request $request)
    {
        $inputs = $request->all();
        $model = ungvienkinhnghiem::find($inputs['id']);
        $user = $model->user;
        $model->delete();
        return redirect('/page/ungvien/iframe_kinhnghiem?user=' . $user);
    }

    public function iframe_coban(Request $request)
    {
        //    dd($request->success);
        $ungvien = ungvien::where('user', $request->user)->first();

        $dmtrinhdokythuat = dmtrinhdokythuat::all();
        $danhmuc = danhmuchanhchinh::all();
        $capbac = capbac::all();
        return view('pages.page.ungvien.iframecoban')
            ->with('ungvien', $ungvien)
            ->with('danhmuc', $danhmuc)
            ->with('capbac', $capbac)
            ->with('dmtrinhdokythuat', $dmtrinhdokythuat)
            ->with('user', $request->user)
            ->with('success', $request->success);
    }

    public function update_coban(UngVienCoBanRequest $request)
    {
        $inputs = $request->all();

        $ungvien = ungvien::find($inputs['id']);
        if (isset($inputs['avatar'])) {
            //xóa ảnh cũ trong forder
            if ($ungvien->avatar != null) {
                if (File::exists('uploads/ungvien/' . ($ungvien->avatar))) {
                    File::Delete('uploads/ungvien/' . ($ungvien->avatar));
                }
            }
            // lưu ảnh mới trong forder
            $image = $inputs['avatar'];
            $avatar = date('Ymdhis') . $image->getClientOriginalName();
            $image->move('uploads/ungvien/', $avatar);
            $inputs['avatar'] = $avatar;
       
        } 

        $ungvien->update($inputs);

        return redirect('/page/ungvien/iframe_coban?user=' . $inputs['user'] . '&success=đã lưu thông tin')
            ->with('success', 'đã lưu thông tin');
    }








    public function index_vieclam()
    {
        $model = Vitrituyendung::leftjoin('tuyendung', 'tuyendung.id', 'Vitrituyendung.idtuyendung')
            ->join('Company', 'Company.user', 'tuyendung.user')
            ->select('Vitrituyendung.*', 'tuyendung.thoihan', 'Company.name as congty', 'Company.user')
            ->orderBy('id', 'DESC')->get();
        // dd($model);
        $capbac = capbac::all();
        $dmtrinhdokythuat = dmtrinhdokythuat::all();
        return view('pages.page.vieclam.index')
            ->with('model', $model)
            ->with('capbac', $capbac)
            ->with('dmtrinhdokythuat', $dmtrinhdokythuat);
    }

    public function thongtin_vieclam(Request $request)
    {
        if (session('admin') != null) {
            if (session('admin')->phanloaitk == 3) {
                $id_ungvien = session('admin')->id;
            } else {
                $id_ungvien = null;
            }
        } else {
            $id_ungvien = null;
        }
        $ungtuyen = apply::where('ungvien', $id_ungvien)->where('vitri', $request->id)->first();
        if (isset($ungtuyen)) {
            $hoso = 'danop';
        } else {
            $hoso = 'chuanop';
        }
        $model = Vitrituyendung::find($request->id);
        $Tuyendung  = Tuyendung::find($model->idtuyendung);
        $Company = Company::where('user', $Tuyendung->user)->first();

        $list_vitrikhac = Vitrituyendung::leftJoin('Tuyendung', 'Tuyendung.id', 'Vitrituyendung.idtuyendung')

            ->select('Vitrituyendung.id', 'Vitrituyendung.name', 'Tuyendung.thoihan')
            ->where('Vitrituyendung.id', '!=', $request->id)
            ->get();

        return view('pages.page.vieclam.thongtin')
            ->with('model', $model)
            ->with('Tuyendung', $Tuyendung)
            ->with('Company', $Company)
            ->with('hoso', $hoso)
            ->with('list_vitrikhac', $list_vitrikhac);
    }

    public function congty(Request $request)
    {
        $Company = Company::where('user', $request->user)->first();
        $model = Vitrituyendung::LeftJoin('Tuyendung', 'Tuyendung.id', 'Vitrituyendung.idtuyendung')
            ->select('Vitrituyendung.*', 'Tuyendung.thoihan')
            ->get();
        // dd($Vitrituyendung);
        return view('pages.page.vieclam.congty')
            ->with('model', $model)
            ->with('Company', $Company);
    }


    public function viewlogin()
    {

        return view('pages.page.login');
    }

    public function viewregister()
    {

        return view('pages.page.register');
    }

    public function register(Request $request)
    {
        // $validate = $request->validate([
        // 	// 'username' => 'required|max:255',
        // 	'email' => 'required|email|max:255|unique:users',
        // 	'dkkd' => 'required|max:20|unique:company',
        // 	'password' => 'required|min:8|confirmed',
        // ]);
        $inputs = $request->all();
        $data_user = [
            'name' => $inputs['hoten'],
            'email' => $inputs['email'],
            'password' => Hash::make($inputs['password']),
            'phanloaitk' => 3,
            'status' => 0, //0: vô hiệu,1: kích hoạt,2: khóa
        ];

        $model = User::where('email', $inputs['email'])->first();

        if (isset($model)) {
            Session::put('message', "Mail đã được sử dụng");
        } else {
            $model_user = User::create($data_user);
            $data_ungvien = [
                'user' => $model_user->id,
                // 'avatar' => $inputs['avatar'],
                'hoten' => $inputs['hoten'],
            ];
            ungvien::create($data_ungvien);
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

    public function home()
    {
        $vieclam =  Vitrituyendung::leftjoin('tuyendung', 'tuyendung.id', 'Vitrituyendung.idtuyendung')
            ->join('Company', 'Company.user', 'tuyendung.user')
            ->select('Vitrituyendung.*', 'tuyendung.thoihan', 'Company.name as congty', 'Company.user');

        $count_vieclam = $vieclam->count();
        $vieclam =  $vieclam->orderBy('id', 'DESC')->limit(5)->get();

        $ungvien = User::leftjoin('ungvien', 'users.id', 'ungvien.user')
            ->select('ungvien.*', 'users.email', 'users.created_at ', 'users.status')
            ->where('phanloaitk', '3');
        $count_ungvien = $ungvien->count();
        $ungvien =   $ungvien->orderBy('id', 'DESC')->limit(5)->get();


        return view('pages.page.home')
            ->with('vieclam', $vieclam)
            ->with('ungvien', $ungvien)
            ->with('count_vieclam', $count_vieclam)
            ->with('count_ungvien', $count_ungvien);
    }

    public function gioithieu()
    {
        $user = User::where('sadmin', 'admin')->first();
        $Company = dmdonvi::where('madv', $user->madv)->first();
        // dd($Company);
        return view('pages.page.gioi-thieu');
    }
}
