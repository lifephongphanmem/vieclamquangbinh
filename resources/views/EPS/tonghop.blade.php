@extends('main_baocao')
@section('content')
    <table id='data_header' width="96%" cellspacing="0" cellpadding="8"
        style="margin:0 auto 20px; text-align: center;font-size:12px">
        <tr>
            <td></td>
            <td style="font-weight:bold;font-style:italic" class="text-right">Mẫu số 03</td>
        </tr>
        <tr>
            <td width="40%" style="vertical-align: top;">
                <p style="text-transform: uppercase">Ủy ban nhân dân</p>
                <span style="text-transform: uppercase;font-weight: bold">SỞ LAO ĐỘNG - THƯƠNG BINH VÀ XÃ HỘI</span>
                <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

            </td>
            <td style="vertical-align: top;">
                <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                    Độc lập - Tự do - Hạnh phúc</b>
                <hr style="color: black;;width: 15%;vertical-align: top; margin-top: 2px">

            </td>
        </tr>
        <tr>
            <td>Số: ....../BC-SLĐTBXH</td>
            <td style="text-align: right"><i style="margin-right: 30%;">Quảng Bình, ngày .... tháng .... năm ....</i></td>
        </tr>
    </table>
    <p id='data_body' style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">Tổng hợp
        <br>danh sách người lao động đăng ký thi EPS
    </p>
    {{-- <p id='data_body1' style="text-align: center;font-style: italic;">Kính gửi: - Ủy ban nhân dân ....<br>
        - Ủy ban nhân dân tỉnh/thành phố</p> --}}

    <table id='data_body2' cellspacing="0" cellpadding="0" border="1"
        style="margin: 20px auto; border-collapse: collapse;font-size:12px">

        <tr>
            <th rowspan="2" style="width: 2%;">STT</th>
            <th rowspan="2" style="width: 6%;">Số báo danh</th>
            <th rowspan="2" style="width: 10%;">Họ và tên</th>
            <th rowspan="2" style="width: 4%;">Ngày sinh</th>
            <th rowspan="2" style="width: 3%;">Giới tính</th>
            <th rowspan="2" style="width: 6%;">Số CCCD/<br>Hộ chiếu</th>
            <th rowspan="2" style="width: 10%;">Phân loại</th>
            <th rowspan="2" style="width: 10%;">Đối tượng</th>
            <th rowspan="2" style="width: 10%;">Ngành đăng ký dự thi</th>
            <th rowspan="2" style="width: 10%;">Nghề đăng ký</th>
            <th rowspan="2" style="width: 7%;">Điện thoại</th>
            <th colspan="4" style="width: 18%;">Điạ chỉ gửi thư</th>
            <th rowspan="2" style="width: 8%;">Đăng ký học<br>tiếng Hàn</th>
        </tr>
        <tr>
            <th>Thôn,<br>xóm</th>
            <th>Xã/<br>Phường</th>
            <th>Quận/<br>Huyện</th>
            <th>Tỉnh/<br>Thành phố</th>
        </tr>
        @foreach ($model as $k => $ct)
            <tr>
                <td class="text-center">{{ ++$k }}</td>
                <td class="text-center">{{ $ct->sobaodanh }}</td>
                <td>{{ $ct->hoten }}</td>
                <td>{{ getDayVn($ct->ngaysinh) }}</td>
                <td class="text-center">{{ $ct->gioitinh == 1 ? 'Nam' : 'Nữ' }}</td>
                <td>{{ $ct->cccd }}</td>
                <td>{{ phanloai()[$ct->phanloai] }}</td>
                <td>{{ doituong()[$ct->doituong] }}</td>
                <td>{{ NganhDKthi()[$ct->nganhdkthi] }}</td>
                <td>
                    @if ($ct->nganhdkthi == 'KHAC')
                        {{ $ct->nghekhac }}
                    @else
                        {{ NgheDK()[$ct->nganhdkthi][$ct->nghe] }}
                    @endif
                </td>
                <td class="text-center">{{ $ct->sdt }}</td>
                <td>{{ $ct->thonxom }}</td>
                <td>{{ $ct->xa }}</td>
                <td>{{ $ct->huyen }}</td>
                <td>{{ $ct->tinh }}</td>
                <td>{{ $ct->dkhoc == 1 ? 'Đăng ký' : 'Không' }}</td>
            </tr>
        @endforeach

    </table>

    {{-- <table id='data_footer' width="96%" cellspacing="0" height cellpadding="0"
        style="margin: 20px auto;text-align: center; height:200px;font-size:12px">
        <tr>
            <td width="40%" style="text-align: left; vertical-align: top;">
            </td>
            <td style="vertical-align: top;">
                <b>GIÁM ĐỐC</b><br>
                <i>(Chữ ký, dấu)</i>
            </td>
        </tr>
    </table> --}}
@stop
