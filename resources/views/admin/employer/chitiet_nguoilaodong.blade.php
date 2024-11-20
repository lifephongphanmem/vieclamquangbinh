@extends('main_baocao')

@section('content')

    <table id="data_header" width="96%" cellspacing="0" cellpadding="8" style="font-size: 12px">
        {{-- <tr>
            <td style="vertical-align: top;text-align: left">
                <p>Tỉnh/thành phố: Quảng Bình</p>
                <p>Quận/huyện/thị xã: </p>
                <p>Xã/phường/thị trấn: </p>
            </td>
            <td class="text-right" style="font-style:italic">Mẫu số 01</td>
        </tr> --}}

        <tr>
            <td colspan="2">
                <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">THÔNG TIN
                    VỀ NGƯỜI
                    LAO ĐỘNG</p>
            </td>
        </tr>
    </table>
    <table id="data_body" cellspacing="0" cellpadding="0" style="font-size: 12px">
        <tr>
            <td style="text-align: left"><b>1.Họ, chữ đệm và tên khai sinh:</b> {{ $model->hoten }} </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>2.Ngày, tháng, năm sinh:</b> {{ getDayVn($model->ngaysinh) }} </td>

        </tr>
        <tr>
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
            <td style="text-align: left"><b>4. Số CCCD/CMND: </b> {{ $model->cmnd }} </td>
        </tr>
        <tr>
            {{-- <td style="text-align: left"><b>5.Số điện thoại liên hệ</b> {{ $model->cccd }} </td> --}}
            <td style="text-align: left"><b>5.Mã số BHXH:</b> {{ $model->sobaohiem }} </td>
        </tr>
        {{-- <tr>
            <td style="text-align: left"><b>6.Nơi đăng ký hộ khẩu thường trú:</b> {{ $model->thuongtru }} </td>
        </tr> --}}
        <tr>
            <td style="text-align: left"><b>6.Nơi ở hiện tại: </b> {{ $model->address }} </td>
        </tr>
        {{-- <tr>
            <td style="text-align: left"><b>7.1 Khu vực:</b>
                @if ($model->khuvuc == 1)
                    &ensp; &#x2611; Thành thị&emsp; &#x2610;Nông thôn
                @else
                    &ensp;&#x2610; Thành thị&emsp; &#x2611; Nông thôn
                @endif
            </td>
        </tr> --}}


        <tr>
            <td style="text-align: left"><b>7.Trình độ giáo giục phổ thông cao nhất đã tốt nghiệp/đạt được:</b>&ensp;{{$model->trinhdogiaoduc}}

            </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>8.Trình độ chuyên môn kỹ thuật :&ensp;</b>{{$model->trinhdocmkt}}
            </td>
        </tr>

        <tr>
            <td style="text-align: left"><b>9.Nghề nghiệp:&ensp;</b>{{$model->nghenghiep}}
            </td>
        </tr>


        <tr>
            <td style="text-align: left"><b>10.Loại hợp đồng lao động:</b>&ensp;
                {{$model->loaihdld}}
            </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>11.Thời gian bắt đầu thực hiện HĐLĐ (ngày/tháng/năm):</b> ...../....../......</td>
        </tr>


        <tr>
            <td style="text-align: left"><b>12. Địa chỉ nơi làm việc:</b> {{ isset($model) ? $company[$model->company] : '' }}</td>
        </tr> 

    </table>

@stop
