@extends('main_baocao')
@section('custom-style')
@stop


@section('custom-script')

@stop

@section('content')
    <table width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
        <tr>
            <td width="40%" style="vertical-align: top;">
                <span style="text-transform: uppercase">ỦY BAN NHÂN DÂN TỈNH/THÀNH PHỐ QUẢNG BÌNH</span><br>
                <span style="text-transform: uppercase;font-weight: bold">SỞ LAO ĐỘNG - THƯƠNG BINH VÀ XÃ HỘI</span>
                <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

            </td>
            <td style="vertical-align: top;">
                <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                    Độc lập - Tự do - Hạnh phúc</b>
                <hr style="color: black;width: 15%;vertical-align: top; margin-top: 2px">
                
            </td>
        </tr>
        <tr>
            <td>Số: ......../.........</td>
            <td style="text-align: right"><i style="margin-right: 40%;">Quảng Bình, ngày .... tháng .... năm ....</i></td>
        </tr>
    </table>
    <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">BÁO CÁO <br>TÌNH HÌNH SỬ
        DỤNG LAO ĐỘNG</p>
    <p style="text-align: center;font-style: italic;">Kính gửi: BỘ LAO ĐỘNG - THƯƠNG BINH VÀ XÃ HỘI</p>

    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;"
        id="data">
        <thead>
            <tr style="text-align: center">
                <th rowspan="2">STT</th>
                <th rowspan="2">Người sử dụng <br> lao động</th>
                <th colspan="4">Tổng số lao động</th>
                <th colspan="4">Vị trí việc làm</th>
                <th colspan="3">Loại và hiệu lực hợp đồng lao động</th>
                <th rowspan="2">Ghi chú</th>
            </tr>
            <tr>
                <th>Tổng</th>
                <th>Lao động nữ</th>
                <th>Lao động trên 35 tuổi</th>
                <th>Số lao động tham<br> gia BHXH bắt buộc</th>
                <th>Nhà quản lý</th>
                <th>Chuyên môn kỹ <br>thuật bậc cao</th>
                <th>Chuyên môn kỹ<br> thuật bậc trung</th>
                <th>Khác </th>
                <th>Số lao động tham gia HĐLĐ<br> không xác định thời hạn</th>
                <th>Số lao động tham gia HĐLĐ <br> xác định thời hạn</th>
                <th>Số lao động tham gia HĐLĐ khác <br>(dưới 1 tháng, thử việc)</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @for ($i = 1; $i < 14; $i++)
                <td style="text-align: center">{{ $i }}</td>
            @endfor

            <tr>
                <td style="text-align: center">1</td>
                <td>Doanh nghiệp</td>
                @foreach ($model_doanhnghiep as $item)
                    <td style="text-align: center">{{ $item }}</td>
                @endforeach
                <td></td>
            </tr>

            <tr>
                <td style="text-align: center">2</td>
                <td>Hợp tác xã</td>
                @foreach ($model_hoptacxa as $item)
                    <td style="text-align: center">{{ $item }}</td>
                @endforeach
                <td></td>
            </tr>

            <tr style="font-weight: bold" class="text-right;">
                <td colspan="2">Tổng</td>
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
            </tr>

        </tbody>
    </table>
    <table width="96%" cellspacing="0" height cellpadding="0" style="margin: 20px auto;text-align: center; height:200px">
        <tr>
            <td width="40%" style="text-align: left; vertical-align: top;">

            </td>
            <td style="vertical-align: top;">
                <b>GIÁM ĐỐC</b><br>
                <i>(Chữ ký, dấu)</i>
            </td>
        </tr>
    </table>
@stop
