@extends('main_baocao')
@section('content')


    <p id="data_body" style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">danh sách lỗi</p>

    <table id="data_body1" cellspacing="0" cellpadding="0" border="1"
        style="margin: 20px auto; border-collapse: collapse;" id="data">
        <thead>
            <tr>
                <th>STT</th>
                <th>Đơn vị</th>
                <th> Họ tên </th>
                <th> CCCD </th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
            </tr>

        </thead>
        <tbody>
            <?php $i=1 ?>         
            @foreach ($ds as $key => $dm)
                <tr style="text-align: center">
                    <td>{{ $i++ }}</td>
                    <td>{{ $tendv[$dm->madv] }}</td>
                    <td>{{$dm->hoten }}</td>
                    <td>{{ $dm->cccd  }}</td>
                    <td>{{$dm->ngaysinh  }}</td>
                    <td>{{ $dm->diachi }}</td>
                   
                </tr>
            @endforeach

        </tbody>
    </table>
@stop
