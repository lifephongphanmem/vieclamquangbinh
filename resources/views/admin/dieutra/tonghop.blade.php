@extends('main_baocao')
@section('content')
    <table id="data_header" width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td></td>
        <td class="text-right" style="font-style:italic">Mẫu số 03</td>
    </tr>
        <tr>
            <td width="40%" style="vertical-align: top;">

                <p>Tỉnh: Quảng Bình</p>
                <p>{{$m_donvi->huyen}}</p>
                <p>{{$m_donvi->name}}</p>
                <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

            </td>
            <td style="vertical-align: top;">
                <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                    Độc lập - Tự do - Hạnh phúc</b>
                <hr style="color: black;width: 15%;vertical-align: top; margin-top: 2px">
            </td>
        </tr>
        <tr>
            <td>Số: ......../BC-</td>
            <td style="text-align: right"><i style="margin-right: 40%;">Quảng Bình, ngày .... tháng .... năm ....</i></td>
        </tr>
    </table>
    <p id="data_body1" style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">BÁO CÁO <br>VỀ THÔNG TIN
        CUNG LAO ĐỘNG NĂM {{$inputs['kydieutra']}}</p>
    <p id="data_body2" style="text-align: center;font-style: italic;">Kính gửi: Ủy Ban nhân dân {{$m_donvi->huyen}}</p>

    <table id="data_body3" cellspacing="0" cellpadding="0" border="1"
        style="margin: 20px auto; border-collapse: collapse;" id="data">

        <tr>
            <th style="width: 5%;">STT</th>
            <th style="width: 45%;">Chỉ tiêu</th>
            <th style="width: 10%;">Đơn vị</th>
            <th style="width: 20%;">Số lượng</th>
            <th style="width: 20%;">Ghi chú</th>
        </tr>
        <tr style="text-align: center">
            <td> A </td>
            <td> B </td>
            <td> C </td>
            <td> D </td>
            <td> E </td>
        </tr>
        <tr>
            <td colspan="5" style="font-weight: bold; text-transform: uppercase;text-align: left">I. THÔNG TIN CUNG LAO
                ĐỘNG</td>
        </tr>
        <tr>
            <td style="font-weight: bold;">1</td>
            <td style="font-weight: bold;">Số người từ 15 tuổi trở lên</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($model)}}</td>
            <td style="text-align: center;"></td>
        </tr>
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo khu vực</td>
        </tr>
        <tr>
            <td></td>
            <td>- Thành thị</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ count($model->where('khuvuc', 'thanhthi')) }}</td>
            <td style="text-align: center;"></td>
        </tr>
        <tr>
            <td></td>
            <td>- Nông thôn</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ count($model->where('khuvuc', 'nongthon')) }}</td>
            <td style="text-align: center;"></td>
        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo giới tính</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nam</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ count($model->wherein('gioitinh', ['nam', 'Nam'])) }}</td>
            <td style="text-align: center;"></td>
        </tr>
        <tr>
            <td></td>
            <td>- Nữ</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ count($model->wherein('gioitinh', ['nu', 'Nu', 'nữ', 'Nữ'])) }}</td>
            <td style="text-align: center;"></td>
        </tr>
        <?php $model_covieclam = $model->where('tinhtranghdkt', 1); ?>
        <tr>
            <td style="font-weight: bold;">2</td>
            <td style="font-weight: bold;">Số người có việc làm</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($model_covieclam)}}</td>
            <td style="text-align: center;"></td>
        </tr>
       
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo Khu vực</td>
        </tr>
        <tr>
            <td></td>
            <td>- Thành thị</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ count($model_covieclam->where('khuvuc', 'thanhthi')) }}</td>
            <td style="text-align: center;"></td>
        </tr>
        <tr>
            <td></td>
            <td>- Nông thôn</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ count($model_covieclam->where('khuvuc', 'nongthon')) }}</td>
            <td style="text-align: center;"></td>
        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo trình độ chuyên môn kỹ thật</td>
        </tr>

        @foreach ($a_cmkt as $key => $ct)
            <tr>
                <td></td>
                <td>{{ $ct }}</td>
                <td style="text-align: center;">Người</td>
                <td style="text-align: center;">{{ count($model_covieclam->where('chuyenmonkythuat', $key)) }}</td>
                <td style="text-align: center;"></td>
            </tr>
        @endforeach


        <tr>
            <td>c</td>
            <td colspan="4">Chia theo vị thế việc làm</td>
        </tr>
        @foreach ($a_vithevl as $k => $val)
            <tr>
                <td></td>
                <td>{{$val}}</td>
                <td style="text-align: center;">Người</td>
                <td style="text-align: center;">{{ count($model_covieclam->where('nguoicovieclam', $k)) }}</td>
                <td style="text-align: center;"></td>
            </tr>
        @endforeach


        <?php $model_thatnghiep = $model->where('tinhtranghdkt', 2); ?>
        <tr>
            <td style="font-weight: bold;">3</td>
            <td style="font-weight: bold;">Số người thất nghiệp</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($model_thatnghiep)}}</td>
            <td style="text-align: center;"></td>
        </tr>
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo Khu vực</td>
        </tr>
        <tr>
            <td></td>
            <td>- Thành thị</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ count($model_thatnghiep->where('khuvuc', 'thanhthi')) }}</td>
            <td style="text-align: center;"></td>
        </tr>
        <tr>
            <td></td>
            <td>- Nông thôn</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ count($model_thatnghiep->where('khuvuc', 'nongthon')) }}</td>
            <td style="text-align: center;"></td>
        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo trình độ chuyên môn kỹ thật</td>
        </tr>

        @foreach ($a_cmkt as $key => $ct)
            <tr>
                <td></td>
                <td>{{ $ct }}</td>
                <td style="text-align: center;">Người</td>
                <td style="text-align: center;">{{ count($model_thatnghiep->where('chuyenmonkythuat', $key)) }}</td>
                <td style="text-align: center;"></td>
            </tr>
        @endforeach


        <tr>
            <td>b</td>
            <td colspan="4">Chia theo thời gian thất nghiệp</td>
        </tr>

        @foreach ($a_thoigianthatnghiep as $key => $ct)
            <tr>
                <td></td>
                <td>{{ $ct }}</td>
                <td style="text-align: center;">Người</td>
                <td style="text-align: center;">{{ count($model_thatnghiep->where('thoigianthatnghiep', $key)) }}</td>
                <td style="text-align: center;"></td>
            </tr>
        @endforeach
        <?php $model_khongthamgia = $model->where('tinhtranghdkt', 3); ?>
        <tr>
            <td style="font-weight: bold;">4</td>
            <td style="font-weight: bold;">Số người không tham gia hoạt động kinh tế</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($model_khongthamgia)}}</td>
            <td style="text-align: center;"></td>
        </tr>
        @foreach ($a_khongthamgia as $k=>$item )
        <tr>
            <td></td>
            <td>{{$item}}</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ count($model_khongthamgia->where('khongthamgiahdkt', $k)) }}</td>
            <td style="text-align: center;"></td>
        </tr>
        @endforeach


    </table>
    <table id="data_footer" width="96%" cellspacing="0" height cellpadding="0"
        style="margin: 20px auto;text-align: center; height:200px">
        <tr>
            <td width="40%" style="text-align: left; vertical-align: top;">

            </td>
            <td style="vertical-align: top;">
                <b>ỦY BAN NHÂN DÂN.......................</b><br>
                <i>(Chữ ký, dấu)</i>
            </td>
        </tr>
    </table>
@stop
