<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Employer;
use App\Models\nguoilaodong;
use Session;
use Illuminate\Http\RedirectResponse;
use App\Exports\AdminEmployersExport;
use App\Models\Company;
use App\Models\Danhmuc\danhmuchanhchinh;
use Maatwebsite\Excel\Facades\Excel;

class AdminEmployer extends Controller
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

	public function show_all($cid = null)
	{
		$request = request();
		//filter
		$search = $request->search;
		$gioitinh_filter = $request->gioitinh_filter;
		$state_filter = $request->state_filter;
		$age_filter = $request->age_filter;

		$export = $request->export;
		if ($export) {

			return Excel::download(new AdminEmployersExport, 'danhsachlaodong.xlsx');
		}

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
			->where('state', 1)
			->get();
			// dd($lds);
		// $lds=DB::table('nguoilaodong')->select('id','hoten','cmnd','ngaysinh','company','tinh')->get();
		// dd($request->cid);
		$a_congty = array_column(DB::table('company')->get()->toarray(), 'name', 'id');
		// foreach($lds as $ld){

		// 	$cty= DB::table('company')->where('id',$ld->company)->get()->first();
		// 	$ld->ctyname=$cty->name;
		// }

		return view('admin.employer.all')
			->with('lds', $lds)
			->with('baocao', getdulieubaocao())
			->with('search', $search)
			->with('a_congty', $a_congty)
			->with('gioitinh_filter', $gioitinh_filter)
			->with('state_filter', $state_filter)
			->with('age_filter', $age_filter);
	}

	public function getDmhc()
	{
		$cats = DB::table('danhmuchanhchinh')->where('level', 'huyện')->orwhere('level', 'thành phố')->get();
		return $cats;
	}
	public function getParams($paramtype)
	{
		$type = DB::table('paramtype')->where('name', $paramtype)->get()->first();
		$cats = DB::table('param')->where('type', $type->id)->get();
		return $cats;
	}


	public function getInfo28($cid)
	{

		$dn = DB::table('company')->where('id', $cid)->first();
		$em = new Employer;
		$other_info = $em->getTonghop($dn->id);
		$dn->tonghop = $other_info;
		$dn->pbcmkt = $em->getPhanbo($dn->id, 3);
		$dn->pblvdt = $em->getPhanbo($dn->id, 11);
		$dn->pbnghenghiep = $em->getPhanbo($dn->id, 9);
		return $dn;
	}
	public function getInfo45($cid)
	{

		$dn = DB::table('company')->where('id', $cid)->first();
		$em = new Employer;
		$other_info = $em->getTonghop($dn->id);
		$dn->tonghop = $other_info;
		$dn->pbcmkt = $em->getPhanbo($dn->id, 3);
		$dn->pblvdt = $em->getPhanbo($dn->id, 11);
		$dn->pbnghenghiep = $em->getPhanbo($dn->id, 9);
		return $dn;
	}
	public function new() {}

	public function save(Request $request) {}


	public function edit($eid)
	{
		$countries_list = getCountries();
		// dd($countries_list);
		// get params
		$dmhc = $this->getdanhmuc();
		$list_cmkt = $this->getParamsByNametype('Trình độ CMKT');
		$list_tdgd = $this->getParamsByNametype('Trình độ học vấn');
		$list_nghe = $this->getParamsByNametype('Nghề nghiệp người lao động');
		$list_vithe = $this->getParamsByNametype('Vị thế việc làm');
		$list_linhvuc = $this->getParamsByNametype('Lĩnh vực đào tạo');
		$list_hdld = $this->getParamsByNametype('Loại hợp đồng lao động');

		$model = new Employer();

		$ld = $model::find($eid);
		// Thông tin doanh nghiệp
		$cty = DB::table('company')->where('id', $ld->company)->get()->first();
		$ld->ctyname = $cty->name;
		//// Thông tin lịch sữ làm việc
		$hosos = $model->getHosos($ld->cmnd);
		// dd($ld);
		$dmhanhchinh = danhmuchanhchinh::all();
		// dd($hosos);
		return view('admin.employer.chitiet')
			->with('ld', $ld)
			->with('baocao', getdulieubaocao())
			->with('countries_list', $countries_list)
			->with('dmhc', $dmhc)
			->with('list_cmkt', $list_cmkt)
			->with('list_tdgd', $list_tdgd)
			->with('list_nghe', $list_nghe)
			->with('list_vithe', $list_vithe)
			->with('list_linhvuc', $list_linhvuc)
			->with('list_hdld', $list_hdld)
			->with('hosos', $hosos)
			->with('dmhanhchinh', $dmhanhchinh);
	}

	public function update(Request $request)
	{
		$input = $request->all();
		unset($input['_token']);
		unset($input['id']);

		DB::table('nguoilaodong')->where('id', $request->id)->update($input);

		return redirect('/nguoilaodong/danhsach')->with('message', " thành công ");
	}

	public function delete($catid) {}

	public function getdanhmuc()
	{

		$dm = DB::table('danhmuchanhchinh')->where('public', '1')->get();
		return $dm;
	}
	public function getParamsByNametype($paramtype)
	{
		$cats = array();
		$type = DB::table('paramtype')->where('name', $paramtype)->get()->first();
		if ($type) {
			$cats = DB::table('param')->where('type', $type->id)->get();
		}
		return $cats;
	}


	public function DanhSach_NN(Request $request)
	{
		$inputs=$request->all();
		$inputs['nation']=$inputs['nation']??"ALL";
		$inputs['gioitinh']=$inputs['gioitinh']??"ALL";
		$inputs['company']=$inputs['company']??"ALL";
		$model = DB::table('nguoilaodong')->wherenotin('nation', ['VN', 'Viet Nam', 'vn', 'Việt Nam', 'không']);
		if($inputs['nation'] != 'ALL')
		{
			$model=$model->where('nation',$inputs['nation']);
		}
		if($inputs['gioitinh'] != 'ALL')
		{
			$model=$model->where('gioitinh',$inputs['gioitinh']);
		}
		if($inputs['company'] != 'ALL')
		{
			$model=$model->where('company',$inputs['company']);
		}
		if (!empty($inputs['hoten'])) {
			$model = $model->where('hoten', 'like', '%' . $inputs['hoten'] . '%');
		}
		
		if (!empty($inputs['cmnd'])) {
			$model = $model->where('cmnd', 'like', '%' . $inputs['cmnd'] . '%');
		}
		
		$model=$model->get();
		foreach ($model as $ld) {

			$cty = DB::table('company')->where('id', $ld->company)->get()->first();
			$ld->ctyname = $cty->name;
		}
		//Lấy công ty có sử dụng lao động người nước ngoài
		$company=DB::table('company')->join('nguoilaodong','nguoilaodong.company','=','company.id')
					->wherenotin('nguoilaodong.nation',['VN'])
					->pluck('company.name','company.id');
		// dd($model);
		// $company = array_column(DB::table('company')->get()->toarray(), 'name', 'id');
		return view('admin.employer.laodongnuocngoai.danhsach',compact('inputs'))
			->with('model', $model)
			->with('company', $company)
			->with('baocao', getdulieubaocao());
	}

	public function ThemMoi_NN()
	{
		$countries_list = getCountries();
		// get params
		$dmhc = $this->getdanhmuc();
		$list_cmkt = $this->getParamsByNametype('Trình độ CMKT');
		$list_tdgd = $this->getParamsByNametype('Trình độ học vấn');
		$list_nghe = $this->getParamsByNametype('Nghề nghiệp người lao động');
		$list_vithe = $this->getParamsByNametype('Vị thế việc làm');
		$list_linhvuc = $this->getParamsByNametype('Lĩnh vực đào tạo');
		$list_hdld = $this->getParamsByNametype('Loại hợp đồng lao động');

		// $model = new Employer();

		// $ld = $model::find($eid);
		// Thông tin doanh nghiệp
		$company = array_column(Company::all()->toarray(), 'name', 'id');
		// dd($ld);
		$dmhanhchinh = danhmuchanhchinh::all();
		return view('admin.employer.laodongnuocngoai.create', compact('countries_list', 'dmhc', 'list_cmkt', 'list_tdgd', 'list_nghe', 'list_vithe', 'list_linhvuc', 'list_hdld', 'company', 'dmhanhchinh'))
			->with('baocao', getdulieubaocao());
	}

	public function Xoa($id)
	{
		$model=nguoilaodong::FindOrFail($id);
		if($model)
		{
			$model->delete();
		}

		return redirect('/laodongnuocngoai/danhsach');
	}

	public function indanhsach()
	{

		$model = DB::table('nguoilaodong')->wherenotin('nation', ['VN', 'Viet Nam', 'vn', 'Việt Nam', 'không'])->get();
		foreach ($model as $ld) {

			$cty = DB::table('company')->where('id', $ld->company)->get()->first();
			$ld->ctyname = $cty->name;
		}

		return view('admin.employer.laodongnuocngoai.indanhsach')
			->with('model', $model)
			->with('baocao', getdulieubaocao())
			->with('pageTitle', 'danh sách người lao động nước ngoài');
	}
	public function taonhanh(Request $request)
	{
		$inputs = $request->all();
		$model = DB::table('nguoilaodong')->where('id', $inputs['id'])->first();
		$company = array_column(Company::all()->toarray(), 'name', 'id');

		return view('admin.employer.chitiet_nguoilaodong', compact('model', 'inputs', 'company'))
			->with('pageTitle', 'Chi tiết người lao động');
	}

	public function Ds_khongthongtin(Request $request)
	{
		$model = nguoilaodong::wherenull('hoten')
			->orwherenull('ngaysinh')
			->wherenull('gioitinh')
			->wherenull('cmnd')
			->wherenull('cmnd')
			->get();
		$company = array_column(Company::all()->toarray(), 'name', 'id');
		return view('admin.employer.ds_khongthongtin', compact('model', 'company'))
			->with('pageTitle', 'Danh sách lao động không có thông tin');
	}

	public function TraCuu(Request $request)
	{
		$inputs = $request->all();
		$company = array_column(Company::all()->toarray(), 'name', 'id');
		return view('admin.employer.tracuu.index', compact('company'))
			->with('baocao', getdulieubaocao())
			->with('inputs', $inputs)
			->with('pageTitle', 'Tra cứu thông tin người tìm việc');
	}

	public function KetQuaTraCuu(Request $request)
	{
		$inputs = $request->all();
		$company = array_column(Company::all()->toarray(), 'name', 'id');
		$model = nguoilaodong::orderBy('id');
		if (isset($inputs['hoten'])) {
			$model = $model->where('hoten', 'like', '%' . $inputs['hoten'] . '%');
		}

		if (isset($inputs['cccd'])) {
			$model = $model->where('cmnd', 'like', '%' . $inputs['cccd'] . '%');
		}
		if ($inputs['gioitinh'] != 'ALL') {
			if ($inputs['gioitinh'] == 'nam') {
				$model = $model->wherein('gioitinh', ['Nam', 'nam']);
			} else {
				$model = $model->wherenotin('gioitinh', ['Nam', 'nam']);
			}

		}
		if ($inputs['company'] != 'ALL') {
			$model = $model->where('company', $inputs['company']);
		}

		$model = $model->get();
		$result = '<div class="row" id="ketqua">';
		$result .= '<div class="col-md-12">';
		$result .= '<table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">';
		$result .= '<thead>';
		$result .= '<tr class="text-center">';
		$result .= '<th width="5%"> STT </th>';
		$result .= ' <th>Tên</th>';
		$result .= ' <th>CMND/CCCD</th>';
		$result .= ' <th>Ngày sinh</th>';
		$result .= ' <th>Địa chỉ</th>';
		$result .= ' <th>Công ty</th>';
		$result .= ' </tr>';
		$result .= '</thead>';
		$result .= ' <tbody>';
		foreach ($model as $key => $ct) {
			$result .= '<tr>';
			$result .= '<td>' . (++$key) . ' </td>';
			$result .= '<td><a href="">' . $ct->hoten . '</a></td>';
			$result .= '<td><span class="text-center"> </span>' . $ct->cmnd . '</td>';
			$result .= '<td><span class="text-center"> </span>' . getDayVn($ct->ngaysinh) . '</td>';
			$result .= '<td><span class="text-center"> </span>' . $ct->address . '</td>';
			$result .= '<td><span class="text-center"> </span>' . ($company[$ct->company]??"") . '</td>';
			$result .= '</tr>';
		}
		$result .= ' </tbody>';
		$result .= '</table>';
		$result .= '</div>';
		$result .= '</div>';

		return response()->json($result);
	}
}
