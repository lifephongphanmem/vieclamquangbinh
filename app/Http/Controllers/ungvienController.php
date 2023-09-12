<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Models\Company;
use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmtrinhdokythuat;
use App\Models\ungvien;
use App\Models\ungvienhocvan;
use App\Models\ungvienkinhnghiem;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ungvienController extends Controller
{
    public function index(){

        $model = User::leftjoin('ungvien','users.id','ungvien.user')
        ->select('ungvien.*','users.email','users.created_at ','users.status')
        ->where('phanloaitk','3')->get();
        return view('admin.ungvien.index')
        ->with('model',$model)
        ->with('baocao', getdulieubaocao());
    }

    public function create(){

        $danhmuc = danhmuchanhchinh::all();
        $dmtrinhdokythuat = dmtrinhdokythuat::all();
        return view('admin.ungvien.create')
        ->with('danhmuc',$danhmuc)
        ->with('dmtrinhdokythuat',$dmtrinhdokythuat)
        ->with('baocao', getdulieubaocao());
    }

    public function storecoban(Request $request)
	{
        
		$inputs = $request->all();

		// $data_user = [
		// 	'name' => $inputs['hoten'],
		// 	'email' => $inputs['email'],
		// 	'password' => Hash::make($inputs['password']),
		// 	'phanloaitk' => 3,
		// 	// 'madv' => date('YmdHis'),
		// 	'status' => $inputs['status'],//0: vô hiệu,1: kích hoạt,2: khóa
		// ];

		// $model = User::where('email', $inputs['email'])->first();

		// if (isset($model)) {
		// 	// Session::put('message', "Mail đã được sử dụng");
        //     $result['status'] = 'error';
          
		// } else {
		// 	// $model_user = User::create($data_user);
            
		// 	$data_ungvien = [
        //         // 'user' => $model_user->id,
		// 		// 'avatar' => $inputs['avatar'],
        //         'hoten' => $inputs['hoten'],
        //         'gioitinh' => $inputs['gioitinh'],
        //         'phone' => $inputs['phone'],
        //         'tinh' => $inputs['tinh'],
        //         'huyen' => $inputs['huyen'],
        //         'xa' => $inputs['xa'],
        //         'address' => $inputs['address'],
        //         'chucdanh' => $inputs['chucdanh'],
        //         'honnhan' => $inputs['honnhan'],
        //         'hinhthuclv' => $inputs['hinhthuclv'],
        //         'luong' => $inputs['luong'],
        //         'trinhdocmkt' => $inputs['trinhdocmkt'],
        //         'word' => $inputs['word'],
        //         'excel' => $inputs['excel'],
        //         'powerpoint' => $inputs['powerpoint'],
        //         'gioithieu' => $inputs['gioithieu'],
        //         'muctieu' => $inputs['muctieu'],
		// 	];

		// 	ungvien::create($data_ungvien);

			// $data_ungvienhocvan = [
            //     'user' => $model_user->id,
            //     'chuyennganh'=>$inputs['chuyennganh'],
			// 	'truong' => $inputs['truong'],
            //     'bangcap' => $inputs['bangcap'],
            //     'tungay' => $inputs['tungay'],
            //     'denngay' => $inputs['denngay'],
            //     'thanhtuu' => $inputs['thanhtuu'],
			// ];
            // ungvienhocvan::create($data_ungvienhocvan);
           
            // $data_ungvienkinhnghiem = [
            //     'user' => $model_user->id,
            //     'congty'=>$inputs['congty'],
			// 	'quymo' => $inputs['quymo'],
            //     'linhvuc' => $inputs['linhvuc'],
            //     'chucdanh' => $inputs['chucdanh'],
            //     'ngayvao' => $inputs['ngayvao'],
            //     'ngaynghi' => $inputs['ngaynghi'],
			// ];
            // ungvienkinhnghiem::create($data_ungvienkinhnghiem);

            // $result['status'] = 'success';

            // $result['message'] = '<p> Đã Lưu thông tin </p>';
       
            return  response($inputs);
                // die(1);
		// }
	
		// return redirect('/ungvien');
	}
    public function storehocvan(Request $request)
	{
        
		$inputs = $request->all();
        return  response($inputs);

    }
    
    public function delete($user){
        User::find($user)->delete();
        ungvien::where('user',$user)->delete();
        ungvienhocvan::where('user',$user)->delete();
        ungvienkinhnghiem::where('user',$user)->delete();
        return redirect('/ungvien');
    }

    public function edit(Request $request){
        $model = User::where('id',$request->user)->select('email','status')->first();
        $ungvien = ungvien::where('user',$request->user)->first();
        $ungvienhocvan = ungvienhocvan::where('user',$request->user)->get();
        $ungvienkinhnghiem = ungvienkinhnghiem::where('user',$request->user)->get();
        $danhmuc = danhmuchanhchinh::all();
        $dmtrinhdokythuat = dmtrinhdokythuat::all();
    
        return view('admin.ungvien.edit')
        ->with('model',$model)
        ->with('ungvien',$ungvien)
        ->with('ungvienhocvan',$ungvienhocvan)
        ->with('ungvienkinhnghiem',$ungvienkinhnghiem)
        ->with('danhmuc',$danhmuc)
        ->with('dmtrinhdokythuat',$dmtrinhdokythuat)
        ->with('baocao', getdulieubaocao());
    }
}
