@extends('main_baocao')
@section('content')
    <table id='data_header' width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
        <tr>
            <td width="40%" style="vertical-align: top;">
                <p style="text-transform: uppercase">ỦY BAN NHÂN DÂN</p>
                <span style="text-transform: uppercase;font-weight: bold">SỞ LAO ĐỘNG - THƯƠNG BINH VÀ XÃ HỘI</span>
                <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

            </td>
            <td style="vertical-align: top;">
                <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                    Độc lập - Tự do - Hạnh phúc</b>
                <hr style="color: black;;width: 15%;vertical-align: top; margin-top: 2px">

            </td>
        </tr>
        <tr>
            <td>Số: ....../BC-SLĐTBXH</td>
            <td style="text-align: right"><i style="margin-right: 30%;">Quảng Bình, ngày .... tháng .... năm ....</i></td>
        </tr>
    </table>
    <p id='data_body' style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">BÁO CÁO
        <br>VỀ THÔNG TIN THỊ TRƯỜNG CUNG LAO ĐỘNG NĂM {{ $nam }}
    </p>
    <p id='data_body1' style="text-align: center;font-style: italic;">Kính gửi: - Bộ Lao động - Thương binh và Xã hội<br>
        - Ủy ban nhân dân tỉnh/thành phố</p>

    <table id='data_body2' cellspacing="0" cellpadding="0" border="1"
        style="margin: 20px auto; border-collapse: collapse;">

        <tr>
            <th style="width: 5%;">STT</th>
            <th style="width: 45%;">Chỉ tiêu</th>
            <th style="width: 10%;">Đơn vị</th>
            <th style="width: 10%;">Kỳ trước</th>
            <th style="width: 10%;">Tăng</th>
            <th style="width: 10%;">Giảm</th>
            <th style="width: 10%;">Kỳ báo cáo</th>
        </tr>
        <tr style="text-align: center">
            <td> A </td>
            <td> B </td>
            <td> C </td>
            <td> 1 </td>
            <td> 2 </td>
            <td> 3 </td>
            <td> 4 </td>
        </tr>
        {{-- cung --}}
        {{-- <tr>
            <td colspan="5" style="font-weight: bold; text-transform: uppercase;text-align: left">I. THÔNG TIN CUNG LAO ĐỘNG</td>
        </tr> --}}
        <tr class="text-center">
            <?php $tuoi_kytruoc = count($cunglaodong->where('kydieutra', $namtruoc));
            $tuoi = count($cunglaodong->where('kydieutra', $nam));
            $r = $tuoi - $tuoi_kytruoc;
            ?>
            <td style="font-weight: bold;">1</td>
            <td style="font-weight: bold;" class="text-left">Số người từ 15 tuổi trở lên</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ $tuoi_kytruoc }}</td>
            @if ($r > 0)
                <td>{{ dinhdangso($r) }}</td>
                <td></td>
            @elseif ($r < 0)
                <td>{{ dinhdangso(abs($r)) }}</td>
                <td></td>
            @else
                <td></td>
                <td></td>
            @endif
            <td style="text-align: center;"> {{ $tuoi }} </td>
        </tr>

        <tr>
            <td>a</td>
            <td colspan="4">Chia theo khu vực</td>
        </tr>
        <tr>
            <td></td>
            <td>- Thành thị</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{ dinhdangso($a_ketqua['thanhthi']) }} </td>
            <td style="text-align: center;"> {{ dinhdangso($tang_ketqua['thanhthi']) }} </td>
            <td style="text-align: center;"> {{ dinhdangso($giam_ketqua['thanhthi']) }} </td>
            <td style="text-align: center;">{{ dinhdangso($a_ketqua_hientai['thanhthi']) }} </td>
        </tr>
        <tr>
            <td></td>
            <td>- Nông thôn</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{ dinhdangso($a_ketqua['nongthon']) }} </td>
            <td style="text-align: center;"> {{ dinhdangso($tang_ketqua['nongthon']) }} </td>
            <td style="text-align: center;"> {{ dinhdangso($giam_ketqua['nongthon']) }} </td>
            <td style="text-align: center;">{{ dinhdangso($a_ketqua_hientai['nongthon']) }}</td>
        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo giới tính</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nam</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso($a_ketqua['nam']) }} </td>
            <td style="text-align: center;">{{ dinhdangso($tang_ketqua['nam']) }} </td>
            <td style="text-align: center;">{{ dinhdangso($giam_ketqua['nam']) }} </td>
            <td style="text-align: center;">{{ dinhdangso($a_ketqua_hientai['nam']) }}</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nữ</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso($a_ketqua['nu']) }}</td>
            <td style="text-align: center;">{{ dinhdangso($tang_ketqua['nu']) }} </td>
            <td style="text-align: center;">{{ dinhdangso($giam_ketqua['nu']) }} </td>
            <td style="text-align: center;">{{ dinhdangso($a_ketqua_hientai['nu']) }}</td>
        </tr>
        <?php $model_covieclam = $cunglaodong->where('tinhtranghdkt', 1);
        $tinhtrang_namtruoc = count($model_covieclam->where('kydieutra', $namtruoc));
        $tinhtrang = count($model_covieclam->where('kydieutra', $nam));
        $r_tinhtrang = $tinhtrang - $tinhtrang_namtruoc;
        ?>
        <tr class="text-center">
            <td style="font-weight: bold;">2</td>
            <td style="font-weight: bold;" class="text-left">Số người có việc làm</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso($tinhtrang_namtruoc) }}</td>
            @if ($r_tinhtrang > 0)
                <td>{{ dinhdangso($r_tinhtrang) }}</td>
                <td></td>
            @elseif ($r_tinhtrang < 0)
                <td>{{ dinhdangso(abs($r_tinhtrang)) }}</td>
                <td></td>
            @else
                <td></td>
                <td></td>
            @endif
            <td style="text-align: center;">{{ dinhdangso($tinhtrang) }}</td>
        </tr>
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo Khu vực</td>
        </tr>
        <tr>
            <td></td>
            <td>- Thành thị</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{ dinhdangso($a_covl['thanhthi']) }} </td>
            <td style="text-align: center;"> {{ dinhdangso($tang_covl['thanhthi']) }} </td>
            <td style="text-align: center;"> {{ dinhdangso($giam_covl['thanhthi']) }} </td>
            <td style="text-align: center;"> {{ dinhdangso($a_covl_hientai['thanhthi']) }} </td>
        </tr>
        <tr>
            <td></td>
            <td>- Nông thôn</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{ dinhdangso($a_covl['nongthon'] )}} </td>
            <td style="text-align: center;"> {{ dinhdangso($tang_covl['nongthon']) }} </td>
            <td style="text-align: center;"> {{ dinhdangso($giam_covl['nongthon'] )}} </td>
            <td style="text-align: center;">{{ dinhdangso($a_covl_hientai['nongthon']) }} </td>
        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo trình độ chuyên môn kỹ thật</td>
        </tr>
        @foreach ($a_cmkt as $key => $ct)
            <tr class="text-center">
                <?php
                $cmkt_namtruoc = count($model_covieclam->where('chuyenmonkythuat', $key)->where('kydieutra', $namtruoc));
                $cmkt = count($model_covieclam->where('chuyenmonkythuat', $key)->where('kydieutra', $nam));
                $r_cmkt = $cmkt - $cmkt_namtruoc;
                ?>
                <td></td>
                <td class="text-left">{{ $ct }}</td>
                <td style="text-align: center;">Người</td>
                <td style="text-align: center;">{{ dinhdangso($cmkt_namtruoc) }}</td>
                @if ($r_cmkt > 0)
                    <td>{{ dinhdangso($r_cmkt) }}</td>
                    <td></td>
                @elseif ($r_cmkt < 0)
                    <td>{{ dinhdangso(abs($r_cmkt)) }}</td>
                    <td></td>
                @else
                    <td></td>
                    <td></td>
                @endif
                <td style="text-align: center;">{{ dinhdangso($cmkt) }}</td>
            </tr>
        @endforeach

        <tr>
            <td>c</td>
            <td colspan="4">Chia theo vị thế việc làm</td>
        </tr>

        @foreach ($a_vithevl as $k => $val)
            <tr class="text-center">
                <?php
                $vithe_namtruoc = count($model_covieclam->where('nguoicovieclam', $k)->where('kydieutra', $namtruoc));
                $vithe = count($model_covieclam->where('nguoicovieclam', $k)->where('kydieutra', $nam));
                $r_vithe = $vithe - $vithe_namtruoc;
                ?>
                <td></td>
                <td class="text-left">{{ $val }}</td>
                <td style="text-align: center;">Người</td>
                <td style="text-align: center;">{{ dinhdangso($vithe_namtruoc) }}</td>
                @if ($r_vithe > 0)
                    <td>{{ dinhdangso($r_vithe) }}</td>
                    <td></td>
                @elseif ($r_vithe < 0)
                    <td>{{ dinhdangso(abs($r_vithe)) }}</td>
                    <td></td>
                @else
                    <td></td>
                    <td></td>
                @endif
                <td style="text-align: center;">{{ dinhdangso($vithe) }}</td>
            </tr>
        @endforeach
        <?php $model_thatnghiep = $cunglaodong->where('tinhtranghdkt', 2);
        $thatnghiep_namtruoc = count($model_thatnghiep->where('kydieutra', $namtruoc));
        $thatnghiep = count($model_thatnghiep->where('kydieutra', $nam));
        $r_thatnghiep = $thatnghiep - $thatnghiep_namtruoc;
        ?>
        <tr class="text-center">
            <td style="font-weight: bold;">3</td>
            <td style="font-weight: bold;" class="text-left">Số người thất nghiệp</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso($thatnghiep_namtruoc) }}</td>
            @if ($r_thatnghiep > 0)
                <td>{{ dinhdangso($r_thatnghiep) }}</td>
                <td></td>
            @elseif ($r_thatnghiep < 0)
                <td>{{ dinhdangso(abs($r_thatnghiep)) }}</td>
                <td></td>
            @else
                <td></td>
                <td></td>
            @endif
            <td style="text-align: center;">{{ dinhdangso($thatnghiep) }}</td>
        </tr>
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo Khu vực</td>
        </tr>
        <tr>
            <td></td>
            <td>- Thành thị</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{ dinhdangso($a_thatnghiep['thanhthi']) }} </td>
            <td style="text-align: center;"> {{ dinhdangso($tang_thatnghiep['thanhthi']) }} </td>
            <td style="text-align: center;"> {{ dinhdangso($giam_thatnghiep['thanhthi']) }} </td>
            <td style="text-align: center;"> {{ dinhdangso($a_thatnghiep_hientai['thanhthi']) }}</td>

        </tr>
        <tr>
            <td></td>
            <td>- Nông thôn</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{ dinhdangso($a_thatnghiep['nongthon']) }} </td>
            <td style="text-align: center;"> {{ dinhdangso($tang_thatnghiep['nongthon'] )}} </td>
            <td style="text-align: center;"> {{ dinhdangso($giam_thatnghiep['nongthon'] )}} </td>
            <td style="text-align: center;"> {{ dinhdangso($a_thatnghiep_hientai['nongthon']) }} </td>

        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo trình độ chuyên môn kỹ thật</td>
        </tr>
        @foreach ($a_cmkt as $key => $ct)
            <tr class="text-center">
                <?php
                $cmkt_thatnghiep_namtruoc = count($model_thatnghiep->where('chuyenmonkythuat', $key)->where('kydieutra', $namtruoc));
                $cmkt_thatnghiep = count($model_thatnghiep->where('chuyenmonkythuat', $key)->where('kydieutra', $nam));
                $r_cmkt_thatnghiep = $cmkt_thatnghiep - $cmkt_thatnghiep_namtruoc;
                ?>
                <td></td>
                <td class="text-left">{{ $ct }}</td>
                <td style="text-align: center;">Người</td>
                <td style="text-align: center;">{{ dinhdangso($cmkt_thatnghiep_namtruoc) }}</td>
                @if ($r_cmkt_thatnghiep > 0)
                    <td>{{ dinhdangso($r_cmkt_thatnghiep) }}</td>
                    <td></td>
                @elseif ($r_cmkt_thatnghiep < 0)
                    <td>{{ dinhdangso(abs($r_cmkt_thatnghiep)) }}</td>
                    <td></td>
                @else
                    <td></td>
                    <td></td>
                @endif
                <td style="text-align: center;">{{ dinhdangso($cmkt_thatnghiep) }}</td>
            </tr>
        @endforeach

        <tr>
            <td>c</td>
            <td colspan="4">Chia theo thời gian thất nghiệp</td>
        </tr>

        @foreach ($a_thoigianthatnghiep as $key => $ct)
            <tr class="text-center">
                <?php
                $thoigian_thatnghiep_namtruoc = count($model_thatnghiep->where('thoigianthatnghiep', $key)->where('kydieutra', $namtruoc));
                $thoigian_thatnghiep = count($model_thatnghiep->where('thoigianthatnghiep', $key)->where('kydieutra', $nam));
                $r_thoigian_thatnghiep = $thoigian_thatnghiep - $thoigian_thatnghiep_namtruoc;
                ?>
                <td></td>
                <td class="text-left">{{ $ct }}</td>
                <td style="text-align: center;">Người</td>
                <td style="text-align: center;">
                    {{ dinhdangso($thoigian_thatnghiep_namtruoc) }}</td>
                @if ($r_thoigian_thatnghiep > 0)
                    <td>{{ dinhdangso($r_thoigian_thatnghiep) }}</td>
                    <td></td>
                @elseif ($r_thoigian_thatnghiep < 0)
                    <td>{{ dinhdangso(abs($r_thoigian_thatnghiep)) }}</td>
                    <td></td>
                @else
                    <td></td>
                    <td></td>
                @endif
                <td style="text-align: center;">
                    {{ dinhdangso($thoigian_thatnghiep) }}</td>
            </tr>
        @endforeach
        <?php $model_khongthamgia = $cunglaodong->where('tinhtranghdkt', 3);
        $ktg_namtruoc = count($model_khongthamgia->where('khongthamgiahdkt', $k)->where('kydieutra', $namtruoc));
        $ktg = count($model_khongthamgia->where('khongthamgiahdkt', $k)->where('kydieutra', $nam));
        $r_ktg = $ktg - $ktg_namtruoc;
        ?>
        <tr class="text-center">
            <td style="font-weight: bold;">4</td>
            <td style="font-weight: bold;" class="text-left">Số người không tham gia hoạt động kinh tế</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">
                {{ dinhdangso($ktg_namtruoc) }}</td>
            @if ($r_ktg > 0)
                <td>{{ dinhdangso($r_ktg) }}</td>
                <td></td>
            @elseif ($r_ktg < 0)
                <td>{{ dinhdangso(abs($r_ktg)) }}</td>
                <td></td>
            @else
                <td></td>
                <td></td>
            @endif
            <td style="text-align: center;">
                {{ dinhdangso($ktg) }}</td>
        </tr>
        <?php $i = 0; ?>
        @foreach ($a_khongthamgia as $k => $item)
            <?php 
            $lydo_namtruoc = count($model_khongthamgia->where('khongthamgiahdkt', $k)->where('kydieutra', $namtruoc));
            $lydo =  count($model_khongthamgia->where('khongthamgiahdkt', $k)->where('kydieutra', $nam));
            $r_lydo = $lydo - $lydo_namtruoc;
            ?>
            <tr class="text-center">

                <td>
                    @if ($i == 0)
                        <p>a</p>
                    @endif
                    @if ($i == 1)
                        <p>b</p>
                    @endif
                    @if ($i == 2)
                        <p>c</p>
                    @endif
                    @if ($i == 3)
                        <p>d</p>
                    @endif
                    @if ($i == 4)
                        <p>e</p>
                    @endif
                    @if ($i == 5)
                        <p>g</p>
                    @endif
                    <?php $i++; ?>
                </td>
                <td class="text-left"> {{ $item }}</td>
                <td style="text-align: center;">Người</td>
                <td style="text-align: center;">
                    {{ dinhdangso($lydo_namtruoc) }}</td>
                    @if ($r_lydo > 0)
                    <td>{{ dinhdangso($r_lydo) }}</td>
                    <td></td>
                @elseif ($r_lydo < 0)
                    <td>{{ dinhdangso(abs($r_lydo)) }}</td>
                    <td></td>
                @else
                    <td></td>
                    <td></td>
                @endif
                <td style="text-align: center;">
                    {{dinhdangso($lydo)}}</td>
            </tr>
        @endforeach
        {{-- cầu --}}

    </table>

    <table id='data_footer' width="96%" cellspacing="0" height cellpadding="0"
        style="margin: 20px auto;text-align: center; height:200px">
        <tr>
            <td width="40%" style="text-align: left; vertical-align: top;">
            </td>
            <td style="vertical-align: top;">
                <b>GIÁM ĐỐC</b><br>
                <i>(Chữ ký, dấu)</i>
            </td>
        </tr>
    </table>
@stop
