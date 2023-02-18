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
    <p id='data_body' style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">BÁO CÁO <br>VỀ THÔNG TIN THỊ TRƯỜNG LAO ĐỘNG  NĂM {{$nam}}</p>
    <p id='data_body1' style="text-align: center;font-style: italic;">Kính gửi: - Bộ Lao động - Thương binh và Xã hội<br>
                                                                    - Ủy ban nhân dân tỉnh/thành phố</p>

        <table id='data_body2' cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">

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
            <td> 1 </td>
            <td> 2 </td>
        </tr>
        {{-- cung --}}
        <tr>
            <td colspan="5" style="font-weight: bold; text-transform: uppercase;text-align: left">I. THÔNG TIN CUNG LAO ĐỘNG</td>
        </tr>
        <tr>
            <td  style="font-weight: bold;">1</td>
            <td  style="font-weight: bold;">Số người từ 15 tuổi trở lên</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cunglaodong->where('kydieutra',$nam-1))}}</td>
            <td style="text-align: center;"> {{count($cunglaodong->where('kydieutra',$nam))}} </td>
        </tr>

        <tr>
            <td>a</td>
            <td colspan="4">Chia theo khu vực</td>
        </tr>
        <tr>
            <td></td><td>- Thành thị</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{ $a_ketqua['thanhthi']}} </td>
            <td style="text-align: center;">  </td>
        </tr>
        <tr>
            <td></td><td>- Nông thôn</td> <td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{ $a_ketqua['nongthon']}}  </td>
            <td style="text-align: center;">{{ $a_ketqua_hientai['thanhthi']}}</td>
        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo giới tính</td>
        </tr>
        <tr>
            <td></td><td>- Nam</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ $a_ketqua['nam'] }} </td>
            <td style="text-align: center;">{{ $a_ketqua_hientai['nam'] }}</td>
        </tr>
        <tr>
            <td></td><td>- Nữ</td> <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ $a_ketqua['nu'] }}</td>
            <td style="text-align: center;">{{ $a_ketqua_hientai['nu'] }}</td>
        </tr>
        <?php $model_covieclam = $cunglaodong->where('tinhtranghdkt', 1); ?>
        <tr>
            <td  style="font-weight: bold;">2</td>
            <td  style="font-weight: bold;">Số người có việc làm</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($model_covieclam->where('kydieutra',$nam-1))}}</td>
            <td style="text-align: center;">{{count($model_covieclam->where('kydieutra',$nam))}}</td>
        </tr>
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo Khu vực</td>
        </tr>
        <tr>
            <td></td><td>- Thành thị</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{$a_covl['thanhthi'] }} </td>
            <td style="text-align: center;"> {{$a_covl_hientai['thanhthi'] }} </td>
        </tr>
        <tr>
            <td></td><td>- Nông thôn</td> <td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{ $a_covl['nongthon']}} </td>
            <td style="text-align: center;">{{ $a_covl_hientai['nongthon']}} </td>
        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo trình độ chuyên môn kỹ thật</td>
        </tr>
        @foreach ($a_cmkt as $key => $ct)
        <tr>
            <td></td>
            <td>{{$ct}}</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ count($model_covieclam->where('chuyenmonkythuat', $key)->where('kydieutra',$nam-1)) }}</td>
            <td style="text-align: center;">{{ count($model_covieclam->where('chuyenmonkythuat', $key)->where('kydieutra',$nam)) }}</td>
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
            <td style="text-align: center;">{{ count($model_covieclam->where('nguoicovieclam', $k)->where('kydieutra',$nam-1)) }}</td>
            <td style="text-align: center;">{{ count($model_covieclam->where('nguoicovieclam', $k)->where('kydieutra',$nam)) }}</td>
        </tr>
        @endforeach
        <?php $model_thatnghiep = $cunglaodong->where('tinhtranghdkt', 2); ?>
        <tr>
            <td  style="font-weight: bold;">3</td>
            <td  style="font-weight: bold;">Số người thất nghiệp</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($model_thatnghiep->where('kydieutra',$nam-1))}}</td>
            <td style="text-align: center;">{{count($model_thatnghiep->where('kydieutra',$nam))}}</td>
        </tr>
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo Khu vực</td>
        </tr>
        <tr>
            <td></td><td>- Thành thị</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{ $a_thatnghiep['thanhthi'] }} </td>
            <td style="text-align: center;"> {{ $a_thatnghiep_hientai['thanhthi'] }}</td>

        </tr>
        <tr>
            <td></td><td>- Nông thôn</td> <td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{ $a_thatnghiep['nongthon'] }} </td>
            <td style="text-align: center;"> {{ $a_thatnghiep_hientai['nongthon'] }} </td>

        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo trình độ chuyên môn kỹ thật</td>
        </tr>
        @foreach ($a_cmkt as $key => $ct)
        <tr>
            <td></td><td>{{$ct}}</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ count($model_thatnghiep->where('chuyenmonkythuat', $key)->where('kydieutra',$nam-1)) }}</td>
            <td style="text-align: center;">{{ count($model_thatnghiep->where('chuyenmonkythuat', $key)->where('kydieutra',$nam)) }}</td>
        </tr>
        @endforeach

        <tr>
            <td>c</td>
            <td colspan="4">Chia theo thời gian thất nghiệp</td>
        </tr>

        @foreach ($a_thoigianthatnghiep as $key => $ct)
        <tr>
            <td></td><td>{{$ct}}</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ count($model_thatnghiep->where('thoigianthatnghiep', $key)->where('kydieutra',$nam-1)) }}</td>
            <td style="text-align: center;">{{ count($model_thatnghiep->where('thoigianthatnghiep', $key)->where('kydieutra',$nam)) }}</td>
        </tr>
        @endforeach
        <?php $model_khongthamgia = $cunglaodong->where('tinhtranghdkt', 3); ?>
        <tr>
            <td  style="font-weight: bold;">4</td>
            <td  style="font-weight: bold;">Số người không tham gia hoạt động kinh tế</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ count($model_khongthamgia->where('khongthamgiahdkt', $k)->where('kydieutra',$nam-1)) }}</td>
            <td style="text-align: center;">{{ count($model_khongthamgia->where('khongthamgiahdkt', $k)->where('kydieutra',$nam)) }}</td>
        </tr>
        <?php $i=0?>
        @foreach ($a_khongthamgia as $k=>$item )

        <tr>
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
                <?php $i++?>
            </td>
            <td> {{$item}}</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ count($model_khongthamgia->where('khongthamgiahdkt', $k)->where('kydieutra',$nam-1)) }}</td>
            <td style="text-align: center;">{{ count($model_khongthamgia->where('khongthamgiahdkt', $k)->where('kydieutra',$nam)) }}</td>
        </tr>
        @endforeach
        {{-- cầu --}}
        <tr>
            <td colspan="5" style="font-weight: bold; text-transform: uppercase;text-align: left">II. THÔNG TIN CẦU LAO ĐỘNG</td>
        </tr>
        <tr>
            <td  style="font-weight: bold;">1</td>
            <td  style="font-weight: bold;">Tổng số doanh nghiệp</td>
            <td style="text-align: center;">DN</td>
            <td style="text-align: center;">{{$a_doanhnghiep['namtruoc']}}</td>
            <td style="text-align: center;">{{$a_doanhnghiep['namhientai'] + $a_doanhnghiep['namtruoc']}}</td>
        </tr>
        <tr>
            <td  style="font-weight: bold;">2</td>
            <td  style="font-weight: bold;">Tổng số lao dộng</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{$a_tong['namtruoc']}}</td>
            <td style="text-align: center;">{{$a_tong['namhientai'] + $a_tong['namtruoc']}}</td>
        </tr>
        <tr>
            <td> a </td><td colspan="4"> Chia theo loại lao động </td>
        </tr>
        <tr>
            <td></td><td>- Lao động nữ</td><td style="text-align: center">Người</td>
            <td style="text-align: center">{{$a_loailaodong['nu']}}</td>
            <td style="text-align: center">{{$a_loailaodong_hientai['nu'] + $a_loailaodong['nu']}}</td>
        </tr>

        <tr>
            <td></td><td>- Lao động trên 35 tuổi</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{$a_loailaodong['tren35t']}}</td>
            <td style="text-align: center;">{{$a_loailaodong_hientai['tren35t'] + $a_loailaodong['tren35t']}}</td>
        </tr>

        <tr>
            <td></td><td>- Lao động tham gia BHXH bắt buộc</td><td style="text-align: center;">Người</td>
            <td style="text-align: center">{{$a_loailaodong['bhbatbuoc']}}</td>
            <td style="text-align: center">{{$a_loailaodong_hientai['bhbatbuoc'] + $a_loailaodong['bhbatbuoc']}}</td>
        </tr>
        <tr>
            <td> b </td><td colspan="4"> Chia theo vị trí việc làm </td>
        </tr>
        <tr>
            <td></td><td>- Nhà quản lý</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{$a_vitri['nhaquanly']}}</td>
            <td style="text-align: center;">{{$a_vitri_hientai['nhaquanly'] + $a_vitri['nhaquanly']}}</td>
        </tr>
        <tr>
            <td></td><td>- Chuyên môn kỹ thuật bậc cao</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{$a_vitri['chuyenmonbaccao']}}</td>
            <td style="text-align: center;">{{$a_vitri_hientai['chuyenmonbaccao'] + $a_vitri['chuyenmonbaccao']}}</td>
        </tr>
        <tr>
            <td></td><td>- Chuyên môn kỹ thuật bậc trung</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{$a_vitri['chuyenmonbactrung']}}</td>
            <td style="text-align: center;">{{$a_vitri_hientai['chuyenmonbactrung'] + $a_vitri['chuyenmonbactrung']}}</td>
        </tr>
        <tr>
            <td></td><td>- Khác</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{$a_vitri['khac']}}</td>
            <td style="text-align: center;">{{$a_vitri_hientai['khac'] + $a_vitri['khac']}}</td>
        </tr>

        {{-- nhu cầu tuyển dụng --}}
        <tr>
            <td colspan="5" style="font-weight: bold; text-transform: uppercase;text-align: left">III. THÔNG TIN NHU CẦU TUYỂN DỤNG LAO ĐỘNG</td>
        </tr>

        <tr>
            <td style="font-weight: bold;">1</td>
            <td style="font-weight: bold;">Tổng số lượng tuyển</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{$tuyendung->where('nam',$nam-1)->sum('soluong')}}</td>
            <td style="text-align: center;">{{$tuyendung->where('nam',$nam)->sum('soluong')}}</td>
        </tr>
        <tr>
            <td  style="font-weight: bold;">2</td>
            <td colspan="5"  style="font-weight: bold;">Chia theo loại hình</td>
        </tr>
    <?php $j=0 ?>
        @foreach ($loaihinhdn as $k => $lh) 
        <tr>
            <td>
                @if ($j == 0)
                <p>a</p>
                @endif
                @if ($j == 1)
                <p>b</p>
                @endif
                @if ($j == 2)
                <p>c</p>
                @endif
                @if ($j == 3)
                <p>d</p>
                @endif
                @if ($j == 4)
                <p>e</p>
                @endif
                @if ($j == 5)
                <p>g</p>
                @endif
                @if ($j == 6)
                <p>h</p>
                @endif
                @if ($j == 7)
                <p>i</p>
                @endif
                @if ($j == 8)
                <p>k</p>
                @endif
                @if ($j == 9)
                <p>l</p>
                @endif
                @if ($j == 10)
                <p>m</p>
                @endif
                @if ($j == 11)
                <p>n</p>
                @endif
                <?php $j++ ?>
            </td>
            <td> {{$lh}} </td><td style="text-align: center;">Người</td>
            <td  style="text-align: center;">{{  $tuyendung->where('nam',$nam-1)->where('loaihinh',$k)->sum('soluong') }}</td>
            <td  style="text-align: center;">{{$tuyendung->where('nam',$nam)->where('loaihinh',$k)->sum('soluong') }}</td>
        </tr>
        @endforeach
        <tr>
            <td  style="font-weight: bold;">2</td>
            <td colspan="5"  style="font-weight: bold;">Chia theo mã nghề cấp 2</td>
           
        </tr>
        @foreach ($dmmanghetrinhdo as $manghe)
        <tr>
            <td></td><td>{{$manghe->tenmntd}}</td><td style="text-align: center;">Người</td><td style="text-align: center;"> </td>
            <td style="text-align: center;"></td>
        </tr>
        @endforeach
        <tr>
            <td colspan="5" style="font-weight: bold; text-transform: uppercase;text-align: left">III. THÔNG TIN NGƯỜI LAO ĐỘNG NƯỚC NGOÀI LÀM VIỆC TẠI VIỆT NAM</td>
        </tr>
        <tr>
            <td style="font-weight: bold;">1</td>
            <td style="font-weight: bold;">Tổng số</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{$a_tongld_nuocngoai['namtruoc']}}</td>
            <td style="text-align: center;">{{$a_tongld_nuocngoai['hientai'] + $a_tongld_nuocngoai['namtruoc'] }}</td>
        </tr>
        <tr>
            <td  style="font-weight: bold;">2</td>
            <td colspan="5"  style="font-weight: bold;">Chia theo vị trí công việc</td>
           
        </tr>
        <tr>
            <td>a</td>
            <td>Nhà quản lý</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{$a_vitri_cv['quanly']}}</td>
            <td style="text-align: center;">{{$a_vitri_cv['quanly']+$a_vitri_cv_hientai['quanly']}}</td>
        </tr>
        <tr>
            <td>b</td>
            <td>Giám đốc điều hành</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{$a_vitri_cv['giamdoc']}}</td>
            <td style="text-align: center;">{{$a_vitri_cv['giamdoc']+$a_vitri_cv_hientai['giamdoc']}}</td>
        </tr>
        <tr>
            <td>c</td>
            <td>Chuyên gia</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{$a_vitri_cv['chuyengia']}}</td>
            <td style="text-align: center;">{{$a_vitri_cv['chuyengia']+$a_vitri_cv_hientai['chuyengia']}}</td>
        </tr>
        <tr>
            <td>d</td>
            <td>Lao động kỹ thuật</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{$a_vitri_cv['kythuat']}}</td>
            <td style="text-align: center;">{{$a_vitri_cv['kythuat']+$a_vitri_cv_hientai['kythuat']}}</td>
        </tr>
       
    </table>

    <table id='data_footer' width="96%" cellspacing="0" height cellpadding="0" style="margin: 20px auto;text-align: center; height:200px">
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


