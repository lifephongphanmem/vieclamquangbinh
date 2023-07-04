@extends('main_baocao')
@section('content')

    <p id='data_header' style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">BÁO CÁO CHI TIẾT DANH SÁCH ĐĂNG KÝ TÌM VIỆC </p>
    <p id='data_body' style="text-align: center;font-style: italic;"> Từ ngày {{getDayVn($input['tungay'])}} đến ngày {{getDayVn($input['denngay'])}} </p>
    <p style="text-align: center;font-style: italic;"></p>

    <table id='data_body1' cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Số cmnd/cccd</th>
                <th>Địa chỉ đăng ký thường trú</th>
                <th>Trình độ giáo dục</th>
                <th>Trình độ CMKT</th>
                <th>Công việc mong muốn</th>
                <th>Tên doanh nghiệp</th>
                <th>Phiên</th>
                <th>Thời điểm</th>
            </tr>

            
        </thead>

        <tbody>

            @foreach($model as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->hoten }}</td>
                    <td>{{ getDayVn( $item->ngaysinh) }}</td>
                    <td>{{ $item->cccd }}</td>
                    <td>{{ $item->thuongtru }}</td>
                    <td>{{ $item->tengdpt }}</td>
                    <td>{{ $item->tentdkt }}</td>
                    <td>{{ $item->tencongviec }}</td>         
                    <td>{{ $item->tendn }}</td>     
                    <td>{{ $item->phiengd }}</td>     
                    <td>{{ getDayVn($item->thoidiem) }}</td>          
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
