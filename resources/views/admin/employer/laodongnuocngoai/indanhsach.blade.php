@extends('main_baocao')

@section('content')



    <table id="data_body" border="1" cellspacing="0" cellpadding="0">
       
  
            <tr style="border-top: none;border-left: none;border-right: none;">
                <th colspan="12" style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;padding-bottom:2rem;"> DANH SÁCH NGƯỜI LAO ĐỘNG NƯỚC NGOÀI</th>
            </tr>
            <tr>
                <th rowspan="2" width='2%'>STT</th>
                <th rowspan="2" width='15%'>Họ và tên </th>
                <th colspan="2" style="width:10%">Ngày tháng năm sinh<br></th>
                <th rowspan="2">Số hộ chiếu</th>
                <th rowspan="2">Quốc tịch</th>
                <th rowspan="2">Mã số BHXH/BHYT </th>
                <th rowspan="2"> Trình độ </th>
                <th rowspan="2">Nghề nghiệp</th>
                <th rowspan="2">Loại hoạt động lao động</th>
                <th rowspan="2">Chức vụ</th>
                <th rowspan="2">Công ty</th>
            </tr>
            <tr>
                <th>Nam</th>
                <th>Nữ</th>
            </tr>
 
            @foreach ($model as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->hoten }}</td>
                    <td>{{ $item->gioitinh == 'Nam' || $item->gioitinh == 'nam' ? $item->ngaysinh : '' }}</td>
                    <td>{{ $item->gioitinh == 'Nữ' || $item->gioitinh == 'nữ' || $item->gioitinh == 'Nu' || $item->gioitinh == 'nu' ? $item->ngaysinh : '' }}</td>
                    <td>{{ $item->cmnd }}</td>
                    <td>{{ $item->nation }}</td>
                    <td>{{ $item->trinhdocmkt }}</td>
                    <td>{{ $item->nghenghiep }}</td>
                    <td>{{ $item->linhvucdaotao }}</td>
                    <td>{{ $item->loaihdld }}</td>
                    <td>{{ $item->chucvu }}</td>
                    <td>{{ $item->ctyname }}</td>

                </tr>
            @endforeach

    </table>

@stop
