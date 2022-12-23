@extends('main_baocao')
@section('custom-style')
@stop


@section('custom-script')

@stop

@section('content')
    <table width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
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
    <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">BÁO CÁO <br>VỀ THÔNG TIN THỊ TRƯỜNG LAO ĐỘNG  NĂM......</p>
    <p style="text-align: center;font-style: italic;">Kính gửi: - Bộ Lao động - Thương binh và Xã hội<br>
                                                                    - Ủy ban nhân dân tỉnh/thành phố</p>

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
        {{-- cung --}}
        <tr>
            <td colspan="5" style="font-weight: bold; text-transform: uppercase;text-align: left">I. THÔNG TIN CUNG LAO ĐỘNG</td>
        </tr>
        <tr>
            <td  style="font-weight: bold;">1</td>
            <td  style="font-weight: bold;">Số người từ 15 tuổi trở lên</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam-1))}}</td>
            <td style="text-align: center;"> {{count($tonghopdanhsachcungld_ct->where('nam',$nam))}} </td>
        </tr>
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo khu vực</td>
        </tr>
        <tr>
            <td></td><td>- Thành thị</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{count($tonghopdanhsachcungld_ct->where('nam',$nam -1 )->where('madb',$mathanhthi))}} </td>
            <td style="text-align: center;"> {{count($tonghopdanhsachcungld_ct->where('nam',$nam)->where('madb',$mathanhthi))}} </td>
        </tr>
        <tr>
            <td></td><td>- Nông thôn</td> <td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{count($tonghopdanhsachcungld_ct->where('nam',$nam-1)->where('madb',$manongthon))}} </td>
            <td style="text-align: center;"> {{count($tonghopdanhsachcungld_ct->where('nam',$nam)->where('madb',$manongthon))}} </td>
        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo giới tính</td>
        </tr>
        <tr>
            <td></td><td>- Nam</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam-1)->where('gioitinh','Nam'))}} </td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam)->where('gioitinh','Nam'))}}</td>
        </tr>
        <tr>
            <td></td><td>- Nữ</td> <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam-1)->where('gioitinh','Nu'))}}</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam)->where('gioitinh','Nu'))}}</td>
        </tr>
        <tr>
            <td  style="font-weight: bold;">2</td>
            <td  style="font-weight: bold;">Số người có việc làm</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam-1)->where('thatnghiep',null))}}</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam)->where('thatnghiep',null))}}</td>
        </tr>
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo Khu vực</td>
        </tr>
        <tr>
            <td></td><td>- Thành thị</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{count($tonghopdanhsachcungld_ct->where('nam',$nam-1)->where('thatnghiep',null)->where('madb',$mathanhthi))}} </td>
            <td style="text-align: center;"> {{count($tonghopdanhsachcungld_ct->where('nam',$nam)->where('thatnghiep',null)->where('madb',$mathanhthi))}} </td>
        </tr>
        <tr>
            <td></td><td>- Nông thôn</td> <td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{count($tonghopdanhsachcungld_ct->where('nam',$nam-1)->where('thatnghiep',null)->where('madb',$manongthon))}} </td>
            <td style="text-align: center;"> {{count($tonghopdanhsachcungld_ct->where('nam',$nam)->where('thatnghiep',null)->where('madb',$manongthon))}} </td>
        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo trình độ chuyên môn kỹ thật</td>
        </tr>
        @foreach ($dmtrinhdokythuat as $kythuat)
        <tr>
            <td></td><td>{{$kythuat->tentdkt}}</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam-1)->where('thatnghiep',null)->where('trinhdocmkt',$kythuat->madmtdkt))}}</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam)->where('thatnghiep',null)->where('trinhdocmkt',$kythuat->madmtdkt))}}</td>
        </tr>
        @endforeach
       
        <tr>
            <td>c</td>
            <td colspan="4">Chia theo vị thế việc làm</td>
        </tr>
        
        @foreach ($dmvithevieclam as $vithe)
        <tr>
            <td></td><td>{{$vithe->tentgktct2}}</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam-1)->where('thatnghiep',null)->where('vithevl',$vithe->madmtgktct2))}}</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam)->where('thatnghiep',null)->where('vithevl',$vithe->madmtgktct2))}}</td>
        </tr>
        @endforeach
       
        <tr>
            <td  style="font-weight: bold;">3</td>
            <td  style="font-weight: bold;">Số người thất nghiệp</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam-1)->where('thatnghiep','!=',null))}}</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam)->where('thatnghiep','!=',null))}}</td>
        </tr>
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo Khu vực</td>
        </tr>
        <tr>
            <td></td><td>- Thành thị</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{count($tonghopdanhsachcungld_ct->where('nam',$nam-1)->where('thatnghiep','!=',null)->where('madb',$mathanhthi))}} </td>
            <td style="text-align: center;"> {{count($tonghopdanhsachcungld_ct->where('nam',$nam)->where('thatnghiep','!=',null)->where('madb',$mathanhthi))}} </td>

        </tr>
        <tr>
            <td></td><td>- Nông thôn</td> <td style="text-align: center;">Người</td>
            <td style="text-align: center;"> {{count($tonghopdanhsachcungld_ct->where('nam',$nam)->where('thatnghiep',null)->where('madb',$manongthon))}} </td>

        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo trình độ chuyên môn kỹ thật</td>
        </tr>
        @foreach ($dmtrinhdokythuat as $kythuat)
        <tr>
            <td></td><td>{{$kythuat->tentdkt}}</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam-1)->where('thatnghiep','!=',null)->where('trinhdocmkt',$kythuat->madmtdkt))}}</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam)->where('thatnghiep','!=',null)->where('trinhdocmkt',$kythuat->madmtdkt))}}</td>
        </tr>
        @endforeach

        <tr>
            <td>c</td>
            <td colspan="4">Chia theo thời gian thất nghiệp</td>
        </tr>

        @foreach ($tgthatnghiep as $thatnghiep)
        <tr>
            <td></td><td>{{$thatnghiep->tentgktct2}}</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam-1)->where('thatnghiep','!=',null)->where('lydoktg',null)->where('trinhdocmkt',$thatnghiep->madmtgktct2))}}</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam)->where('thatnghiep','!=',null)->where('lydoktg',null)->where('trinhdocmkt',$thatnghiep->madmtgktct2))}}</td>
        </tr>
        @endforeach
        <tr>
            <td  style="font-weight: bold;">4</td>
            <td  style="font-weight: bold;">Số người không tham gia hoạt động kinh tế</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam-1)->where('lydoktg','!=',null))}}</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam)->where('lydoktg','!=',null))}}</td>
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
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam-1)->where('lydoktg',$lydo->madmtgktct))}}</td>
            <td style="text-align: center;">{{count($tonghopdanhsachcungld_ct->where('nam',$nam)->where('lydoktg',$lydo->madmtgktct))}}</td>
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
            <td style="text-align: center;">{{count($nhucautuyendung->where('nam',$nam-1))}}</td>
            <td style="text-align: center;">{{count($nhucautuyendung->where('nam',$nam))}}</td>
        </tr>
        <?php 
        $tongnhucau_kytruoc = 0;
        $nhucau_kt = $nhucautuyendung->where('nam',$nam-1);
        foreach ($nhucau_kt as  $item) {
            $tongnhucau_kytruoc += $item->soluong; 
        }
        $tongnhucau_kybaocao = 0;
        $nhucau_kbc = $nhucautuyendung->where('nam',$nam);
        foreach ($nhucau_kbc as  $item) {
            $tongnhucau_kybaocao += $item->soluong; 
        }
        ?>
        <tr>
            <td  style="font-weight: bold;">2</td>
            <td  style="font-weight: bold;">Tổng số lao dộng</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{$tongnhucau_kytruoc}}</td><td style="text-align: center;">{{$tongnhucau_kybaocao}}</td>
        </tr>
        <tr>
            <td> a </td><td colspan="4"> Chia theo loại lao động </td>
        </tr>
        <tr>
            <td></td><td>- Lao động nữ</td><td style="text-align: center">Người</td>
            <td style="text-align: center">{{count($nhucautuyendung->where('nam',$nam-1)->where('soluonnu','!=',null)->where('gioitinh','Nu'))}}</td>
            <td style="text-align: center">{{count($nhucautuyendung->where('nam',$nam)->where('soluonnu','!=',null)->where('gioitinh','Nu'))}}</td>
        </tr>

        <tr>
            <td></td><td>- Lao động trên 35 tuổi</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($nhucautuyendung->where('nam',$nam-1)->where('dotuoi','duoi35'))}}</td>
            <td style="text-align: center;">{{count($nhucautuyendung->where('nam',$nam)->where('dotuoi',['tren35','all']))}}</td>
        </tr>

        <tr>
            <td></td><td>- Lao động tham gia BHXH bắt buộc</td><td style="text-align: center;">Người</td>
            <td style="text-align: center"></td>
            <td style="text-align: center"></td>
        </tr>
        <tr>
            <td> b </td><td colspan="4"> Chia theo vị trí việc làm </td>
        </tr>
        @foreach ($vitrivl as $vitri)
        <tr>
            <td></td><td>{{$vitri->tentgktct2}}</td><td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{count($nhucautuyendung->where('nam',$nam-1)->where('vitrivl',$vitri->madmtgktct2))}}</td>
            <td style="text-align: center;">{{count($nhucautuyendung->where('nam',$nam)->where('vitrivl',$vitri->madmtgktct2))}}</td>
        </tr>
        @endforeach
    

        {{-- nhu cầu tuyển dụng --}}
        <tr>
            <td colspan="5" style="font-weight: bold; text-transform: uppercase;text-align: left">III. THÔNG TIN NHU CẦU TUYỂN DỤNG LAO ĐỘNG</td>
        </tr>

        <tr>
            <td style="font-weight: bold;">1</td>
            <td style="font-weight: bold;">Tổng số lượng tuyển</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{$tongnhucau_kytruoc}}</td><td style="text-align: center;">{{$tongnhucau_kybaocao}}</td>
        </tr>
        <tr>
            <td  style="font-weight: bold;">2</td>
            <td colspan="5"  style="font-weight: bold;">Chia theo loại hình</td>
        </tr>
    
        @foreach ($loaihinhkt as $i => $lh)
        <?php 
            $dsnhucau = [];
            $dsdoanhnghiep = [];
            $kytruoc = 0;
            $kybaocao = 0;
            $nam2 = $nam - 1;
            $namtruoc = (string)$nam2;
            $nambaocao = (string)$nam;

            foreach ($company as  $item) {
                if ($item->loaihinh == $lh->madmlhkt) {
                    array_push($dsdoanhnghiep, $item);
                }
            }

            if ($nhucautuyendung != null && $dsdoanhnghiep != null) {
                foreach ($nhucautuyendung as  $item) {
                    foreach ($dsdoanhnghiep as  $item2) {
                        if ($item->madn == $item2->user) {
                            $a = $item ;
                            array_push($dsnhucau, $a);
                        }
                    }
                }
            }
           

            if ($dsnhucau != null) {
                foreach ($dsnhucau as  $item) {
                    if ($item->nam == $namtruoc) {
                        $kytruoc += $item->soluong; 
                    }
                }

                foreach ($dsnhucau as  $item) {
                    if ($item->nam == $nambaocao) {
                        $kybaocao += $item->soluong; 
                   
                    }
                }
            }
        ?>
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
            <td> {{$lh->tenlhkt}} </td><td style="text-align: center;">Người</td>
            <td  style="text-align: center;">{{  $kytruoc }}</td><td  style="text-align: center;">{{$kybaocao }}</td>
        </tr>
        @endforeach

        <tr>
            <td  style="font-weight: bold;">2</td>
            <td colspan="5"  style="font-weight: bold;">Chia theo mã nghề cấp 2</td>
           
        </tr>
        @foreach ($dmmanghetrinhdo as $manghe)
        <?php 
            $dsnghecap2 = [];
            $dskytruoc = [];
            $dskybaocao = [];
            $nghec2_kytruoc = 0;
            $nghec2_kybaocao = 0;

            if ($nhucautuyendung != null) {
                foreach ($nhucautuyendung as $item) {
                    if ($item->tencongviec == $manghe->madmmntd) {
                        array_push($dsnghecap2, $item);
                    }
                }
            }
            if ($dsnghecap2 != null) {
                foreach ($dsnghecap2 as  $item) {
                    if ($item->nam == $nam2) {
                        $nghec2_kytruoc += $item->soluong;
                    }
                }
                foreach ($dsnghecap2 as  $item) {
                    if ($item->nam == $nam) {
                        $nghec2_kybaocao += $item->soluong;
                    }
                }
            }

        ?>
        <tr>
            <td></td><td>{{$manghe->tenmntd}}</td><td style="text-align: center;">Người</td><td style="text-align: center;"> {{$nghec2_kytruoc}} </td>
            <td style="text-align: center;"> {{$nghec2_kybaocao }} </td>
        </tr>
        @endforeach
       
    </table>

    <table width="96%" cellspacing="0" height cellpadding="0" style="margin: 20px auto;text-align: center; height:200px">
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


