<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use Illuminate\Http\RedirectResponse;

session_start();

class AdminBiendong extends Controller
{
    public function show_all()
	{
		
		return view ('admin.biendong.all');
	}
	
	 
	
	 
	 
	
	 public function edit($catid)
	{
		$cats= DB::table('category_product')->get();
		$cat= DB::table('category_product')->where('id',$catid)->first();
		//print_r($cat);
		return view ('admin.tuyendung.edit')->with('cats', $cats)->with('cat', $cat);
	}
	
	
	
}
