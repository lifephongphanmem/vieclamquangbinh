@extends('main_baocao')

@section('content')

    <table id="data_header" width="96%" cellspacing="0" cellpadding="8" style="font-size: 12px">
        <tr>
            <td style="vertical-align: top;text-align: left">
                <p>Tỉnh/thành phố: Quảng Bình</p>
                <p>Quận/huyện/thị xã: </p>
                <p>Xã/phường/thị trấn: </p>
            </td>
            <td class="text-right" style="font-style:italic">Mẫu số 01</td>
        </tr>

        <tr>
            <td colspan="2">
                <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">PHIẾU THÔNG TIN
                    VỀ NGƯỜI
                    LAO ĐỘNG</p>
                <p style="text-align: center;font-style: italic;">(Thu thập thông tin người từ 15 tuổi trở lên có nhu cầu
                    tìm
                    kiếm việc làm đang thực tế thường trú
                    tại địa bàn)
                </p>
            </td>
        </tr>
    </table>
    <table id="data_body" cellspacing="0" cellpadding="0" style="font-size: 12px">
        <tr>
            <td style="text-align: left"><b>1.Họ, chữ đệm và tên khai sinh:</b> {{ $model->hoten }} </td>
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
            {{-- <td style="text-align: left"><b>5.Số điện thoại liên hệ</b> {{ $model->cccd }} </td> --}}
            <td style="text-align: left"><b>5.Mã số BHXH</b> {{ $model->bhxh }} </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>6.Nơi đăng ký hộ khẩu thường trú:</b> {{ $model->thuongtru }} </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>7.Nơi ở hiện tại: </b> {{ $model->diachi }} </td>
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
            <td style="text-align: left"><b>8.Đối tượng ưu tiên (nếu có):</b>
                @if ($model->uutien == 4)
                    @foreach ($uutien as $item)
                        @if ($item->stt != 4)
                            &#x2610;{{ $item->tendoituong }}&ensp;
                        @endif
                    @endforeach
                    <br>
                    &#x2611;Dân tộc thiểu số (Ghi tên dân tộc): {{ $model->dantoc }}
                @else
                    @foreach ($uutien as $item)
                        @if ($model->uutien == $item->stt)
                            &#x2611;
                        @else
                            &#x2610;
                        @endif
                        {{ $item->tendoituong }}&ensp;
                    @endforeach
                @endif

            </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>9.Trình độ giáo giục phổ thông cao nhất đã tốt nghiệp/đạt được:</b><br>
                @foreach ($trinhdogdpt as $item)
                    @if ($model->trinhdogiaoduc == $item->stt)
                        &#x2611;
                    @else
                        &#x2610;
                    @endif
                    {{ $item->tengdpt }}&ensp;
                @endforeach
            </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>10.Trình độ chuyên môn kỹ thuật cao nhất đạt được:</b><br>
                @foreach ($trinhdocmkt as $k => $item)
                    @if ($k == 3)
                        <br>
                    @endif
                    @if ($model->chuyenmonkythuat == $item->stt)
                        &#x2611;
                    @else
                        &#x2610;
                    @endif
                    {{ $item->tentdkt }}&ensp;
                @endforeach
            </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>10.1 Chuyên ngành đào tạo: </b>{{ isset($model) ? $model->chuyennganh : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: left"><b>11.Tình trạng tham gia hoạt động kinh tế:</b><br>
                @foreach ($dmtinhtrangthamgiahdkt as $k => $item)
                    @if ($k == 3)
                        <br>
                    @endif
                    @if ($model->tinhtranghdkt == $item->stt)
                        &#x2611;
                    @else
                        &#x2610;
                    @endif
                    {{ $item->tentgkt }}&ensp;
                    @if ($item->stt == '3')
                        ,lý do: @foreach ($khongthamgiahdkt as $val)
                            @if ($model->khongthamgiahdkt == $val->stt)
                                &#x2611;
                            @else
                                &#x2610;
                            @endif
                            {{ $val->tentgktct }}
                        @endforeach
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>12. Người có việc làm: </b> </td>
        </tr>
        <tr>
            <td style="text-align: left">12.1.Vị thế việc làm:<br>
                @foreach ($dmvithevieclam as $k => $item)
                    @if ($k == 4)
                        <br>
                    @endif
                    @if ($model->nguoicovieclam == $item->stt)
                        &#x2611;
                    @else
                        &#x2610;
                    @endif
                    {{ $item->tentgktct2 }}&ensp;
                @endforeach
            </td>
        </tr>
        <tr>
            <td style="text-align: left">12.2. Công việc cụ thể đang làm: {{ isset($model) ? $model->congvieccuthe : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: left"><b>a. Tham gia BHXH:</b><br>
                @foreach ($bhxh as $k => $item)
                    @if ($k == 4)
                        <br>
                    @endif
                    @if ($model->thamgiabhxh == $k)
                        &#x2611;
                    @else
                        &#x2610;
                    @endif
                    {{ $item }}&ensp;
                @endforeach
            </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>b. Hợp đồng lao động (HĐLĐ):</b>
                @if (isset($model->hdld)&& $model->hdld != '3')
                    &#x2611;
                @else
                    &#x2610;
                @endif
                Có&ensp;

                @if (!isset($model->hdld) || $model->hdld == '3')
                    &#x2611;
                @else
                    &#x2610;
                @endif
                Không&ensp;
            </td>
        </tr>
        <tr>
            <td style="text-align: left">Loại hợp đồng lao động:&ensp;
                @foreach ($hdld as $k => $item)
                    @if ($k == 4)
                        <br>
                    @endif
                    @if ($model->hdld == $item->stt)
                        &#x2611;
                    @else
                        &#x2610;
                    @endif
                    {{ $item->tenlhl }}&ensp;
                @endforeach
            </td>
        </tr>
        <tr>
            <td style="text-align: left">Thời gian bắt đầu thực hiện HĐLĐ (ngày/tháng/năm): ...../....../......</td>
        </tr>
        <tr>
            <td style="text-align: left">12.3. Nơi làm việc: {{ isset($model) ? $model->noilamviec : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: left">a. Loại hình nơi làm việc:<br>
                @foreach ($loaihinhkt as $k => $item)
                    @if ($k == 4 || $k == 8)
                        <br>
                    @endif
                    @if ($model->loaihinhnoilamviec == $item->stt)
                        &#x2611;
                    @else
                        &#x2610;
                    @endif
                    {{ $item->tenlhkt }}&ensp;
                @endforeach
            </td>
        </tr>
        <tr>
            <td style="text-align: left">b. Địa chỉ nơi làm việc: {{ isset($model) ? $model->diachinoilamviec : '' }}</td>
        </tr>
        <tr>
            <td style="text-align: left"><b> 13.Người thất nghiệp:</b>
                @foreach ($dmthatnggiep as $k => $item)
                    @if ($model->thatnghiep == $item->stt)
                        &#x2611;
                    @else
                        &#x2610;
                    @endif
                    {{ $item->tentgktct }}&ensp;
                @endforeach
            </td>
        </tr>
        <tr>
            <td style="text-align: left">13.1.Thời gian thất nghiệp:
                @foreach ($tgthatnghiep as $k => $item)
                    @if ($k == 4)
                        <br>
                    @endif
                    @if ($model->thoigianthatnghiep == $item->stt)
                        &#x2611;
                    @else
                        &#x2610;
                    @endif
                    {{ $item->tentgtn }}&ensp;
                @endforeach
            </td>
        </tr>
        <tr>
            <td style="text-align: left"><b>14. Nhu cầu tìm kiếm việc làm: </b> </td>
        </tr>

        <tr>
            <td style="text-align: left">14.1 Đối tượng tìm kiếm việc làm </td>
        </tr>
        <tr>
            <td style="text-align: left">14.1.1
                @if ($model->doituongtimvieclam == 1)
                    &#x2611;
                @else
                    &#x2610;
                @endif Chưa từng làm việc &nbsp;
                11.1.2
                @if ($model->doituongtimvieclam == 2)
                    &#x2611;
                @else
                    &#x2610;
                @endif Đã từng làm việc
            </td>
        </tr>
        <tr>
            <td style="text-align: left">14.2 Việc làm mong muốn </td>
        </tr>
        <tr>
            <td style="text-align: left">14.2.1
                @if ($model->vieclammongmuon == 1 || $model->vieclammongmuon == 3)
                    &#x2611;
                @else
                    &#x2610;
                @endif Trong tỉnh, trong nước &nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                Ngành
                nghề: {{ isset($model->nganhnghemongmuon) ? $a_nganhnghe[$model->nganhnghemongmuon] : '' }}

            </td>

        </tr>
        <tr>
            <td style="text-align: left">
                14.2.2
                @if ($model->vieclammongmuon == 2 || $model->vieclammongmuon == 3)
                    &#x2611;
                @else
                    &#x2610;
                @endif Đi làm việc ở nước ngoài &nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;Thị trường:
                {{ isset($model->thitruonglamviec) ? getCountries()[$model->thitruonglamviec] : '' }}
            </td>
        </tr>

        <tr>
            <td style="text-align: left"><b> 15. Nhu cầu học nghề ? </b></td>
        </tr>
        <tr>
            <td style="text-align: left">15.1 Ngành nghề muốn
                học(5): {{ isset($model->nganhnghemuonhoc) ? $a_nganhnghe[$model->nganhnghemuonhoc] : '' }}
            </td>
        </tr>
        <tr>
            <td style="text-align: left"> 15.2 Trình độ chuyên môn muốn học:</td>
        </tr>
        <tr>
            <td style="text-align: left">
                @if ($model->trinhdochuyenmonmuonhoc == 1)
                    &#x2611;
                @else
                    &#x2610;
                @endif Sơ cấp &nbsp; &nbsp; &nbsp;
                @if ($model->trinhdochuyenmonmuonhoc == 2)
                    &#x2611;
                @else
                    &#x2610;
                @endif Trung cấp &nbsp; &nbsp; &nbsp;
                @if ($model->trinhdochuyenmonmuonhoc == 3)
                    &#x2611;
                @else
                    &#x2610;
                @endif Cao đẳng
            </td>
        </tr>
        <tr>
            <td style="text-align: left">□ <i>Người lao động đồng ý cho sử dụng thông tin các nhân để kết nối việc làm, học
                    nghề </i></td>
        </tr>

    </table>

    <table id='data_footer' width="96%" cellspacing="0" height cellpadding="0"
        style="margin: 20px auto;text-align: center; height:200px;font-size: 12px">
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
