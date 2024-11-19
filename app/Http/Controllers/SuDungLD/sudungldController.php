<?php

namespace App\Http\Controllers\SuDungLD;

use App\Http\Controllers\Controller;
use App\Models\SuDungLD\sudunglaodong;
use App\Models\SuDungLD\sudunglaodong_vitri;
use Illuminate\Http\Request;

class sudungldController extends Controller
{
    public function ThongTin(Request $request)
    {
        $inputs = $request->all();
        $model = sudunglaodong::where('company', $inputs['company'])->get();
        foreach ($model as $ct) {
            $m_vitri = sudunglaodong_vitri::where('machucnang', $ct->machucnang)->get();
            $ct->sovitri = count($m_vitri);
        }
        $a_thoihan = array(
            '0' => 'Ngắn hạn',
            '1' => 'Dài hạn'
        );
        $a_thoigian = array(
            '0' => 'Toàn thời gian',
            '1' => 'Bán thời gian',
            '2' => 'Theo ca'
        );
        return view('admin.nhucausudungld.index', compact('model', 'a_thoihan', 'a_thoigian'))
            ->with('baocao', getdulieubaocao())
            ->with('pageTitle', 'Nhu cầu sử dụng lao động');
    }

    public function Them(Request $request)
    {
        $inputs = $request->all();
        $inputs['machucnang'] = getdate()[0];

        $tmodel = new sudunglaodong;
        $td = $tmodel->insert($inputs['machucnang']);

        if (isset($td)) {
            $vtmodel = new sudunglaodong_vitri;
            $vts = $vtmodel->inserts($inputs['machucnang']);
        }

        return redirect('/SuDungLD/ThongTin?company='.$inputs['company']);
    }
}
