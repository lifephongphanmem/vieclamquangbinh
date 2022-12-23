@extends('main_baocao')
@section('content')
    <table width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
        <tr>
            <td width="40%" style="vertical-align: top;">
             
                <p>Tỉnh, thành phố ...............................................</p>
                <p>Quận, huyện, thị xã .........................................</p>
                <p>Xã, phường, thị trấn ........................................</p>
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
    <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">BÁO CÁO <br>VỀ THÔNG TIN CUNG LAO ĐỘNG NĂM......</p>
    <p style="text-align: center;font-style: italic;">Kính gửi: - Ủy ban nhân dân ................................................<br>- Sở Lao động - Thương binh và Xã hội</p>

    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;"
        id="data">

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
        <tr>
            <td colspan="5" style="font-weight: bold; text-transform: uppercase;text-align: left">I. THÔNG TIN CUNG LAO ĐỘNG</td>
        </tr>
        <tr>
            <td  style="font-weight: bold;">1</td>
            <td  style="font-weight: bold;">Số người từ 15 tuổi trở lên</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam-1))}}</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam))}}</td>
        </tr>
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo khu vực</td>
        </tr>
        <tr>
            <td></td><td>- Thành thị</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cung_tt->where('nam',$nam-1))}}</td>
            <td style="text-align: center;">{{count($cung_tt->where('nam',$nam))}}</td>
        </tr>
        <tr>
            <td></td><td>- Nông thôn</td> <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cung_nt->where('nam',$nam-1))}}</td>
            <td style="text-align: center;">{{count($cung_nt->where('nam',$nam))}}</td>
        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo giới tính</td>
        </tr>
        <tr>
            <td></td><td>- Nam</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam-1)->where('gioitinh','Nam'))}}</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam)->where('gioitinh','Nam'))}}</td>
        </tr>
        <tr>
            <td></td><td>- Nữ</td> <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam-1)->where('gioitinh','Nu'))}}</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam)->where('gioitinh','Nu'))}}</td>
        </tr>
        <tr>
            <td  style="font-weight: bold;">2</td>
            <td  style="font-weight: bold;">Số người có việc làm</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam-1)->where('thatnghiep',null))}}</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam)->where('thatnghiep',null))}}</td>
        </tr>
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo Khu vực</td>
        </tr>
        <tr>
            <td></td><td>- Thành thị</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cung_tt->where('nam',$nam-1)->where('thatnghiep',null))}}</td>
            <td style="text-align: center;">{{count($cung_tt->where('nam',$nam)->where('thatnghiep',null))}}</td>
        </tr>
        <tr>
            <td></td><td>- Nông thôn</td> <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cung_nt->where('nam',$nam-1)->where('thatnghiep',null))}}</td>
            <td style="text-align: center;">{{count($cung_nt->where('nam',$nam)->where('thatnghiep',null))}}</td>
        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo trình độ chuyên môn kỹ thật</td>
        </tr>
        
        @foreach ($dmtrinhdokythuat as $kythuat)
        <tr>
            <td></td><td>{{$kythuat->tentdkt}}</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam-1)->where('thatnghiep',null)->where('trinhdocmkt',$kythuat->madmtdkt))}}</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam)->where('thatnghiep',null)->where('trinhdocmkt',$kythuat->madmtdkt))}}</td>
        </tr>
        @endforeach
        <tr>
            <td>c</td>
            <td colspan="4">Chia theo vị thế việc làm</td>
        </tr>
        @foreach ($dmvithevieclam as $vithe)
        <tr>
            <td></td><td>{{$vithe->tentgktct2}}</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam-1)->where('thatnghiep',null)->where('vithevl',$vithe->madmtgktct2))}}</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam)->where('thatnghiep',null)->where('vithevl',$vithe->madmtgktct2))}}</td>
        </tr>
        @endforeach
       
        <tr>
            <td  style="font-weight: bold;">3</td>
            <td  style="font-weight: bold;">Số người thất nghiệp</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam-1)->where('thatnghiep','!=',null)->where('lydoktg',null))}}</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam)->where('thatnghiep','!=',null)->where('lydoktg',null))}}</td>
        </tr>
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo Khu vực</td>
        </tr>
        <tr>
            <td></td><td>- Thành thị</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cung_tt->where('nam',$nam-1)->where('thatnghiep','!=',null)->where('lydoktg',null))}}</td>
            <td style="text-align: center;">{{count($cung_tt->where('nam',$nam)->where('thatnghiep','!=',null)->where('lydoktg',null))}}</td>
        </tr>
        <tr>
            <td></td><td>- Nông thôn</td> <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cung_nt->where('nam',$nam-1)->where('thatnghiep','!=',null)->where('lydoktg',null))}}</td>
            <td style="text-align: center;">{{count($cung_nt->where('nam',$nam)->where('thatnghiep','!=',null)->where('lydoktg',null))}}</td>
        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo trình độ chuyên môn kỹ thật</td>
        </tr>
        @foreach ($dmtrinhdokythuat as $kythuat)
        <tr>
            <td></td><td>{{$kythuat->tentdkt}}</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam-1)->where('thatnghiep','!=',null)->where('lydoktg',null)->where('trinhdocmkt',$kythuat->madmtdkt))}}</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam)->where('thatnghiep','!=',null)->where('lydoktg',null)->where('trinhdocmkt',$kythuat->madmtdkt))}}</td>
        </tr>
        @endforeach
      
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo thời gian thất nghiệp</td>
        </tr>
        @foreach ($tgthatnghiep as $thatnghiep)
        <tr>
            <td></td><td>{{$thatnghiep->tentgktct2}}</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam-1)->where('thatnghiep','!=',null)->where('lydoktg',null)->where('trinhdocmkt',$thatnghiep->madmtgktct2))}}</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam)->where('thatnghiep','!=',null)->where('lydoktg',null)->where('trinhdocmkt',$thatnghiep->madmtgktct2))}}</td>
        </tr>
        @endforeach
        <tr>
            <td  style="font-weight: bold;">4</td>
            <td  style="font-weight: bold;">Số người không tham gia hoạt động kinh tế</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam-1)->where('lydoktg','!=',null))}}</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam)->where('lydoktg','!=',null))}}</td>
        </tr>
        @foreach ($lydoktg as $i => $lydo)
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
            </td>
            <td> {{$lydo->tentgktct}}</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam-1)->where('lydoktg',$lydo->madmtgktct))}}</td>
            <td style="text-align: center;">{{count($cungld->where('nam',$nam)->where('lydoktg',$lydo->madmtgktct))}}</td>
        </tr>
        @endforeach
    </table>
    <table width="96%" cellspacing="0" height cellpadding="0" style="margin: 20px auto;text-align: center; height:200px">
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
