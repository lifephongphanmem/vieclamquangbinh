@extends('main_baocao')

@section('content')
<table id="data_header" width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        {{-- <td></td>
        <td class="text-right" style="font-style:italic">Mẫu số 02</td> --}}
    </tr>
        <tr>
            {{-- <td width="40%" style="vertical-align: top;">

                <p>Tỉnh: Quảng Bình</p>
                <p>{{$m_donvi->huyen}}</p>
                <p>{{$m_donvi->name}}</p>
                <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

            </td> --}}
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
    <p id='data_body' style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase">DANH SÁCH LAO ĐỘNG CHƯA CÓ THÔNG TIN<br>
    </p>
    {{-- <p id='data_body1' style="text-align: center;font-style: italic;font-size: 15px; margin-bottom:10px;">({{$inputs['tinhtrang'] == 4?'Sắp tốt nghiệp PTTH':$danhsachtinhtrangvl[$inputs['tinhtrang']]}})</p> --}}
    <table id="data_body2" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th >TT</th>
                <th >Họ và tên </th>
                <th >Ngày tháng năm sinh<br></th>
                <th>Số CCCD/CMND </th>
                <th >Mã số BHXH/BHYT </th>
                <th>Giới tính </th>
                <th>Nơi ở hiện nay</th>
                <th>Nghề nghiệp</th>
                <th>Nơi làm việc</th>
            </tr>

        </thead>

        <tbody>
            @foreach ($model as $item)
                <tr>


                    <td style="text-align: center ; vertical-align: middle">{{ $stt++ }}</td>
                    <td style="vertical-align: middle">{{ $item->hoten }}</td>

                    <td style="text-align: center ; vertical-align: middle">{{ getDayVn($item->ngaysinh) }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->cmnd }}</td>
                    <td style="vertical-align: middle">{{ $item->sobaohiem }}</td>
                    <td style="vertical-align: middle">
                        @if (in_array($item->gioitinh,['Nam','nam']))
                            Nam
                        @else
                            Nữ
                        @endif
                    </td>
                    <td style="vertical-align: middle">{{ $item->address }}</td>

                    <td style="text-align: center ; vertical-align: middle">{{ $item->uutien }}</td>
                   

                </tr>
            @endforeach

        </tbody>
    </table>
@stop
