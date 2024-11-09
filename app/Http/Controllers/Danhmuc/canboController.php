<?php

namespace App\Http\Controllers\Danhmuc;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdonvi;
use App\Models\Danhmuc\dsnhomtaikhoan;
use App\Models\Danhmuc\dsnhomtaikhoan_phanquyen;
use App\Models\Hethong\dstaikhoan_phanquyen;
use App\Models\User;
use Illuminate\Http\Request;

class canboController extends Controller
{
    public function index(Request $request)
    {
        $inputs = $request->all();
        
        $m_donvi = getDonVi(session('admin')->sadmin);
        $inputs['madv'] = $inputs['madv'] ?? $m_donvi->first()->madv;
 
        $model = User::where('madv',$inputs['madv'])->wherenotnull('mataikhoan')->get();
        // dd($model);
        $model_dv = dmdonvi::where('madv', $inputs['madv'])->first();
        $m_xa = danhmuchanhchinh::where('id', $model_dv->madiaban)->first();
        $m_huyen = danhmuchanhchinh::where('maquocgia', $m_xa->parent)->first();
        if (in_array(session('admin')->sadmin, ['SSA', 'ssa', 'ADMIN'])) {
            // $m_xa=danhmuchanhchinh::where('id',$model_dv->madiaban)->first();
            $model_huyen = danhmuchanhchinh::where('capdo', 'H')->get();
            $inputs['mahuyen'] = $inputs['mahuyen'] ?? $model_huyen->first()->maquocgia;
            $a_huyen = array_column($model_huyen->toarray(), 'name', 'maquocgia');
            $a_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'danhmuchanhchinh.name')
                ->where('parent', $inputs['mahuyen'])->get();
        } elseif (session('admin')->capdo == 'X') {
            // $m_xa=danhmuchanhchinh::where('id',$model_dv->madiaban)->first();
            // $m_huyen=danhmuchanhchinh::where('maquocgia',$m_xa->parent)->first();       
            $inputs['mahuyen'] = $inputs['mahuyen'] ?? $m_huyen->maquocgia;
            $a_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'danhmuchanhchinh.name', 'danhmuchanhchinh.parent')
                ->where('madv', $inputs['madv'])->get();
            $a_huyen = array_column(danhmuchanhchinh::where('maquocgia', $a_xa->first()->parent)->get()->toarray(), 'name', 'maquocgia');
        } elseif (session('admin')->capdo == 'H') {
            $model_huyen = danhmuchanhchinh::where('maquocgia', session('admin')->maquocgia)->get();
            $a_huyen = array_column($model_huyen->toarray(), 'name', 'maquocgia');
            $inputs['mahuyen'] = $inputs['mahuyen'] ?? $model_huyen->first()->maquocgia;
            $a_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
                ->select('dmdonvi.madv', 'danhmuchanhchinh.name')
                ->where('parent', $inputs['mahuyen'])->get();
        }
        $a_nhomchucnang = array_column(dsnhomtaikhoan::all()->toarray(), 'tennhomchucnang', 'manhomchucnang');
        $a_trangthai=array(
            0 => "Chưa kích hoạt",
            1 => "Kích hoạt",
            2 => "Đang khóa"
        );
        $inputs['url']='/danh_muc/canbo/ThongTin';
        return view('danhmuc.canbo.index')
            ->with('model', $model)
            ->with('a_huyen', $a_huyen)
            ->with('a_xa', $a_xa)
            ->with('a_nhomchucnang', $a_nhomchucnang)
            ->with('a_trangthai', $a_trangthai)
            ->with('inputs', $inputs)
            ->with('baocao', getdulieubaocao());
    }

    public function store(Request $request)
    {
        $inputs = $request->all();

        $user = User::where('username', $inputs['username'])->first();
        if (isset($inputs['password'])) {
            $inputs['password'] = md5($inputs['password']);
        }else{
            unset($inputs['password']);
        }
        $inputs['phanloai'] == 'tonghop' ? $inputs['tonghop'] = 1 : $inputs['nhaplieu'] = 1;
        if ($inputs['id'] != null) {
            User::FindOrFail($inputs['id'])->update($inputs);
        } else {
            if (isset($user)) {
                return view('errors.tontai_dulieu')
                    ->with('message', 'Tên tài khoản đã tồn tại')
                    ->with('furl', '/danh_muc/canbo/ThongTin');
            }
            $inputs['mataikhoan'] = getdate()[0];
            $inputs['phanloaitk'] = 1;


            // dd($inputs);
            User::create($inputs);
            //Phân quyền cho tài khoản dựa trên nhóm chức năng
            $a_phanquyen = [];
            foreach (dsnhomtaikhoan_phanquyen::where('manhomchucnang', $inputs['manhomchucnang'])->get() as $phanquyen) {
                $a_phanquyen[] = [
                    "tendangnhap" => $inputs['username'],
                    "machucnang" => $phanquyen->machucnang,
                    "phanquyen" => $phanquyen->phanquyen,
                    "danhsach" => $phanquyen->danhsach,
                    "thaydoi" => $phanquyen->thaydoi,
                    "hoanthanh" => $phanquyen->hoanthanh,
                ];
            }
            dstaikhoan_phanquyen::insert($a_phanquyen);
        }

        return redirect('/danh_muc/canbo/ThongTin')
            ->with('success', 'Thao tác thành công');
    }

    public function destroy($id)
    {
        $model = User::FindOrFail($id);
        if (isset($model)) {
            //Xóa cán bộ, xóa tài khoản, xóa phân quyền
            dstaikhoan_phanquyen::where('tendangnhap', $model->username)->delete();
            $model->delete();
        }

        return redirect('/danh_muc/canbo/ThongTin')
            ->with('success', 'Xóa thành công');
    }
    public function kiemtra(Request $request)
    {
        $inputs = $request->all();
        $model = User::where('username', $inputs['taikhoan'])->first();
        $result = array(
            'status' => false,
            'message' => null
        );
        if (isset($model)) {
            //tài khoản tồn tại
            $result['message'] = '<p id="thongbao" class="text-danger">Tài khoản đã tồn tại</p>';
        } else {
            $result['message'] = '<p id="thongbao" class="text-success">Tài khoản hợp lệ</p>';
        }
        $result['status'] = true;

        return response()->json($result);
    }

    public function edit(Request $request)
    {
        $inputs = $request->all();
        $model = User::FindOrFail($inputs['id']);
        return response()->json($model);
    }
    public function In(Request $request)
    {
        $inputs=$request->all();
        // dd($inputs);
        //In danh sách theo huyện xã
        $m_xa = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
        ->select('dmdonvi.madv', 'danhmuchanhchinh.name','danhmuchanhchinh.parent');
        $model_huyen = danhmuchanhchinh::where('capdo', 'H');
        if($inputs['madv_huyen'] != 'ALL'){
            $m_xa=$m_xa->where('parent', $inputs['madv_huyen']);
            $model_huyen=$model_huyen->where('maquocgia',$inputs['madv_huyen']);
        }
        $m_xa=$m_xa->get();
        // dd($m_xa);
        $m_huyen=$model_huyen->get();
        // dd($m_huyen);
        $a_xa=array_column($m_xa->toarray(),'madv');
        $model=User::wherenotnull('mataikhoan')->wherein('madv',$a_xa)->get();
        return view('danhmuc.canbo.danhsach')
                    ->with('model',$model)
                    ->with('m_xa',$m_xa)
                    ->with('m_huyen',$m_huyen)
                    ->with('pageTitle', 'Danh sách cán bộ')
                    ->with('baocao', getdulieubaocao());
    }
}
