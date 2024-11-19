@extends('main_baocao')

@section('content')

    <table id="data_header" width="96%" cellspacing="0" cellpadding="8" style="font-size: 12px">

        <tr>
            <td colspan="2">
                <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">THÔNG TIN NGƯỜI ĐẠI DIỆN DOANH NGHIỆP {{$model->name}}</p>
            </td>
        </tr>
    </table>
    <table id="data_body" cellspacing="0" cellpadding="0" style="font-size: 12px">
        <tr>
            <td style="text-align: left"><b>1.Họ và tên:</b>    </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>2.Mail:</b> {{$model->email}}  </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>3.Ngày sinh:</b>  </td>

        </tr>
        <tr>
            <td style="text-align: left"><b>4.Giới tính:</b>
            </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>5. Số CCCD/CMND: </b>  </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>6. Số điện thoại: </b>  </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>7.Nơi ở hiện tại: </b> </td>
        </tr>        

    </table>

@stop
