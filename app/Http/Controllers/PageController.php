<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ungvien;
use App\Models\ungvienhocvan;
use App\Models\ungvienkinhnghiem;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        $model = User::leftjoin('ungvien', 'users.id', 'ungvien.user')
        ->select('ungvien.*', 'users.email', 'users.created_at ', 'users.status')
        ->where('phanloaitk', '3')->get();

        return view('pages.page.ungvien.index')
        ->with('model',$model)
         ->with('baocao', getdulieubaocao());
    }

    public function thongtin(Request $request)
    {
 
        $inputs = $request->all();
        $model = User::find($request->user);
        $ungvien = ungvien::where('user',$inputs['user'])->first();
        $ungvienhocvan = ungvienhocvan::where('user',$inputs['user'])->get();
        $ungvienkinhnghiem = ungvienkinhnghiem::where('user',$inputs['user'])->get();

        return view('pages.page.ungvien.thongtin') 
        ->with('model', $model)
        ->with('ungvien', $ungvien)
        ->with('ungvienhocvan', $ungvienhocvan)
        ->with('ungvienkinhnghiem', $ungvienkinhnghiem)
        ->with('baocao', getdulieubaocao());
    }



    public function viewlogin()
    {
    
        return view('pages.page.login') ->with('baocao', getdulieubaocao());
    }
    public function gioithieu()
    {
    
        return view('pages.page.gioi-thieu') ->with('baocao', getdulieubaocao());
    }

}
