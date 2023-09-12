<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
    
        return view('pages.page.ungvien') ->with('baocao', getdulieubaocao());
    }
    public function viewlogin()
    {
    
        return view('pages.page.login') ->with('baocao', getdulieubaocao());
    }
    public function gioithieu()
    {
    
        return view('pages.page.gioi-thieu') ->with('baocao', getdulieubaocao());
    }
    public function thongtinungvien()
    {
    
        return view('pages.page.thong-tin-ung-vien') ->with('baocao', getdulieubaocao());
    }
}
