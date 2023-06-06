@extends('main_baocao')
@section('content')

    <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">BÁO CÁO CHI TIẾT DANH SÁCH NGƯỜI THẤT NGHIỆP </p>
    
    <p style="text-align: center;font-style: italic;">{{ $model->first()->kydieutra }}</p>

    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Số cmnd/cccd</th>
                <td>Địa chỉ</td>
                <td>Trình độ CMKT</td>
                <td>Nghề nghiệp trước khi mất việc</td>
                <td>Nghề công việc</td>
                <th>Nguyên nhân</th>
            </tr>
        </thead>

        <tbody>

            @foreach($model as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->hoten }}</td>
                    <td>{{ getDayVn( $item->ngaysinh) }}</td>
                    <td>{{ $item->cccd }}</td>
                     <td>{{ $item->adress }}</td>
                    <td>{{ $item->tentdkt }}</td>
                    <td>{{ $item->tencv }}</td>
                    <td>{{ $item->tendm }}</td>
                    <td>{{ $item->tennn }}</td>               
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
