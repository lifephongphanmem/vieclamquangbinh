<?php

namespace App\Http\Controllers\Danhmuc;

use App\Models\Danhmuc\dmloaihinhhdkt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class dmloaihinhhdktController extends Controller
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
		if (!chkPhanQuyen('loaihinhhoatdongkinhte', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'loaihinhhoatdongkinhte');
        }	
        $model = dmloaihinhhdkt::all()->sortBy('stt');	
		$count = Count($model);		
		return view('danhmuc.loaihinhhoatdongkinhte.loaihinhhdkt',compact('model','count'));
	}


	public function store_update(Request $request)
	{	
		if (!chkPhanQuyen('loaihinhhoatdongkinhte', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'loaihinhhoatdongkinhte');
        }		
		$input = $request->all();

		if ($input['id'] != null) {
			dmloaihinhhdkt::FindOrFail($input['id'])->update($input);
		}
		else{
			$input["madmlhkt"] = date('YmdHis');
			dmloaihinhhdkt::create($input);
		}
		return redirect('/danh_muc/dm_loai_hinh_hdkt');
	}


    public function delete($id){
		if (!chkPhanQuyen('loaihinhhoatdongkinhte', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'loaihinhhoatdongkinhte');
        }		
		$id_delete = dmloaihinhhdkt::findOrFail($id);
        $model = dmloaihinhhdkt::where('stt', '>=', $id_delete->stt)->get();
        if ($model != null) {
            foreach ($model as $item) {
                dmloaihinhhdkt::Find($item->id)->update(['stt' => $item->stt - 1]);
            }
        }
        $id_delete->delete();
		return redirect('/danh_muc/dm_loai_hinh_hdkt');
    }


	public function edit($id)
	{		
		if (!chkPhanQuyen('loaihinhhoatdongkinhte', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'loaihinhhoatdongkinhte');
        }	
        $model = dmloaihinhhdkt::Find($id);	
		die($model);
	}
}
