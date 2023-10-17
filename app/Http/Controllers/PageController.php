<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use App\Models\ungvien;
use App\Models\Danhmuc\capbac;
use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmtrinhdokythuat;
use App\Models\Tuyendung;
use App\Models\tuyendungModel;
use App\Models\ungvienhocvan;
use App\Models\ungvienkinhnghiem;
use App\Models\Vitrituyendung;
use Illuminate\Http\Request;

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
            ->with('dmtrinhdokythuat', $dmtrinhdokythuat)
            ->with('baocao', getdulieubaocao());
    }


    public function thongtin_ungvien(Request $request)
    {
        $inputs = $request->all();
        $model = User::find($request->user);
        $ungvien = ungvien::where('user', $inputs['user'])->first();
        $ungvienhocvan = ungvienhocvan::where('user', $inputs['user'])->get();
        $ungvienkinhnghiem = ungvienkinhnghiem::where('user', $inputs['user'])->get();
        $trinhdocmkt = dmtrinhdokythuat::where('madmtdkt',$ungvien->trinhdocmkt)->first()->tentdkt;
        $dmhanhchinh = danhmuchanhchinh::all();
        $huyen = $dmhanhchinh->where('maquocgia',$ungvien->huyen)->first()->name;
        $xa = $dmhanhchinh->where('maquocgia',$ungvien->xa)->first()->name;
        return view('pages.page.ungvien.thongtin')
            ->with('model', $model)
            ->with('ungvien', $ungvien)
            ->with('ungvienhocvan', $ungvienhocvan)
            ->with('ungvienkinhnghiem', $ungvienkinhnghiem)
            ->with('trinhdocmkt', $trinhdocmkt)
            ->with('huyen', $huyen)
            ->with('xa', $xa)
            ->with('baocao', getdulieubaocao());
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
            $result['content'] .= '<h3>'. $item->hoten .'</h3>';
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
                $result['content'] .= '<p><span><img src="/assets2/images/time_l.png"></span>'. getDayVn($item->created_at) . '</p>';
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

    public function index_vieclam()
    {
        // tuyendungModel::
        $model = Vitrituyendung::leftjoin('tuyendungModel', 'tuyendungModel.id', 'ungvien.user')
            ->select('ungvien.*', 'users.email', 'users.created_at ', 'users.status')
            ->where('phanloaitk', '3')
            ->orderBy('id', 'DESC')->get();
        $capbac = capbac::all();
        $dmtrinhdokythuat = dmtrinhdokythuat::all();
        return view('pages.page.vieclam.index')
            ->with('model', $model)
            ->with('capbac', $capbac)
            ->with('dmtrinhdokythuat', $dmtrinhdokythuat)
            ->with('baocao', getdulieubaocao());
    }

    public function viewlogin()
    {

        return view('pages.page.login')->with('baocao', getdulieubaocao());
    }
    public function gioithieu()
    {

        return view('pages.page.gioi-thieu')->with('baocao', getdulieubaocao());
    }
}
