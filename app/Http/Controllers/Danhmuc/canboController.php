<?php

namespace App\Http\Controllers\Danhmuc;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdonvi;
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
        $model = User::wherenotnull('mataikhoan')->get();
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
        return view('danhmuc.canbo.index')
            ->with('model', $model)
            ->with('a_huyen', $a_huyen)
            ->with('a_xa', $a_xa)
            ->with('inputs', $inputs)
            ->with('baocao', getdulieubaocao());
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        $user=User::where('username',$inputs['username'])->first();
        if(isset($user)){
			return view('errors.tontai_dulieu')
				->with('message', 'Tên tài khoản đã tồn tại')
				->with('furl', '/danh_muc/canbo/ThongTin');
        }
        $inputs['mataikhoan'] = getdate()[0];
        $inputs['phanloaitk'] = 1;
        $inputs['password'] = md5($inputs['password']);
        // dd($inputs);
        User::create($inputs);

        return redirect('/danh_muc/canbo/ThongTin')
            ->with('success', 'Thêm thành công');
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
}
