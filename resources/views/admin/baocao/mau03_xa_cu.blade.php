@extends('main_baocao')
@section('content')
    <table id='data_header' width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;font-size:12px">
        <tr>
            <td></td>
            <td  style="font-weight:bold;font-style:italic" class="text-right">Mẫu số 03</td>
        </tr>
        <tr>
            <td width="40%" style="vertical-align: top;">
                <p style="text-transform: uppercase">Ủy ban nhân dân</p>
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
        <br>VỀ THÔNG TIN CUNG LAO ĐỘNG NĂM {{ $kybaocao }}
    </p>
    <p id='data_body1' style="text-align: center;font-style: italic;">Kính gửi: - Ủy ban nhân dân ....<br>
        - Ủy ban nhân dân tỉnh/thành phố</p>

    <table id='data_body2' cellspacing="0" cellpadding="0" border="1"
        style="margin: 20px auto; border-collapse: collapse;font-size:12px">

        <tr>
            <th style="width: 5%;">STT</th>
            <th style="width: 45%;">Chỉ tiêu</th>
            <th style="width: 10%;">Đơn vị</th>
            <th style="width: 10%;">Kỳ trước</th>
            <th style="width: 10%;">Kỳ báo cáo</th>
        </tr>
        <tr style="text-align: center">
            <td> A </td>
            <td> B </td>
            <td> C </td>
            <td> 1 </td>
            <td> 2 </td>
        </tr>
        {{-- cung --}}
        {{-- <tr>
            <td colspan="5" style="font-weight: bold; text-transform: uppercase;text-align: left">I. THÔNG TIN CUNG LAO ĐỘNG</td>
        </tr> --}}
        <tr class="text-left">
            <td style="font-weight: bold;text-align:left" colspan="5">I. THÔNG TIN CUNG LAO ĐỘNG</td>
        </tr>
        <tr class="text-center">
            <?php $tuoi_kytruoc = $model->where('kydieutra', $kytruoc);
            $tuoi = $model->where('kydieutra', $kybaocao);
            ?>
            <td style="font-weight: bold;">1</td>
            <td style="font-weight: bold;" class="text-left">Số người từ 15 tuổi trở lên</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{ dinhdangso(count($tuoi_kytruoc)) }}</td>
            <td style="text-align: center;"> {{ dinhdangso(count($tuoi)) }} </td>
        </tr>
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo khu vực</td>
        </tr>
        <tr>
            <td></td>
            <td>- Thành thị</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{dinhdangso(count($tuoi_kytruoc->where('khuvuc',1)))}}</td>
            <td style="text-align: center;">{{dinhdangso(count($tuoi->where('khuvuc',1)))}}</td>

        </tr>
        <tr>
            <td></td>
            <td>- Nông thôn</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{dinhdangso(count($tuoi_kytruoc->where('khuvuc',2)))}}</td>
            <td style="text-align: center;">{{dinhdangso(count($tuoi->where('khuvuc',2)))}}</td>

        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo giới tính</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nam</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{dinhdangso(count($tuoi_kytruoc->where('gioitinh','Nam')))}}</td>
            <td style="text-align: center;">{{dinhdangso(count($tuoi->where('gioitinh','Nam')))}}</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nữ</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{dinhdangso(count($tuoi_kytruoc->where('gioitinh','Nữ')))}}</td>
            <td style="text-align: center;">{{dinhdangso(count($tuoi->where('gioitinh','Nữ')))}}</td>

        </tr>

        <tr>
            <td>c</td>
            <td colspan="4">Chia theo trình độ chuyên môn kỹ thật</td>
        </tr>
        @foreach ($a_cmkt as $key => $ct)
            <tr class="text-center">
                <?php
                $cmkt_namtruoc = count($model->where('chuyenmonkythuat', $key)->where('kydieutra', $kytruoc));
                $cmkt = count($model->where('chuyenmonkythuat', $key)->where('kydieutra', $kybaocao));
                ?>
                <td></td>
                <td class="text-left">{{ $ct }}</td>
                <td style="text-align: center;">Người</td>
                <td style="text-align: center;">{{ dinhdangso($cmkt_namtruoc) }}</td>
                <td style="text-align: center;">{{ dinhdangso($cmkt) }}</td>
            </tr>
        @endforeach
        <tr>
            <td>c</td>
            <td colspan="4">Chia theo nghề nghiệp</td>
        </tr>
        <tr>
            <td></td>
            <td>Nhà lãnh đạo trong các ngành, các cấp và các đơn vị</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
        </tr>
        <tr>
            <td></td>
            <td>Nhà chuyên môn bậc cao</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
        </tr>
        <tr>
            <td></td>
            <td>Nhà chuyên môn bậc trung</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
        </tr>
        <tr>
            <td></td>
            <td>Nhân viên trợ lý văn phòng</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
        </tr>
        <tr>
            <td></td>
            <td>Nhân viên dịch vụ và bán hàng</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
        </tr>
        <tr>
            <td></td>
            <td>Lao động có kỹ năng trong nông nghiệp, lâm nghệp và thủy sản</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
        </tr>
        <tr>
            <td></td>
            <td>Lao động thủ công và các nghề nghiệp có liên quan khác</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
        </tr>
        <tr>
            <td></td>
            <td>Thợ lắp ráp và vận hành máy móc, thiết bị</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
        </tr>
        <tr>
            <td></td>
            <td>Lao động giản đơn</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
        </tr>
        <tr class="text-center">
            <?php $nhucau_kytruoc = $model->where('kydieutra', $kytruoc)->where('nganhnghemuonhoc','!=',null);
            $nhucau_kybaocao = $model->where('kydieutra', $kybaocao)->where('nganhnghemuonhoc','!=',null);
            ?>
            <td style="font-weight: bold;">2</td>
            <td style="font-weight: bold;" class="text-left">Số người từ 15 tuổi trở lên nhu cầu học nghề</td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"></td>
            <td style="text-align: center;"> </td>
        </tr>
        <tr>
            <td>a</td>
            <td colspan="4">Chia theo khu vực</td>
        </tr>
        <tr>
            <td></td>
            <td>- Thành thị</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{dinhdangso(count(($nhucau_kytruoc->where('khuvuc',1))))}}</td>
            <td style="text-align: center;">{{dinhdangso(count(($nhucau_kybaocao->where('khuvuc',1))))}}</td>

        </tr>
        <tr>
            <td></td>
            <td>- Nông thôn</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{dinhdangso(count($nhucau_kytruoc->where('khuvuc',2)))}}</td>
            <td style="text-align: center;">{{dinhdangso(count($nhucau_kybaocao->where('khuvuc',2)))}}</td>

        </tr>
        <tr>
            <td>b</td>
            <td colspan="4">Chia theo giới tính</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nam</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{dinhdangso(count($nhucau_kytruoc->where('gioitinh','Nam')))}}</td>
            <td style="text-align: center;">{{dinhdangso(count($nhucau_kybaocao->where('gioitinh','Nam')))}}</td>
        </tr>
        <tr>
            <td></td>
            <td>- Nữ</td>
            <td style="text-align: center;">Người</td>
            <td style="text-align: center;">{{dinhdangso(count($nhucau_kytruoc->where('gioitinh','Nữ')))}}</td>
            <td style="text-align: center;">{{dinhdangso(count($nhucau_kybaocao->where('gioitinh','Nữ')))}}</td>

        </tr>
        <tr>
            <td>c</td>
            <td colspan="4">Chia theo ngành nghề</td>
        </tr>
        @foreach ($m_nganhnghe as $ct)
        <tr>
        <td>{{$ct->madm}}</td>
        <td>{{$ct->tendm}}</td>
        <td style="text-align: center;">Người</td>
        <td style="text-align: center;">{{dinhdangso(count($nhucau_kytruoc->where('nganhnghemuonhoc',$ct->madm)))}}</td>
        <td style="text-align: center;">{{dinhdangso(count($nhucau_kybaocao->where('nganhnghemuonhoc',$ct->madm)))}}</td>
        </tr>
        @endforeach

    </table>

    <table id='data_footer' width="96%" cellspacing="0" height cellpadding="0"
        style="margin: 20px auto;text-align: center; height:200px;font-size:12px">
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
