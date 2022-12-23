@extends('main_baocao')
@section('custom-style')
@stop


@section('custom-script')

@stop

@section('content')
    <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">DANH SÁCH CHI TIẾT NHÂN KHẨU<br>
    </p>

    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th rowspan="2">TT hộ</th>
                <th rowspan="2">TT</th>
                <th rowspan="2">Họ và tên </th>
                <th colspan="2">Ngày tháng năm sinh<br></th>
                <th rowspan="2">Số CCCD/CMND </th>
                <th rowspan="2">Mã số BHXH/BHYT </th>
                <th rowspan="2">Nơi đăng ký thường trú </th>
                <th rowspan="2">Nơi ở hiện nay</th>
                <th rowspan="2">Đối tượng ưu tiên (Ghi theo mã số từ 1-6)</th>
                <th rowspan="2">Tên dân tộc thiểu số</th>
                <th rowspan="2">Trình độ GDPT cao nhất đạt được (Ghi theo mã số từ 1-4)</th>
                <th rowspan="2">Trình độ CMKT cao nhất (Ghi theo mã số từ 1-8)</th>
                <th rowspan="2">Chuyên ngành đào tạo (Ghi rõ)</th>
                <th rowspan="2">Tình trạng tham gia HĐKT (Ghi theo mã số từ 1-3)</th>
                <th rowspan="2">Người có việc làm (Ghi theo mã số từ 1-5)</th>
                <th rowspan="2">Công việc cụ thể đang làm (ghi rõ)</th>
                <th rowspan="2">Tham gia BHXH Ghi theo mã số từ 1-3</th>
                <th rowspan="2">HĐLĐ (Ghi theo mã số từ 1-3)</th>
                <th rowspan="2">Nơi làm việc (ghi rõ tên cơ quan/đơn vị …)</th>
                <th rowspan="2">Loại hình nơi làm việc (Ghi theo mã số từ 1-11)</th>
                <th rowspan="2">Địa chỉ nơi làm việc </th>
                <th rowspan="2">Người thất nghiệp</th>
                <th rowspan="2">Thời gian thất nghiệp (Ghi theo mã số từ 1-3)</th>
                <th rowspan="2">Không tham gia HĐKT (Ghi theo mã số từ 1-5)</th>
                <th rowspan="2">MQH</th>
                <th rowspan="2">MQH</th>
            </tr>
            <tr>
                <th>Nam</th>
                <th>Nữ</th>
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
                    <td style="vertical-align: middle">{{ $item->diachi }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->uutien }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->dantoc }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->trinhdogiaoduc }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->chuyenmonkythuat }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->chuyennganh }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->tinhtranghdkt }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->nguoicovieclam }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->congvieccuthe }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->thamgiabhxh }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->hdld }}</td>
                    <td style="vertical-align: middle">{{ $item->noilamviec }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->loaihinhnoilamviec }}</td>
                    <td style="vertical-align: middle">{{ $item->diachinoilamviec }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->thatnghiep }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->thoigianthatnghiep }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->khongthamgiahdkt }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->mqh }}</td>

                    @if ($item->mqh == 'CH')
                        <td style="text-align: center ; vertical-align: middle">{{ $item->mqh }}</td>
                    @else
                        <td></td>
                    @endif

                </tr>
            @endforeach

        </tbody>
    </table>
@stop
