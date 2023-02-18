@extends('main_baocao')

@section('content')
<table id="data_header" width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td></td>
        <td class="text-right" style="font-style:italic">Mẫu số 02</td>
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
    <p id='data_body' style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;margin-bottom:10px;">DANH SÁCH CHI TIẾT NHÂN KHẨU LỖI<br>
    </p>

    <table id="data_body1" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th rowspan="2" width='2%'>TT hộ</th>
                <th rowspan="2" width='2%'>TT</th>
                <th rowspan="2" width='15%'>Họ và tên </th>
                <th colspan="2"  style="width:10%">Ngày tháng năm sinh<br></th>
                <th rowspan="2" width='10%'>Số CCCD/CMND </th>
                <th rowspan="2" width='10%'>Mã số BHXH/BHYT </th>
                <th rowspan="2" style="width:20%">Nơi đăng ký thường trú </th>
                <th rowspan="2">Loại lỗi</th>
            </tr>
            <tr>
                <th>Nam</th>
                <th>Nữ</th>
            </tr>
            <tr >
                @for ($i=1;$i<10;$i++)
                    <td style="font-weight:bold; text-decoration: underline;font-style: italic;text-align: center">{{$i}}</td>
                @endfor
            </tr>

        </thead>
        <?php $stt = 1;
        $stt_ho = 1; ?>
        <tbody>
            @foreach ($model as $item)
                <tr>
                    @if ($item->mqh == 'CH')
                        <td style="text-align: center ; vertical-align: middle">{{ $stt_ho++ }}</td>
                    @else
                        <td></td>
                    @endif

                    <td style="text-align: center ; vertical-align: middle">{{ $stt++ }}</td>
                    <td style="vertical-align: middle">{{ $item->hoten }}</td>

                    @if ($item->gioitinh == 'Nam')
                        <td style="text-align: center ; vertical-align: middle">{{ $item->ngaysinh }}</td>
                    @else
                        <td></td>
                    @endif
                    @if ($item->gioitinh == 'Nữ')
                        <td style="text-align: center ; vertical-align: middle">{{ $item->ngaysinh }}</td>
                    @else
                        <td></td>
                    @endif

                    <td style="text-align: center ; vertical-align: middle">{{ $item->cccd }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->bhxh }}</td>
                    <td style="vertical-align: middle">{{ $item->thuongtru }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->loailoi }}</td>

                    {{-- @if ($item->mqh == 'CH')
                        <td style="text-align: center ; vertical-align: middle">{{ $item->mqh }}</td>
                    @else
                        <td></td>
                    @endif --}}

                </tr>
            @endforeach

        </tbody>
    </table>
@stop
