<?php

namespace App\Models;

use App\Imports\ColectionImport;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Report;
use App\Models\nguoilaodong;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class Employer extends Model

{


	protected $table = 'nguoilaodong';



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

	public function getTypeCompanyInfo($ctypename)
	{
		$ctype = DB::table('param')->where('name', $ctypename)->get()->first();

		$htxinfo = array();
		$htxinfo['tong'] = 0;
		$htxinfo['nu'] = 0;
		$htxinfo['age'] = 0;
		$htxinfo['bhxh'] = 0;
		$htxinfo['quanly'] = 0;
		$htxinfo['cmktcao'] = 0;
		$htxinfo['cmkttrung'] = 0;
		$htxinfo['hdkhongthoihan'] = 0;
		$htxinfo['hdcothoihan'] = 0;

		// $ctys=DB::table('company')
		// 		->where('loaihinh',$ctype->id)
		// 		->where('public',1)
		// 		->pluck('id')->toArray();
		$ctys = DB::table('company')
			->where('loaihinh', $ctype->id)
			->where('public', 1)
			->get();
		$a_ctys = array_column($ctys->toarray(), 'id');
		$user_id = DB::table('users')->wherein('id', $a_ctys)->pluck('id')->toArray();

		foreach ($ctys as $cid) {
			if (in_array($cid->id, $user_id)) {
				$info = $this->getEmployerState($cid->id);
				$htxinfo['tong'] += $info['tong'];
				$htxinfo['nu'] += $info['nu'];
				$htxinfo['age'] += $info['age'];
				$htxinfo['bhxh'] += $info['bhxh'];
				$htxinfo['quanly'] += $info['quanly'];
				$htxinfo['cmktcao'] += $info['cmktcao'];
				$htxinfo['cmkttrung'] += $info['cmkttrung'];
				$htxinfo['hdkhongthoihan'] += $info['hdkhongthoihan'];
				$htxinfo['hdcothoihan'] += $info['hdcothoihan'];
			} else {
				$htxinfo['tong'] += $cid->sld;
				$htxinfo['bhxh'] += $cid->sld;
				$htxinfo['hdcothoihan'] += $cid->sld;
			}
		}

		$htxinfo['hdkhac'] =	$htxinfo['tong'] - $htxinfo['hdcothoihan'] - $htxinfo['hdkhongthoihan'];
		$htxinfo['cmktkhac'] =	$htxinfo['tong'] - $htxinfo['cmkttrung'] - $htxinfo['cmktcao'] - $htxinfo['quanly'];


		return $htxinfo;
	}
	// Lấy danh sách người lao động duoc su dụng
	public function getEmployerState($cid = null)
	{

		$info = array();
		// Tổng số lao động đang hoạt động tại DN
		$info['tong'] = DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
				return $query->where('nguoilaodong.company', $cid);
			})
			->whereIn('nguoilaodong.state', [1, 2])
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->count();
		// Tổng nữ	
		$info['nu'] = DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
				return $query->where('nguoilaodong.company', $cid);
			})
			->whereIn('nguoilaodong.state', [1, 2])
			->where('nguoilaodong.gioitinh', 'like', '%Nữ%')
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->count();
		// Tuổi trên 35
		$info['age'] = DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
				return $query->where('nguoilaodong.company', $cid);
			})
			->whereIn('nguoilaodong.state', [1, 2])
			->whereRaw("YEAR(GETDATE())-YEAR(ngaysinh) > 35")
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->count();
		// số LĐ tham gia BHXH
		$info['bhxh'] = DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
				return $query->where('nguoilaodong.company', $cid);
			})
			->whereIn('nguoilaodong.state', [1, 2])
			->whereNotNull('bdbhxh')
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->count();
		// số lượng Nhà quản lý	
		$quanlys = DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
				return $query->where('nguoilaodong.company', $cid);
			})
			->whereIn('nguoilaodong.state', [1, 2])
			->where(function ($query) {
				$query->whereIn('nguoilaodong.chucvu', ['Giám đốc', 'Nhà lãnh đạo', 'Quản lý'])
					->orWhere('nguoilaodong.chucvu', 'like', '%Trưởng%')
					->orWhere('nguoilaodong.chucvu', 'like', '%Phó%');
			})
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd)')
			->pluck('id')->toArray();


		$info['quanly'] = count($quanlys);

		// số LĐ CMKT bậc cao
		$info['cmktcao'] = DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
				return $query->where('nguoilaodong.company', $cid);
			})
			->whereIn('nguoilaodong.state', [1, 2])
			->where('trinhdocmkt', 'Đại học trở lên')
			->whereNotIn('id', $quanlys)
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->count();
		// số LĐ CMKT bậc trung
		$info['cmkttrung'] = DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
				return $query->where('nguoilaodong.company', $cid);
			})
			->whereIn('nguoilaodong.state', [1, 2])
			->where(function ($query) {
				$query->Where('nguoilaodong.trinhdocmkt', 'like', '%Cao đẳng%')
					->orWhere('nguoilaodong.trinhdocmkt', 'like', '%Trung cấp%');
			})
			->whereNotIn('id', $quanlys)
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->count();
		//		
		// số LĐ có HDLD không thời hạn

		$info['hdkhongthoihan'] = DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
				return $query->where('nguoilaodong.company', $cid);
			})
			->whereIn('nguoilaodong.state', [1, 2])
			->where('nguoilaodong.loaihdld', 'Không xác định thời hạn')
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->count();

		// số LĐ có HDLD có thời hạn

		$info['hdcothoihan'] = DB::table('nguoilaodong')
			->when($cid, function ($query, $cid) {
				return $query->where('nguoilaodong.company', $cid);
			})
			->whereIn('nguoilaodong.state', [1, 2])
			->whereIn('nguoilaodong.loaihdld', ['Đủ 12 đến 36 tháng', 'Đủ 3 đến 12 tháng'])
			// ->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->count();

		$info['hdkhac'] =	$info['tong'] - $info['hdcothoihan'] - $info['hdkhongthoihan'];
		$info['cmktkhac'] =	$info['tong'] - $info['cmkttrung'] - $info['cmktcao'] - $info['quanly'];

		return $info;
	}
	// Lấy thông tin người lao động theo nhóm
	public function getEmployerStateById($ids = null)
	{
		$info = array();
		// Tổng số lao động đang hoạt động tại DN
		$info['tong'] = DB::table('nguoilaodong')

			->whereIn('nguoilaodong.id', $ids)

			->count();
		// Tổng nữ	
		$info['nu'] = DB::table('nguoilaodong')
			->whereIn('nguoilaodong.id', $ids)

			->where('nguoilaodong.gioitinh', 'like', '%Nữ%')
			->count();
		// Tuổi trên 35
		$info['age'] = DB::table('nguoilaodong')
			->whereIn('nguoilaodong.id', $ids)

			->whereRaw("YEAR(GETDATE())-YEAR(ngaysinh) > 35")
			->count();
		// số LĐ tham gia BHXH
		$info['bhxh'] = DB::table('nguoilaodong')
			->whereIn('nguoilaodong.id', $ids)

			->whereNotNull('bdbhxh')
			->count();
		// số lượng Nhà quản lý	

		$quanlys = DB::table('nguoilaodong')
			->whereIn('nguoilaodong.id', $ids)

			->where(function ($query) {
				$query->whereIn('nguoilaodong.chucvu', ['Giám đốc', 'Nhà lãnh đạo', 'Quản lý'])
					->orWhere('nguoilaodong.chucvu', 'like', '%Trưởng%')
					->orWhere('nguoilaodong.chucvu', 'like', '%Phó%');
			})
			->pluck('id')->toArray();


		$info['quanly'] = count($quanlys);

		// số LĐ CMKT bậc cao
		$info['cmktcao'] = DB::table('nguoilaodong')
			->whereIn('nguoilaodong.id', $ids)

			->where('trinhdocmkt', 'Đại học trở lên')
			->whereNotIn('id', $quanlys)
			->count();
		// số LĐ CMKT bậc trung
		$info['cmkttrung'] = DB::table('nguoilaodong')
			->whereIn('nguoilaodong.id', $ids)

			->where(function ($query) {
				$query->Where('nguoilaodong.trinhdocmkt', 'like', '%Cao đẳng%')
					->orWhere('nguoilaodong.trinhdocmkt', 'like', '%Trung cấp%');
			})
			->whereNotIn('id', $quanlys)
			->count();
		//		
		// số LĐ có HDLD không thời hạn

		$info['hdkhongthoihan'] = DB::table('nguoilaodong')
			->whereIn('nguoilaodong.id', $ids)

			->where('nguoilaodong.loaihdld', 'Không xác định thời hạn')
			->count();

		// số LĐ có HDLD có thời hạn

		$info['hdcothoihan'] = DB::table('nguoilaodong')
			->whereIn('nguoilaodong.id', $ids)

			->whereIn('nguoilaodong.loaihdld', ['Đủ 12 đến 36 tháng', 'Đủ 3 đến 12 tháng'])
			->count();

		$info['hdkhac'] =	$info['tong'] - $info['hdcothoihan'] - $info['hdkhongthoihan'];
		$info['cmktkhac'] =	$info['tong'] - $info['cmkttrung'] - $info['cmktcao'] - $info['quanly'];

		return $info;
	}


	// Xuất thông tin người lao động ra Excel 
	public function getAdminEmployersExport()
	{

		$request = request();

		//filter
		$search = $request->search;
		$gioitinh_filter = $request->gioitinh_filter;
		$state_filter = $request->state_filter;
		$age_filter = $request->age_filter;
		$cid = $request->cid;

		$lds = DB::table('nguoilaodong')
			->when($search, function ($query, $search) {
				return $query->whereRaw("(hoten like  '%" . $search . "%' OR cmnd like '%" . $search . "%')");
			})
			->when($cid, function ($query, $cid) {
				return $query->where('nguoilaodong.company', $cid);
			})
			->when($state_filter, function ($query, $state_filter) {
				return $query->where('nguoilaodong.state', $state_filter);
			})
			->when($gioitinh_filter, function ($query, $gioitinh_filter) {
				return $query->where('nguoilaodong.gioitinh', 'like', '%' . $gioitinh_filter . '%');
			})
			->when($age_filter, function ($query, $age_filter) {
				return $query->whereRaw("YEAR(GETDATE())-YEAR(ngaysinh) > " . $age_filter);
			})
			->whereRaw('id IN (SELECT MAX(id) AS id FROM nguoilaodong GROUP BY cmnd )')
			->get();


		foreach ($lds as $ld) {

			$cty = DB::table('company')->where('id', $ld->company)->get()->first();
			$ld->ctyname = $cty->name;
		}

		return $lds;
	}

	// Xuất thông tin người lao động ra Excel cho doanh nghiep
	public function getEmployersExport()
	{
		$request = request();

		$uid = session('admin')->id;
		$cid = DB::table('company')->select('id')->where('user', $uid)->first();

		$lds = Employer::select("hoten", "gioitinh", "ngaysinh", "cmnd", "dantoc", "nation", "tinh", "huyen", "xa", "address", "sobaohiem", "trinhdogiaoduc", "trinhdocmkt", "nghenghiep", "linhvucdaotao", "loaihdld", "bdhopdong", "kthopdong", "luong", "pcchucvu", "pcthamnien", "pcthamniennghe", "pcluong", "pcbosung", "bddochai", "ktdochai", "vitri", "chucvu", "bdbhxh", "ktbhxh", "luongbhxh", "ghichu", "created_at", "updated_at", "state", "fromttdvvl")
			->where('state', '<', 3)
			->where('company', $cid->id)
			->get();
		$parramfields = ["trinhdogiaoduc", "trinhdocmkt", "nghenghiep", "linhvucdaotao", "loaihdld"];

		foreach ($lds as $ld) {

			foreach ($parramfields as $key => $field) {

				$pid = $ld->$field;
				$pname = DB::table('param')->select('name')->where('name', $pid)->first();
				if ($pname) {
					$ld->$field = $pname->name;
				};
			}
		};

		// dd($lds);
		return $lds;
	}
	// Cập nhật thông tin người lao động
	public function update_info()
	{
		$request = request();
		$eid = $request->id;
		$ld = Employer::find($eid);

		//$validate = $request->validate([			
		//		'dkkd' => 'required|max:255|unique:company',				
		//				]);

		$data = $request->all();

		$ld->fill($data);

		$dirty = $ld->getDirty();
		$sqty = count($dirty);

		$danhsach = array();

		foreach ($dirty as $field => $newdata) {
			$olddata = $ld->getOriginal($field);
			if ($olddata != $newdata) {
				$danhsach[] = $field . " thay đổi từ " . $olddata . " sang " . $newdata;
			}
		}

		if ($sqty > 0) {
			$ld->save();
			$result = 1;
			// add to log system`
			$rm = new Report();

			$note = $request->note . ' . ' . $sqty . " mục thay đổi  ." . implode(" . ", $danhsach);


			$rm->report('updateinfo', $result, 'nguoilaodong', $eid, 1, $note);
		} else {
			$result = 0;
		};


		return redirect('report-fa')->with('message', $sqty . ' thông tin lưu thành công! ');
	}

	// Update tình trạng người lao động
	public function update_state($eid, $state, $note)
	{
		$ld = Employer::find($eid);
		$olddata = $ld->state;

		if ($olddata == $state) {
			return redirect('report-fa')->withErrors(['message' => "Cập nhật ko thành công"]);
		};
		$ld->state = $state;

		$result = $ld->save();
		// add to log system`

		switch ($state) {
			case 2:
				$updateinfo = "tamdung";
				break;
			case 1:
				$updateinfo = "kethuctamdung";
				break;
			case 3:
				$updateinfo = "baogiam";
				break;
		};


		$rm = new Report();
		$rm->report($updateinfo, $result, 'nguoilaodong', $eid, 1, $note);
		if ($result) {
			return redirect('report-fa')->with('message', "Cập nhật thành công");
		} else {
			return redirect('report-fa')->withErrors(['message' => "Cập nhật ko thành công"]);
		}
	}

	// quy mô 1 công ty
	public function getQuymo($cid)
	{

		$q = Employer::where('company', $cid)
			->where('state', '<', 3)
			->count();
		return $q;
	}
	// thông tin tổng hợp 1 công ty
	public function getTonghop($cid)
	{
		$info = array();
		// dd($cid);
		$info['slld'] = Employer::where('company', $cid)
			->where('state', '<', 3)
			->count();
		$info['trongtinh'] =  Employer::where('company', $cid)
			->where('state', '<', 3)
			->where('tinh', 'Quảng Bình')
			->count();
		$info['tructiep'] = $info['slld']; //// chua ro khai niem

		$info['nu'] =  Employer::where('company', $cid)
			->where('state', '<', 3)
			->where(function ($q) {
				$q->where('gioitinh', 'like', '%nu%')
					->orwhere('gioitinh', 'like', '%nữ%');
			})
			->count();
		$info['nudakyhd'] =  Employer::where('company', $cid)
			->where('state', '<', 3)
			->where(function ($q) {
				$q->where('gioitinh', 'like', '%nu%')
					->orwhere('gioitinh', 'like', '%nữ%');
			})
			// ->whereNotIn('bdhopdong', [null])
			->where('bdhopdong', '!=', null)
			->count();
		$info['dakyhd'] =  Employer::where('company', $cid)
			->where('state', '<', 3)
			->where('bdhopdong', '!=', null)
			->count();
		$info['nuocngoai'] =  Employer::where('company', $cid)
			->where('state', '<', 3)
			->whereNotIn('nation', ['VN', 'vn', 'Việt Nam'])
			->count();
		$info['nunuocngoai'] =  Employer::where('company', $cid)
			->where('state', '<', 3)
			->where(function ($q) {
				$q->where('gioitinh', 'like', '%nu%')
					->orwhere('gioitinh', 'like', '%nữ%');
			})
			->whereNotIn('nation', ['VN', 'vn', 'Việt Nam'])
			->count();
		$info['tnpt'] =  Employer::where('company', $cid)
			->where('state', '<', 3)
			->wherein('trinhdogiaoduc', ['Tốt nghiệp PTTH trở lên', 'Tốt nghiệp THPT trở lên', 'Tốt nghiệp trung học phổ thông', 'Tốt nghiệp PTTD trở lên']) // 65 Tot nghiep THPT
			->count();

		$info['maxluong'] =	Employer::where('company', $cid)
			->where('state', '<', 3)
			->max('luong');
		$info['minluong'] =	Employer::where('company', $cid)
			->where('state', '<', 3)
			->min('luong');
		// $info['avgluong']=	Employer::where('company', $cid)
		// 					->where('state', '<', 3)
		// 					->avg('luong');	
		$info['avgluong'] =	0;
		$info['quanly'] = Employer::where('company', $cid)
			->whereIn('nguoilaodong.state', [1, 2])
			->where(function ($query) {
				$query->whereIn('nguoilaodong.chucvu', ['Giám đốc', 'Nhà lãnh đạo', 'Quản lý'])
					->orWhere('nguoilaodong.chucvu', 'like', '%Trưởng%')
					->orWhere('nguoilaodong.chucvu', 'like', '%Phó%');
			})
			->count();
		return $info;
	}

	// thông tin phân bố 1 công ty theo từng phân loại
	public function getPhanbo($cid, $ptype)
	{

		$params = DB::table('param')->where('type', $ptype)->get();
		$pb = array();
		$colname = "hoten";
		switch ($ptype) {
			case 3:
				$colname = "trinhdocmkt";
				break;
			case 4:
				$colname = "trinhdogiaoduc";
				break;
			case 9:
				$colname = "nghenghiep";
				break;
			case 11:
				$colname = "linhvucdaotao";
				break;
		}

		foreach ($params as $p) {
			$pb[$p->name] = Employer::where('company', $cid)
				->where('state', '<', 3)
				->where($colname, $p->name) // 65 Tot nghiep THPT
				->count();
		};

		return $pb;
	}
	// Import người lao động từ file excel
	// public function import($cid)
	// {

	// 	$request = request();
	// 	// Get the csv rows as an array
	// 	$file = $request->file('import_file');
	// 	$dataObj = new \stdClass();
	// 	$theArray = Excel::toArray($dataObj, $file);
	// 	$arr = $theArray[0];
	// 	// check file excel
	// 	$lds = array();
	// 	$nfield = 34;
	// 	for ($i = 1; $i < count($arr); $i++) {

	// 		$data = array();
	// 		for ($j = 0; $j < $nfield; $j++) {

	// 			$data[$arr[0][$j]] = $arr[$i][$j];
	// 		}
	// 		// check data
	// 		if (!$data['hoten']) {
	// 			break;
	// 		};

	// 		$data['cmnd'] = str_replace('\'', '', $data['cmnd']);

	// 		if (!$this->checkCmndExits($data['cmnd'])) {

	// 			$data['company'] = $cid;
	// 			// dd($data['ngaysinh']);
	// 			$unix_date = ($data['ngaysinh'] - 25569) * 86400;

	// 			$data['ngaysinh'] = date('Y-m-d', $unix_date);

	// 			if (!$data['state']) {
	// 				$data['state'] = 1;
	// 			};

	// 			if ($data['bdbhxh']) {

	// 				$unix_date = ($data['bdbhxh'] - 25569) * 86400;

	// 				$data['bdbhxh'] = date('Y-m-d', $unix_date);
	// 			};

	// 			if ($data['bdhopdong']) {
	// 				$unix_date = ($data['bdhopdong'] - 25569) * 86400;
	// 				$data['bdhopdong'] = date('Y-m-d', $unix_date);
	// 			};

	// 			if ($data['bddochai']) {

	// 				$unix_date = ($data['bddochai'] - 25569) * 86400;

	// 				$data['bddochai'] = date('Y-m-d', $unix_date);
	// 			};

	// 			if ($data['ktdochai']) {

	// 				$unix_date = ($data['ktdochai'] - 25569) * 86400;

	// 				$data['ktdochai'] = date('Y-m-d', $unix_date);
	// 			};
	// 			if ($data['kthopdong']) {

	// 				$unix_date = ($data['kthopdong'] - 25569) * 86400;

	// 				$data['kthopdong'] = date('Y-m-d', $unix_date);
	// 			};

	// 			if ($data['ktbhxh']) {

	// 				$unix_date = ($data['ktbhxh'] - 25569) * 86400;

	// 				$data['ktbhxh'] = date('Y-m-d', $unix_date);
	// 			};

	// 			$lds[] = $data;

	// 		}
	// 	}

	// 	$num_valid_ld = count($lds);

	// 	if ($num_valid_ld) {
	// 		$result = DB::table('nguoilaodong')->insert($lds);

	// 		$note = "Đã lưu thành công " . $num_valid_ld . " lao động.";
	// 		// add to log system`
	// 		$rm = new Report();
	// 		$rm->report('import', $result, 'nguoilaodong', DB::getPdo()->lastInsertId(), $num_valid_ld, $note);
	// 		return $result;
	// 	}
	// 	// navigate
	// 	return $num_valid_ld;
	// }

	public function importa($input)
	{

		$request = request();

		// Get the csv rows as an array

		$file = $input['import_file'];
		$dataObj = new ColectionImport();
		$theArray = Excel::toArray($dataObj, $file);
		$arr = $theArray[0];
		// dd($arr);
		$arr_col = array(
			'hoten',
			'gioitinh',
			'ngaysinh',
			'cmnd',
			'dantoc',
			'nation',
			'tinh',
			'huyen',
			'xa',
			'address',
			'sobaohiem',
			'trinhdogiaoduc',
			'trinhdocmkt',
			'linhvucdaotao',
			'nghenghiep',
			'loaihdld',
			'bdhopdong',
			'kthopdong',
			'luong',
			'pcchucvu',
			'pcthamnien',
			'pcthamniennghe',
			'pcluong',
			'pcbosung',
			'bddochai',
			'ktdochai',
			'vitri',
			'chucvu',
			'bdbhxh',
			'ktbhxh',
			'luongbhxh',
			'ghichu',
			//   'company', 
			'state',
			'fromttdvvl'
		);

		// check file excel

		$nfield = sizeof($arr_col);
		$count_success = 0;
		$count_error = 0;
		for ($i = 1; $i < count($arr); $i++) {

			$data = array();
			for ($j = 0; $j < $nfield; $j++) {
				$data[$arr_col[$j]] = $arr[$i][$j + 0] ?? '';
			}
			$data['company'] = session('admin')->company_id;
			$ngaysinh=array_reverse(explode('/',$data['ngaysinh']));
			$data['ngaysinh']=implode('-',$ngaysinh);
			$arr_ngaythang=['bdhopdong','kthopdong','bddochai','ktdochai','bdbhxh','ktbhxh'];
			foreach($arr_ngaythang as $nt){
				$ngaythang=array_reverse(explode('/',$data[$nt]));
				if(count($ngaythang) != 3 && $data[$nt] != ''){
					array_push($ngaythang,'01');
				}
				$data[$nt]=implode('-',$ngaythang);
			}
			// dd($data);
			$data['cmnd']=trim($data['cmnd'],"'");
			$nld = nguoilaodong::where('company', $data['company'])->where('cmnd', (string)$data['cmnd'])->first();
			if (isset($nld)) {
				$count_error += 1;
			} else {
					nguoilaodong::create($data);;			
				$count_success += 1;
			}

			// DB::table('nguoilaodong')->insert($data);
		}
	
		// dd($count_success);
		$RetArray = array();
		$RetArray['count_success'] = $count_success;
		$RetArray['count_error'] = $count_error;

		return $RetArray;
	}

	// Lấy lich su lam việc của người lao động
	public function getHosos($cmnd)
	{

		$hosos = DB::table('nguoilaodong')
			->where('cmnd', $cmnd)
			->where('state', 3)
			->orderBy('id', 'DESC')
			->get();
		if ($hosos) {
			foreach ($hosos as $hoso) {
				$cty = DB::table('company')->where('id', $hoso->company)->get()->first();
				$hoso->ctyname = $cty->name;
			}
		}
		return $hosos;
	}

	// Kiểm tra CMND của người lao động, đảm bảo tính duy nhất
	public function checkCmndExits($cmnd)
	{

		$result = DB::table('nguoilaodong')->select('id')->where('cmnd', $cmnd)->whereNotIn('state', [3])->get()->first();

		if ($result) {
			return $result->id;
		} else {

			return 0;
		}
	}
}
