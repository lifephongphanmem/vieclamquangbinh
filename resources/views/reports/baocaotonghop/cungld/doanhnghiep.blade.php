@extends('main_baocao')
@section('custom-style')
@stop


@section('custom-script')

@stop

@section('content')
    <table width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
        <tr>
            <td width="40%" style="vertical-align: top;">
                <span style="text-transform: uppercase"></span><br>
                <span style="text-transform: uppercase;font-weight: bold">{{$nguoidung}}</span>
                <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

            </td>
            <td style="vertical-align: top;">
                <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                    Độc lập - Tự do - Hạnh phúc</b>
                <hr style="color: black;;width: 15%;vertical-align: top; margin-top: 2px">

            </td>
        </tr>
        <tr>
            <td>Số: ......../.........</td>
            <td style="text-align: right"><i style="margin-right: 40%;">Quảng Bình, ngày .... tháng .... năm ....</i></td>
        </tr>
    </table>
    <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">BÁO CÁO <br>TÌNH HÌNH SỬ
        DỤNG LAO ĐỘNG</p>
    <p style="text-align: left;font-style: italic;">Thông tin:</p>

    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;"
        id="data">
        <thead>
            <tr style="text-align: center">
                <th rowspan="3">STT</th>
                <th rowspan="3">Họ tên</th>
                <th rowspan="3">Mã số BHXH</th>
                <th rowspan="3">Ngày tháng năm sinh</th>
                <th rowspan="3">Giới tính</th>
                <th rowspan="3">Số CCCD/ CMTND/ hộ chiếu</th>
                <th rowspan="3">Cấp bậc chức vụ, chức ranh nghề, nơi làm việc </th>
                <th colspan="4">Vị trí việc làm </th>
                <th colspan="6">Tiền lương</th>
                <th rowspan="2" colspan="2">Ngành/ nghề nặng nhọc, độc hại</th>
                <th colspan="5">Loại và hiệu lực hợp đồng lao động</th>
                <th rowspan="3">Thời điểm đơn vị bắt đầu đóng BHXH</th>
                <th rowspan="3">Thời điểm đơn vị kết thúc đóng BHXH</th>
                <th rowspan="3">Ghi chú</th>
            </tr>
            <tr>
                <th rowspan="2">Nhà quản lý</th>
                <th rowspan="2">Chuyên môn kỹ thuật bậc cao</th>
                <th rowspan="2">Chuyên môn kỹ thuật bậc trung</th>
                <th rowspan="2">khác</th>
                <th rowspan="2">Hệ số/ Mức lương</th>
                <th colspan="5">Phụ cấp</th>
                <th rowspan="2">Ngày bắt đầu HĐLĐ không xác thời hạn</th>
                <th colspan="2">Hiệu lực HĐLĐ xác định thời hạn </th>
                <th colspan="2">Hiệu lực HĐLĐ khác (dưới 1 tháng, thử việc)</th>
            </tr>
            <tr>
                <th>Chức vụ</th>
                <th>Thâm niên VK (%)</th>
                <th>Thâm niên nghề (%)</th>
                <th>Phụ cấp lương</th>
                <th>Các khoan bổ sung</th>
                <th>Ngày bắt đầu </th>
                <th>Ngày kết thúc </th>
                <th>Ngày bắt đầu </th>
                <th>Ngày kết thúc </th>
                <th>Ngày bắt đầu </th>
                <th>Ngày kết thúc </th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @for ($i = 1 ; $i < 28 ; $i++)
                <td style="text-align: center">{{$i}}</td>
            @endfor
                

            @foreach ($model as $key => $item)
            <tr>  
                <td style="text-align: center">{{++$key}}</td>
                <td>{{$item->hoten }}</td>
                <td style="text-align: center">{{$item->bdbhxh }}</td>
                <td style="text-align: center">{{$item->ngaysinh }}</td>
                <td style="text-align: center">{{$item->gioitinh }}</td>
                <td style="text-align: center">{{$item->cmnd }}</td>
                <td style="text-align: center">{{$item->cvhientai }}</td>
                <td style="text-align: center">{{$item->cvhientai }}</td> {{--sửa người có chức vụ cao--}}
                <td style="text-align: center">{{$item->trinhdocmkt }}</td>
                <td style="text-align: center">{{$item->trinhdocmkt }}</td>
                <td style="text-align: center">{{$item->trinhdocmkt }}</td>
                <td style="text-align: center">{{$item->luong }}</td>
                <td style="text-align: center">{{$item->pcchucvu }}</td>
                <td style="text-align: center">{{$item->pcthamnien }}</td>
                <td style="text-align: center">{{$item->pcthamniennghe }}</td>
                <td style="text-align: center">{{$item->pcluong }}</td>
                <td style="text-align: center">{{$item->pcbosung }}</td>
                <td style="text-align: center">{{$item->bddochai }}</td>
                <td style="text-align: center">{{$item->ktdochai }}</td>
                <td style="text-align: center">{{$item->bdhopdong }}</td> {{-- k thời hạn --}}
                <td style="text-align: center">{{$item->bdhopdong }}</td>{{-- có thời hạn --}}
                <td style="text-align: center">{{$item->kthopdong }}</td>
                <td style="text-align: center">{{$item->bdhopdong }}</td> {{-- khác--}}
                <td style="text-align: center">{{$item->kthopdong}}</td>
                <td style="text-align: center">{{$item->bdbhxh }}</td>
                <td style="text-align: center">{{$item->ktbhxh }}</td>
                <td style="text-align: center">{{$item->ghichu }}</td>

            </tr>
        @endforeach
            <tr style="font-weight: bold" class="text-right;">
                <td colspan="3">Tổng</td>
                <td style="text-align: center"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center"></td>
                <td style="text-align: right"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <table width="96%" cellspacing="0" height cellpadding="0" style="margin: 20px auto;text-align: center; height:200px">
        <tr>
            <td width="40%" style="text-align: left; vertical-align: top;">

            </td>
            <td style="vertical-align: top;">
                <b>ĐẠI DIỆN DOANH NGHIỆP, CƠ QUAN, TỔ CHỨC</b><br>
                <i>(Chữ ký, dấu)</i>
            </td>
        </tr>
    </table>
@stop
