<?php

namespace App\Models;

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

	public function import($cid)
	{

		$request = request();
		// Get the csv rows as an array
		$file = $request->file('import_file');
		$dataObj = new \stdClass();
		$theArray = Excel::toArray($dataObj, $file);
		$arr = $theArray[0];
		$arr_col = array('hoten', 'gioitinh', 'ngaysinh', 'cccd', 'bhxh', 'thuongtru', 'diachi', 'uutien', 'dantoc', 'trinhdogiaoduc', 'chuyenmonkythuat', 'chuyennganh', 'tinhtranghdkt', 'nguoicovieclam', 'congvieccuthe', 'thamgiabhxh', 'hdld', 'noilamviec', 'loaihinhnoilamviec', 'diachinoilamviec', 'thatnghiep', 'thoigianthatnghiep', 'khongthamgiahdkt', 'mqh');
		// check file excel
		$lds = array();
		$data_loi = array();
		$errs = array();
		$nfield = sizeof($arr_col);
		$hoindex = 1;
		for ($i = 8; $i < count($arr); $i++) {

			$data = array();
			$data['ho'] = $arr[$i][0];
			if ($data['ho'] != "") {
				if (is_int($data['ho'])) {
					$hoindex = $data['ho'];
				}
			} else {
				$data['ho'] = $hoindex;
			};

			for ($j = 0; $j < $nfield; $j++) {

				$data[$arr_col[$j]] = $arr[$i][$j + 2];
			}
			// dd($data);
			// check data
			if (!$data['hoten']) {
				continue;
			};

			$data['cccd'] = str_replace('\'', '', $data['cccd']);

			$data['danhsach_id'] = $cid;

			if ($data['ngaysinh']) {
				if (!is_numeric($data['ngaysinh'])) {
					$data['ngaysinh'] = 0;
				};
				$unix_date = ($data['ngaysinh'] - 25569) * 86400;

				$data['ngaysinh'] = date('Y-m-d', $unix_date);

				$data['gioitinh'] = "Nữ";
			} elseif ($data['gioitinh']) {

				if (!is_numeric($data['gioitinh'])) {
					$data['gioitinh'] = 0;
				};

				$unix_date = ($data['gioitinh'] - 25569) * 86400;

				$data['ngaysinh'] = date('Y-m-d', $unix_date);

				$data['gioitinh'] = "Nam";
			} else {
				Session::put('message', "Lỗi ngày sinh dòng " . $i);
			}


			

			// dd($data);
			$id = DB::table('nhankhau')->insertGetId($data);

			$array_loi = array('gioitinh', 'ngaysinh', 'cccd');
			//Lọc trường lỗi để đẩy vào bảng danh sach loi
			$loi = false;
			for ($j = 0; $j < count($array_loi); $j++) {
				if ($data[$array_loi[$j]] == '' || $data[$array_loi[$j]] == null) {
					$loi = true;
					break;
				}
			}
			if ($loi == true) {
				$data_loi[] = $id;
			}
			$lds[] = $data;
		}


		// dd($data_loi);
		$num_valid_ld = count($lds);

		if ($num_valid_ld) {

			$note = "Đã lưu thành công " . $num_valid_ld . " nhân khẩu.";
			// add to log system`
			$rm = new Report();
			$rm->report('import', "1", 'nhankhau', DB::getPdo()->lastInsertId(), $num_valid_ld, $note);
		}
		$RetArray = array();
		$RetArray['valid'] = $num_valid_ld;
		$RetArray['error'] = $errs;
		$RetArray['soho'] = $hoindex;
		$RetArray['data_loi'] = $data_loi;


		return $RetArray;
	}
}
