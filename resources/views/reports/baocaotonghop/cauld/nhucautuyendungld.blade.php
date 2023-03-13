@extends('main_baocao')

@section('content')
    <table id="data_header">
        <tr>
            <td colspan="3" style="text-align: left">
                    Tỉnh/thành phố:.................................<br>
                    Quận/huyện/thị xã:............................<br>
                   Xã/phường/thị trấn:...........................
            </td>
            <td  style="text-align: right;">
                Mẫu số 02
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">
                    THÔNG TIN NHU CẦU TUYỂN DỤNG LAO ĐỘNG CỦA NGƯỜI SỬ DỤNG LAO ĐỘNG<br>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <p style="text-align: center">
                    <i>(Thu thập thông tin của người sử dụng lao động)</i>
                </p>
            </td>

        </tr>
    </table>

    <table id="data_body" cellspacing="0" cellpadding="0" border="1">
        <tr>
            <th colspan="4" style="text-align: left;">1. Thông tin người sử dụng lao động</th>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left;">
                Tên người sử dụng lao động:
                {{ $company->name != null
                    ? $company->name
                    : '....................................................................
                                                               .........................................................................................................................' }}
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left;">
                Mã số đăng ký kinh doanh/Mã số thuế/CCCD/CMND:
                {{ $company->dkkd != null
                    ? $company->dkkd
                    : '....................................................................
                                                                .........................................................................................................................' }}
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left;">
                Loại hình: [ ] Doanh nghiệp Nhà nước&emsp;&emsp;&emsp; [ ] Doanh nghiệp ngoài nhà nước &emsp;&emsp;&emsp;[ ]
                Doanh nghiệp FDI<br>
                [ ] Cơ quan, đơn vị nhà nước&emsp;&emsp;&emsp; [ ] Hộ kinh doanh &emsp;&emsp;&emsp;[ ] Cá nhân
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left;">
                Địa chỉ:
                {{ $company->tinh != null ? $company->tinh : 'Tỉnh.............................................................................' }}
                {{ $company->huyen != null ? $company->huyen : 'Huyện.............................................................................' }}
                {{ $company->xa != null ? $company->xa : 'Xã.............................................................................' }}<br>
                {{ $company->adress != null
                    ? $company->adress
                    : ' Địa chỉ cụ
                                                                 thể:....................................................................................................................
                                                                 ........................................................................................................................' }}
                <br>

                {{ isset($kcn->name) != null ? $kcn->name : 'KCN/KKT:.............................................................................' }}<br>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left;">
                Số điện thoại:
                {{ $tuyendung->phonetd != null ? $tuyendung->phonetd : '............................................................................' }}&emsp;&emsp;&emsp;
                Email:
                {{ $tuyendung->emailtd != null ? $tuyendung->emailtd : '............................................................................' }}
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left">
                Ngành sản xuất - kinh doanh chính:
            </td>

        <tr>
            <td colspan="2" style="text-align: left">
                [ ] Nông, lâm nghiệp và thủy sản<br>
                [ ] Công nghiệp, chế biến, chế tạo<br>
                [ ] SX và phân phối điện, khí đốt, hơi nước và điều hòa không khí<br>
                [ ] Vận tải, kho bãi<br>
                [ ] Thông tin và truyền thông<br>
                [ ] Hoạt động kinh doanh bất động sản<br>
                [ ] Hoạt động hành chính và dịch vụ hỗ trợ<br>
                [ ] Y tế và hoạt động trợ giúp xã hội<br>
                [ ] Bán buôn và bán lẻ; sửa chữa ô tô, mô tô, xe máy và xe có động cơ khác<br>
                [ ] Hoạt động làm thuê và các công việc trong hộ gia đình
            </td>
            <td colspan="2" style="text-align: left;">
                [ ] Khai khoáng<br>
                [ ] Xây dựng<br>
                [ ] Cung cấp nước, hoạt động quản lý và xử lý nước thải, rác thải<br>
                [ ] Dịch vụ lưu trú và ăn uống<br>
                [ ] Hoạt động tài chính, ngân hàng và bảo hiểm<br>
                [ ] Hoạt động chuyên môn, khoa học và công nghệ<br>
                [ ] Giáo dục và đào tạo<br>
                [ ] Nghệ thuật, vui chơi và giải trí<br>
                [ ] Hoạt động của ĐCS, tổ chức CT-XH, QLNN, ANQP, BĐXH bắt buộc<br>
                [ ] Hoạt động, dịch vụ khác<br>
                [ ] Hoạt động của các tổ chức và cơ quan quốc tế <br>
            </td>
        </tr>

        <tr>
            <td colspan="4" style="text-align: left"> Mặt hàng/sản phẩm dịch vụ chính:<br>
                ..............................................................................................................................................................................................................
            </td>
        </tr>
    </table>
    <table id="data_body1" cellspacing="0" cellpadding="0" border="1">
        <tr>
            <td style="text-align: left">
                <b>2. Quy mô lao động<br></b>(Đơn vị: Người)
            </td>
            <td colspan="3" style="text-align: left">
                [ ]< 10&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;[ ] 10 - 50
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;[ ] 51 - 100<br>
                    [ ] 101 - 200 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp; [ ] 201 - 500
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; [ ] 501 - 1.000<br>
                    [ ] 1.001 - 3.000 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; [ ] 3.001 - 10.000
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; [ ] >10.000

            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left"><b>3. Số lao động tuyển dụng 6 tháng tới:</b>
                <?php
                $a = 0;
                for ($i = 0; $i < $vitritd->count(); $i++) {
                    $a = $a + $vitritd[$i]->soluong;
                }
                echo $a . ' người';
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left"><b>4. Nhu cầu tuyển dụng lao động theo nghề, trình độ trong 6 tháng
                    tới
            </td>
        </tr>
        <tr>
            <td colspan="1">
                Mã nghề cấp 2
            </td>
            <td colspan="1" style="text-align: center">
                Tên gọi nghề nghiệp
            </td>
            <td colspan="1" style="text-align: center">
                Số lượng <br>(Người)
            </td>
            <td colspan="1" style="text-align: center">
                Trong đó nữ <br> (Người)
            </td>
        </tr>
        @foreach ($manghe as $nghe)
            <tr>
                <td style="width: 10%;"> {{ $nghe->manghe }} </td>
                <td style="width: 70%;"> {{ $nghe->tenmntd }} </td>
                <td style="width: 10%;"></td>
                <td style="width: 10%;"></td>
            </tr>
        @endforeach

        <tr>
            <td colspan="2" style="text-align: center;font-weight: bold;text-transform: uppercase;"><b>tổng</b></td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <table id="data_footer" width="96%" cellspacing="0" height cellpadding="0"
        style="margin: 20px auto;text-align: center; height:200px">
        <tr>
            <td width="40%" style="text-align: left; vertical-align: top;">
            </td>
            <td style="vertical-align: top;">
                <i>Ngày......tháng......năm...........</i><br>
                <b>Người cung cấp thông tin</b><br>
                <i>(Chữ ký, dấu)</i>
            </td>
        </tr>
    </table>
@stop
