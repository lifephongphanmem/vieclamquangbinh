<?php

namespace App\Http\Controllers\Danhmuc;

use App\Models\Danhmuc\dmmanghetrinhdo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class dmmanghetrinhdoController extends Controller
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
        if (!chkPhanQuyen('manghe', 'danhsach')) {
            return view('errors.noperm')->with('machucnang', 'manghe');
        }	
        $model = dmmanghetrinhdo::all()->sortBy('stt');
        $count = Count($model);
        return view('danhmuc.manghetrinhdo.manghetrinhdo', compact('model', 'count'));
    }


    public function store_update(Request $request)
    {
        if (!chkPhanQuyen('manghe', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'manghe');
        }
        $input = $request->all();

        if ($input['id'] != null) {
            dmmanghetrinhdo::FindOrFail($input['id'])->update($input);
        } else {
            $input["madmmntd"] = date('YmdHis');
            dmmanghetrinhdo::create($input);
        }
        return redirect('/danh_muc/dm_ma_nghe_trinh_do');
    }


    public function delete($id)
    {
        if (!chkPhanQuyen('manghe', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'manghe');
        }
        $id_delete = dmmanghetrinhdo::findOrFail($id);
        $model = dmmanghetrinhdo::where('stt', '>=', $id_delete->stt)->get();
        if ($model != null) {
            foreach ($model as $item) {
                dmmanghetrinhdo::Find($item->id)->update(['stt' => $item->stt - 1]);
            }
        }
        $id_delete->delete();
        return redirect('/danh_muc/dm_ma_nghe_trinh_do');
    }


    public function edit($id)
    {
        if (!chkPhanQuyen('manghe', 'thaydoi')) {
            return view('errors.noperm')->with('machucnang', 'manghe');
        }
        $model = dmmanghetrinhdo::Find($id);
        die($model);
    }
}
