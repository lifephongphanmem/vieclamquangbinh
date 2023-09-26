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
    public function index(Request $request)
    {
        $inputs = $request->all();

        $model = User::leftjoin('ungvien', 'users.id', 'ungvien.user')
            ->select('ungvien.*', 'users.email', 'users.created_at ', 'users.status')
            ->where('phanloaitk', '3')->get();
            if (isset($inputs['luongmin'])) {
                $model = $model->where('luong','>=',$inputs['luongmin']);
            }
            if (isset($inputs['luongmax'])) {
                $model = $model->where('luong','<=',$inputs['luongmax']);
            }
        return view('admin.ungvien.index')
            ->with('model', $model)
            ->with('inputs', $inputs)
            ->with('baocao', getdulieubaocao());
    }

    public function trangthai(Request $request)
    {
     
        User::where('id',$request->user)->first()->update(['status'=> $request->trangthai]);
        return redirect('/ungvien');
    }

    public function create()
    {
        $danhmuc = danhmuchanhchinh::all();
        $dmtrinhdokythuat = dmtrinhdokythuat::all();
        return view('admin.ungvien.create')
            ->with('danhmuc', $danhmuc)
            ->with('dmtrinhdokythuat', $dmtrinhdokythuat)
            ->with('baocao', getdulieubaocao());
    }

    public function storecoban(Request $request)
    {
        $inputs = $request->all();
        $data_user = [
            'name' => $inputs['hoten'],
            'email' => $inputs['email'],
            'password' => Hash::make($inputs['password']),
            'phanloaitk' => 3,
            // 'madv' => date('YmdHis'),
            'status' => $inputs['status'], //0: vô hiệu,1: kích hoạt,2: khóa
        ];

        $model = User::where('email', $inputs['email'])->first();

        if (isset($model)) {
            $result['message'] = "Mail đã được sử dụng";
            $result['status'] = 'error';
        } else {
            $model_user = User::create($data_user);

            $data_ungvien = [
                'user' => $model_user->id,
                // 'avatar' => $inputs['avatar'],
                'hoten' => $inputs['hoten'],
                'gioitinh' => $inputs['gioitinh'],
                'phone' => $inputs['phone'],
                'tinh' => $inputs['tinh'],
                'huyen' => $inputs['huyen'],
                'xa' => $inputs['xa'],
                'address' => $inputs['address'],
                'chucdanh' => $inputs['chucdanh'],
                'honnhan' => $inputs['honnhan'],
                'hinhthuclv' => $inputs['hinhthuclv'],
                'luong' => $inputs['luong'],
                'trinhdocmkt' => $inputs['trinhdocmkt'],
                'word' => $inputs['word'],
                'excel' => $inputs['excel'],
                'powerpoint' => $inputs['powerpoint'],
                'gioithieu' => $inputs['gioithieu'],
                'muctieu' => $inputs['muctieu'],
            ];
            ungvien::create($data_ungvien);

            $result['status'] = 'success';
            $result['content'] = '<p> Đã Lưu thông tin </p>';
            $result['message'] = "Đã lưu thông tin";
            $result['user'] = $model_user->id;
            return  response($result);
        }
    }

    public function createhocvan()
    {
        $dmtrinhdokythuat = dmtrinhdokythuat::all();

        $result['content'] = '<div class="row col-md-12">';
        $result['content'] .= '<div class="col-md-3">';
        $result['content'] .= '<div class="form-group">';
        $result['content'] .= '<label class="control-label">Chuyên ngành<span class="require">*</span></label>';
        $result['content'] .= '<input type="text" name="chuyennganh" id="chuyennganh" class="form-control" placeholder="VD: Kinh doanh quốc tế" required>';
        $result['content'] .= '</div></div>';
        $result['content'] .= '<div class="col-md-3">';
        $result['content'] .= '<div class="form-group">';
        $result['content'] .= '<label class="control-label">Trường <span class="require">*</span></label>';
        $result['content'] .= '<input type="text" name="truong" id="truong" class="form-control" placeholder="VD: Đại học Ngoại Thương" required>';
        $result['content'] .= '</div> </div>';
        $result['content'] .= '<div class="col-md-3">';
        $result['content'] .= '<div class="form-group">';
        $result['content'] .= '<label class="control-label">Bằng cấp <span class="require">*</span></label>';
        $result['content'] .= '<select name="bangcap"  id="bangcap" class="form-control" required>';
        $result['content'] .= '<option value="">Chọn bằng cấp</option>';
        foreach ($dmtrinhdokythuat as $item) {
            $result['content'] .= '<option value="' . $item->madmtdkt . '">' . $item->tentdkt . '</option>';
        }
        $result['content'] .= '</select>';
        $result['content'] .= '</div>';
        $result['content'] .= '</div>';
        $result['content'] .= '</div>';
        $result['content'] .= '<div class="row col-md-3">';
        $result['content'] .= '<div class="col-md-12">';
        $result['content'] .= '<div class="form-group">';
        $result['content'] .= '<label class="control-label">Từ ngày </label>';
        $result['content'] .= '<input type="date" name="tungay" id="tungay" class="form-control" value="" required>';
        $result['content'] .= '</div> </div>';
        $result['content'] .= '<div class="col-md-12">';
        $result['content'] .= '<div class="form-group">';
        $result['content'] .= '<label class="control-label">Đến ngày </label>';
        $result['content'] .= '<input type="date" name="denngay" id="denngay" class="form-control" value="" required>';
        $result['content'] .= '</div> </div></div>';
        $result['content'] .= '<div class="row col-md-9">';
        $result['content'] .= '<div class="col-md-12">';
        $result['content'] .= '<div class="form-group">';
        $result['content'] .= '<label class="control-label">Thành tựu</label>';
        $result['content'] .= '<textarea type="date" name="thanhtuu"  id="thanhtuu" class="form-control" rows="6"></textarea>';
        $result['content'] .= '</div> </div> </div>';
        $result['content'] .= '<div class="row">';
        $result['content'] .= '<button onclick="storehocvan()" class="btn btn-sm btn-info btn-lg pull-right" style="margin-left:49%"> Lưu</button></div>';

        return  response($result);
    }

    public function storehocvan(Request $request)
    {
        $inputs = $request->all();
        $data_ungvienhocvan = [
            'user' => $inputs['user'],
            'chuyennganh' => $inputs['chuyennganh'],
            'truong' => $inputs['truong'],
            'bangcap' => $inputs['bangcap'],
            'tungay' => $inputs['tungay'],
            'denngay' => $inputs['denngay'],
            'thanhtuu' => $inputs['thanhtuu'],
        ];
        ungvienhocvan::create($data_ungvienhocvan);

        $result['content2'] ="<p> </p>";

        $ungvienhocvan = ungvienhocvan::where('user',$inputs['user'])->get();

        $result['content1'] = "<div id='form_hocvan3'>";
        foreach ($ungvienhocvan as $item){
            $result['content1'] .="<p>Chuyên ngành: ". $item->chuyennganh ." </p>";
            $result['content1'] .="<p>Trường: ". $item->truong ." </p>";
            $result['content1'] .="<p>Bằng cấp: ". $item->bangcap ." </p>";
            $result['content1'] .="<p>Từ ngày:". $item->tungay ." ,đến ngày: ". $item->denngay ."</p>";
            $result['content1'] .="<p>Thành tựu: ". $item->thanhtuu ."</p><hr></div>";
        }

        return response($result);
    }

    public function storekinhnghiem(Request $request)
    {

        $inputs = $request->all();
        $data_ungvienkinhnghiem = [
            'user' => $inputs['user'],
            'congty' => $inputs['congty'],
            'quymo' => $inputs['quymo'],
            'linhvuc' => $inputs['linhvuc'],
            'chucdanh' => $inputs['chucdanh'],
            'ngayvao' => $inputs['ngayvao'],
            'ngaynghi' => $inputs['ngaynghi'],
        ];
        ungvienkinhnghiem::create($data_ungvienkinhnghiem);


        return response($inputs);
    }

    public function delete($user)
    {
        User::find($user)->delete();
        ungvien::where('user', $user)->delete();
        ungvienhocvan::where('user', $user)->delete();
        ungvienkinhnghiem::where('user', $user)->delete();
        return redirect('/ungvien');
    }

    public function edit(Request $request)
    {
        $model = User::where('id', $request->user)->select('email', 'status')->first();
        $ungvien = ungvien::where('user', $request->user)->first();
        $ungvienhocvan = ungvienhocvan::where('user', $request->user)->get();
        $ungvienkinhnghiem = ungvienkinhnghiem::where('user', $request->user)->get();
        $danhmuc = danhmuchanhchinh::all();
        $dmtrinhdokythuat = dmtrinhdokythuat::all();

        return view('admin.ungvien.edit')
            ->with('model', $model)
            ->with('ungvien', $ungvien)
            ->with('ungvienhocvan', $ungvienhocvan)
            ->with('ungvienkinhnghiem', $ungvienkinhnghiem)
            ->with('danhmuc', $danhmuc)
            ->with('dmtrinhdokythuat', $dmtrinhdokythuat)
            ->with('baocao', getdulieubaocao());
    }
}
