<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Exception;
use Session;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Employer;
use App\Models\Report;
use App\Exports\EmployersExport;
use App\Models\nguoilaodong;
use Maatwebsite\Excel\Facades\Excel;

class EmployerController extends Controller
{

  // public function __construct() {
  // 	$this->middleware(function ($request, $next) {
  //           if(!Auth::check()){ 
  // 		return redirect('home');
  // 		};
  // 		if(Auth::user()->level!=3){
  // 			return redirect('home'); 
  // 			}
  // 		return $next($request);
  //       });
  // }   
  public function __construct()
  {
    $this->middleware(function ($request, $next) {
      if (!Session::has('admin')) {
        return redirect('/');
      };
      return $next($request);
    });
  }

  public function show_all($action = null)
  {
    $request = request();

    $search = $request->search;


    switch ($action) {
      case "tamdung":
        $state_filter = 1;
        break;
      case "kethuctamdung":
        $state_filter = 2;
        break;
      default:
        $state_filter = $request->input('state_filter', 1);
    }
    $uid = session('admin')->id;
    // get company id
    $company = $this->getCompany($uid);
    // get params
    $dmhc = $this->getdanhmuc();
    $list_cmkt = $this->getParamsByNametype('Trình độ CMKT');
    $list_tdgd = $this->getParamsByNametype('Trình độ học vấn');
    $list_nghe = $this->getParamsByNametype('Nghề nghiệp người lao động');
    $list_vithe = $this->getParamsByNametype('Vị thế việc làm');
    $list_linhvuc = $this->getParamsByNametype('Lĩnh vực đào tạo');
    $list_hdld = $this->getParamsByNametype('Loại hợp đồng lao động');

    // get Employers
    $lds = DB::table('nguoilaodong')->where('company', $company->id)
      ->when($search, function ($query, $search) {
        return $query->where('nguoilaodong.hoten', 'like', '%' . $search . '%')
          ->orwhere('nguoilaodong.cmnd', 'like', '%' . $search . '%');
      })
      ->when($state_filter, function ($query, $state_filter) {
        return $query->where('nguoilaodong.state', $state_filter);
      })
      ->get();


    return view('pages.employer.all')
      ->with('lds', $lds)
      ->with('dmhc', $dmhc)
      ->with('company', $company)
      ->with('list_cmkt', $list_cmkt)
      ->with('list_tdgd', $list_tdgd)
      ->with('list_nghe', $list_nghe)
      ->with('list_vithe', $list_vithe)
      ->with('list_linhvuc', $list_linhvuc)
      ->with('list_hdld', $list_hdld)
      ->with('search', $search)
      ->with('state_filter', $state_filter)
      ->with('action', $action);
  }


  public function new()
  {
    $countries_list = $this->getCountries();

    // get params
    $dmhc = $this->getdanhmuc();

    $list_cmkt = $this->getParamsByNametype('Trình độ CMKT');
    $list_tdgd = $this->getParamsByNametype('Trình độ học vấn');
    $list_nghe = $this->getParamsByNametype('Nghề nghiệp người lao động');
    $list_vithe = $this->getParamsByNametype('Vị thế việc làm');
    $list_linhvuc = $this->getParamsByNametype('Lĩnh vực đào tạo');
    $list_hdld = $this->getParamsByNametype('Loại hợp đồng lao động');

    return view('pages.employer.new')
      ->with('countries_list', $countries_list)
      ->with('dmhc', $dmhc)
      ->with('list_cmkt', $list_cmkt)
      ->with('list_tdgd', $list_tdgd)
      ->with('list_nghe', $list_nghe)
      ->with('list_vithe', $list_vithe)
      ->with('list_linhvuc', $list_linhvuc)
      ->with('list_hdld', $list_hdld);
  }
  public function edit($eid, $action)
  {

    $countries_list = $this->getCountries();
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


    return view('pages.employer.edit')
      ->with('ld', $ld)
      ->with('countries_list', $countries_list)
      ->with('dmhc', $dmhc)
      ->with('list_cmkt', $list_cmkt)
      ->with('list_tdgd', $list_tdgd)
      ->with('list_nghe', $list_nghe)
      ->with('list_vithe', $list_vithe)
      ->with('list_linhvuc', $list_linhvuc)
      ->with('list_hdld', $list_hdld)
      ->with('action', $action);
  }

  public function export()
  {
    return Excel::download(new EmployersExport, 'nguoilaodong.xlsx');
  }


  public function import(Request $request)
  {

    $input = $request->all();

    $model = new Employer();
    $request->validate([
       'import_file' => 'required|mimes:xlsx, csv, xls'
    ]);


    try {
     
      $RetIm =  $model->importa($input);
   
      $count_success = $RetIm['count_success'];

      $count_error = $RetIm['count_error'];
  
    } 
    catch (Exception $e) {

      return redirect('/doanhnghieppanel')->with('error' , 'Dữ liệu nhập không hợp lệ');
    }

    if ($count_success >0) {
      return redirect('/doanhnghieppanel')->with('success' , 'Đã thêm mới '. $count_success .' Người lao động');
    }{
      return redirect('/doanhnghieppanel')->with('error' , 'Hãy kiểm tra lại dữ liệu ');
    }

    return redirect('/doanhnghieppanel');
  }

  // public function import()
  // {

  //   $request = request();
  //   // dd($request);
  //   $uid = session('admin')->id;
  //   // get company id
  //   $company = $this->getCompany($uid);
  //   $model = new Employer();
  //   $request->validate([
  //     'import_file' => 'required|mimes:xlsx, csv, xls'
  //   ]);

  //   try {
  //     // dd(1);
  //     $ld = $model->import($company->id);
  //   } catch (Exception $e) {

  //     // return redirect('doanhnghieppanel')->withErrors(['message' => 'Dữ liệu nhập không hợp lệ. ' . $e->getMessage()]);
  //     return redirect('doanhnghieppanel')->with('error','Dữ liệu nhập không hợp lệ');
  //   }

  //   if ($ld) {
  //     return redirect('report-fa')->with('success', $ld . " người lao động thêm thành công");
  //   } else {
  //     redirect('doanhnghieppanel')->with('error' , 'Dữ liệu nhập không hợp lệ');
  //   }
  // }

  public function save(Request $request)
  {
    // dd($request->all());
    $uid = session('admin')->id;
    // get company id
    $company = $this->getCompany($uid);

    $qty = $request->quantity;

    $emodel = new Employer;
    $danhsach = array();
    $ids = array();

    for ($i = 0; $i < $qty; $i++) {
      $data = array();

      $data['hoten'] = $request->hoten[$i];
      $data['cmnd'] = $request->cmnd[$i];
      $data['gioitinh'] = $request->gioitinh[$i];
      $data['ngaysinh'] = $request->ngaysinh[$i];

      $data['dantoc'] = $request->dantoc[$i];
      $data['nation'] = $request->nation;
      $data['tinh'] = $request->tinh[$i];
      $data['huyen'] = $request->huyen[$i];

      $data['xa'] = $request->xa[$i];
      $data['address'] = $request->address[$i];
      $data['sobaohiem'] = $request->sobaohiem[$i];
      $data['trinhdogiaoduc'] = $request->trinhdogiaoduc[$i];



      $data['trinhdocmkt'] = $request->trinhdocmkt[$i];
      $data['nghenghiep'] = $request->nghenghiep[$i];
      $data['linhvucdaotao'] = $request->linhvucdaotao[$i];
      $data['loaihdld'] = $request->loaihdld[$i];

      $data['bdhopdong'] = $request->bdhopdong[$i];
      $data['kthopdong'] = $request->kthopdong[$i];
      $data['luong'] = $request->luong[$i];
      $data['pcchucvu'] = $request->pcchucvu[$i];

      $data['pcthamnien'] = $request->pcthamnien[$i];
      $data['pcthamniennghe'] = $request->pcthamniennghe[$i];
      $data['pcluong'] = $request->pcluong[$i];
      $data['pcbosung'] = $request->pcbosung[$i];

      $data['bddochai'] = $request->bddochai[$i];
      $data['ktdochai'] = $request->ktdochai[$i];
      $data['vitri'] = $request->vitri[$i];
      $data['chucvu'] = $request->chucvu[$i];

      $data['bdbhxh'] = $request->bdbhxh[$i];
      $data['ktbhxh'] = $request->ktbhxh[$i];
      $data['luongbhxh'] = $request->luongbhxh[$i];
      $data['ghichu'] = $request->ghichu[$i];

      $data['fromttdvvl'] = $request->fromttdvvl[$i];


      $data['created_at'] = Carbon::now()->toDateTimeString();
      $data['updated_at'] = Carbon::now()->toDateTimeString();
      $data['company'] = $company->id;
      $data['state'] = 1; // 1 active 2 Inactive 3 deleted

      // kiem tra lao dông bang CMND trươc khi them vao du lieu
      $uid = $emodel->checkCmndExits($data['cmnd']);
      if (!$uid) {
        $result = DB::table('nguoilaodong')->insert($data);
        if ($result) {
          $danhsach[] = $data['hoten'];
          $ids[] = DB::getPdo()->lastInsertId();
        }
      }
    }


    if (count($ids)) {

      $result = 1;

      // add to log system`
      $rm = new Report();
      $note = $request->note . " Danh sách: " . implode(",", $danhsach);
      $id_list = implode(",", $ids);
      $rm->report('baotang', $result, 'nguoilaodong', $id_list, count($ids), $note);
    }


    return redirect('report-fa')->with('message', count($ids) . ' người lao động lưu thành công! ');
  }

  public function update(Request $request)
  {
    $action = $request->action;
    $eid = $request->id;
    $note = $request->note;
    $emodel = new Employer;
    switch ($action) {
      case 'update':
        // Check Unique CMND 
        $uid = $emodel->checkCmndExits($request->cmnd);
        if (!$uid) {
          $emodel->update_info();
        } elseif ($uid == $eid) {
          $emodel->update_info();
        } else {
          return back()->withInput()->withErrors(['message' => ' CMND trùng với người khác']);
        }
        break;
      case 'delete':
        $emodel->update_state($eid, 3, $note);
        break;
      case 'tamdung':
        $emodel->update_state($eid, 2, $note);
        break;
      case 'kethuctamdung':
        $emodel->update_state($eid, 1, $note);
        break;
      default:
        return redirect('report-fa')->withErrors(['message' => ' Hành động không được phép ']);
    }
    return redirect('report-fa')->with('message', $action . " thành công ");
  }
  public function noreport()
  {
    // add to log system`
    $rm = new Report();
    $note = " Kỳ trước Doanh nghiệp không có biến động";
    $rm->report('nothing', 1, 'notable', 0, 0, $note);


    return redirect('report-fa')->with('message', 'Báo cáo thành công! ');
  }

  public function getCompany($uid)
  {

    $dn = DB::table('company')->where('user', $uid)->first();
    return $dn;
  }
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

  public function getCountries()
  {

    return  $countries_list = array(
      "AF" => "Afghanistan",
      "AX" => "Aland Islands",
      "AL" => "Albania",
      "DZ" => "Algeria",
      "AS" => "American Samoa",
      "AD" => "Andorra",
      "AO" => "Angola",
      "AI" => "Anguilla",
      "AQ" => "Antarctica",
      "AG" => "Antigua and Barbuda",
      "AR" => "Argentina",
      "AM" => "Armenia",
      "AW" => "Aruba",
      "AU" => "Australia",
      "AT" => "Austria",
      "AZ" => "Azerbaijan",
      "BS" => "Bahamas",
      "BH" => "Bahrain",
      "BD" => "Bangladesh",
      "BB" => "Barbados",
      "BY" => "Belarus",
      "BE" => "Belgium",
      "BZ" => "Belize",
      "BJ" => "Benin",
      "BM" => "Bermuda",
      "BT" => "Bhutan",
      "BO" => "Bolivia",
      "BQ" => "Bonaire, Sint Eustatius and Saba",
      "BA" => "Bosnia and Herzegovina",
      "BW" => "Botswana",
      "BV" => "Bouvet Island",
      "BR" => "Brazil",
      "IO" => "British Indian Ocean Territory",
      "BN" => "Brunei Darussalam",
      "BG" => "Bulgaria",
      "BF" => "Burkina Faso",
      "BI" => "Burundi",
      "KH" => "Cambodia",
      "CM" => "Cameroon",
      "CA" => "Canada",
      "CV" => "Cape Verde",
      "KY" => "Cayman Islands",
      "CF" => "Central African Republic",
      "TD" => "Chad",
      "CL" => "Chile",
      "CN" => "China",
      "CX" => "Christmas Island",
      "CC" => "Cocos (Keeling) Islands",
      "CO" => "Colombia",
      "KM" => "Comoros",
      "CG" => "Congo",
      "CD" => "Congo, the Democratic Republic of the",
      "CK" => "Cook Islands",
      "CR" => "Costa Rica",
      "CI" => "Cote D'Ivoire",
      "HR" => "Croatia",
      "CU" => "Cuba",
      "CW" => "Curacao",
      "CY" => "Cyprus",
      "CZ" => "Czech Republic",
      "DK" => "Denmark",
      "DJ" => "Djibouti",
      "DM" => "Dominica",
      "DO" => "Dominican Republic",
      "EC" => "Ecuador",
      "EG" => "Egypt",
      "SV" => "El Salvador",
      "GQ" => "Equatorial Guinea",
      "ER" => "Eritrea",
      "EE" => "Estonia",
      "ET" => "Ethiopia",
      "FK" => "Falkland Islands (Malvinas)",
      "FO" => "Faroe Islands",
      "FJ" => "Fiji",
      "FI" => "Finland",
      "FR" => "France",
      "GF" => "French Guiana",
      "PF" => "French Polynesia",
      "TF" => "French Southern Territories",
      "GA" => "Gabon",
      "GM" => "Gambia",
      "GE" => "Georgia",
      "DE" => "Germany",
      "GH" => "Ghana",
      "GI" => "Gibraltar",
      "GR" => "Greece",
      "GL" => "Greenland",
      "GD" => "Grenada",
      "GP" => "Guadeloupe",
      "GU" => "Guam",
      "GT" => "Guatemala",
      "GG" => "Guernsey",
      "GN" => "Guinea",
      "GW" => "Guinea-Bissau",
      "GY" => "Guyana",
      "HT" => "Haiti",
      "HM" => "Heard Island and Mcdonald Islands",
      "VA" => "Holy See (Vatican City State)",
      "HN" => "Honduras",
      "HK" => "Hong Kong",
      "HU" => "Hungary",
      "IS" => "Iceland",
      "IN" => "India",
      "ID" => "Indonesia",
      "IR" => "Iran, Islamic Republic of",
      "IQ" => "Iraq",
      "IE" => "Ireland",
      "IM" => "Isle of Man",
      "IL" => "Israel",
      "IT" => "Italy",
      "JM" => "Jamaica",
      "JP" => "Japan",
      "JE" => "Jersey",
      "JO" => "Jordan",
      "KZ" => "Kazakhstan",
      "KE" => "Kenya",
      "KI" => "Kiribati",
      "KP" => "Korea, Democratic People's Republic of",
      "KR" => "Korea, Republic of",
      "XK" => "Kosovo",
      "KW" => "Kuwait",
      "KG" => "Kyrgyzstan",
      "LA" => "Lao People's Democratic Republic",
      "LV" => "Latvia",
      "LB" => "Lebanon",
      "LS" => "Lesotho",
      "LR" => "Liberia",
      "LY" => "Libyan Arab Jamahiriya",
      "LI" => "Liechtenstein",
      "LT" => "Lithuania",
      "LU" => "Luxembourg",
      "MO" => "Macao",
      "MK" => "Macedonia, the Former Yugoslav Republic of",
      "MG" => "Madagascar",
      "MW" => "Malawi",
      "MY" => "Malaysia",
      "MV" => "Maldives",
      "ML" => "Mali",
      "MT" => "Malta",
      "MH" => "Marshall Islands",
      "MQ" => "Martinique",
      "MR" => "Mauritania",
      "MU" => "Mauritius",
      "YT" => "Mayotte",
      "MX" => "Mexico",
      "FM" => "Micronesia, Federated States of",
      "MD" => "Moldova, Republic of",
      "MC" => "Monaco",
      "MN" => "Mongolia",
      "ME" => "Montenegro",
      "MS" => "Montserrat",
      "MA" => "Morocco",
      "MZ" => "Mozambique",
      "MM" => "Myanmar",
      "NA" => "Namibia",
      "NR" => "Nauru",
      "NP" => "Nepal",
      "NL" => "Netherlands",
      "AN" => "Netherlands Antilles",
      "NC" => "New Caledonia",
      "NZ" => "New Zealand",
      "NI" => "Nicaragua",
      "NE" => "Niger",
      "NG" => "Nigeria",
      "NU" => "Niue",
      "NF" => "Norfolk Island",
      "MP" => "Northern Mariana Islands",
      "NO" => "Norway",
      "OM" => "Oman",
      "PK" => "Pakistan",
      "PW" => "Palau",
      "PS" => "Palestinian Territory, Occupied",
      "PA" => "Panama",
      "PG" => "Papua New Guinea",
      "PY" => "Paraguay",
      "PE" => "Peru",
      "PH" => "Philippines",
      "PN" => "Pitcairn",
      "PL" => "Poland",
      "PT" => "Portugal",
      "PR" => "Puerto Rico",
      "QA" => "Qatar",
      "RE" => "Reunion",
      "RO" => "Romania",
      "RU" => "Russian Federation",
      "RW" => "Rwanda",
      "BL" => "Saint Barthelemy",
      "SH" => "Saint Helena",
      "KN" => "Saint Kitts and Nevis",
      "LC" => "Saint Lucia",
      "MF" => "Saint Martin",
      "PM" => "Saint Pierre and Miquelon",
      "VC" => "Saint Vincent and the Grenadines",
      "WS" => "Samoa",
      "SM" => "San Marino",
      "ST" => "Sao Tome and Principe",
      "SA" => "Saudi Arabia",
      "SN" => "Senegal",
      "RS" => "Serbia",
      "CS" => "Serbia and Montenegro",
      "SC" => "Seychelles",
      "SL" => "Sierra Leone",
      "SG" => "Singapore",
      "SX" => "Sint Maarten",
      "SK" => "Slovakia",
      "SI" => "Slovenia",
      "SB" => "Solomon Islands",
      "SO" => "Somalia",
      "ZA" => "South Africa",
      "GS" => "South Georgia and the South Sandwich Islands",
      "SS" => "South Sudan",
      "ES" => "Spain",
      "LK" => "Sri Lanka",
      "SD" => "Sudan",
      "SR" => "Suriname",
      "SJ" => "Svalbard and Jan Mayen",
      "SZ" => "Swaziland",
      "SE" => "Sweden",
      "CH" => "Switzerland",
      "SY" => "Syrian Arab Republic",
      "TW" => "Taiwan, Province of China",
      "TJ" => "Tajikistan",
      "TZ" => "Tanzania, United Republic of",
      "TH" => "Thailand",
      "TL" => "Timor-Leste",
      "TG" => "Togo",
      "TK" => "Tokelau",
      "TO" => "Tonga",
      "TT" => "Trinidad and Tobago",
      "TN" => "Tunisia",
      "TR" => "Turkey",
      "TM" => "Turkmenistan",
      "TC" => "Turks and Caicos Islands",
      "TV" => "Tuvalu",
      "UG" => "Uganda",
      "UA" => "Ukraine",
      "AE" => "United Arab Emirates",
      "GB" => "United Kingdom",
      "US" => "United States",
      "UM" => "United States Minor Outlying Islands",
      "UY" => "Uruguay",
      "UZ" => "Uzbekistan",
      "VU" => "Vanuatu",
      "VE" => "Venezuela",
      "VN" => "Viet Nam",
      "VG" => "Virgin Islands, British",
      "VI" => "Virgin Islands, U.s.",
      "WF" => "Wallis and Futuna",
      "EH" => "Western Sahara",
      "YE" => "Yemen",
      "ZM" => "Zambia",
      "ZW" => "Zimbabwe"
    );
  }
}
