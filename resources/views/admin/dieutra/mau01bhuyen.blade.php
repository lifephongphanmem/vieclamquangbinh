@extends('main_baocao')
@section('content')
    <table id="data_header" width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px;">
        <tr>
            <td width="40%" style="vertical-align: top; text-align: left">
                <P>Tỉnh, thành phố {{ isset($m_tinh) ? $m_tinh->name : 'Quảng Bình' }}</P>
                <p>Quận, huyện, thị xã {{ isset($m_huyen) ? $m_huyen->name : ' ........................................' }}
                </p>
                <p>Xã, phường, thị trấn ........................................</p>
            </td>
            <td style="vertical-align: top;text-align: right">
                <b>Mẫu số 01b</b>
            </td>
        </tr>
    </table>

    <p id="data_body" style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">TỔNG HỢP NGƯỜI
        LAO ĐỘNG NĂM {{ $inputs['kydieutra'] }}</p>

    <table id="data_body1" cellspacing="0" cellpadding="0" border="1"
        style="margin: 20px auto; border-collapse: collapse;" id="data">
        <thead>
            <tr>
                <th  rowspan="3">STT</th>
                <th  rowspan="3">Địa bàn</th>
                {{-- <th rowspan="3">Họ và tên (1)</th>
                <th rowspan="3"> Ngày tháng năm sinh (2)</th> --}}
                <th colspan="2"> Giới tính (3) </th>
                {{-- <th rowspan="3"> Số CCCD (4) </th>
                <th rowspan="3"> Số điện thoại (5) </th>
                <th rowspan="3"> Nơi ở hiện tại (6) </th> --}}
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
                {{-- <th rowspan="2"> Người khuyết tật (8.1) </th>
                <th rowspan="2"> Hộ nghèo (8.2) </th>
                <th rowspan="2"> Hộ cận nghèo (8.3) </th>
                <th rowspan="2"> Dân tộc thiểu số (8.4) ( Ghi rõ tên dân tộc) </th> --}}

                @foreach ($a_gdpt as $key => $item)
                    <th rowspan="2">{{ $item . ' (9.' . $key . ')' }}</th>
                @endforeach
                {{-- <th rowspan="2"> Chưa học xong TH (9.1) </th>
                <th rowspan="2"> Tốt nghiệp TH (9.2) </th>
                <th rowspan="2"> Tốt nghiệp THCS (9.3) </th>
                <th rowspan="2"> Tốt nghiệp THPT (9.4) </th> --}}

                @foreach ($a_cmkt as $key => $item)
                    <th rowspan="2">{{ $item . ' (10.' . $key . ')' }}</th>
                @endforeach
                {{-- <th rowspan="2"> Chưa qua đào tạo (10.1) </th>
                <th rowspan="2"> CNKT không bằng (10.2) </th>
                <th rowspan="2"> CC nghề dưới 3 tháng (10.3) </th>
                <th rowspan="2"> Sơ cấp (10.4) </th>
                <th rowspan="2"> Trung cấp (10.5)</th>
                <th rowspan="2"> Cao đẳng (10.6) </th>
                <th rowspan="2"> Đại học (10.7) </th>
                <th rowspan="2"> Trên đại học (10.8) </th> --}}
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
            <?php
            $thanhthi = array_column($m_danhmuc->where('level', '!=', 'Xã')->toarray(), 'madv');
            $nongthon = array_column($m_danhmuc->where('level', 'Xã')->toarray(), 'madv');
            $stt = 0;
            ?>
            <tr style="text-align: center">
                <td></td>
                <td>{{ $m_huyen->name }}</td>
                <td>{{ count($model->whereIn('gioitinh', ['nam', 'Nam'])) }}</td>
                <td>{{ count($model->whereIn('gioitinh', ['nu', 'Nu', 'nữ', 'Nữ'])) }}</td>
                <td>{{ count($model->whereIn('madv', $thanhthi)) }}</td>
                <td>{{ count($model->whereIn('madv', $nongthon)) }}</td>

                @foreach ($a_dtut as $key => $item)
                    <td>{{ count($model->where('uutien', $key ))}}</td>
                @endforeach

                @foreach ($a_gdpt as $key => $value)
                    <td>{{ count($model->where('trinhdogiaoduc', $key ))}}</td>
                @endforeach

                @foreach ($a_cmkt as $key => $item)
                    <td>{{ count($model->where('chuyenmonkythuat', $key ))}}</td>
                @endforeach
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
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

                    $model_x = $model->where('madv',$dm->madv);

                 
                    // foreach ($dm_xa as $xa) {
                    //     $model_x = $model->where('madv', $xa->madv);
                        if (count($model_x) > 0) {
                            $gioitinh['nam'] = count($model_x->whereIn('gioitinh', ['nam', 'Nam']));
                            $gioitinh['nu'] = count($model_x->whereIn('gioitinh', ['nu', 'Nu', 'nữ', 'Nữ']));

                            if ($dm->level == 'Xã') {
                                $khuvuc['nongthon'] = count($model_x);
                            }else {
                                $khuvuc['thanhthi'] = count($model_x);
                            }
                 
                          

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
