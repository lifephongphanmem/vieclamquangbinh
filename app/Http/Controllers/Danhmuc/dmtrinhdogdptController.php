<?php

namespace App\Http\Controllers\Danhmuc;

use App\Models\Danhmuc\dmtrinhdogdpt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class dmtrinhdogdptController extends Controller
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
		if (!chkPhanQuyen('trinhdogdpt', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'trinhdogdpt');
        }	
        $model = dmtrinhdogdpt::all()->sortBy('stt');	
		$count = Count($model);		
		return view('danhmuc.trinhdogiaoducphothong.trinhdogdpt',compact('model','count'));
	}


	public function store_update(Request $request)
	{		
		if (!chkPhanQuyen('trinhdogdpt', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'trinhdogdpt');
        }	
		$input = $request->all();

		if ($input['id'] != null) {
			dmtrinhdogdpt::FindOrFail($input['id'])->update($input);
		}
		else{

			$input["madmgdpt"] = date('YmdHis');
			dmtrinhdogdpt::create($input);
		}
		return redirect('/danh_muc/dm_trinh_do_gdpt');
	}


    public function delete($id){
		if (!chkPhanQuyen('trinhdogdpt', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'trinhdogdpt');
        }	
		$id_delete = dmtrinhdogdpt::findOrFail($id);
        $model = dmtrinhdogdpt::where('stt', '>=', $id_delete->stt)->get();
        if ($model != null) {
            foreach ($model as $item) {
                dmtrinhdogdpt::Find($item->id)->update(['stt' => $item->stt - 1]);
            }
        }
        $id_delete->delete();
		return redirect('/danh_muc/dm_trinh_do_gdpt');
    }


	public function edit($id)
	{		
		if (!chkPhanQuyen('trinhdogdpt', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'trinhdogdpt');
        }
        $model = dmtrinhdogdpt::Find($id);	
		die($model);
	}
}


