<?php

namespace App\Http\Controllers\DuBao;

use App\Http\Controllers\Controller;
use App\Models\Caulaodong\nhucautuyendungct;
use App\Models\Danhmuc\dmdonvi;
use App\Models\Danhmuc\dmtinhtrangthamgiahdktct;
use App\Models\Danhmuc\dmtinhtrangthamgiahdktct2;
use App\Models\Danhmuc\dsdonvi;
use App\Models\DuBao\dubaonhucaulaodong;
use App\Models\DuBao\dubaonhucaulaodong_chitiet;
use App\Models\Nguoilaodong\nguoilaodong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class dubaonhucaulaodongController extends Controller
{

    public static $url = '/dubaonhucaulaodong/';
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Session::has('admin')) {
                return redirect('/');
            };
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        if (!chkPhanQuyen('dubaonhucaulaodong', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'dubaonhucaulaodong');
        }
        $inputs = $request->all();
        $inputs['url'] = static::$url;
        $m_donvi = getDonVi(session('admin')->sadmin, 'dubaonhucaulaodong');
        $m_donvi = $m_donvi->where('phanloaitaikhoan', 'TH');
        $inputs['madv'] = $inputs['madv'] ?? $m_donvi->first()->madv;

        $model = dubaonhucaulaodong::where('madv', $inputs['madv'])->get();

        return view('DuBao.DanhSach')
            ->with('model', $model)
            ->with('a_dsdv', array_column($m_donvi->toarray(), 'tendv', 'madv'))
            ->with('inputs', $inputs)
            ->with('pageTitle', 'Danh sách dự báo nhu cầu lao động');
    }

    public function them(Request $request)
    {
        $inputs = $request->all();
        $model = new dubaonhucaulaodong();

        $model->madubao = (string)getdate()[0];
        $model->thoigian = date('Y-m-d');
        $model->madv = $inputs['madv'];
        $inputs['url'] = static::$url;

        $vitrivl = dmtinhtrangthamgiahdktct2::where('manhom2', '20221108050559')->get();
        $m_nguoilaodong = nguoilaodong::all(); //nghenghiep
        $m_nhucau = nhucautuyendungct::all(); //vitrivl
        $a_kq = [];
        foreach ($vitrivl as $vitri) {
            //Cung
            $a_kq[] = [
                'madubao' => $model->madubao,
                'phanloai' => 'CUNG',
                'soluong' => $m_nguoilaodong->where('nghenghiep', $vitri->madmtgktct2)->count(),
                'madmtgktct2' => $vitri->madmtgktct2,
                'tentgktct2' =>  $vitri->tentgktct2,
            ];
            //Cầu
            $a_kq[] = [
                'madubao' => $model->madubao,
                'phanloai' => 'CAU',
                'soluong' => $m_nhucau->where('vitrivl', $vitri->madmtgktct2)->count(),
                'madmtgktct2' => $vitri->madmtgktct2,
                'tentgktct2' =>  $vitri->tentgktct2,
            ];
            //Khác

        }
        dubaonhucaulaodong_chitiet::insert($a_kq);
        $model_cung = dubaonhucaulaodong_chitiet::where('phanloai', 'CUNG')->where('madubao', $model->madubao)->get();
        $model_cau = dubaonhucaulaodong_chitiet::where('phanloai', 'CAU')->where('madubao', $model->madubao)->get();
        $model_khac = dubaonhucaulaodong_chitiet::where('phanloai', 'KHAC')->where('madubao', $model->madubao)->get();

        return view('DuBao.ThayDoi')
            ->with('model', $model)
            ->with('model_cung', $model_cung)
            ->with('model_cau', $model_cau)
            ->with('model_khac', $model_khac)
            ->with('inputs', $inputs)
            ->with('pageTitle', 'Thông tin dự báo nhu cầu lao động');
    }

    public function thaydoi(Request $request)
    {
        $inputs = $request->all();
        $inputs['url'] = static::$url;
        $model = dubaonhucaulaodong::where('madubao', $inputs['madubao'])->first();
        $model_cung = dubaonhucaulaodong_chitiet::where('phanloai', 'CUNG')->where('madubao', $model->madubao)->get();
        $model_cau = dubaonhucaulaodong_chitiet::where('phanloai', 'CAU')->where('madubao', $model->madubao)->get();
        $model_khac = dubaonhucaulaodong_chitiet::where('phanloai', 'KHAC')->where('madubao', $model->madubao)->get();

        return view('DuBao.ThayDoi')
            ->with('model', $model)
            ->with('model_cung', $model_cung)
            ->with('model_cau', $model_cau)
            ->with('model_khac', $model_khac)
            ->with('inputs', $inputs)
            ->with('pageTitle', 'Thông tin dự báo nhu cầu lao động');
    }

    public function luudubao(Request $request)
    {
        $inputs = $request->all();
        $model = dubaonhucaulaodong::where('madubao', $inputs['madubao'])->first();
        if ($model != null)
            $model->update($inputs);
        else
            dubaonhucaulaodong::create($inputs);
        return redirect(static::$url . 'danhsach?madv=' . $inputs['madv']);
    }

    public function indubao(Request $request)
    {
        $inputs = $request->all();
        $m_dubao = dubaonhucaulaodong::where('madubao', $inputs['madubao'])->first();
        $m_donvi = dmdonvi::where('madv', $m_dubao->madv)->first();
        $model = dmtinhtrangthamgiahdktct2::where('manhom2', '20221108050559')->get();
        $model_chitiet = dubaonhucaulaodong_chitiet::where('madubao', $m_dubao->madubao)->get();
        
        foreach ($model as $vt) {
            $vt->soluong_cung = $model_chitiet->where('phanloai', 'CUNG')->where('madmtgktct2', $vt->madmtgktct2)->count();
            $vt->soluong_cau = $model_chitiet->where('phanloai', 'CAU')->where('madmtgktct2', $vt->madmtgktct2)->count();
            $vt->soluong_khac = $model_chitiet->where('phanloai', 'KHAC')->where('madmtgktct2', $vt->madmtgktct2)->count();
            $vt->chenhlech = $vt->soluong_cau + $vt->soluong_khac - $vt->soluong_cung;
        }

        return view('DuBao.InDuBao')
            ->with('model', $model)
            ->with('m_dubao', $m_dubao)
            ->with('m_donvi', $m_donvi)
            ->with('pageTitle', 'In dự báo nhu cầu lao động');;
    }

    public function themchitiet(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }

        $inputs = $request->all();
        //$id =  $inputs['id'];
        return response()->json($inputs);
        $model = dubaonhucaulaodong_chitiet::where('id', $inputs['id'])->first();
        unset($inputs['id']);
        if ($model == null) {
            dubaonhucaulaodong_chitiet::create($inputs);
        } else
            $model->update($inputs);

        $model = dubaonhucaulaodong_chitiet::where('madubao', $inputs['madubao'])->where('phanloai', $inputs['phanloai'])->get();

        // $this->htmlTapThe($result, $model);
        return response()->json($result);
    }

    function htmlTapThe(&$result, $model)
    {
        if (isset($model)) {

            $result['message'] = '<div class="row" id="dskhenthuongtapthe">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table id="sample_4" class="table table-striped table-bordered table-hover">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr class="text-center">';
            $result['message'] .= '<th width="5%">STT</th>';
            $result['message'] .= '<th>Tên tập thể</th>';
            $result['message'] .= '<th>Phân loại<br>tập thể</th>';
            $result['message'] .= '<th>Hình thức khen thưởng/<br>Danh hiệu thi đua</th>';
            $result['message'] .= '<th>Kết quả<br>khen thưởng</th>';
            $result['message'] .= '<th width="10%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody>';
            $i = 1;
            foreach ($model as $tt) {
                $result['message'] .= '<tr class="odd gradeX">';
                $result['message'] .= '<td class="text-center">' . $i++ . '</td>';
                $result['message'] .= '<td>' . $tt->tentapthe . '</td>';
                $result['message'] .= '<td>' . ($a_tapthe[$tt->maphanloaitapthe] ?? '') . '</td>';
                $result['message'] .= '<td class="text-center"> ' . ($a_dhkt[$tt->madanhhieukhenthuong] ?? '') . '</td>';
                if ($tt->ketqua == '1')
                    $result['message'] .= '<td class="text-center"><a class="btn btn-sm btn-clean btn-icon">
                    <i class="icon-lg la fa-check text-primary icon-2x"></i></a></td>';
                else
                    $result['message'] .= '<td class="text-center"><a class="btn btn-sm btn-clean btn-icon">
                    <i class="icon-lg la fa-times-circle text-danger icon-2x"></i></a></td>';
                $result['message'] .= '<td class="text-center"><button title="Sửa thông tin" type="button" onclick="getTapThe(' . $tt->id . ')"  class="btn btn-sm btn-clean btn-icon"
                                                                    data-target="#modal-create-tapthe" data-toggle="modal"><i class="icon-lg la fa-edit text-primary"></i></button>';
                $result['message'] .= '<button title="Xóa" type="button" onclick="delKhenThuong(' . $tt->id . ', &#39;' . static::$url . 'XoaTapThe&#39;, &#39;TAPTHE&#39;)" class="btn btn-sm btn-clean btn-icon" data-target="#modal-delete-khenthuong" data-toggle="modal">
                                                                    <i class="icon-lg la fa-trash text-danger"></i></button>';

                $result['message'] .= '</td>';
                $result['message'] .= '</tr>';
            }
            $result['message'] .= '</tbody>';
            $result['message'] .= '</table>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';


            $result['status'] = 'success';
        }
    }
}
