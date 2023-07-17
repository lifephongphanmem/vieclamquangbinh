@extends('main_baocao')
@section('content')
    <table id="data_header" width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px;">
        <tr>
            <td width="40%" style="vertical-align: top; text-align: left">
                <P>Tỉnh, thành phố  {{$m_donvi->name}}</P>
                <p>Quận, huyện, thị xã .........................................</p>
                <p>Xã, phường, thị trấn ........................................</p>
            </td>
            <td style="vertical-align: top;text-align: right">
                <b>Mẫu số 01b</b>
            </td>
        </tr>
    </table>

    <p id="data_body" style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">TỔNG HỢP NGƯỜI LAO ĐỘNG NĂM {{$inputs['kydieutra']}}</p>

    <table id="data_body1" cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
        <thead>
            <tr>
                <td  rowspan="3">STT</td>
                <td  rowspan="3">Địa bàn</td>
                {{-- <td rowspan="3">Họ và tên (1)</td>
                <td rowspan="3"> Ngày tháng năm sinh (2)</td> --}}
                <td colspan="2"> Giới tính (3) </td>
                {{-- <td rowspan="3"> Số CCCD (4) </td>
                <td rowspan="3"> Số điện thoại (5) </td>
                <td rowspan="3"> Nơi ở hiện tại (6) </td> --}}
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
                {{-- <td rowspan="2"> Người khuyết tật (8.1) </td>
                <td rowspan="2"> Hộ nghèo (8.2) </td>
                <td rowspan="2"> Hộ cận nghèo (8.3) </td>
                <td rowspan="2"> Dân tộc thiểu số (8.4) ( Ghi rõ tên dân tộc) </td> --}}

                @foreach ($a_gdpt as $key => $item)
                    <td rowspan="2">{{ $item . ' (9.' . $key . ')' }}</td>
                @endforeach
                {{-- <td rowspan="2"> Chưa học xong TH (9.1) </td>
                <td rowspan="2"> Tốt nghiệp TH (9.2) </td>
                <td rowspan="2"> Tốt nghiệp THCS (9.3) </td>
                <td rowspan="2"> Tốt nghiệp THPT (9.4) </td> --}}

                @foreach ($a_cmkt as $key => $item)
                    <td rowspan="2">{{ $item . ' (10.' . $key . ')' }}</td>
                @endforeach
                {{-- <td rowspan="2"> Chưa qua đào tạo (10.1) </td>
                <td rowspan="2"> CNKT không bằng (10.2) </td>
                <td rowspan="2"> CC nghề dưới 3 tháng (10.3) </td>
                <td rowspan="2"> Sơ cấp (10.4) </td>
                <td rowspan="2"> Trung cấp (10.5)</td>
                <td rowspan="2"> Cao đẳng (10.6) </td>
                <td rowspan="2"> Đại học (10.7) </td>
                <td rowspan="2"> Trên đại học (10.8) </td> --}}
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
            <?php  $stt =0; ?>
            @foreach ($ds_danhmuc as $key => $dm)
                <tr style="text-align: center">
                    <?php
                   
                    $gioitinh = ['nam' => 0, 'nu' => 0];
                    $khuvuc = ['thanhthi' => 0, 'nongthon' => 0];
                    $uutien = [];
                    foreach ($a_dtut as $key_2 => $value) {
                        array_push($uutien,$key_2 = 0);
                    }
                    $trinhdogiaoduc = [];
                    foreach ($a_gdpt as $key_2 => $value) {
                        array_push($trinhdogiaoduc,$key_2 = 0);
                    }
                    $chuyenmonkythuat = [];
                    foreach ($a_cmkt as $key_2 => $value) {
                        array_push($chuyenmonkythuat,$key_2 = 0);
                    }

                    $dm_xa = $m_danhmuc->where('parent', $dm->maquocgia);
                    $a = array_column($dm_xa->toarray(),'madv');
                    $model_x = $model->wherein('madv',$a );
                    
                    $thanhthi = array_column($m_danhmuc->where('level','!=', 'Xã')->toarray(),'madv');
                    $nongthon = array_column($m_danhmuc->where('level', 'Xã')->toarray(),'madv');
                 
                    // foreach ($dm_xa as $xa) {
                    //     $model_x = $model->where('madv', $xa->madv);
                        if (count($model_x) > 0) {
                            $gioitinh['nam'] = count($model_x->whereIn('gioitinh', ['nam', 'Nam']));
                            $gioitinh['nu'] = count($model_x->whereIn('gioitinh', ['nu', 'Nu', 'nữ', 'Nữ']));
                            $khuvuc['thanhthi'] = count($model_x->whereIn('madv', $thanhthi));
                            $khuvuc['nongthon'] = count($model_x->whereIn('madv', $nongthon ));

                            foreach ($a_dtut as $key_2 => $value) {
                                $uutien[$key_2-1] = count($model_x->where('uutien',$key_2-1));
                            }
                            foreach ($a_gdpt as $key_2 => $value) {
                                $trinhdogiaoduc[$key_2-1] = count($model_x->where('trinhdogiaoduc',$key_2-1));
                            }
                            foreach ($a_cmkt as $key_2 => $value) {
                                $chuyenmonkythuat[$key_2-1] = count($model_x->where('chuyenmonkythuat',$key_2-1));
                            }
                        }
                    // }
                    ?>
                    <td>{{++$stt}}</td>
                    <td>{{$dm->name}}</td>
                    <td>{{ $gioitinh['nam'] > 0 ? $gioitinh['nam']: ''}}</td>
                    <td>{{ $gioitinh['nu'] > 0 ? $gioitinh['nu']: ''}}</td>
                    <td>{{ $khuvuc['thanhthi'] > 0 ? $khuvuc['thanhthi']: '' }}</td>
                    <td>{{ $khuvuc['nongthon']  > 0 ? $khuvuc['nongthon']: ''}}</td>

                    @foreach ($a_dtut as $key => $item)
                        <td>{{ $uutien[$key-1] > 0 ?  $uutien[$key-1] :'' }}</td>
                    @endforeach

                    @foreach ($a_gdpt as $key => $value)
                        <td>{{ $trinhdogiaoduc[$key-1]  > 0 ?  $trinhdogiaoduc[$key-1] :'' }}</td>
                    @endforeach

                    @foreach ($a_cmkt as $key => $item)
                        <td>{{  $chuyenmonkythuat[$key-1]  > 0 ?  $chuyenmonkythuat[$key-1] :'' }}</td>
                    @endforeach
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
    <table id="data_footer" width="96%" cellspacing="0" height cellpadding="0" style="margin: 20px auto;text-align: center; height:200px">
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
