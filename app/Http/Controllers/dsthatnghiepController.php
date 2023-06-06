<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc\danhmuchanhchinh;
use App\Models\Danhmuc\dmchucvu;
use App\Models\Danhmuc\dmdonvi;
use App\Models\Danhmuc\dmtrinhdokythuat;
use App\Models\Danhmuc\nghecongviec;
use App\Models\Danhmuc\nguyennhanthatnghiep;
use App\Models\dsthatnghiep;
use Illuminate\Http\Request;

class dsthatnghiepController extends Controller
{
    public function index(Request $request)
    {
       
        $input = $request->all();
     
        if (!isset($input['kydieutra'])) {
            $input['kydieutra'] = date('Y-m');
        }
        if (!isset($input['huyen'])) {
            $input['huyen'] = 0;
        }
        if (!isset($input['xa'])) {
          
            $input['xa'] = 0;
        }
 
        $dsthatnghiep = dsthatnghiep::all();
        $huyen = danhmuchanhchinh::where('capdo', 'H')->get();
        $kydieutra = array_column($dsthatnghiep->sortByDesc('id')->toarray(),'kydieutra', 'kydieutra');  
        $model = $dsthatnghiep->where('kydieutra', $input['kydieutra']);
        if ($input['huyen'] != '0') {
            $model = $model->where('huyen', $input['huyen']);
            $xa = danhmuchanhchinh::where('parent', $input['huyen'])->get();
        }else{
            $xa = danhmuchanhchinh::where('maquocgia' ,$input['xa'])->get();
        }

        if ($input['xa'] != '0') {
            $mxa = danhmuchanhchinh::where('maquocgia', $input['xa'])->first();
         
            if($mxa->parent == $input['huyen']){
           
                $model = $model->where('xa', $input['xa']);
            }else{
    
                $input['xa'] = 0;
       
            }        

        }

        return view('admin.dsthatnghiep.index')
        ->with('model',$model)
        ->with('input', $input)
        ->with('kydieutra', $kydieutra)
        ->with('huyen', $huyen)
        ->with('xa', $xa)
        ->with('baocao', getdulieubaocao());
    }

    public function create()
    {
        $nghecongviec = nghecongviec::all();
        $trinhdocmky = dmtrinhdokythuat::all();
        $dmchucvu = dmchucvu::all();
        $nguyennhan = nguyennhanthatnghiep::all();

        $dmhanhchinh = danhmuchanhchinh::all();

        return view('admin.dsthatnghiep.create')
        ->with('nghecongviec', $nghecongviec)
        ->with('trinhdocmky', $trinhdocmky)
        ->with('dmchucvu', $dmchucvu)
        ->with('dmhanhchinh', $dmhanhchinh)
        ->with('nguyennhan', $nguyennhan)
        ->with('baocao', getdulieubaocao());
    }

    public function store(Request $request)
    {
        $input = $request->all();
        for ($i=0; $i < $input['quantity']; $i++) { 
            dsthatnghiep::create([
                'kydieutra' => $input['kydieutra'],
                'hoten' => $input['hoten'][$i],
                'ngaysinh' => $input['ngaysinh'][$i],
                'cccd' => $input['cccd'][$i],
                'bhxh' => $input['bhxh'][$i],
                'diachi' => $input['diachi'][$i],
                'nguyennhan' => $input['nguyennhan'][$i],
                'trinhdocmkt' => $input['trinhdocmkt'][$i],
                'nghenghiep' => $input['nghenghiep'][$i],
                'nghecongviec' => $input['nghecongviec'][$i],
            ]);
        }
        return redirect('/dsthatnghiep');
    }

    public function edit(Request $request)
    {

        $model = dsthatnghiep::find($request->id);
        $trinhdocmky = dmtrinhdokythuat::all();
        $nghecongviec = nghecongviec::all();
        $dmchucvu = dmchucvu::all();
        $nguyennhan = nguyennhanthatnghiep::all();
        $dmhanhchinh = danhmuchanhchinh::all();
        return view('admin.dsthatnghiep.edit')
        ->with('model', $model)
        ->with('trinhdocmky', $trinhdocmky)
        ->with('nghecongviec', $nghecongviec)
        ->with('dmchucvu', $dmchucvu)
        ->with('nguyennhan', $nguyennhan)
            ->with('dmhanhchinh', $dmhanhchinh)
        ->with('baocao', getdulieubaocao());
    }

    public function update(Request $request)
    {
        $input = $request->all();
        dsthatnghiep::find($input['id'])->update($input);
        return redirect('/dsthatnghiep');
    }

    public function delete( $id)
    {
        dsthatnghiep::find($id)->delete();
        return redirect('/dsthatnghiep');
    }

    public function bcchitiet(Request $request)
    {
        $danhmuchanhchinh = danhmuchanhchinh::all();
        $model = dsthatnghiep::leftJoin('dmtrinhdokythuat', 'dmtrinhdokythuat.stt', 'dsthatnghiep.trinhdocmkt')
            ->leftJoin('dmchucvu', 'dmchucvu.id', 'dsthatnghiep.nghenghiep')
            ->leftJoin('nghecongviec', 'nghecongviec.id', 'dsthatnghiep.nghecongviec')
            ->leftJoin('nguyennhanthatnghiep', 'nguyennhanthatnghiep.id', 'dsthatnghiep.nguyennhan')
            ->select('dsthatnghiep.*','dmtrinhdokythuat.tentdkt', 'dmchucvu.tencv','nghecongviec.tendm', 'nguyennhanthatnghiep.tennn' )
            ->get();

                                
        foreach($model as $item)
        {
            foreach($danhmuchanhchinh as $dm)
            {
                // $item->adress = $item->daichi . ' - ' . $dm->name . ' - ' . $item->huyen;
                if ($item->xa == $dm->maquocgia) {
                    $xa = $dm->name;
                }
                if ($item->huyen == $dm->maquocgia) {
                    $huyen = $dm->name;
                }
            }
            
            $item->adress = $item->diachi .' - '. $xa .' - ' . $huyen;

        }


        return view('admin.dsthatnghiep.bcchitiet')
        ->with('model',$model)
        ->with('pageTitle' ,'Báo cáo chi tiết danh sách thất nghiệp');
    }

    public function bctonghop(Request $request)
    {
        $model = dsthatnghiep::where('kydieutra', $request->kydieutra)->get();

        $trinhdocmky = dmtrinhdokythuat::all();
        $nghecongviec = nghecongviec::all();
        $dmchucvu = dmchucvu::all();
        $nguyennhan = nguyennhanthatnghiep::all();
        
        $count = $model->count();
        return view('admin.dsthatnghiep.bctonghop')
        ->with('model', $model)
            ->with('trinhdocmky', $trinhdocmky)
            ->with('nghecongviec', $nghecongviec)
            ->with('dmchucvu', $dmchucvu)
            ->with('nguyennhan', $nguyennhan)
            ->with('count', $count)
            ->with('pageTitle', 'Báo cáo tổng hợp người thất nghiệp');
    }

    public function importexcel(Request $request)
    {

        $input = $request->all();
        //  dd($input['import_file']);
        $model = new dsthatnghiep();
        // $request->validate([
        //    'import_file' => 'required|mimes:xlsx, csv, xls'
        // ]);

        $model->thatnghiepimport($input);

        return redirect('/dangkytimviec');
    }
}
