@extends('main_baocao')

@section('content')
    <table id="data_header" class="header" width="96%" border="0" cellspacing="0" cellpadding="8"
        style="margin:0 auto 25px; text-align: center;">
        <tr>
            <td style="text-align: left;width: 60%">

            </td>
            <td style="text-align: center;">

            </td>
        </tr>
        <tr>
            <td style="text-align: left;width: 60%">
                <b>Đơn vị: {{ $m_dv['tendv'] }}</b>
            </td>
            <td style="text-align: center; font-style: italic">

            </td>
        </tr>
        <tr>
            <td style="text-align: left;width: 60%">
                <b>Mã đơn vị SDNS: {{ $m_dv->maqhns }}</b>
            </td>

            <td style="text-align: center; font-style: italic">

            </td>
        </tr>

        <tr>
            <td colspan="2" style="text-align: center; font-weight: bold; font-size: 20px;">
                DANH SÁCH NGƯỜI LAO ĐỘNG NƯỚC NGOÀI
            </td>
        </tr>
    </table>

    <table id="data_body" class="money" cellspacing="0" cellpadding="0" border="1"
        style="margin: 20px auto; border-collapse: collapse;font:normal 11px Times, serif;">
        <thead>
            <tr style="padding-left: 2px;padding-right: 2px">
                <th style="width: 5%;">S</br>T</br>T</th>
                <th style="width: 20%;">Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Quốc tịch</th>
                <th>Giới tính</th>
                <th>Số hộ chiếu</th>
                <th>Địa chỉ</th>
                <th>Vị trí</th>

            </tr>
        </thead>
        @foreach ($model as $key=>$val )
            <tr>
                <td>{{++$key}}</td>
                <td>{{$val->hoten}}</td>
                <td>{{$val->ngaysinh}}</td>
                <td>{{$val->nation}}</td>
                <td>{{$val->gioitinh}}</td>
                <td>{{$val->cmnd}}</td>
                <td> {{ $val->address }} {{ $val->xa }} {{ $val->huyen }}
                    {{ $val->tinh }}</td>
                    <td>{{$val->vitri}}</td>
            </tr>
        @endforeach
       

    </table>

    <table id="data_footer" class="header" width="96%" border="0" cellspacing="0" cellpadding="8"
        style="margin:20px auto; text-align: center;">

        <tr style="font-weight: bold">
            <td style="text-align: center;" width="50%">Người lập bảng</td>
            <td style="text-align: center;" width="50%">{{ $m_dv['cdlanhdao'] }}</td>
        </tr>
        <tr style="font-style: italic">
            <td style="text-align: center;" width="50%">(Ghi rõ họ tên)</td>
            <td style="text-align: center;" width="50%">(Ký tên, đóng dấu)</td>
        </tr>
        <tr>
            <td><br><br><br><br><br><br></td>
        </tr>

        <tr>
            <td style="text-align: center;" width="50%"></td>
            <td style="text-align: center;" width="50%"></td>
        </tr>
    </table>
@stop
