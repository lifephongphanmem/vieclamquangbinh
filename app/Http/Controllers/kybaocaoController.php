<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmdonvi;
use App\Models\danhsach;
use App\Models\kybaocao;
use DateTime;
use Illuminate\Http\Request;

class kybaocaoController extends Controller
{
    public function index(Request $request)
    {
     
        $inputs = $request->all();
        $donvi = danhmuchanhchinh::join('dmdonvi', 'dmdonvi.madiaban', 'danhmuchanhchinh.id')
        ->select('dmdonvi.madv', 'dmdonvi.tendv', 'dmdonvi.madiaban', 'danhmuchanhchinh.name', 'danhmuchanhchinh.capdo')
        ->get();
        $a_kydieutra = array_column(danhsach::all()->toarray(), 'kydieutra', 'kydieutra');
        if (!isset($inputs['madiaban'])) {
            $inputs['madiaban'] = session('admin')->madiaban;
        }
        if (!isset($inputs['kydieutra'])) {
            $inputs['kydieutra'] = max($a_kydieutra) ;
        }
       
        $capdo = $donvi->where('madiaban', $inputs['madiaban'])->first()->capdo;
        $madv = array_column($donvi->where('madiaban', $inputs['madiaban'])->toarray(),'madv');
        
        $model = kybaocao::all();
        if ( isset($inputs['kydieutra']) ) {
            $model = $model->where('kydieutra',$inputs['kydieutra']);
        };

        if (isset($inputs['madiaban'] )) {
            if ($capdo == 'X') {
                $model = $model->whereIn('madv_x', $madv);
            }
            if ($capdo == 'H') {
                $model = $model->whereIn('madv_h', $madv);
            }
            if ($capdo == 'T') {
                $model = $model->whereIn('madv_t', $madv);
            }
        };
        $model = $model->sortByDesc('id');
        return view('admin.kybaocao.index')
            ->with('model', $model)
            ->with('inputs', $inputs)
            ->with('capdo', $capdo)
            ->with('a_kydieutra', $a_kydieutra)
            ->with('donvi', $donvi)
            ->with('baocao', getdulieubaocao());
    }

    public function store(Request $request)
    {
        $input = $request;
        kybaocao::create([
            'kydieutra' => $input['kydieutra'],
            'madv_x' => $input['madv'],
            'trangthai_x' => 'cc',
        ]);
        return redirect('kybaocao?madiaban='. $input['madiaban'].'&kydieutra='. $input['kdt']);
    }

    public function delete($id)
    {
        kybaocao::find($id)->delete();
        return redirect('kybaocao');
    }

    public function gui(Request $request)
    {
        $input = $request->all();
        $madb = dmdonvi::where('madv',$request->madv)->first();
        $maqg = danhmuchanhchinh::find($madb->madiaban);
        $id_cqtiepnhan = danhmuchanhchinh::where('maquocgia',$maqg->parent)->first();
        $cqtiepnhan = dmdonvi::where('madiaban',$id_cqtiepnhan->id)->first();
        $capdo = $id_cqtiepnhan->capdo;
        
        $thoidiem = date('Y-m-d H:i:s');
        if ($capdo == 'H') {
            kybaocao::find($request->id)->Update([
                'noidung' => $request->noidung,
                'trangthai_x' => 'dc',
                'trangthai_h' => 'cc',
                'cqtiepnhan_x' => $cqtiepnhan->madv,
                'madv_h' => $cqtiepnhan->madv,
                'thoidiem_x' => $thoidiem,
            ]);
        }
        if ($capdo == 'T') {
            kybaocao::find($request->id)->Update([
                // 'noidung' => $request->noidung,
                'trangthai_t' => 'cd',
                'trangthai_h' => 'dc',
                'cqtiepnhan_h' => $cqtiepnhan->madv,
                'madv_t' => $cqtiepnhan->madv,
                'thoidiem_h' => $thoidiem,
            ]);
        }
        return redirect('kybaocao?madiaban=' . $input['madiaban'] . '&kydieutra=' . $input['kdt']);
    }

    public function tralai(Request $request)
    {
        $input = $request->all();
        $thoidiem = date('Y-m-d H:i:s');
        if ($request->capdo == 'T') {
            kybaocao::find($request->id)->Update([
                'lydo_h' => $request->lydo,
                'trangthai_t' => null,
                'thoidiem_t' => $thoidiem,
                'trangthai_h' => 'btl',
                'madv_t' => null,
            ]);
        }
        if ($request->capdo == 'H') {
            kybaocao::find($request->id)->Update([
                'lydo_x' => $request->lydo,
                'trangthai_h' => null,
                'thoidiem_h' => $thoidiem,
                'trangthai_x' => 'btl',
                'madv_h' => null,
                'thoidiem_t' => null,
                'lydo_h' => null,
            ]);
        }

        return redirect('kybaocao?madiaban=' . $input['madiaban'] . '&kydieutra=' . $input['kdt']);
    }

    public function duyet(Request $request)
    {
        kybaocao::find($request->id)->Update([
            'trangthai_t' => 'dd',
            'thoidiem_t' => date('Y-m-d H:i:s'),
        ]);
        return redirect('kybaocao');
    }
    public function huyduyet(Request $request)
    {
        kybaocao::find($request->id)->Update([
            'trangthai_t' => 'hd',
            'thoidiem_t' => date('Y-m-d H:i:s'),
        ]);
        return redirect('kybaocao');
    }
}
