<?php

namespace App\Http\Controllers\Danhmuc;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc\dmdoituonguutien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class dmdoituonguutienController extends Controller
{
	// public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {
    //         if (!Session::has('admin')) {
    //             return redirect('/');
    //         };
    //         return $next($request);
    //     });
    // }
    public function index()
	{		
		// if (!chkPhanQuyen('doituonguutien', 'danhsach')) {
        //     return view('errors.noperm')->with('machucnang', 'doituonguutien');
        // }
        $model = dmdoituonguutien::all()->sortBy('stt');	
		$count = Count($model);			
		return view('danhmuc.doituonguutien.doituonguutien',compact('model','count'));
	}


	public function store_update(Request $request)
	{		
		if (!chkPhanQuyen('doituonguutien', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'doituonguutien');
        }
		$input = $request->all();
		if ($input['id'] != null) {
			dmdoituonguutien::FindOrFail($input['id'])->update($input);
		}
		else{

			$input["madmdt"] = date('YmdHis');
			dmdoituonguutien::create($input);
		}
		return redirect('/danh_muc/dm_doi_tuong');
	}




    public function delete($id){
		if (!chkPhanQuyen('doituonguutien', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'doituonguutien');
        }	
		$id_delete = dmdoituonguutien::findOrFail($id);
        $model = dmdoituonguutien::where('stt', '>=', $id_delete->stt)->get();
        if ($model != null) {
            foreach ($model as $item) {
                dmdoituonguutien::Find($item->id)->update(['stt' => $item->stt - 1]);
            }
        }
        $id_delete->delete();
		return redirect('/danh_muc/dm_doi_tuong');
    }



	public function edit($id)
	{		
		if (!chkPhanQuyen('doituonguutien', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'doituonguutien');
        }	
        $model = dmdoituonguutien::Find($id);	
		die($model);
	}



}
