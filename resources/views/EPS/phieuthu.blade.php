@extends('main_baocao')
@section('content')
    <table id='data_header' width="96%" cellspacing="0" cellpadding="8"
        style="margin:0 auto 20px; text-align: center;font-size:12px">
        <tr style="height: 60px">
            {{-- <td width="80%" style="vertical-align: top;"> --}}
                <td style="vertical-align: top;text-align: left">
                    <p>Đơn vị: Trung tâm DVVL Quảng Bình</p>
                    <p>Mã QHNS : 1037235.......... </p>
                </td>

            {{-- </td> --}}
            <td style="vertical-align: center">
                <b>Mẫu số: C40-BB</b>
                <p  style="text-align: center;font-style: italic;">(Ban hành kèm theo Thông tư số 107/2017/TT-BTC<br>
                    ngày 10/10/2017 của Bộ Tài chính)
                
                </p>
            </td>
        </tr>
    </table>
    <table id='data_body' width="96%" cellspacing="0" cellpadding="8"
    style="margin:0 auto 20px; text-align: center;font-size:12px">
        <tr>
            <td></td>
            <td style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;"> phiếu thu</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center;font-style: italic;"> Ngày .......tháng .......năm ....... <br><br>Số:............</td>
            <td>Quyển số:.....</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Nợ:............<br>Có:.............</td>
        </tr>
    </table>
    {{-- <p id='data_body' style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">phiếu thu
    </p>
    <p id='data_body1' style="text-align: center;font-style: italic;">Ngày .......tháng .......năm ....... <br><br>Số:.............
    </p> --}}
    <table id='data_body2' cellspacing="0" cellpadding="0" style="font-size:12px">

        <tr>
            <td style="text-align:left">Họ và tên người nộp tiền: &ensp; {{ $model->hoten }}</td>
        </tr>
        <tr>
            <td style="text-align:left">Địa chỉ: &ensp;
                {{ $model->thonxom }}&ensp;-&ensp; {{ $model->xa }}&ensp;-&ensp; {{ $model->huyen }}&ensp;-&ensp;
                {{ $model->tinh }} </td>
        </tr>
        <tr>
            <td style="text-align:left">Nội dung: 	..................................................................................</td>
        </tr>
        <tr>
            <td style="text-align:left">Số tiền: 	..............................................................................VNĐ<br>
                (viết bằng chữ): 	........................................................................
            </td>
        </tr>
        <tr>
            <td style="text-align:left">Kèm theo: 	..............................................................................
            </td>
        </tr>
    </table>

    <table id='data_footer' width="96%" cellspacing="0" height cellpadding="0"
        style="margin: 20px auto;text-align: center; height:200px;font-size:12px">
        <tr>
            <td width="40%" style="text-align: left; vertical-align: top;">
                <b>THỦ TRƯỞNG ĐƠN VỊ</b><br>
                <i>(Ký, họ tên, đóng dấu)</i>
            </td>
            <td width="40%" style="text-align: left; vertical-align: top;">
                <b>KẾ TOÁN TRƯỞNG</b><br>
                <i>(Ký, họ tên)</i>
            </td>
            <td style="vertical-align: top;">
                <b>NGƯỜI LẬP</b><br>
                <i>(Ký, họ tên)</i>
            </td>
        </tr>
    </table>
@stop
