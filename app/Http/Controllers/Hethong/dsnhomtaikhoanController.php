<?php

namespace App\Http\Controllers\Hethong;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc\Chucnang;
use App\Models\Danhmuc\dsnhomtaikhoan;
use App\Models\Danhmuc\dsnhomtaikhoan_phanquyen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;

class dsnhomtaikhoanController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Session::has('admin')) {
                return redirect('/');
            };
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!chkPhanQuyen('nhomtaikhoan', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'nhomtaikhoan');
        }
        $inputs = $request->all();
        $model = dsnhomtaikhoan::all();        
        $m_taikhoan = User::all();
        foreach ($model as $ct){
            $ct->soluong = $m_taikhoan->where('manhomchucnang', $ct->manhomchucnang)->count();
        }
        return view('HeThong.manage.nhomchucnang.index')
            ->with('model', $model)
            ->with('inputs', $inputs)
            ->with('pageTitle', 'Danh sách nhóm tài khoản');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!chkPhanQuyen('nhomtaikhoan', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'nhomtaikhoan');
        }
        $inputs = $request->all();


        $model = dsnhomtaikhoan::where('manhomchucnang', $inputs['manhomchucnang'])->first();
        if ($model == null) {
            $inputs['manhomchucnang'] = getdate()[0];
            dsnhomtaikhoan::create($inputs);
        } else {

            $model->update($inputs);
        }

        return redirect('/nhomchucnang/danhsach')
        ->with('success','Thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function PhanQuyen(Request $request)
    {
        if (!chkPhanQuyen('nhomtaikhoan', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'nhomtaikhoan');
        }
        $inputs = $request->all();
        $m_nhomtaikhoan = dsnhomtaikhoan::where('manhomchucnang', $inputs['manhomchucnang'])->first();
        $m_nhomphanquyen = dsnhomtaikhoan_phanquyen::where('manhomchucnang', $inputs['manhomchucnang'])->get();
        $m_chucnang = Chucnang::where('trangthai', '1')->get();
        foreach ($m_chucnang as $chucnang) {
            $phanquyen = $m_nhomphanquyen->where('machucnang', $chucnang->maso)->first();
            $chucnang->phanquyen = $phanquyen->phanquyen ?? 0;
            $chucnang->danhsach = $phanquyen->danhsach ?? 0;
            $chucnang->thaydoi = $phanquyen->thaydoi ?? 0;
            $chucnang->hoanthanh = $phanquyen->hoanthanh ?? 0;
            $chucnang->nhomchucnang = $m_chucnang->where('machucnang_goc', $chucnang->maso)->count() > 0 ? 1 : 0;
        }
        // dd($m_chucnang);
        return view('HeThong.manage.nhomchucnang.phanquyen')
            ->with('model', $m_chucnang->where('capdo', '1')->sortby('sapxep'))
            ->with('m_chucnang', $m_chucnang)
            ->with('m_nhomtaikhoan', $m_nhomtaikhoan)
            ->with('pageTitle', 'Phân quyền tài khoản');
    }

    public function LuuPhanQuyen(Request $request)
    {
        if (!chkPhanQuyen('nhomtaikhoan', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'nhomtaikhoan');
        }

        $inputs = $request->all();
        $inputs['phanquyen'] = isset($inputs['phanquyen']) ? 1 : 0;
        $inputs['danhsach'] = isset($inputs['danhsach']) ? 1 : 0;
        $inputs['thaydoi'] = isset($inputs['thaydoi']) ? 1 : 0;
        $inputs['hoanthanh'] = isset($inputs['hoanthanh']) ? 1 : 0;
        $inputs['danhsach'] = ($inputs['hoanthanh'] == 1 || $inputs['thaydoi'] == 1) ? 1 : $inputs['danhsach'];
        //dd($inputs);
        $m_chucnang = Chucnang::where('trangthai', '1')->get();
        $ketqua = new Collection();
        if (isset($inputs['nhomchucnang'])) {
            $this->getChucNang($m_chucnang, $inputs['machucnang'], $ketqua);
        }
        $ketqua->add($m_chucnang->where('maso', $inputs['machucnang'])->first());

        foreach ($ketqua as $ct) {
            $chk = dsnhomtaikhoan_phanquyen::where('machucnang', $ct->maso)->where('manhomchucnang', $inputs['manhomchucnang'])->first();
            $a_kq = [
                'machucnang' => $ct->maso,
                'manhomchucnang' => $inputs['manhomchucnang'],
                'phanquyen' => $inputs['phanquyen'],
                'danhsach' => $inputs['danhsach'],
                'thaydoi' => $inputs['thaydoi'],
                'hoanthanh' => $inputs['hoanthanh'],
            ];
            if ($chk == null) {
                dsnhomtaikhoan_phanquyen::create($a_kq);
            } else {
                $chk->update($a_kq);
            }
        }
        return redirect('/nhomchucnang/PhanQuyen?manhomchucnang=' . $inputs['manhomchucnang'])
                        ->with('success','Thành công');
    }

    function getChucNang(&$dschucnang, $machucnang_goc, &$ketqua)
    {
        foreach ($dschucnang as $key => $val) {
            if ($val->machucnang_goc == $machucnang_goc) {
                $ketqua->add($val);
                $dschucnang->forget($key);
                $this->getChucNang($dschucnang, $val->machucnang, $ketqua);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!chkPhanQuyen('nhomtaikhoan', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'nhomtaikhoan');
        }
        $model=dsnhomtaikhoan::findOrFail($id);
        $model->delete();

        return redirect('/nhomchucnang/danhsach')
                ->with('success','Xóa thành công');
    }

    public function DanhSachDonVi(Request $request)
    {
        if (!chkPhanQuyen('nhomtaikhoan', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'nhomtaikhoan');
        }
        $inputs = $request->all();
        $m_nhom = dsnhomtaikhoan::where('manhomchucnang', $inputs['manhomchucnang'])->first();
        $model = User::where('manhomchucnang', $inputs['manhomchucnang'])->get();
        //dd($inputs);
        return view('HeThong.manage.nhomchucnang.danhsach')
            ->with('model', $model)
            ->with('m_nhom', $m_nhom)
            ->with('inputs', $inputs)
            ->with('pageTitle', 'Danh sách tài khoản trong nhóm');
    }
}
