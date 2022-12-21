<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Http\RedirectResponse;
session_start();

class Customer extends Controller
{
   public function login (Request $request)
	{
		$email= $request->email;
		$pass= md5($request->password);
		$result = DB::table('customer')->where('email', $email)->where('password',$pass)->first();
		$page= Session::get('page');
		
		if($result)
		{
			Session::put('customer_id',$result->id) ;
			Session::put('customer_name',$result->name);
			$page= Session::get('page');
			if($page){			
				return Redirect($page);
			}else{
				return Redirect('doanhnghiep');
			}
			
		}else {
			return Redirect('home');
		}
	}
	
	 public function logout (Request $request)
	{
	
			Session::put('customer_id',null) ;
			Session::put('customer_name',null);
			return Redirect('home');
		
	}
	
	
	 
	
}
