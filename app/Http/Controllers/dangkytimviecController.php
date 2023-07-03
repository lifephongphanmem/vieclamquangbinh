<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\dangkytimviec;
use App\Models\dangkytimviecImport;
use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmchucvu;
use App\Models\Danhmuc\dmloaihinhhdkt;
use App\Models\Danhmuc\dmmanghetrinhdo;
use App\Models\Danhmuc\dmtrinhdogdpt;
use App\Models\Danhmuc\dmtrinhdokythuat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class dangkytimviecController extends Controller
{
   public function index(Request $request)
   {
     
      if (!chkPhanQuyen('danhsachdangkytimviec', 'danhsach')) {
         return view('errors.noperm')->with('machucnang', 'dangkytimviec');
      }
      $input = $request->all();
      if (!isset($input['tungay'])) {
         $nam = date('Y');
         $thang = date('m');
         if ($thang == 2 ) {
            $ngay = 29;
         }elseif($thang == 4 || $thang == 6 ||$thang == 9 ||$thang == 11) {
            $ngay = 30;
         }else{
            $ngay = 31;
         }
         $input['tungay'] = Carbon::create($nam, $thang, 1)->toDateString();
         $input['denngay'] = Carbon::create($nam, $thang, $ngay)->toDateString();
         $input['gioitinh_filter'] = '0';
         $input['age_filter'] = '0';
         $input['phien'] = '0';
      }
      // $denngay2 = Carbon::parse($input['denngay'])->addDays();

      $model = dangkytimviec::where('thoidiem', '>=', $input['tungay'])->where('thoidiem', '<=', $input['denngay'])->get();
      if ($input['gioitinh_filter'] != '0') {
         $model = $model->where('gioitinh', $input['gioitinh_filter']);
      }

      if ($input['age_filter'] != '0') {

         // $tuoitren35 = date('Y') - 35;
         $tuoitren35 = Carbon::create(date('Y')-35,date('m'),date('d'));
         $model = $model->where('ngaysinh','<=',$tuoitren35);
      }
      if ($input['phien'] != '0') {
         $model = $model->where('phiengd', $input['phien']);
      }
      
      return view('admin.dangkytimviec.index')
      ->with('model', $model)
      ->with('input', $input)
      ->with('baocao', getdulieubaocao());

   }

   public function create(Request $request)
   {
     
      if (!chkPhanQuyen('danhsachdangkytimviec', 'thaydoi')) {
         return view('errors.noperm')->with('machucnang', 'dangkytimviec');
      }
      $input = $request->all();
      $list_hdld = $this->getParamsByNametype('Loại hợp đồng lao động');
      $dmtrinhdogdpt = dmtrinhdogdpt::all();
      $dmtrinhdokythuat = dmtrinhdokythuat::all();
      $dmchucvu = dmchucvu::all();
      $dmmanghetrinhdo = dmmanghetrinhdo::all();
      $dmloaihinhhdkt = dmloaihinhhdkt::all();
      return view('admin.dangkytimviec.create')
      ->with('list_hdld', $list_hdld)
      ->with('dmtrinhdogdpt', $dmtrinhdogdpt)
      ->with('dmtrinhdokythuat', $dmtrinhdokythuat)
      ->with('dmchucvu', $dmchucvu)
      ->with('dmmanghetrinhdo', $dmmanghetrinhdo)
      ->with('dmloaihinhhdkt', $dmloaihinhhdkt)
      ->with('input', $input)
      ->with('baocao', getdulieubaocao());
   }

   public function edit(Request $request)
   {
     
      if (!chkPhanQuyen('danhsachdangkytimviec', 'thaydoi')) {
         return view('errors.noperm')->with('machucnang', 'dangkytimviec');
      }
      $input = $request->all();
      
      $model = dangkytimviec::find($input['id']);
      $list_hdld = $this->getParamsByNametype('Loại hợp đồng lao động');
      $dmtrinhdogdpt = dmtrinhdogdpt::all();
      $dmtrinhdokythuat = dmtrinhdokythuat::all();
      $dmchucvu = dmchucvu::all();
      $dmmanghetrinhdo = dmmanghetrinhdo::all();
      $dmloaihinhhdkt = dmloaihinhhdkt::all();
      return view('admin.dangkytimviec.edit')
         ->with('model', $model)
         ->with('list_hdld', $list_hdld)
         ->with('dmtrinhdogdpt', $dmtrinhdogdpt)
         ->with('dmtrinhdokythuat', $dmtrinhdokythuat)
         ->with('dmchucvu', $dmchucvu)
         ->with('dmmanghetrinhdo', $dmmanghetrinhdo)
         ->with('dmloaihinhhdkt', $dmloaihinhhdkt)
         ->with('input', $input)
         ->with('baocao', getdulieubaocao());
   }

   public function store(Request $request)
   {
   //   dd($request->all());


      $input = $request->all();
      $maphien = date('YmdHis');
      $thoidiem = date('Y-m-d');
      for ($i = 0; $i < $input['quantity']; $i++) {
         
         dangkytimviec::create([
            // 'kydieutra' => $input['kydieutra'],
            'maphien' => $maphien,
            'phiengd' => $input['phiengd'],

            'hoten' => $input['hoten'][$i],
            'ngaysinh' => $input['ngaysinh'][$i],
            'gioitinh' => $input['gioitinh'][$i],
            'phone' => $input['phone'][$i],
            'cccd' => $input['cccd'][$i],
            'dantoc' => $input['dantoc'][$i],
            'thuongtru' => $input['thuongtru'][$i],
            'tamtru' => $input['tamtru'][$i],
            
            'trinhdogiaoduc' => $input['trinhdogiaoduc'][$i],
            'trinhdocmkt' => $input['trinhdocmkt'][$i],
            'loaithvp' => $input['loaithvp'][$i],
            'tinhockhac' => $input['tinhockhac'][$i],
            'loaithk' => $input['loaithk'][$i],
            'ngoaingu1' => $input['ngoaingu1'][$i],
            'chungchinn1' => $input['chungchinn1'][$i],
            'xeploainn1' => $input['xeploainn1'][$i],
            'ngoaingu2' => $input['ngoaingu2'][$i],
            'chungchinn2' => $input['chungchinn2'][$i],
            'xeploainn2' => $input['xeploainn2'][$i],
            'kinhnghiem' => $input['kinhnghiem'][$i],
            'kynangmem' => $input['kynangmem'][$i],
            'nguoikhuyettat' => $input['nguoikhuyettat'][$i],

            'tencongviec' => $input['tencongviec'][$i],
            'manghe' => $input['manghe'][$i],
            'chucvu' => $input['chucvu'][$i],
            'loaihinhkt' => $input['loaihinhkt'][$i],
            'loaihdld' => $input['loaihdld'][$i],
            'khanangcongtac' => $input['khanangcongtac'][$i],
            'hinhthuclv' => $input['hinhthuclv'][$i],
            'mucdichlv' => $input['mucdichlv'][$i],
            'luong' => $input['luong'][$i],
            'hotroan' => $input['hotroan'][$i],
            'phucloi' => $input['phucloi'][$i],
            'linhvuc' => $input['linhvuc'][$i],
            'thoidiem' => $thoidiem,

            'tendn' => $input['tendn'][$i],
            'madkkd' => $input['madkkd'][$i],
            'datsotuyen' => $input['datsotuyen'][$i],
            'nhanduocviec' => $input['nhanduocviec'][$i],
         ]);
        
      }

      return redirect('/dangkytimviec?tungay='. $input['tungay'] . '&denngay=' . $input['denngay'] .
       '&gioitinh_filter='. $input['gioitinh_filter'] . '&age_filter=' .$input['age_filter'].'&phien='.$input['phien']);
   }
   public function update(Request $request)
   {
     
      $input = $request->all();
        
      for ($i = 0; $i < $input['quantity']; $i++) {
         dangkytimviec::find($request->id)->update([
            // 'kydieutra' => $input['kydieutra'],
            // 'phiengd' => $input['phiengd'],
            'hoten' => $input['hoten'][$i],
            'ngaysinh' => $input['ngaysinh'][$i],
            'gioitinh' => $input['gioitinh'][$i],
            'phone' => $input['phone'][$i],
            'cccd' => $input['cccd'][$i],
            'dantoc' => $input['dantoc'][$i],
            'thuongtru' => $input['thuongtru'][$i],
            'tamtru' => $input['tamtru'][$i],

            'trinhdogiaoduc' => $input['trinhdogiaoduc'][$i],
            'trinhdocmkt' => $input['trinhdocmkt'][$i],
            'loaithvp' => $input['loaithvp'][$i],
            'tinhockhac' => $input['tinhockhac'][$i],
            'loaithk' => $input['loaithk'][$i],
            'ngoaingu1' => $input['ngoaingu1'][$i],
            'chungchinn1' => $input['chungchinn1'][$i],
            'xeploainn1' => $input['xeploainn1'][$i],
            'ngoaingu2' => $input['ngoaingu2'][$i],
            'chungchinn2' => $input['chungchinn2'][$i],
            'xeploainn2' => $input['xeploainn2'][$i],
            'kinhnghiem' => $input['kinhnghiem'][$i],
            'kynangmem' => $input['kynangmem'][$i],
            'nguoikhuyettat' => $input['nguoikhuyettat'][$i],

            'tencongviec' => $input['tencongviec'][$i],
            'manghe' => $input['manghe'][$i],
            'chucvu' => $input['chucvu'][$i],
            'loaihinhkt' => $input['loaihinhkt'][$i],
            'loaihdld' => $input['loaihdld'][$i],
            'khanangcongtac' => $input['khanangcongtac'][$i],
            'hinhthuclv' => $input['hinhthuclv'][$i],
            'mucdichlv' => $input['mucdichlv'][$i],
            'luong' => $input['luong'][$i],
            'hotroan' => $input['hotroan'][$i],
            'phucloi' => $input['phucloi'][$i],
            'linhvuc' => $input['linhvuc'][$i],
            // 'thoidiem' => $thoidiem,

            'tendn' => $input['tendn'][$i],
            'madkkd' => $input['madkkd'][$i],
            'datsotuyen' => $input['datsotuyen'][$i],
            'nhanduocviec' => $input['nhanduocviec'][$i],
         ]);
      }
  
      return redirect('/dangkytimviec?tungay=' . $input['tungay'] . '&denngay=' . $input['denngay'] .
      '&gioitinh_filter=' . $input['gioitinh_filter'] . '&age_filter=' . $input['age_filter'] . '&phien=' . $input['phien']);
   }


   public function bcchitiet(Request $request)
   {
      $input = $request->all();
      $model = dangkytimviec::leftJoin('dmtrinhdokythuat', 'dmtrinhdokythuat.stt', 'dangkytimviec.trinhdocmkt')
      ->leftJoin('dmtrinhdogdpt', 'dmtrinhdogdpt.stt', 'dangkytimviec.trinhdogiaoduc')
      ->select('dangkytimviec.*', 'dmtrinhdokythuat.tentdkt', 'dmtrinhdogdpt.tengdpt')
      ->get();
      $denngay2 = Carbon::parse($input['denngay'])->addDays();

      $model = $model->where('created_at', '>=', $input['tungay'])->where('created_at', '<=', $denngay2);
      // if ($input['gioitinh_filter'] != '0') {
      //    $model = $model->where('gioitinh', $input['gioitinh_filter']);
      // }

      // if ($input['age_filter'] != '0') {

      //    // $tuoitren35 = date('Y') - 35;
      //    $tuoitren35 = Carbon::create(date('Y') - 35, date('m'), date('d'));
      //    $model = $model->where('ngaysinh', '<=', $tuoitren35);
      // }
      
      return view('admin.dangkytimviec.bcchitiet')
      ->with('model',$model)
      ->with('baocao', getdulieubaocao())
      ->with('pageTitle', 'Báo cáo chi tiết danh sách đăng ký tìm việc');;
   }

   public function bctonghop(Request $request)
   {
      $input = $request->all();
      $model = dangkytimviec::leftJoin('dmtrinhdokythuat', 'dmtrinhdokythuat.stt', 'dangkytimviec.trinhdocmkt')
      ->leftJoin('dmtrinhdogdpt', 'dmtrinhdogdpt.stt', 'dangkytimviec.trinhdogiaoduc')
      ->select('dangkytimviec.*', 'dmtrinhdokythuat.tentdkt', 'dmtrinhdogdpt.tengdpt')
      ->get();
      $denngay2 = Carbon::parse($input['denngay'])->addDays();

      $model = $model->where('created_at', '>=', $input['tungay'])->where('created_at', '<=', $denngay2);
      // if ($input['gioitinh_filter'] != '0') {
      //    $model = $model->where('gioitinh', $input['gioitinh_filter']);
      // }

      // if ($input['age_filter'] != '0') {

      //    // $tuoitren35 = date('Y') - 35;
      //    $tuoitren35 = Carbon::create(date('Y') - 35, date('m'), date('d'));
      //    $model = $model->where('ngaysinh', '<=', $tuoitren35);
      // }

      $dmtrinhdokythuat = dmtrinhdokythuat::all();
      return view('admin.dangkytimviec.bctonghop')
         ->with('model', $model)
         ->with('input', $input)
         ->with('dmtrinhdokythuat', $dmtrinhdokythuat)
         ->with('baocao', getdulieubaocao())
         ->with('pageTitle', 'Báo cáo Tổng hợp danh sách đăng ký tìm việc');;
   }


   public function delete($id,$tungay,$denngay, $gioitinh_filter,$age_filter,$phien)
   {
     
      if (!chkPhanQuyen('danhsachdangkytimviec', 'thaydoi')) {
         return view('errors.noperm')->with('machucnang', 'dangkytimviec');
      }
      dangkytimviec::find($id)->delete();
      return redirect('/dangkytimviec?tungay='. $tungay. '&denngay='. $denngay. '&gioitinh_filter='. $gioitinh_filter.
       '&age_filter='. $age_filter. '&phien=' . $phien);
   }

   public function importexcel(Request $request)
   {
   
      $input = $request->all();
      //  dd($input['import_file']);
      $model = new dangkytimviecImport();
      // $request->validate([
      //    'import_file' => 'required|mimes:xlsx, csv, xls'
      // ]);
      
         $model->dktvimport($input);

      return redirect('/dangkytimviec');
     

      
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
}
