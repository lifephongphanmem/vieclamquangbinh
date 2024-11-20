<?php

namespace App\Http\Controllers\CauHinh;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class chuandoansucoController extends Controller
{
    public function ThongTin()
    {
        $taikhoan=array_column(User::all()->toarray(),'name','id');
        return view('admin.cauhinh.chuandoansuco.index',compact('taikhoan'))
                    ->with('baocao', getdulieubaocao())
                    ->with('pageTitle','Chuẩn đoán sự cố');
    }
}
