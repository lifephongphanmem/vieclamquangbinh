<?php

namespace App\Http\Controllers\Danhmuc;

use App\Models\Danhmuc\dmloailaodong;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class dmloailaodongController extends Controller
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
		if (!chkPhanQuyen('loailaodong', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'loailaodong');
        }	
        $model = dmloailaodong::all()->sortBy('stt');	
		$count = Count($model);			
		return view('danhmuc.loailaodong.loailaodong',compact('model','count'));
	}


	public function store_update(Request $request)
	{		
		if (!chkPhanQuyen('loailaodong', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'loailaodong');
        }	
		$input = $request->all();

		if ($input['id'] != null) {
			dmloailaodong::FindOrFail($input['id'])->update($input);
		}
		else{

			$input["madmlld"] = date('YmdHis');
			dmloailaodong::create($input);
		}
		return redirect('/danh_muc/dm_loai_lao_dong');
	}



    public function delete($id){
		if (!chkPhanQuyen('loailaodong', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'loailaodong');
        }	
		$id_delete = dmloailaodong::findOrFail($id);
        $model = dmloailaodong::where('stt', '>=', $id_delete->stt)->get();
        if ($model != null) {
            foreach ($model as $item) {
                dmloailaodong::Find($item->id)->update(['stt' => $item->stt - 1]);
            }
        }
        $id_delete->delete();
		return redirect('/danh_muc/dm_loai_lao_dong');
    }



	public function edit($id)
	{		
		if (!chkPhanQuyen('loailaodong', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'loailaodong');
        }
        $model = dmloailaodong::Find($id);	
		die($model);
	}
}
