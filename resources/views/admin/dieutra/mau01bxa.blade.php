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
                <th rowspan="3">STT</th>
                <th rowspan="3">Họ và tên (1)</th>
                <th rowspan="3"> Ngày tháng năm sinh (2)</th>
                <th colspan="2"> Giới tính (3) </th>
                <th rowspan="3"> Số CCCD (4) </th>
                <th rowspan="3"> Số điện thoại (5) </th>
                <th rowspan="3"> Nơi ở hiện tại (6) </th>
                <th colspan="2"> Khu vực (7) </th>
                <th colspan="{{ count($a_dtut) }}"> ĐốI tượng ưu tiên (8)</th>
                <th colspan="{{ count($a_gdpt) }}"> Trình độ GDPT cao nhất đạt được (9)</th>
                <th colspan="{{ count($a_cmkt) }}"> Trình độ CMKT cao nhất đạt được (Ghi rõ chuyên ngành đào tạo) (10) </th>
                <th colspan="4"> Nhu cầu tìm kiếm việc làm (11) </th>
                <th colspan="2"> Nhu cầu học nghề (12) </th>
                <th rowspan="3"> Ghi chú </th>
            </tr>
            <tr>
                <th rowspan="2">Nam (3.1)</th>
                <th rowspan="2">Nữ (3.2)</th>
                <th rowspan="2"> Thành thị (7.1) </th>
                <th rowspan="2"> Nông thôn (7.2) </th>

                @foreach ($a_dtut as $key => $item)
                    <th rowspan="2">{{ $item . ' (8.' . $key . ')' }}</th>
                @endforeach

                @foreach ($a_gdpt as $key => $item)
                    <th rowspan="2">{{ $item . ' (9.' . $key . ')' }}</th>
                @endforeach

                @foreach ($a_cmkt as $key => $item)
                    <th rowspan="2">{{ $item . ' (10.' . $key . ')' }}</th>
                @endforeach
                <th colspan="2"> Đối tượng (11.1)</th>
                <th colspan="2"> Việc làm mong muốn (11.2) (Ghi rõ ngành nghề )</th>
                <th rowspan="2"> Ngành nghề muốn học (12.1) ( Ghi rõ ngành nghề ) </th>
                <th rowspan="2"> Trình độ CM muốn học (12.2) ( Ghi rõ trình độ CM ) </th>
            </tr>
            <tr>
                <th>Chưa từng làm việc(11.1.1)</th>
                <th>Đã từng làm việc (11.1.2) </th>
                <th> Trong tỉnh, trong nước (11.2.1)</th>
                <th> Đi làm việc ở nước ngoài (11.2.2) </th>
            </tr>
        </thead>
        <tbody>
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
                    <td>{{ $item->sdt }}</td>
                    <td>{{ $item->diachi }}</td>
                    <td>
                        {{$item->khuvuc ==1?'x':''}}
                    </td>
                    <td>
                        {{$item->khuvuc ==2?'x':''}}
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

                    <td>{{$item->doituongtimvieclam==1?'x':''}}</td>
                    <td>{{$item->doituongtimvieclam==2?'x':''}} </td>
                    <td>{{$item->vieclammongmuon==1 || $item->vieclammongmuon==3 ?'x':''}}</td>
                    <td>{{$item->vieclammongmuon==2 || $item->vieclammongmuon==3 ?'x':''}}</td>
                    {{-- <td> {{isset($item->nganhnghemuonhoc)?$a_nganhnghe[$item->nganhnghemuonhoc]:''}}</td> --}}
                    <td> {{$item->nganhnghemuonhoc}}</td>
                    <td> {{isset($item->trinhdochuyenmonmuonhoc)?$a_trinhdocm[$item->trinhdochuyenmonmuonhoc]:''}}</td>
                    <td> </td>
                    {{-- <td> </td> --}}
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
