<?php

namespace App\Models;

use App\Imports\ColectionImport;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Report;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Session;

class Nhankhau extends Model

{


	protected $table = 'nhankhau';



	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	//  protected $fillable = ['*'];
	protected $guarded = ['id', 'created_at', 'updated_at'];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	public $timestamps = true;

	public function import($cid, $inputs)
	{

		$request = request();
		// Get the csv rows as an array
		
		$file = $request->file('import_file');

		$dataObj = new ColectionImport();
		$theArray = Excel::toArray($dataObj, $file);
		$arr = $theArray[0];
		$arr_col = array('hoten', 'gioitinh', 'ngaysinh', 'cccd', 'bhxh', 'thuongtru', 'diachi', 'uutien', 'dantoc', 'trinhdogiaoduc', 'chuyenmonkythuat', 'chuyennganh', 'tinhtranghdkt', 'nguoicovieclam', 'congvieccuthe', 'thamgiabhxh', 'hdld', 'noilamviec', 'loaihinhnoilamviec', 'diachinoilamviec', 'thatnghiep', 'thoigianthatnghiep', 'khongthamgiahdkt', 'mqh');
		// check file excel
		$lds = array();
		$data_loi = array();
		$errs = array();
		$nfield = sizeof($arr_col);
		$hoindex = 1;


		if (DB::table('nhankhau')->count() > 0) {
			$idmax = DB::table('nhankhau')->where('id', \DB::raw("(select max(id) from nhankhau)"))->first()->id;
		} else {
			$idmax = 1;
		}

		$y = 0;
		$loi_cccd=0;
		$loi_hoten=0;
		$loi_ngaysinh=0;
		$loi_loai2=0;
		$loi_loai3=0;
		$loi_loai4=0;

		$model = tonghopcunglaodong::where('madv',$inputs['madv'])->where('kydieutra',$inputs['kydieutra'])->first();
		$xa['ldtren15'] = $model->ldtren15;
		$xa['ldcovieclam'] = $model->ldcovieclam;
		$xa['ldthatnghiep'] = $model->ldthatnghiep;
		$xa['ldkhongthamgia'] =$model->ldkhongthamgia;
		for ($i = 11; $i < count($arr); $i++) {
			//  dd($arr[$i]);

			$data = array();
			$data['madv'] = $inputs['madv'];
			$data['kydieutra'] = $inputs['kydieutra'];
			$data['ho'] = $arr[$i][0];
			if ($data['ho'] != "") {
				if (is_int($data['ho'])) {
					$hoindex = $data['ho'];
				}
			} else {
				$data['ho'] = $hoindex;
			};


			for ($j = 0; $j < $nfield; $j++) {

				$data[$arr_col[$j]] = $arr[$i][$j + 2] ?? '';
			}

						//check data
						if (!$data['hoten'] && !$data['ngaysinh'] && !$data['cccd']) {
							continue;
						};

			if(!$data['cccd']){
				$loi_cccd++;
				continue;
			}


			//Kiểm tra trùng
			// $check=check_trung($arr,['2'=>$data['hoten'],'3'=>$data['ngaysinh'],'5'=>$data['cccd']]);
			// $check_insert=check_trung($lds,['2'=>$data['hoten'],'3'=>$data['ngaysinh'],'5'=>$data['cccd']]);
			

			// if(count($check)> 2 && $check_insert > 0){				
			// 	continue;
			// }
		
			$data['cccd'] = str_replace('\'', '', $data['cccd']);
			if (strlen($data['cccd']) > 16) {
				$data['cccd'] = substr($data['cccd'], 0, 16);
			}
			$check=check_trung($arr,['5'=>$data['cccd']]);
			
			if(count($check) ==1){
				$data['soluongtrung']= 0;
			}else{
				$data['soluongtrung']=count($check);
			}
			
			$check_insert=check_trung($lds,['5'=>$data['cccd']]);
			if(count($check_insert)>2){
				continue;
			}
			
			$data['danhsach_id'] = $cid;

			if ($data['ngaysinh']) {
				// if (!is_numeric($data['ngaysinh'])) {
				// 	$data['ngaysinh'] = 0;
				// };
				// $unix_date = ($data['ngaysinh'] - 25569) * 86400;
				// $data['ngaysinh'] = date('Y-m-d', $unix_date);

				if (is_numeric($data['ngaysinh'])) {
					$unix_date = ($data['ngaysinh'] - 25569) * 86400;
					$data['ngaysinh'] = date('Y-m-d', $unix_date);
				};								
				$data['gioitinh'] = "Nữ";
			} elseif ($data['gioitinh']) {

				// if (!is_numeric($data['gioitinh'])) {
				// 	$data['gioitinh'] = 0;
				// };

				// $unix_date = ($data['gioitinh'] - 25569) * 86400;

				// $data['ngaysinh'] = date('Y-m-d', $unix_date);
				
				if (is_numeric($data['gioitinh'])) { 
					$unix_date = ($data['gioitinh'] - 25569) * 86400;
					$data['ngaysinh'] = date('Y-m-d', $unix_date);
				}else{
					$data['ngaysinh']=$data['gioitinh'];
				}
				

				$data['gioitinh'] = "Nam";
			} else {
				$data['gioitinh']="Nam";
				Session::put('message', "Lỗi ngày sinh dòng " . $i);
			}
			// dd($data);
			$data['maloi'] = $idmax++;
			$data['maloailoi'] = '';


			$array_loi = array('hoten', 'ngaysinh');
			//Lọc trường lỗi để đẩy vào bảng danh sach loi
			$loi = false;
			for ($j = 0; $j < count($array_loi); $j++) {
				if ($data[$array_loi[$j]] == '' || $data[$array_loi[$j]] == null) {
					$loi = true;
					$loi_ngaysinh++;
					break;
				}
			}
			if ($loi == true) {
				$data['maloailoi'] .= 'LOAI1;';
			}
			//lỗi2
			$loi2 = false;
			$a_loi2 = array(
				'nguoicovieclam', 'congvieccuthe', 'thamgiabhxh', 'hdld', 'noilamviec',
				'loaihinhnoilamviec', 'diachinoilamviec', 'thatnghiep', 'thoigianthatnghiep'
			);
			if ($data['tinhtranghdkt'] == 3) {

				foreach ($a_loi2 as $tentruong) {
					if ($data[$tentruong] != '' || $data[$tentruong] != null ) {
						$loi2 = true;
						break;
					}
				}

				if($data['khongthamgiahdkt'] == null){
					$data['khongthamgiahdkt']=5;
				}
			}
			if ($loi2 == true) {
				$loi_loai2++;
				$data['maloailoi'] .= 'LOAI2;';
			}

			//loi 3
			$loi3 = false;
			$a_loi3 = array(
				'nguoicovieclam', 'congvieccuthe', 'thamgiabhxh', 'hdld', 'noilamviec',
				'loaihinhnoilamviec', 'diachinoilamviec'
			);
			if ($data['tinhtranghdkt'] == 2) {
				foreach ($a_loi3 as $tentruong) {
					if ($data[$tentruong] != '' || $data[$tentruong] != null) {
						$loi3 = true;
						break;
					}
				}

				if($data['thoigianthatnghiep'] == null){
					$data['thoigianthatnghiep']=3;
				}
			}
			if ($loi3 == true) {
				$loi_loai3++;
				$data['maloailoi'] .= 'LOAI3;';
			}

			//loi 4
			$loi4=false;
			if(!$data['tinhtranghdkt']){
				$loi4=true;
				$loi_loai4++;
				$data['maloailoi'].='LOAI4';
			}
			
			//
			if ($loi || $loi2 || $loi3 || $loi4) {
				$data_loi[] = $data['maloi'];
			}
			// $nhankhau_kytruoc=nhankhauModel::where('madv',$inputs['madv'])->where('kydieutra',($inputs['kydieutra']-1))->where('cccd',$data['cccd'])->first();
			
			$data['loaibiendong']=0; //0: import, 1:thêm bằng tay, 2: báo tăng
			// dd($data);
			DB::table('nhankhau')->insert($data);
			$xa['ldtren15'] +=1;
			if ($data['tinhtranghdkt'] == '1') {
				$xa['ldcovieclam'] += 1 ;
			}elseif($data['tinhtranghdkt'] == '2'){
				$xa['ldthatnghiep'] += 1 ;
			}elseif($data['tinhtranghdkt'] == '3'){
				$xa['ldkhongthamgia'] += 1 ;
			}
		
			
			// dd($data);
			//  $lds[] = ['2'=>$data['hoten'],'3'=>$data['ngaysinh'],'5'=>$data['cccd']];
			 $lds[] = ['5'=>$data['cccd']];
			$y++;
		}

		$model->update($xa);

		//  dd($lds);
		$num_valid_ld = $y;

		if ($num_valid_ld) {

			$note = "Đã lưu thành công " . $num_valid_ld . " nhân khẩu.";
			// add to log system`
			$rm = new Report();
			$user=User::where('madv',$inputs['madv'])->first()->id;
			$rm->report('import', "1", 'nhankhau', DB::getPdo()->lastInsertId(), $num_valid_ld, $note,$user,$inputs['kydieutra']);
		}
		$RetArray = array();
		$RetArray['valid'] = $num_valid_ld;
		$RetArray['error'] = $errs;
		$RetArray['soho'] = $hoindex;
		$RetArray['data_loi'] = $data_loi;
		$RetArray['loi_cccd'] = $loi_cccd;
		$RetArray['loi_hoten'] = $loi_hoten;
		$RetArray['loi_ngaysinh'] = $loi_ngaysinh;
		$RetArray['loi_loai2'] = $loi_loai2;
		$RetArray['loi_loai3'] = $loi_loai3;
		return $RetArray;
	}
}
