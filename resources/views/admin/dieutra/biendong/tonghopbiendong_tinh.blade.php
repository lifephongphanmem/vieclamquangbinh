@extends('main_baocao')

@section('content')
<table id="data_header" width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td></td>
        <td class="text-right" style="font-style:italic"></td>
    </tr>
        <tr>
            <td width="40%" style="vertical-align: top;">

                <p>Tỉnh: Quảng Bình</p>
                {{-- <p>{{$m_donvi->huyen}}</p>
                <p>{{$m_donvi->name}}</p> --}}
                <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

            </td>
            {{-- <td style="vertical-align: top;">
                <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                    Độc lập - Tự do - Hạnh phúc</b>
                <hr style="color: black;width: 15%;vertical-align: top; margin-top: 2px">
            </td> --}}
        </tr>
        {{-- <tr>
            <td>Số: ......../BC-</td>
            <td style="text-align: right"><i style="margin-right: 40%;">Quảng Bình, ngày .... tháng .... năm ....</i></td>
        </tr> --}}
    </table>
    <p id='data_body' style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;margin-bottom:10px;">TỔNG HỢP BIẾN ĐỘNG NHÂN KHẨU<br>
    </p>

    <table id="data_body1" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th rowspan="2" width='1%'>TT</th>
                <th rowspan="2" width='15%'>Tên đơn vị </th>
                <th colspan="4" style="width:10%">Biến động<br></th>
                {{-- <th  width='10%'>Thời gian </th> --}}
            </tr>
            <tr>
                <th>Tổng biến động</th>
                <th>Nhận từ excel</th>
                <th>Báo tăng</th>
                <th>Cập nhật thông tin</th>
            </tr>
        </thead>
        @foreach ($m_huyen as $key=>$ct )
        <?php $id_xa=array_column(getiDxa($ct->maquocgia)->toarray(),'id') ?>
            <tr class="text-center">
                <td>{{++$key}}</td>
                <td class="text-left">{{$ct->name}}</td>
                <td>{{dinhdangso(count($model->wherein('user',$id_xa)))}}</td>
                <td>{{dinhdangso(count($model->wherein('user',$id_xa)->where('type','import')))}}</td>
                <td>{{dinhdangso(count($model->wherein('user',$id_xa)->where('type','baotang')))}}</td>
                <td>{{dinhdangso(count($model->wherein('user',$id_xa)->where('type','updateinfo')))}}</td>
            </tr>
        @endforeach
            <tr style="font-weight:bold" class="text-center">
                <td></td>
                <td>Tổng</td>
                <td>{{dinhdangso(count($model))}}</td>
                <td>{{dinhdangso(count($model->where('type','import')))}}</td>
                <td>{{dinhdangso(count($model->where('type','baotang')))}}</td>
                <td>{{dinhdangso(count($model ->where('type','updateinfo')))}}</td>
            </tr>
        </tbody>
    </table>
@stop
