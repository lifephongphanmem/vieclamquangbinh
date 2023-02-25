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
            <tr style="font-weight:bold" class="text-center">
                <td>{{convert2Roman(++$key)}}</td>
                <td class="text-left">{{$ct->name}}</td>
                <td>{{dinhdangso(count($model->wherein('user',$id_xa)))}}</td>
                <td>{{dinhdangso(count($model->wherein('user',$id_xa)->where('type','import')))}}</td>
                <td>{{dinhdangso(count($model->wherein('user',$id_xa)->where('type','baotang')))}}</td>
                <td>{{dinhdangso(count($model->wherein('user',$id_xa)->where('type','updateinfo')))}}</td>

            </tr>
            <?php 
            $m_xa=$a_xa->where('parent',$ct->maquocgia);
            $i=1;
             ?>
            @foreach ($m_xa as $k=>$val )

            <?php $m_biendong=$model->where('user',$val->id);
           
            // dd($m_biendong)
            ?>
            <tr class="text-center">
                <td>{{$i++}}</td>
                <td class="text-left">{{$val->name}}</td>
                <td>{{dinhdangso(count($m_biendong))}}</td>
                <td>{{dinhdangso(count($m_biendong->where('type','import')))}}</td>
                <td>{{dinhdangso(count($m_biendong->where('type','baotang')))}}</td>
                <td>{{dinhdangso(count($m_biendong->where('type','updateinfo')))}}</td>
            </tr>
           

            @endforeach
        @endforeach
            {{-- @foreach ($model as $key=>$item)
                <tr>

                    <td style="text-align: center ; vertical-align: middle">{{ ++$key }}</td>
                    <td style="vertical-align: middle"><?php
                        switch ($item->type) {
                            case 'updateinfo':
                                echo 'Cập nhật thông tin';
                                break;
                            case 'baogiam':
                                echo 'Báo giảm';
                                break;
                            case 'baotang':
                                echo 'Báo tăng';
                                break;
                            case 'tamdung':
                                echo 'Tạm dừng';
                                break;
                            case 'kethuctamdung':
                                echo 'Kết thúc tạm dừng';
                                break;
                            case 'import':
                                echo 'Nhập từ file Excel';
                                break;
                            case 'nothing':
                                echo 'Không có biến động';
                                break;
                        } ?></td>
                    <td style="text-align: left ; vertical-align: middle">{{ $item->note }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->time }}</td>


                </tr>
            @endforeach --}}

        </tbody>
    </table>
@stop
