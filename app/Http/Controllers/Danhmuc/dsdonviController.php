<?php

namespace App\Http\Controllers\Danhmuc;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc\dsdiaban;
use App\Models\Danhmuc\dsdonvi;
use Illuminate\Http\Request;

class dsdonviController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model=dsdiaban::all();
        $m_donvi=dsdonvi::all();
        foreach ($model as $chitiet) {
            $chitiet->sodonvi = $m_donvi->where('madiaban', $chitiet->madiaban)->count();
        }

        return view('danhmuc.dsdonvi.index')
                ->with('model',$model);
    }


    public function DanhSach(Request $request)
    {
        // if (!chkPhanQuyen('dsdonvi', 'danhsach')) {
        //     return view('errors.noperm')->with('machucnang', 'dsdonvi');
        // }
        $inputs = $request->all();
        // $inputs['url'] = static::$url;
        $inputs['tendiaban'] = dsdiaban::where('madiaban', $inputs['madiaban'])->first()->tendiaban ?? '';
        $m_diaban = dsdiaban::where('madiaban', $inputs['madiaban'])->first();
        $model = dsdonvi::where('madiaban', $inputs['madiaban'])->get();
        // $m_taikhoan = dstaikhoan::all();
        // foreach ($model as $chitiet) {
        //     $chitiet->sotaikhoan = $m_taikhoan->where('madonvi', $chitiet->madonvi)->count();
        // }
        // $a_nhomchucnang = array_column(dsnhomtaikhoan::all()->toArray(), 'tennhomchucnang', 'manhomchucnang');
        // $a_cumkhoi = array_column(dscumkhoi::all()->toArray(), 'tencumkhoi', 'macumkhoi');
        return view('danhmuc.dsdonvi.danhsach')
            ->with('model', $model)
            ->with('m_diaban', $m_diaban)
            // ->with('a_nhomchucnang', $a_nhomchucnang)
            // ->with('a_cumkhoi', $a_cumkhoi)
            ->with('inputs', $inputs)
            ->with('pageTitle', 'Danh sách đơn vị');
    }

    public function create(Request $request)
    {
        // if (!chkPhanQuyen('dsdonvi', 'thaydoi')) {
        //     return view('errors.noperm')->with('machucnang', 'dsdonvi');
        // }
        $inputs = $request->all();
        //$modeldvql = DSDonVi::where('tonghop', '1')->get();
        $model = new dsdonvi();
        $model->madonvi = null;
        $model->madiaban = $inputs['madiaban'];
        return view('danhmuc.dsdonvi.them')
            ->with('model', $model)
            ->with('pageTitle', 'Tạo mới thông tin đơn vị');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
