@extends('main_baocao')

@section('content')

    <table id="data_header" width="96%" cellspacing="0" cellpadding="8">
        <tr>
            <td style="vertical-align: top;text-align: left">
                <p>Tỉnh/thành phố: Quảng Bình</p>
                <p>Quận/huyện/thị xã: </p>
                <p>Xã/phường/thị trấn: </p>
                <p>Thôn/bản/TDP: </p>
            </td>
            <td class="text-right" style="font-style:italic">Mẫu số 02</td>
        </tr>

        <tr>
            <td colspan="2">
                <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">PHIẾU THÔNG TIN
                    VỀ NGƯỜI
                    LAO ĐỘNG</p>
                <p style="text-align: center;font-style: italic;">(thu thập thông tin người từ 15 tuổi trở lên có nhu cầu tìm
                    kiếm việc làm đang thực tế thường trú
                    tại địa bàn)
                </p>
            </td>
        </tr>
    </table>
    <table id="data_body" cellspacing="0" cellpadding="0">
        <tr>
            <td style="text-align: left"><b>1.Họ, chữ đện và tên khai sinh:</b> {{ $model->hoten }} </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>2.Ngày, tháng, năm sinh:</b> {{ getDayVn($model->ngaysinh) }} </td>
            <td style="text-align: left"><b>3.Giới tính:</b>
                @if ($model->gioitinh == 'nam' || $model->gioitinh == 'Nam')
                    Nam
                @endif
                @if ($model->gioitinh == 'nu' || $model->gioitinh == 'Nu' || $model->gioitinh == 'nữ' || $model->gioitinh == 'Nữ')
                    Nữ
                @endif
            </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>4. Số CCCD/CMND: </b> {{ $model->cccd }} </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>5.Số điện thoại liên hệ</b> {{ $model->cccd }} </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>6.Nơi đăng ký hộ khẩu thường trú:</b> {{ $model->thuongtru }} </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>7.Nơi ở hiện tại: </b> {{ $model->diachi }} </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>7.1 Khu vực:</b>
                @if ($khuvuc == 'nongthon')
                    Nông thôn
                @endif
                @if ($khuvuc == 'thanhthi')
                    Thành thị
                @endif
            </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>8.Đối tượng ưu tiên:</b>
                @foreach ($uutien as $item)
                    @if ($item->stt == $model->uutien)
                        {{ $item->tendoituong }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>9.Trình độ giáo giục phổ thông cao nhất đã tốt nghiệp/đạt được:</b>
                @foreach ($trinhdogdpt as $item)
                    @if ($item->stt == $model->trinhdogiaoduc)
                        {{ $item->tengdpt }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>10.Trình độ chuyên môn kỹ thuật cao nhất đạt được:</b>
                @foreach ($trinhdocmkt as $item)
                    @if ($item->stt == $model->chuyenmonkythuat)
                        {{ $item->tentdkt }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>10.1 Chuyên ngành đào tạo: </b>{{ $model->chuyennganh }}</td>
        </tr>
        <tr>
            <td style="text-align: left"><b>11. Nhu cầu tìm kiếm việc làm: </b> </td>
        </tr>

        <tr>
            <td style="text-align: left">11.1 Đối tượng tìm kiếm việc làm </td>
        </tr>
        <tr>
            <td style="text-align: left">11.1.1□ Chưa từng làm việc &nbsp; 11.1.2□ Đã từng làm việc</td>
        </tr>
        <tr>
            <td style="text-align: left">11.2.1□ Trong tỉnh, trong nước &nbsp; 12.2.2□ Đi làm việc ở nước ngoài</td>

        </tr>
        <tr>
            <td style="text-align: left">Ngành nghề:.......................................................................................................
            </td>
        </tr>

        <tr>
            <td style="text-align: left"><b> 12. Nhu cầu học nghề ? </b></td>
        </tr>
        <tr>
            <td style="text-align: left">12.1 Ngành nghề muốn học(5):..................................................................................
            </td>
        </tr>
        <tr>
            <td style="text-align: left"> 12.2 Trình độ chuyên môn muốn học:</td>
        </tr>
        <tr>
            <td style="text-align: left"> □ Sơ cấp   &nbsp; &nbsp; &nbsp;    □ Trung cấp    &nbsp; &nbsp; &nbsp;  □ Cao đẳng</td>
        </tr>
        <tr>
            <td style="text-align: left">□ <i>Người lao động đồng ý cho sử dụng thông tin các nhân để kết nối việc làm, học nghề  </i></td>
        </tr>

    </table>

    <table id='data_footer' width="96%" cellspacing="0" height cellpadding="0"
        style="margin: 20px auto;text-align: center; height:200px">
        <tr>
            <td width="40%" style="text-align: left; vertical-align: top;">
            </td>
            <td style="vertical-align: top;">
                <i>Ngày......tháng......năm...........</i><br>
                <b>Người cung cấp thông tin</b><br>
                <i>(ký, ghi rõ họ tên)</i>
            </td>
        </tr>
    </table>
@stop
