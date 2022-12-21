<?php

namespace App\Http\Controllers\Danhmuc;

use App\Models\Danhmuc\dmthoigianthatnghiep;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class dmthoigianthatnghiepController extends Controller
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
		if (!chkPhanQuyen('thoigianthatnghiep', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'thoigianthatnghiep');
        }	
        $model = dmthoigianthatnghiep::all()->sortBy('stt');	
		$count = Count($model);		
		return view('danhmuc.thoigianthatnghiep.thoigianthatnghiep',compact('model','count'));
	}


	public function store_update(Request $request)
	{		
		if (!chkPhanQuyen('thoigianthatnghiep', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'thoigianthatnghiep');
        }	
		$input = $request->all();

		if ($input['id'] != null) {
			dmthoigianthatnghiep::FindOrFail($input['id'])->update($input);
		}
		else{
			$input["madmtgtn"] = date('YmdHis');
			dmthoigianthatnghiep::create($input);
		}
		return redirect('/danh_muc/dm_thoi_gian_that_nghiep');
	}


    public function delete($id){
		if (!chkPhanQuyen('thoigianthatnghiep', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'thoigianthatnghiep');
        }		
		$id_delete = dmthoigianthatnghiep::findOrFail($id);
        $model = dmthoigianthatnghiep::where('stt', '>=', $id_delete->stt)->get();
        if ($model != null) {
            foreach ($model as $item) {
                dmthoigianthatnghiep::Find($item->id)->update(['stt' => $item->stt - 1]);
            }
        }
        $id_delete->delete();
		return redirect('/danh_muc/dm_thoi_gian_that_nghiep');
    }


	public function edit($id)
	{		
		if (!chkPhanQuyen('thoigianthatnghiep', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'thoigianthatnghiep');
        }	
        $model = dmthoigianthatnghiep::Find($id);	
		die($model);
	}
}
