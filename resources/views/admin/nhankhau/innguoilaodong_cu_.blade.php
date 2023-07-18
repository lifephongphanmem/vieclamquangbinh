@extends('main_baocao')

@section('content')

    <div>
        <p>Tỉnh/thành phố: Quảng Bình</p>
        <p>Quận/huyện/thị xã: </p>
        <p>Xã/phường/thị trấn: </p>
        <p>Thôn/bản/TDP: </p>
    </div>
    </table>
    <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">PHIẾU THÔNG TIN VỀ NGƯỜI LAO
        ĐỘNG</p>
    <p style="text-align: center;font-style: italic;">(thu thập thông tin người từ 15 tuổi trở lên đang thực tế thường trú
        tại địa bàn)
    </p>


    <p><b>1.Họ, chữ đện và tên khai sinh: {{ $model->hoten }}</b>
    </p>

    <p><b>2.Ngày, tháng, năm sinh:</b> {{ $model->ngaysinh }}</p>

    <p><b>3.Giới tính: </b> {{ $model->gioitinh }}</p>


    <p><b>4. Số CCCD/CMND: {{ $model->cccd }}</b>
    </p>

    <p><b>Mã số BHXH: </b> {{ $model->cccd }} </p>

    <p><b>6.Nơi đăng ký hộ khẩu thường trú: </b> {{ $model->thuongtru }}</p>

    <p><b>7.Nơi ở hiện tại : </b> {{ $model->diachi }}</p>

    <p><b>7.1 Khu vực:</b> □ thành thị □ nông thôn</p>

    <p><b>8.Đối tượng ưu tiên:</b>
        @foreach ($uutien as $item)
            @if ($item->stt == $model->uutien)
                {{ $item->tendoituong }}
            @endif
        @endforeach
    </p>

    <p><b>9.Trình độ giáo giục phổ thông cao nhất đã tốt nghiệp/đạt được:</b>
        @foreach ($trinhdogdpt as $item)
            @if ($item->stt == $model->trinhdogiaoduc)
                {{ $item->tengdpt }}
            @endif
        @endforeach
    </p>

    <p><b>10.Trình độ chuyên môn kỹ thuật cao nhất đạt được:</b>
        @foreach ($trinhdocmkt as $item)
            @if ($item->stt == $model->chuyenmonkythuat)
                {{ $item->tentdkt }}
            @endif
        @endforeach
    </p>

    <p><b>10.1 Chuyên ngành đào tạo: </b>{{ $model->chuyennganh }}</p>

    <p><b>11. Tình trạng tham gia hoạt động kinh tế: </b>
        @foreach ($dmtinhtrangthamgiahdkt as $item)
            @if ($model->tinhtranghdkt == $item->stt)
                {{ $item->tentgkt }}
            @endif
        @endforeach
    </p>

    <p style="font-weight: bold">12. Người có việc làm:
    </p>
    <p>12.1 Vị thế việc làm:
        @foreach ($dmvithevieclam as $item)
            @if ($model->nguoicovieclam == $item->stt)
                {{ $item->tentgktct2 }}
            @endif
        @endforeach
    </p>

    <p>12.2 Cụ thể công việc đang làm: {{ $model->congvieccuthe }}</p>
    <p>a. Tham gia BHXH:
        @foreach ($bhxh as $key => $item)
        @if ($model->thamgiabhxh == $key)
            {{ $item }}
        @endif
    @endforeach
    </p>


    <p>b. Hợp đồng lao động (HĐLĐ):
        @foreach ($hdld as $item)
            @if ($model->hdld == $item->stt)
                {{ $item->tenlhl }}
            @endif
        @endforeach
    </p>

    <p>12.3 Nơi làm việc: {{ $model->noilamviec }}</p>

    <p><b>13. Người thất nghiệp:</b>
        @foreach ($dmthatnggiep as $item)
            @if ($model->thatnghiep == $item->stt)
                {{ $item->tentgktct }}
            @endif
        @endforeach
    </p>
    <p>13.1. Thời gian thất nghiệp:
        @foreach ($tgthatnghiep as $item)
            @if ($model->thoigianthatnghiep == $item->stt)
                {{ $item->tentgtn }}
            @endif
        @endforeach
    </p>
    <p><b>14. Không tham gia hoạt động kinh do:</b>
        @foreach ($khongthamgiahdkt as $item)
            @if ($model->khongthamgiahdkt == $item->stt)
                {{ $item->tentgktct }}
            @endif
        @endforeach
    </p>
    <table id='data_footer' width="96%" cellspacing="0" height cellpadding="0" style="margin: 20px auto;text-align: center; height:200px">
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
