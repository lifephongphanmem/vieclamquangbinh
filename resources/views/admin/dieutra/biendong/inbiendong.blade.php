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
    <p id='data_body' style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;margin-bottom:10px;">DANH SÁCH BIẾN ĐỘNG<br>
    </p>

    <table id="data_body1" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th  width='2%'>TT</th>
                <th  width='15%'>Loại </th>
                <th  style="width:10%">Mô tả<br></th>
                <th  width='10%'>Thời gian </th>
            </tr>
        </thead>
            @foreach ($model as $key=>$item)
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
            @endforeach

        </tbody>
    </table>
@stop
