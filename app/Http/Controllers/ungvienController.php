<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Models\Company;
use App\Models\Danhmuc\capbac;
use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmtrinhdokythuat;
use App\Models\ungvien;
use App\Models\ungvienhocvan;
use App\Models\ungvienkinhnghiem;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UngVienCoBanRequest;
class ungvienController extends Controller
{
    public function index(Request $request)
    {

        $inputs = $request->all();

        $model = User::leftjoin('ungvien', 'users.id', 'ungvien.user')
            ->select('ungvien.*', 'users.email', 'users.created_at ', 'users.status')
            ->where('phanloaitk', '3')->get();
        if (isset($inputs['luongmin'])) {
            $model = $model->where('luong', '>=', $inputs['luongmin']);
        }
        if (isset($inputs['luongmax'])) {
            $model = $model->where('luong', '<=', $inputs['luongmax']);
        }
        if (isset($inputs['capbac'])) {
            $model = $model->where('capbac', $inputs['capbac']);
        }
        $capbac = capbac::all();
        if(!isset($inputs['capbac'])){
            $inputs['capbac'] = null;
        }
        return view('admin.ungvien.index')
            ->with('model', $model)
            ->with('capbac', $capbac)
            ->with('inputs', $inputs)
            ->with('baocao', getdulieubaocao());
    }

    public function trangthai(Request $request)
    {

        User::where('id', $request->user)->first()->update(['status' => $request->trangthai]);
        return redirect('/ungvien');
    }

    public function create()
    {

        $danhmuc = danhmuchanhchinh::all();
        $dmtrinhdokythuat = dmtrinhdokythuat::all();
        $capbac = capbac::all();
        return view('admin.ungvien.create')
            ->with('danhmuc', $danhmuc)
            ->with('dmtrinhdokythuat', $dmtrinhdokythuat)
            ->with('capbac', $capbac)
            ->with('baocao', getdulieubaocao());
    }

    public function storecoban(UngVienCoBanRequest $request)
    {
        $inputs = $request->all();
        $data_user = [
            'name' => $inputs['hoten'],
            'email' => $inputs['email'],
            'password' => Hash::make($inputs['password']),
            'phanloaitk' => 3,
            'status' => $inputs['status'], //0: vô hiệu,1: kích hoạt,2: khóa
        ];

        $model_email = User::where('email', $inputs['email'])->first();

        if (isset($model)) {
            $result['message'] = "Mail đã được sử dụng";
            $result['status'] = 'error';
        } else {
            $model_user = User::create($data_user);

            $data_ungvien = [
                'user' => $model_user->id,
                'hoten' => $inputs['hoten'],
                'gioitinh' => $inputs['gioitinh'],
                'ngaysinh' => $inputs['ngaysinh'],
                'phone' => $inputs['phone'],
                'tinh' => $inputs['tinh'],
                'huyen' => $inputs['huyen'],
                'xa' => $inputs['xa'],
                'address' => $inputs['address'],
                'capbac' => $inputs['capbac'],
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
        }
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

        $result = $this->gethocvan($inputs['user']);

        return response($result);
    }

    public function updatehocvan(Request $request)
    {
        $inputs = $request->all();
        ungvienhocvan::find($inputs['id'])->update($inputs);
        $result = $this->gethocvan($inputs['user']);
        return response($result);
    }




    public function deletehocvan(Request $request)
    {
        $inputs = $request->all();
        ungvienhocvan::find($inputs['id'])->delete();
        $result = $this->gethocvan($inputs['user']);
        return response($result);
    }

    public function gethocvan($user)
    {
        $ungvienhocvan = ungvienhocvan::where('user', $user)->get();
        $dmtrinhdokythuat = dmtrinhdokythuat::all();

        $result['content'] = '<table class="table table-bordered table-hover dataTable no-footer">';
        foreach ($ungvienhocvan as $item) {
            $result['content'] .= '<tr>';
            $result['content'] .= '<td>';
            $result['content'] .= '<div style="margin-bottom: -2rem;margin-top: 1rem">';
            $result['content'] .= '<span >' . $item->truong . '&emsp;&emsp;&emsp;';
            $result['content'] .= '</span>';
            $result['content'] .=  getDayVn($item->tungay);
            if (isset($item->denngay)) {
                $result['content'] .= ' - ' . getDayVn($item->denngay);
            }
            $result['content'] .= '</span>';
            $result['content'] .= '</div>';

            $result['content'] .= '<div style="display: flex;justify-content:end;">';
            $result['content'] .= '<span>';
            $result['content'] .= '<a onclick="edithocvan(' . $item->id . ')" class="btn btn-primary"> Cật nhật</a>';
            $result['content'] .= '<a onclick="deletehocvan(' . $item->id . ')" class="btn btn-danger"> Xóa</a>';
            $result['content'] .= '</span>';
            $result['content'] .= '</div>';
            $result['content'] .= '<div class="form-body" id="hocvan_edit' . $item->id . '" style="margin-top: 10px;display: none" >';
            $result['content'] .= '<div class="row col-md-12">';
            $result['content'] .= '<div class="col-md-3">';
            $result['content'] .= '<div class="form-group">';
            $result['content'] .= '<label class="control-label">Chuyên ngành<span';
            $result['content'] .= 'class="require">*</span></label>';
            $result['content'] .= '<input type="text" name="chuyennganh" id="chuyennganh_edit' . $item->id . '" value="' . $item->chuyennganh . '"';
            $result['content'] .= 'class="form-control" placeholder="VD: Kinh doanh quốc tế" required>';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '<div class="col-md-3">';
            $result['content'] .= '<div class="form-group">';
            $result['content'] .= '<label class="control-label">Trường <span class="require">*</span></label>';
            $result['content'] .= '<input type="text" name="truong" id="truong_edit' . $item->id . '" class="form-control"  value="' . $item->truong . '"';
            $result['content'] .= 'placeholder="VD: Đại học Ngoại Thương" required>';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '<div class="col-md-3">';
            $result['content'] .= '<div class="form-group">';
            $result['content'] .= '<label class="control-label">Bằng cấp <span class="require">*</span></label>';
            $result['content'] .= '<select name="bangcap" id="bangcap_edit' . $item->id . '" class="form-control" required>';
            $result['content'] .= '<option value="">Chọn bằng cấp</option>';
            foreach ($dmtrinhdokythuat as $dm) {
                $result['content'] .= '<option value="' . $dm->madmtdkt . '"';
                if ($item->bangcap == $dm->madmtdkt) {
                    $result['content'] .= 'selected';
                }
                $result['content'] .= '>' . $dm->tentdkt . '</option>';
            }
            $result['content'] .= '</select>';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '<div class="row col-md-3">';
            $result['content'] .= '<div class="col-md-12">';
            $result['content'] .= '<div class="form-group">';
            $result['content'] .= '<label class="control-label">Từ ngày </label>';
            $result['content'] .= '<input type="date" name="tungay" id="tungay_edit' . $item->id . '" class="form-control"  value="' . $item->tungay . '" required>';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '<div class="col-md-12">';
            $result['content'] .= '<div class="form-group">';
            $result['content'] .= '<label class="control-label">Đến ngày </label>';
            $result['content'] .= '<input type="date" name="denngay" id="denngay_edit' . $item->id . '" class="form-control" value="' . $item->denngay . '" required>';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '<div class="row col-md-9">';
            $result['content'] .= '<div class="col-md-12">';
            $result['content'] .= '<div class="form-group">';
            $result['content'] .= '<label class="control-label">Thành tựu</label>';
            $result['content'] .= '<textarea type="text" name="thanhtuu" id="thanhtuu_edit' . $item->id . '" class="form-control" rows="6">' . $item->thanhtuu . '</textarea>';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '<input name="id" id="id_edit' . $item->id . '" hidden>';
            $result['content'] .= '<div class="row">';
            $result['content'] .= '<button onclick="huyedithocvan(' . $item->id . ')" class="btn btn-sm btn-lg pull-right"';
            $result['content'] .= 'style="margin-left:2%;background-color: rgba(128, 128, 128, 0.507)"> Hủy</button>';
            $result['content'] .= '<button onclick="updatehocvan(' . $item->id . ')" ';
            $result['content'] .= 'class="btn btn-sm btn-primary btn-lg pull-right" style="margin-left:1px">Lưu</button>';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '</td>';
            $result['content'] .= '</tr>';
        }
        $result['content'] .= '</table>';

        return $result;
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
            'chitiet' => $inputs['chitiet'],
            'mota' => $inputs['mota'],
            'lydo' => $inputs['lydo'],
        ];
        ungvienkinhnghiem::create($data_ungvienkinhnghiem);

        $result = $this->getkinhnghiem($inputs['user']);

        return response($result);
    }

    public function updatekinhnghiem(Request $request)
    {
        $inputs = $request->all();
        ungvienkinhnghiem::find($inputs['id'])->update($inputs);

        $result = $this->getkinhnghiem($inputs['user']);
        return response($result);
    }

    public function deletekinhnghiem(Request $request)
    {
        $inputs = $request->all();
        ungvienkinhnghiem::find($inputs['id'])->delete();

        $result = $this->getkinhnghiem($inputs['user']);
        return response($result);
    }

    public function getkinhnghiem($user)
    {

        $ungvienkinhnghiem = ungvienkinhnghiem::where('user', $user)->get();

        $result['content'] = '<table class="table  table-bordered table-hover dataTable no-footer">';
        foreach ($ungvienkinhnghiem as $item) {
            $result['content'] .= '<tr>';
            $result['content'] .= '<td>';
            $result['content'] .= '<div style="margin-bottom: -2rem;margin-top: 1rem">';
            $result['content'] .= '<span >' . $item->congty . '&emsp;&emsp;&emsp;';
            $result['content'] .= '</span> <span>';
            $result['content'] .=  getDayVn($item->ngayvao);
            if (isset($item->ngaynghi)) {
                $result['content'] .= ' - ' . getDayVn($item->ngaynghi);
            }
            $result['content'] .= '</span>';
            $result['content'] .= '</div>';
            $result['content'] .= '<div style="display: flex;justify-content:end;">';
            $result['content'] .= '<span>';
            $result['content'] .= '<a onclick="editkinhnghiem(' . $item->id . ')" class="btn btn-primary"> Cật nhật</a>';
            $result['content'] .= '<a onclick="deletekinhnghiem(' . $item->id . ')" class="btn btn-danger"> Xóa</a>';
            $result['content'] .= '</span>';
            $result['content'] .= '</div>';
            $result['content'] .= '<div class="form-body" id="kinhnghiem_edit' . $item->id . '" style="display: none">';
            $result['content'] .= '<div class="row col-md-12">';
            $result['content'] .= '<div class="col-md-3">';
            $result['content'] .= '<div class="form-group">';
            $result['content'] .= '<label class="control-label">Công ty<span class="require">*</span></label>';
            $result['content'] .= '<input type="text" name="congty" id="congty_edit' . $item->id . '"';
            $result['content'] .= 'class="form-control" placeholder="Ví dụ: Công ty ABC"';
            $result['content'] .= 'value="' . $item->congty . '">';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '<div class="col-md-3">';
            $result['content'] .= '<div class="form-group">';
            $result['content'] .= '<label class="control-label">Quy mô</label>';
            $result['content'] .= '<input type="number" name="quymo" id="quymo_edit' . $item->id . '"';
            $result['content'] .= 'class="form-control" placeholder="Ví dụ: 50"';
            $result['content'] .= 'value="' . $item->quymo . '">';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '<div class="col-md-3">';
            $result['content'] .= '<div class="form-group">';
            $result['content'] .= '<label class="control-label">Lĩnh vực hoạt động của công ty</span></label>';
            $result['content'] .= '<input type="text" name="linhvuc" id="linhvuc_edit' . $item->id . '"';
            $result['content'] .= 'class="form-control" placeholder="Ví dụ: Lĩnh vực vông nghiệp"';
            $result['content'] .= 'value="' . $item->linhvuc . '">';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '<div class="col-md-3">';
            $result['content'] .= '<div class="form-group">';
            $result['content'] .= '<label class="control-label">Chức danh<span class="require">*</span></label>';
            $result['content'] .= '<input type="text" name="chucdanh"';
            $result['content'] .= 'id="chucdanh_kn_edit' . $item->id . '" class="form-control"';
            $result['content'] .= 'placeholder="Ví dụ: Kinh doanh quốc tế" value="' . $item->chucdanh . '">';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '<div class="row col-md-12">';
            $result['content'] .= '<div class="col-md-3">';
            $result['content'] .= '<div class="form-group">';
            $result['content'] .= '<label class="control-label">Ngày vào<span class="require">*</span></label>';
            $result['content'] .= '<input type="date" name="ngayvao" id="ngayvao_edit' . $item->id . '"';
            $result['content'] .= 'class="form-control" value="' . $item->ngayvao . '">';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '<div class="col-md-3">';
            $result['content'] .= '<div class="form-group">';
            $result['content'] .= '<label class="control-label">Ngày xin nghỉ việc<span';
            $result['content'] .= 'class="require">*</span></label>';
            $result['content'] .= '<input type="date" name="ngaynghi" id="ngaynghi_edit' . $item->id . '"';
            $result['content'] .= 'class="form-control" value="' . $item->ngaynghi . '">';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '<div class="col-md-6">';
            $result['content'] .= '<div class="form-group">';
            $result['content'] .= '<label class="control-label">Lý do nghỉ</label>';
            $result['content'] .= '<input type="text" name="lydo" id="lydo_edit' . $item->id . '"';
            $result['content'] .= 'class="form-control" value="' . $item->lydo . '">';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '<div class="col-md-6">';
            $result['content'] .= '<div class="form-group">';
            $result['content'] .= '<label class="control-label">Chi tiết công việc</label>';
            $result['content'] .= '<textarea type="text" name="chitiet" id="chitiet_edit' . $item->id . '"';
            $result['content'] .= 'class="form-control" rows="3">' . $item->chitiet . '</textarea>';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '<div class="col-md-6">';
            $result['content'] .= '<div class="form-group">';
            $result['content'] .= '<label class="control-label">Mô tả</label>';
            $result['content'] .= '<textarea type="text" name="mota" id="mota_edit' . $item->id . '"';
            $result['content'] .= 'class="form-control" rows="3">' . $item->chitiet . '</textarea>';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '<div class="row">';
            $result['content'] .= '<button onclick="huyeditkinhnghiem(' . $item->id . ')"';
            $result['content'] .= 'class="btn btn-sm btn-secondary btn-lg pull-right"';
            $result['content'] .= 'style="margin-left:2%;background-color: rgba(128, 128, 128, 0.507)"> Hủy</button>';
            $result['content'] .= '<button onclick="updatekinhnghiem(' . $item->id . ')"';
            $result['content'] .= 'class="btn btn-sm btn-info btn-lg pull-right" style="margin-left:1px">Lưu</button>';
            $result['content'] .= '</div>';
            $result['content'] .= '</div>';
            $result['content'] .= '</td>';
            $result['content'] .= '</tr>';
        }
        $result['content'] .= '</table>';

        return $result;
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
        $capbac = capbac::all();

        return view('admin.ungvien.edit')
            ->with('model', $model)
            ->with('ungvien', $ungvien)
            ->with('ungvienhocvan', $ungvienhocvan)
            ->with('ungvienkinhnghiem', $ungvienkinhnghiem)
            ->with('danhmuc', $danhmuc)
            ->with('dmtrinhdokythuat', $dmtrinhdokythuat)
            ->with('capbac', $capbac)
            ->with('baocao', getdulieubaocao());
    }

    public function updatecoban(Request $request)
    {
        $inputs = $request->all();

        $model_user = [
            'name' => $inputs['hoten'],
            'status' => $inputs['status'],
        ];
        if ($inputs['checkpassword'] == true) {
            $model_user['password'] = Hash::make($inputs['password']);
        }

        //    User::find($inputs['user'])->update($model_user);

        $data_ungvien = [
            'user' => $inputs['user'],
            // 'avatar' => $inputs['avatar'],
            'hoten' => $inputs['hoten'],
            'gioitinh' => $inputs['gioitinh'],
            'ngaysinh' => $inputs['ngaysinh'],
            'phone' => $inputs['phone'],
            'tinh' => $inputs['tinh'],
            'huyen' => $inputs['huyen'],
            'xa' => $inputs['xa'],
            'address' => $inputs['address'],
            'capbac' => $inputs['capbac'],
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
        ungvien::where('user', $inputs['user'])->update($data_ungvien);

        $result['status'] = 'success';
        $result['content'] = '<p> Đã Lưu thông tin </p>';
        $result['message'] = "Đã lưu thông tin ";
        $result['user'] = $inputs['user'];

        return  response($result);
    }
}
