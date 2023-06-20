@extends('main_baocao')
@section('content')

    <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">BÁO CÁO CHI TIẾT DANH SÁCH ĐĂNG KÝ TÌM VIỆC </p>
    
    <p style="text-align: center;font-style: italic;"></p>

    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
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
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
