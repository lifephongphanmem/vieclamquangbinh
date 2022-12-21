<?php

namespace App\Http\Controllers\Danhmuc;

use App\Models\Danhmuc\dmtrinhdokythuat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class dmtrinhdokythuatController extends Controller
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
		if (!chkPhanQuyen('trinhdochuyenmonkythuat', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'trinhdochuyenmonkythuat');
        }
        $model = dmtrinhdokythuat::all()->sortBy('stt');	
		$count = Count($model);		
		return view('danhmuc.trinhdochuyenmonkythuat.trinhdokythuat',compact('model','count'));
	}


	public function store_update(Request $request)
	{		
		if (!chkPhanQuyen('trinhdochuyenmonkythuat', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'trinhdochuyenmonkythuat');
        }
		$input = $request->all();

		if ($input['id'] != null) {
			dmtrinhdokythuat::FindOrFail($input['id'])->update($input);
		}
		else{
			$input["madmtdkt"] = date('YmdHis');
			dmtrinhdokythuat::create($input);
		}
		return redirect('/danh_muc/dm_trinh_do_ky_thuat');
	}


    public function delete($id){	
		if (!chkPhanQuyen('trinhdochuyenmonkythuat', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'trinhdochuyenmonkythuat');
        }
		$id_delete = dmtrinhdokythuat::findOrFail($id);
        $model = dmtrinhdokythuat::where('stt', '>=', $id_delete->stt)->get();
        if ($model != null) {
            foreach ($model as $item) {
                dmtrinhdokythuat::Find($item->id)->update(['stt' => $item->stt - 1]);
            }
        }
        $id_delete->delete();
		return redirect('/danh_muc/dm_trinh_do_ky_thuat');
    }


	public function edit($id)
	{		
		if (!chkPhanQuyen('trinhdochuyenmonkythuat', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'trinhdochuyenmonkythuat');
        }
        $model = dmtrinhdokythuat::Find($id);	
		die($model);
	}
}
