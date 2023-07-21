<?php

namespace App\Http\Controllers\Danhmuc;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc\dmnganhnghe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class dmnganhngheController extends Controller
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
    public function index()
    {
        if (!chkPhanQuyen('nganhnghe', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'nganhnghe');
        }	
        $model=dmnganhnghe::all();
        $count = Count($model);

        return view('danhmuc.dmnganhnghe.index', compact('model', 'count'))
        ->with('baocao', getdulieubaocao());
    }


    public function store_update(Request $request)
    {
        if (!chkPhanQuyen('nganhnghe', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'nganhnghe');
        }
        $input = $request->all();
        if ($input['id'] != null) {
            dmnganhnghe::FindOrFail($input['id'])->update($input);

        } else {
            $input['madm'] = isset($input['madm'])?$input['madm']:date('YmdHis');
            dmnganhnghe::create($input);
        }
        return redirect('/danh_muc/dmnganhnghe');
    }


    public function delete($id)
    {
        if (!chkPhanQuyen('nganhnghe', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'nganhnghe');
        }
        $id_delete = dmnganhnghe::findOrFail($id);
        $model = dmnganhnghe::where('stt', '>=', $id_delete->stt)->get();
        if ($model != null) {
            foreach ($model as $item) {
                dmnganhnghe::Find($item->id)->update(['stt' => $item->stt - 1]);
            }
        }
        $id_delete->delete();
        return redirect('/danh_muc/dmnganhnghe');
    }


    public function edit($id)
    {
        if (!chkPhanQuyen('nganhnghe', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'nganhnghe');
        }
        $model = dmnganhnghe::Find($id);
        die($model);
    }
}
