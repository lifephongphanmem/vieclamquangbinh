@extends('main_baocao')
@section('content')
    <table id="data_header" width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px;">
        <tr>
            <td width="40%" style="vertical-align: top; text-align: left">
                <P>Tỉnh, thành phố {{ isset($m_tinh) ? $m_tinh->name : 'Quảng Bình' }}</P>
                <p>Quận, huyện, thị xã {{ isset($m_huyen) ? $m_huyen->name : '......................................' }}</p>
                <p>Xã, phường, thị trấn {{ isset($m_xa) ? $m_xa->name : '......................................' }}</p>
            </td>
            <td style="vertical-align: top;text-align: right">
                <b>Mẫu số 01b</b>
            </td>
        </tr>
    </table>

    <p id="data_body" style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">DANH SÁCH NGƯỜI
        LAO ĐỘNG NĂM {{ $inputs['kydieutra'] }}</p>

    <table id="data_body1" cellspacing="0" cellpadding="0" border="1"
        style="margin: 20px auto; border-collapse: collapse;" id="data">
        <thead>
            <tr>
                <td rowspan="3">STT</td>
                <td rowspan="3">Họ và tên (1)</td>
                <td rowspan="3"> Ngày tháng năm sinh (2)</td>
                <td colspan="2"> Giới tính (3) </td>
                <td rowspan="3"> Số CCCD (4) </td>
                <td rowspan="3"> Số điện thoại (5) </td>
                <td rowspan="3"> Nơi ở hiện tại (6) </td>
                <td colspan="2"> Khu vực(7) </td>
                <td colspan="{{ count($a_dtut) }}"> ĐốI tượng ưu tiên (8)</td>
                <td colspan="{{ count($a_gdpt) }}"> Trình độ GDPT cao nhất đạt được (9)</td>
                <td colspan="{{ count($a_cmkt) }}"> Trình độ CMKT cao nhất đạt được (Ghi rõ chuyên ngành đào tạo) (10) </td>
                <td colspan="4"> Nhu cầu tìm kiếm việc làm (11) </td>
                <td colspan="2"> Nhu cầu học nghề (12) </td>
                <td rowspan="3"> Ghi chú </td>
            </tr>
            <tr>
                <td rowspan="2">Nam (3.1)</td>
                <td rowspan="2">Nữ (3.2)</td>
                <td rowspan="2"> Thành thị (7.1) </td>
                <td rowspan="2"> Nông thôn (7.2) </td>

                @foreach ($a_dtut as $key => $item)
                    <td rowspan="2">{{ $item . ' (8.' . $key . ')' }}</td>
                @endforeach

                @foreach ($a_gdpt as $key => $item)
                    <td rowspan="2">{{ $item . ' (9.' . $key . ')' }}</td>
                @endforeach

                @foreach ($a_cmkt as $key => $item)
                    <td rowspan="2">{{ $item . ' (10.' . $key . ')' }}</td>
                @endforeach
                <td colspan="2"> Đối tượng (11.1)</td>
                <td colspan="2"> Việc làm mong muốn (11.2) (Ghi rõ ngành nghề )</td>
                <td rowspan="2"> Ngành nghề muốn học (12.1) ( Ghi rõ ngành nghề ) </td>
                <td rowspan="2"> Trình độ CM muốn học (12.2) ( Ghi rõ trình độ CM ) </td>
            </tr>
            <tr>
                <td>Chưa từng làm việc(11.1.1)</td>
                <td>Đã từng làm việc (11.1.2) </td>
                <td> Trong tỉnh, trong nước (11.2.1)</td>
                <td> Đi làm việc ở nước ngoài (11.2.2) </td>
            </tr>
        </thead>
        <tbody>
            <tr style="text-align: center">
                <td> </td>
                <td> </td>
                <td> </td>
                <td> {{ count($model->wherein('gioitinh', ['nam', 'Nam'])) }} </td>
                <td> {{ count($model->wherein('gioitinh', ['nu', 'Nu', 'nữ', 'Nữ'])) }} </td>
                <td> {{ count($model->where('khuvuc', 'thanhthi')) }} </td>
                <td> {{ count($model->where('khuvuc', 'nongthon')) }} </td>
                <td> </td>
                <td> </td>
                <td> </td>
                @foreach ($a_dtut as $key => $item)
                    <td>{{ count($model->where('uutien', $key)) }}</td>
                @endforeach

                @foreach ($a_gdpt as $key => $item)
                    <td>{{ count($model->where('trinhdogiaoduc', $key)) }}</td>
                @endforeach

                @foreach ($a_cmkt as $key => $item)
                    <td>{{ count($model->where('chuyenmonkythuat', $key)) }}</td>
                @endforeach

                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>

            <?php  $stt =0; ?>
            @foreach ($model as $key => $item)
                <tr style="text-align: center">
                    <td>{{ ++$stt }}</td>
                    {{-- <td>{{ ++$key }}</td> --}}
                    <td>{{ $item->hoten }}</td>
                    <td>{{ getDayVn($item->ngaysinh) }}</td>
                    <td>{{ $item->gioitinh == 'nam' || $item->gioitinh == 'Nam' ? 'x' : '' }}</td>
                    <td>{{ $item->gioitinh == 'nu' || $item->gioitinh == 'Nu' || $item->gioitinh == 'nữ' || $item->gioitinh == 'Nữ' ? 'x' : '' }}
                    </td>
                    <td>{{ $item->cccd }}</td>
                    <td></td>
                    <td>{{ $item->thuongtru }}</td>
                    <td>
                        @foreach ($ds_danhmuc as $madv => $level)
                            {{ $item->madv == $madv ? ($level == 'Xã' ? '' : 'x') : '' }}
                        @endforeach
                    </td>

                    @foreach ($a_dtut as $key => $val)
                        <td>{{ $item->uutien == $key ? 'x' : '' }}</td>
                    @endforeach

                    @foreach ($a_gdpt as $key => $val)
                        <td>{{ $item->trinhdogiaoduc == $key ? 'x' : '' }}</td>
                    @endforeach

                    @foreach ($a_cmkt as $key => $val)
                        <td>{{ $item->chuyenmonkythuat == $key ? 'x' : '' }}</td>
                    @endforeach

                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table id="data_footer" width="96%" cellspacing="0" height cellpadding="0"
        style="margin: 20px auto;text-align: center; height:200px">
        <tr>
            <td width="40%" style="text-align: left; vertical-align: top;">
            </td>
            <td style="vertical-align: top;">
                <b>ỦY BAN NHÂN DÂN </b><br>
                <i>(Chữ ký, dấu)</i>
            </td>
        </tr>
    </table>
@stop
