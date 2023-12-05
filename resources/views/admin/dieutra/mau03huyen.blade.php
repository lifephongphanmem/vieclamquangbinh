@extends('main_baocao')
@section('content')
    <table id="data_header" width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; font-size: 12px">
        <tr>
            <td></td>
            <td class="text-right" style="font-style:italic">Mẫu số 03</td>
        </tr>
        <tr>
            <td width="50%" style="vertical-align: top; padding-left: 10% ;text-align: left">

                <p>Tỉnh: Quảng Bình</p>
                <p>{{ isset($mahuyen->name) ? $mahuyen->name : 'Quận, huyện, thị xã:...............................' }}
                </p>
                <p>Xã, phường, thị trấn:..............................</p>
                <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

            </td>
            <td style="vertical-align: top; text-align: center;padding-left: 10% ">
                <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                    Độc lập - Tự do - Hạnh phúc</b>
                <hr style="color: black;width: 15%;vertical-align: top; margin-top: 2px">
            </td>
        </tr>
        <tr>
            <td width="50%" style=" text-align: left; padding-left: 10% ">
                <p>Số: ......../BC- </p>
            </td>
            <td style="text-align: center"><i style="margin-left: 15%;">Quảng Bình, ngày .... tháng .... năm ....</i></td>
        </tr>
        <tr>
            <td colspan="2" id="data_body1"
                style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">BÁO CÁO
                <br>VỀ THÔNG TIN
                CUNG LAO ĐỘNG NĂM {{ $inputs['kydieutra'] }}
            </td>
        </tr>
        <tr style="font-style: italic;">
            <td rowspan="2" style="text-align: right;vertical-align: top;"> Kính gửi: </td>
            <td>Ủy ban nhân dân:.......................... <br> Sở Lao động - Thương binh và Xã hội </td>
        </tr>
    </table>




    <table id="data_body" cellspacing="0" cellpadding="0" border="1"
        style="margin: 20px auto; border-collapse: collapse;font-size: 12px" id="data">

        <tr>
            <th style="width: 5%;">STT</th>
            <th style="width: 45%;">Chỉ tiêu</th>
            <th style="width: 10%;">Đơn vị</th>
            <th style="width: 20%;">Kỳ trước</th>
            <th style="width: 20%;">Kỳ báo cáo</th>
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
        <?php
        $model_truoc = $model->where('kydieutra', $inputs['kydieutra'] - 1);
        $model_hientai = $model->where('kydieutra', $inputs['kydieutra']);
        ?>
        <tr>
            <td style="font-weight: bold;">1</td>
            <td style="font-weight: bold;">Số người từ 15 tuổi trở lên có nhu cầu tìm kiếm việc làm</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_truoc)) }}</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_hientai)) }}</td>
        </tr>


        <tr>
            <td>a</td>
            <td colspan="4">Chia theo khu vực</td>
        </tr>
        <tr>
            <td></td>
            <td>- Thành thị</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_truoc->where('khuvuc', '1'))) }}</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_hientai->where('khuvuc', '1'))) }}</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nông thôn</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_truoc->where('khuvuc', '2'))) }}</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_hientai->where('khuvuc', '2'))) }}</td>
        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo giới tính</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nam</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_truoc->wherein('gioitinh', ['nam', 'Nam']))) }}</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_hientai->wherein('gioitinh', ['nam', 'Nam']))) }}
            </td>
        </tr>
        <tr>
            <td></td>
            <td>- Nữ</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">
                {{ dinhdangso(count($model_truoc->wherein('gioitinh', ['nu', 'Nu', 'nữ', 'Nữ']))) }}</td>
            <td style="text-align: center;">
                {{ dinhdangso(count($model_hientai->wherein('gioitinh', ['nu', 'Nu', 'nữ', 'Nữ']))) }}</td>
        </tr>
        <tr>
            <td>c</td>
            <td colspan="4">Chia theo trình độ chuyên môn kỹ thật</td>
        </tr>
        @foreach ($a_cmkt as $key => $ct)
            <tr>
                <td></td>
                <td>{{ $ct }}</td>
                <td style="text-align: center;">Người</td>
                <td style="text-align: center;"> {{ dinhdangso(count($model_truoc->where('chuyenmonkythuat', $key))) }}
                </td>
                <td style="text-align: center;"> {{ dinhdangso(count($model_hientai->where('chuyenmonkythuat', $key))) }}
                </td>
            </tr>
        @endforeach

        <tr>
            <td>d</td>
            <td colspan="4">Nhu cầu tìm kiếm việc làm, học nghề </td>
        </tr>
        <?php
        $model_truoc_trongnuoc = $model_truoc->whereIn('vieclammongmuon', ['1', '3']);
        $model_hientai_trongnuoc = $model_hientai->whereIn('vieclammongmuon', ['1', '3']);

       
        $model_truoc_nuocngoai = $model_truoc->whereIn('vieclammongmuon', ['2', '3']);
        $model_hientai_nuocngoai = $model_hientai->whereIn('vieclammongmuon', ['2', '3']);

        $model_truoc_hocnghe = $model_truoc->where('nganhnghemuonhoc', '!=', null);
        $model_hientai_hocnghe = $model_hientai->where('nganhnghemuonhoc', '!=', null);
        ?>

        <tr>
            <td></td>
            <td>- Trong tỉnh, trong nước</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_truoc_trongnuoc)) }} </td>
            <td style="text-align: center;">{{ dinhdangso(count($model_hientai_trongnuoc)) }} </td>
        </tr>
        <tr>
            <td></td>
            <td>- Đi làm việc ở nước ngoài</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_truoc_nuocngoai)) }} </td>
            <td style="text-align: center;">{{ dinhdangso(count($model_hientai_nuocngoai)) }} </td>
        </tr>
        <tr>
            <td></td>
            <td>- Học nghề</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_truoc_hocnghe)) }} </td>
            <td style="text-align: center;">{{ dinhdangso(count($model_hientai_hocnghe)) }} </td>
        </tr>


        <tr>
            <td style="font-weight: bold;">1.1</td>
            <td colspan="4" style="font-weight: bold;">Trong tỉnh, trong nước</td>
        </tr>
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo khu vực</td>
        </tr>
        <tr>
            <td></td>
            <td>- Thành thị</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_truoc_trongnuoc->where('khuvuc', '1'))) }}</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_hientai_trongnuoc->where('khuvuc', '1'))) }}</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nông thôn</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_truoc_trongnuoc->where('khuvuc', '2'))) }}</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_hientai_trongnuoc->where('khuvuc', '2'))) }}</td>
        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo giới tính</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nam</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">
                {{ dinhdangso(count($model_truoc_trongnuoc->wherein('gioitinh', ['nam', 'Nam']))) }}</td>
            <td style="text-align: center;">
                {{ dinhdangso(count($model_hientai_trongnuoc->wherein('gioitinh', ['nam', 'Nam']))) }}</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nữ</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">
                {{ dinhdangso(count($model_truoc_trongnuoc->wherein('gioitinh', ['nu', 'Nu', 'nữ', 'Nữ']))) }}</td>
            <td style="text-align: center;">
                {{ dinhdangso(count($model_hientai_trongnuoc->wherein('gioitinh', ['nu', 'Nu', 'nữ', 'Nữ']))) }}</td>
        </tr>
        <tr>
            <td>c</td>
            <td colspan="4">Chia theo trình độ chuyên môn kỹ thật</td>
        </tr>
        @foreach ($a_cmkt as $key => $ct)
            <tr>
                <td></td>
                <td>{{ $ct }}</td>
                <td style="text-align: center;">Người</td>
                <td style="text-align: center;">
                    {{ dinhdangso(count($model_truoc_trongnuoc->where('chuyenmonkythuat', $key))) }} </td>
                <td style="text-align: center;">
                    {{ dinhdangso(count($model_hientai_trongnuoc->where('chuyenmonkythuat', $key))) }}
                </td>
            </tr>
        @endforeach
        <tr>
            <td>d</td>
            <td colspan="4">Chia theo nghề nghiệp </td>
        </tr>
        @foreach ($m_nganhnghe as $key => $val)
            <tr>
                <td>{{ $val->madm }}</td>
                <td>{{ $val->tendm }}</td>
                <td style="text-align: center;">Người</td>
                <td style="text-align: center;">
                    {{ dinhdangso(count($model_truoc_trongnuoc->where('nganhnghemongmuon', $val->madm))) }}</td>
                <td style="text-align: center;">
                    {{ dinhdangso(count($model_hientai_trongnuoc->where('nganhnghemongmuon', $val->madm))) }}</td>
            </tr>
        @endforeach


        <tr>
            <td style="font-weight: bold;">1.2</td>
            <td colspan="4" style="font-weight: bold;">Đi làm việc ở nước ngoài</td>
        </tr>
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo khu vực</td>
        </tr>
        <tr>
            <td></td>
            <td>- Thành thị</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_truoc_nuocngoai->where('khuvuc', '1'))) }}</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_hientai_nuocngoai->where('khuvuc', '1'))) }}</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nông thôn</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_truoc_nuocngoai->where('khuvuc', '2'))) }}</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_hientai_nuocngoai->where('khuvuc', '2'))) }}</td>
        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo giới tính</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nam</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">
                {{ dinhdangso(count($model_truoc_nuocngoai->wherein('gioitinh', ['nam', 'Nam']))) }}</td>
            <td style="text-align: center;">
                {{ dinhdangso(count($model_hientai_nuocngoai->wherein('gioitinh', ['nam', 'Nam']))) }}</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nữ</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">
                {{ dinhdangso(count($model_truoc_nuocngoai->wherein('gioitinh', ['nu', 'Nu', 'nữ', 'Nữ']))) }}</td>
            <td style="text-align: center;">
                {{ dinhdangso(count($model_hientai_nuocngoai->wherein('gioitinh', ['nu', 'Nu', 'nữ', 'Nữ']))) }}</td>
        </tr>
        <tr>
            <td>c</td>
            <td colspan="4">Chia theo thị trường</td>
        </tr>
        <?php
        $model_truoc_nuocngoai_hanquoc = dinhdangso(count($model_truoc_nuocngoai->where('thitruonglamviec', 'KR')));
        $model_hientai_nuocngoai_hanquoc = dinhdangso(count($model_hientai_nuocngoai->where('thitruonglamviec', 'KR')));
        ?>
        <tr>
            <td></td>
            <td>- Hàn Quốc</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ $model_truoc_nuocngoai_hanquoc }}</td>
            <td style="text-align: center;">{{ $model_hientai_nuocngoai_hanquoc }}</td>
        </tr>
        <?php
        $model_truoc_nuocngoai_nhatban = dinhdangso(count($model_truoc_nuocngoai->where('thitruonglamviec', 'JP')));
        $model_hientai_nuocngoai_nhatban = dinhdangso(count($model_hientai_nuocngoai->where('thitruonglamviec', 'JP')));
        ?>
        <tr>
            <td></td>
            <td>- Nhật Bản</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ $model_truoc_nuocngoai_nhatban }}</td>
            <td style="text-align: center;">{{ $model_hientai_nuocngoai_nhatban }}</td>
        </tr>
        <?php
        $model_truoc_nuocngoai_dailoan = dinhdangso(count($model_truoc_nuocngoai->where('thitruonglamviec', 'TW')));
        $model_hientai_nuocngoai_dailoan = dinhdangso(count($model_hientai_nuocngoai->where('thitruonglamviec', 'TW')));
        ?>
        <tr>
            <td></td>
            <td>- Đài Loan</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ $model_truoc_nuocngoai_dailoan }}</td>
            <td style="text-align: center;">{{ $model_hientai_nuocngoai_dailoan }}</td>
        </tr>
        <?php
        $model_truoc_nuocngoai_chauau = dinhdangso(count($model_truoc_nuocngoai->whereIn('thitruonglamviec', getMaChauAu())));
        $model_hientai_nuocngoai_chauau = dinhdangso(count($model_hientai_nuocngoai->whereIn('thitruonglamviec', getMaChauAu())));
        ?>
        <tr>
            <td></td>
            <td>- Châu Âu</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ $model_truoc_nuocngoai_chauau }}</td>
            <td style="text-align: center;">{{ $model_hientai_nuocngoai_chauau }}</td>
        </tr>
        <?php
        $model_truoc_nuocngoai_khac = dinhdangso(count($model_truoc_nuocngoai->whereNotIn('thitruonglamviec', getMaChauAu())->whereNotIn('thitruonglamviec', ['KR', 'JP', 'TW'])));
        $model_hientai_nuocngoai_khac = dinhdangso(count($model_hientai_nuocngoai->whereNotIn('thitruonglamviec', getMaChauAu())->whereNotIn('thitruonglamviec', ['KR', 'JP', 'TW'])));
        ?>
        <tr>
            <td></td>
            <td>- Khác</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ $model_truoc_nuocngoai_khac }}</td>
            <td style="text-align: center;">{{ $model_hientai_nuocngoai_khac }}</td>
        </tr>
        {{-- @foreach (getCountries() as $k => $val)
            <?php
            $count_truoc = dinhdangso(count($model_truoc_nuocngoai->where('thitruonglamviec', $k)));
            $count_hientai = dinhdangso(count($model_hientai_nuocngoai->where('thitruonglamviec', $k)));
            ?>
            @if ($count_truoc > 0 || $count_hientai > 0)
                <tr>
                    <td></td>
                    <td>- {{ $val }}</td>
                    <td style="text-align: center;">Người</td>
                    <td style="text-align: center;">{{ $count_truoc }}</td>
                    <td style="text-align: center;">{{ $count_hientai }}</td>
                </tr>
            @endif
        @endforeach --}}

        {{-- <tr>
            <td>d</td>
            <td colspan="4">Chia theo ngành nghề</td>
        </tr>
        @foreach ($m_nganhnghe as $key => $val)
            <tr>
                <td>{{ $val->madm }}</td>
                <td>{{ $val->tendm }}</td>
                <td style="text-align: center;">Người</td>
                <td style="text-align: center;">
                    {{ dinhdangso(count($model_truoc_nuocngoai->where('nganhnghemongmuon', $val->madm))) }}</td>
                <td style="text-align: center;">
                    {{ dinhdangso(count($model_hientai_nuocngoai->where('nganhnghemongmuon', $val->madm))) }}</td>
            </tr>
        @endforeach --}}

        <tr>
            <td style="font-weight: bold;">1.3</td>
            <td colspan="4" style="font-weight: bold;">Nhu cầu học nghề</td>
        </tr>
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo khu vực</td>
        </tr>
        <tr>
            <td></td>
            <td>- Thành thị</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_truoc_hocnghe->where('khuvuc', '1'))) }}</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_hientai_hocnghe->where('khuvuc', '1'))) }}</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nông thôn</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_truoc_hocnghe->where('khuvuc', '2'))) }}</td>
            <td style="text-align: center;">{{ dinhdangso(count($model_hientai_hocnghe->where('khuvuc', '2'))) }}</td>
        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo giới tính</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nam</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">
                {{ dinhdangso(count($model_truoc_hocnghe->wherein('gioitinh', ['nam', 'Nam']))) }}</td>
            <td style="text-align: center;">
                {{ dinhdangso(count($model_hientai_hocnghe->wherein('gioitinh', ['nam', 'Nam']))) }}</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nữ</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">
                {{ dinhdangso(count($model_truoc_hocnghe->wherein('gioitinh', ['nu', 'Nu', 'nữ', 'Nữ']))) }}</td>
            <td style="text-align: center;">
                {{ dinhdangso(count($model_hientai_hocnghe->wherein('gioitinh', ['nu', 'Nu', 'nữ', 'Nữ']))) }}</td>
        </tr>

        <tr>
            <td>c</td>
            <td colspan="4">Chia theo ngành nghề</td>
        </tr>

        @foreach ($m_nganhnghe as $key => $val)
            <tr>
                <td>{{ $val->madm }}</td>
                <td>{{ $val->tendm }}</td>
                <td style="text-align: center;">Người</td>
                <td style="text-align: center;">
                    {{ dinhdangso(count($model_truoc_hocnghe->where('nganhnghemuonhoc', $val->madm))) }}</td>
                <td style="text-align: center;">
                    {{ dinhdangso(count($model_hientai_hocnghe->where('nganhnghemuonhoc', $val->madm))) }}</td>
            </tr>
        @endforeach


    </table>
    <table id="data_footer" width="96%" cellspacing="0" height cellpadding="0"
        style="margin: 20px auto;text-align: center; height:200px;font-size: 12px">
        <tr>
            <td width="60%" style="text-align: left; vertical-align: top;">

            </td>
            <td style="vertical-align: top;">
                <b>ỦY BAN NHÂN DÂN.......................</b><br>
                {{-- <i>(Chữ ký, dấu)</i> --}}
            </td>
        </tr>
    </table>
@stop
