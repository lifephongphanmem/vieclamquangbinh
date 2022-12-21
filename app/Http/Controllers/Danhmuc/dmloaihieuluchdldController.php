<?php

namespace App\Http\Controllers\Danhmuc;

use App\Models\Danhmuc\dmloaihieuluchdld;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class dmloaihieuluchdldController extends Controller
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
		if (!chkPhanQuyen('loaihopdonglaodong', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'loaihopdonglaodong');
        }	
        $model = dmloaihieuluchdld::all()->sortBy('stt');	
		$count = Count($model);		
		return view('danhmuc.loaihieuluc_hdld.loaihieuluchdld',compact('model','count'));
	}


	public function store_update(Request $request)
	{		
		if (!chkPhanQuyen('loaihopdonglaodong', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'loaihopdonglaodong');
        }	
		$input = $request->all();
		if ($input['id'] != null) {
			dmloaihieuluchdld::FindOrFail($input['id'])->update($input);
		}
		else{
			$input["madmlhl"] = date('YmdHis');
			dmloaihieuluchdld::create($input);
		}
		return redirect('/danh_muc/dm_loai_hieu_luc_hdld');
	}


    public function delete($id){
		if (!chkPhanQuyen('loaihopdonglaodong', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'loaihopdonglaodong');
        }		
		$id_delete = dmloaihieuluchdld::findOrFail($id);
        $model = dmloaihieuluchdld::where('stt', '>=', $id_delete->stt)->get();
        if ($model != null) {
            foreach ($model as $item) {
                dmloaihieuluchdld::Find($item->id)->update(['stt' => $item->stt - 1]);
            }
        }
        $id_delete->delete();
		return redirect('/danh_muc/dm_loai_hieu_luc_hdld');
    }


	public function edit($id)
	{		
		if (!chkPhanQuyen('loaihopdonglaodong', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'loaihopdonglaodong');
        }	
        $model = dmloaihieuluchdld::Find($id);	
		die($model);
	}
}
