<?php

namespace App\Http\Controllers\Danhmuc;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc\capbac;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class capbacController extends Controller
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
		// if (!chkPhanQuyen('capbac', 'danhsach')) {
        //     return view('errors.noperm')->with('machucnang', 'capbac');
        // }	
        $model = capbac::all()->sortBy('stt');	
		$count = Count($model);		
		return view('danhmuc.capbac.capbac',compact('model','count'))
        ->with('baocao', getdulieubaocao());
	}


	public function store_update(Request $request)
	{		
		// if (!chkPhanQuyen('capbac', 'thaydoi')) {
        //     return view('errors.noperm')->with('machucnang', 'capbac');
        // }	
		$input = $request->all();

		if ($input['id'] != null) {
			capbac::FindOrFail($input['id'])->update($input);
		}
		else{
			$input["madm"] = date('YmdHis');
			capbac::create($input);
		}
		return redirect('/danh_muc/capbac');
	}


    public function delete($id){
		// if (!chkPhanQuyen('capbac', 'thaydoi')) {
        //     return view('errors.noperm')->with('machucnang', 'capbac');
        // }		
		capbac::findOrFail($id)->delete();
		return redirect('/danh_muc/capbac');
    }


	public function edit($id)
	{		
		// if (!chkPhanQuyen('capbac', 'thaydoi')) {
        //     return view('errors.noperm')->with('machucnang', 'capbac');
        // }		
        $model = capbac::Find($id);	
		die($model);
	}
}
