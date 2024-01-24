@extends('main_baocao')
@section('content')
    <table id='data_header' width="96%"
        style="text-align: center;font-size:17px;">
        <tr>
            <td style="vertical-align: top;text-align: left;width:60%">
                <p>Đơn vị: Trung tâm DVVL Quảng Bình</p>
                <p>Mã QHNS : 1037235.......... </p>
            </td>
            <td style="vertical-align: top">
                <p>
                    <b>Mẫu số: C40-BB</b>
                </p>
                <p style="text-align: center;font-style: italic;">(Ban hành kèm theo Thông tư số 107/2017/TT-BTC
                    ngày 10/10/2017 của Bộ Tài chính)

                </p>
            </td>
        </tr>
    </table>
    <table id='data_header1' width="96%"
        style="text-align: center;font-size:17px;line-height:1">
        <tr>
            <td style="text-align: center;font-weight: bold;font-size: 17px; text-transform: uppercase;width:80%"> phiếu thu</td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center;font-style: italic;width:80%"> Ngày .......tháng .......năm ....... <br>Số:............
            </td>
            <td>Quyển số:.....</td>
        </tr>
        <tr>
            <td width="80%"></td>
            <td>Nợ:............<br>Có:.............</td>
        </tr>
    </table>
    <table id='data_header2' style="font-size:17px">

        <tr>
            <td style="text-align:left">Họ và tên người nộp tiền:&nbsp;<b>{{ $model->hoten }}</b></td>
        </tr>
        <tr>
            <td style="text-align:left">Địa chỉ:&nbsp;<b>
                    {{ $model->thonxom }},&nbsp; {{ $model->xa }},&nbsp;{{ $model->huyen }},&nbsp;
                    {{ $model->tinh }}
                </b>
            </td>
        </tr>
        <tr>
            <td style="text-align:left">Nội dung:
                <b>{{$cauhinh->noidung}}</b></td>
        </tr>
        <tr>
            <td style="text-align:left">Số tiền:
               <b>{{$cauhinh->sotien}}&nbsp;VNĐ</b><br>
                (viết bằng chữ): <b>{{$cauhinh->st_vietchu}}</b>
            </td>
        </tr>
        <tr>
            <td style="text-align:left">Kèm theo:
                ..............................................................................
            </td>
        </tr>
    </table>
    <table id='data_body' width="96%" 
        style="margin: 20px auto;text-align: center;font-size:17px">
        <tr>
            <td width="40%" style="text-align: left; vertical-align: top;">
                <b>THỦ TRƯỞNG ĐƠN VỊ</b><br>
                <i>(Ký, họ tên, đóng dấu)</i><br><br><br><br><br>
            </td>
            <td width="40%" style="text-align: left; vertical-align: top;">
                <b>KẾ TOÁN TRƯỞNG</b><br>
                <i>(Ký, họ tên)</i><br><br><br><br><br>
            </td>
            <td style="vertical-align: top;">
                <b>NGƯỜI LẬP</b><br>
                <i>(Ký, họ tên)</i><br><br><br><br><br>
            </td>
        </tr>
    </table>
    <table id='data_body1'  style="margin: 20px auto;font-size:17px">
        <tr>
            <td width="25%" style="text-align: left; vertical-align: top;">
                Đã nhận đủ số tiền: <br>
            </td>
            <td style="text-align: left; vertical-align: top;">- Bằng số : <b>{{$cauhinh->sotien}} VNĐ</b><br>- Bằng chữ: <b>{{$cauhinh->st_vietchu}}./.</b></td>

        </tr>
    </table>
    <table id='data_body2' style="margin: 20px auto;height:200px;font-size:17px;">
        <tr>
            <td width="30%" style="text-align:center ; vertical-align: top;">
                <b>NGƯỜI NỘP</b><br><br><br><br><br><b>{{ $model->hoten }}</b>
            </td>
            <td width="30%" style="text-align: left; vertical-align: top;">
            </td>
            <td style="vertical-align: top;text-align:center">
                …….., ngày …. tháng....năm 2024<br>
                <b>THỦ QUỸ</b><br>
                <i>(Ký, họ tên)</i><br><br><br>
            </td>
        </tr>
    </table>


    {{-- <table id='data_body3' width="96%" 
        style="text-align: center;font-size:17px;line-height:5px">
        <tr>
            <td style="vertical-align: top;text-align: left;width:60%">
                <p>Đơn vị: Trung tâm DVVL Quảng Bình</p>
                <p>Mã QHNS : 1037235.......... </p>
            </td>

            <td style="vertical-align: top">
                <p>
                    <b>Mẫu số: C40-BB</b>
                </p>
                <p style="text-align: center;font-style: italic;">(Ban hành kèm theo Thông tư số 107/2017/TT-BTC
                    ngày 10/10/2017 của Bộ Tài chính)

                </p>
            </td>
        </tr>
    </table>
    <table id='data_body4' width="96%"
        style="text-align: center;font-size:17px;line-height:12px">
        <tr>
            <td style="text-align: center;font-weight: bold;font-size: 17px; text-transform: uppercase;width:80%"> phiếu thu</td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center;font-style: italic;width:80%"> Ngày .......tháng .......năm ....... <br>Số:............
            </td>
            <td>Quyển số:.....</td>
        </tr>
        <tr>
            <td width="80%"></td>
            <td>Nợ:............<br>Có:.............</td>
        </tr>
    </table>
    <table id='data_body5' style="font-size:17px">

        <tr>
            <td style="text-align:left">Họ và tên người nộp tiền:&nbsp;<b>{{ $model->hoten }}</b></td>
        </tr>
        <tr>
            <td style="text-align:left">Địa chỉ:&nbsp;<b>
                    {{ $model->thonxom }},&nbsp; {{ $model->xa }},&nbsp;{{ $model->huyen }},&nbsp;
                    {{ $model->tinh }}
                </b>
            </td>
        </tr>
        <tr>
            <td style="text-align:left">Nội dung:
                ..................................................................................</td>
        </tr>
        <tr>
            <td style="text-align:left">Số tiền:
                ..............................................................................VNĐ<br>
                (viết bằng chữ): ........................................................................
            </td>
        </tr>
        <tr>
            <td style="text-align:left">Kèm theo:
                ..............................................................................
            </td>
        </tr>
    </table>

    <table id='data_body6' width="96%"
        style="margin: 20px auto;text-align: center; height:200px;font-size:17px">
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
    <table id='data_footer' style="margin: 20px auto;font-size:17px">
        <tr>
            <td width="25%" style="text-align: left; vertical-align: top;">
                Đã nhận đủ số tiền: <br>
            </td>
            <td style="text-align: left; vertical-align: top;">- Bằng số : <b>680.000 VNĐ</b><br>- Bằng chữ: <b>Sáu trăm tám
                    mươi mốt ngàn đồng chẵn./.</b></td>

        </tr>
    </table>
    <table id='data_footer1' style="margin: 20px auto;height:200px;font-size:17px">
        <tr>
            <td width="30%" style="text-align:center ; vertical-align: top;">
                <b>NGƯỜI NỘP</b><br><br><br><br> <b>NGUYỄN VĂN AA </b>
            </td>
            <td width="30%" style="text-align: left; vertical-align: top;">
            </td>
            <td style="vertical-align: top;text-align:center">
                …….., ngày …. tháng....năm 2024<br>
                <b>THỦ QUỸ</b><br>
                <i>(Ký, họ tên)</i><br><br><br>
            </td>
        </tr>
    </table> --}}

@stop
