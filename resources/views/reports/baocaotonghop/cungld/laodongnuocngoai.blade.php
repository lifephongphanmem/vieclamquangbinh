@extends('main_baocao')

@section('content')
    <table id="data_body">
        <tr>
            <td style="text-align: left;">
                <div>
                    <p style="text-transform: uppercase;font-weight: bold;width: auto;">ỦY BAN NHÂN DÂN TỈNH/THÀNH PHỐ QUẢNG BÌNH </p>
                </div>
            </td>
            <td>
                <p style="text-align: right;">Mẫu số 03</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">THÔNG TIN NGƯỜI
                    LAO ĐỘNG
                    NƯỚC NGOÀI LÀM VIỆC TẠI VIỆT NAM
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: left; ">
                <b>
                    I. THÔNG TIN CHUNG
                </b>
            </td>
        </tr>
        <tr>
            <td style="text-align: left; ">
                1. Họ và tên:
                {{ $ldnuocngoai->hoten != null ? $ldnuocngoai->hoten : '......................................................................................' }}
            </td>
            <td>
                2.Giới tính:
                {{ $ldnuocngoai->gioitinh == 'Nam' || $ldnuocngoai->gioitinh == 'nam' ? '☑ Nam ☐ Nữ' : '☐ Nữ ☑ Nam ' }}
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">
                3. Ngày, tháng, năm sinh:
                {{ $ldnuocngoai->ngaysinh != null ? $ldnuocngoai->ngaysinh : '............/............./........................' }}

            </td>
            <td>
                4. Quốc tịch:
                {{ $ldnuocngoai->nation != null ? $ldnuocngoai->nation : '.................................................' }}
            </td>
        </tr>
        <tr>
            <td style="text-align: left;width: 50%;">5. Số hộ chiếu:
                {{ $ldnuocngoai->cmnd != null ? $ldnuocngoai->cmnd : '........................................................................' }}
                , ngày cấp:........../.........../.......................
            </td>
        </tr>
        <tr>
            <td style="text-align: left;width: 50%;">6. Trình độ:<br>
                ☐ Chứng chỉ đào tạo ☐ Đại học ☐ Thạc sĩ ☐ Tiến sĩ
                ☐ Chứng chỉ hành nghề
            </td>
        </tr>
        <tr>
            <td style="text-align: left;width: 50%;">7. Chuyên môn đào tạo:</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Khoa học giáo dục và đào tạo giáo viên</td>
            <td> ☐ Nghệ thuật</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Nhân văn</td>
            <td> ☐ Báo chí và thông tin</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Kinh doanh và quản lý</td>
            <td> ☐ Phá luật</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Khoa học sự sống,sinh học</td>
            <td> ☐ Khoa học tự nhiên</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Toán và thống kê</td>
            <td> ☐ Máy tính và công nghệ thông tin</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Công nghệ và kỹ thuật</td>
            <td> ☐ Kỹ thuật</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Sản xuất và chế biến</td>
            <td> ☐ Kiến trúc xây dựng</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Xây dựng</td>
            <td> ☐ Nông, lâm nghiệp và thủy sản</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Thú y</td>
            <td> ☐ Sức khỏe</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Du lịch xã hội</td>
            <td> ☐ Du lịch, khách sạn, thể thao và dịch vụ cá nhân</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Dịch vụ vận tải</td>
            <td> ☐ Môi trường và bảo vệ môi trường</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ An linh quốc phòng</td>
            <td> ☐ Khác</td>
        </tr>

        <tr>
            <td style="text-transform: uppercase;font-weight: bold;text-align: left">
                II. THÔNG TIN VỀ VIỆC LÀM
            </td>
        </tr>
        <tr>
            <td style="text-align: left">
                1. Số giấy phép lao động/xác nhận không thuộc diện cấp giấy phép lao động:............................,ngày,
                tháng, năm cấp:....../....../...........
            </td>
        </tr>
        <tr>
            <td style="text-align: left">
                2. Nơi làm việc:<br>
                - Tên doanh nghiệp, tổ chức:
                {{ $doanhnghiep->name != null ? $doanhnghiep->name : '................................................................................................' }}<br>
                - Mã
                số:.................................................................................................................................<br>
                - Địa chỉ:
                {{ $doanhnghiep->adress . ' - ' . $doanhnghiep->xa . ' - ' . $doanhnghiep->huyen . ' - ' . $doanhnghiep->tinh }}<br>
                - Loại hình doanh nghiệp, tổ chức làm việc: {{ $loaihinh }}<br>
            </td>
        </tr>
        <tr>
            <td style="text-align: left">
                3. Vị trí công việc:<br>
                ☐ Nhà quản lý ☐ Giám đốc điều hành ☐ Chuyên gia ☐ Lao động kỹ thuật
            </td>
        </tr>
        <tr>
            <td style="text-align: left ;width: 50%;">4. Nghề công việc:</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Nhà chuyên môn, kỹ thuật viên khoa học và kỹ thuật</td>
            <td> ☐ Nhân viên tổng hợp, văn phòng và các công việc bàn giấy</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Nhà chuyên môn, kỹ thuật viên về sức khỏe</td>
            <td> ☐ Lao động kỹ thuật trong nông nghiệp, lâm nghiệp và thủy sản</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Nhà chuyên môn, giáo viên giảng dạy</td>
            <td> ☐ Lao động kỹ thuật trong xây dựng, luyện kim, cơ khí</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Nhà chuyên môn, nhân viên về kinh doanh và quản lý</td>
            <td> ☐ Thợ điện, điện tử, chế biến thực phẩm, gỗ, may mặc, đồ thủ công</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Nhà chuyên môn, kỹ thuật trong lĩnh vực công nghệ thông tin và truyền thông</td>
            <td> ☐ Thợ lắp ráp, vận hành máy móc và thiết bị </td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Nhà chuyên môn, nhân viên về pháp luật, văn hóa, xã hội</td>
            <td> ☐ Lao động trong khai khoáng, xây dựng, công nghiệp chế biến, chế tạo và giao thông vận tải </td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Lao động trong khai khoáng, xây dựng, công nghiệp chế biến, chế tạo và giao
                thông vận tải</td>
            <td> ☐ Khác</td>


        <tr>
            <td style="text-align: left ;width: 50%;">5. Hình thức làm việc:</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Thực hiện hợp đồng lao động</td>
            <td> ☐ Nhà quản lý, giám đốc điều hành, chuyên gia, lao động kỹ thuật</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Di chuyển trong nội bộ doanh nghiệp</td>
            <td> ☐ Tham gia thực hiện các gói thầu, dự án tại Việt Nam</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Thực hiện các loại hợp đồng hoặc thỏa thuận</td>
            <td> ☐ Khác</td>
        </tr>
        <tr>
            <td style="text-align: left"> ☐ Làm việc cho tổ chức phi chính phủ nước ngoài, tổ chức quốc tế tại Việt Nam</td>
        </tr>
        <tr>
            <td style="text-align: left"> 6. Thời hạn làm việc: Từ
                {{ $ldnuocngoai->bdhopdong != null ? $ldnuocngoai->bdhopdong : '.............../...... /.....' }}
                đến {{ $ldnuocngoai->kthopdong != null ? $ldnuocngoai->kthopdong : '.............../...... /.....' }}
            </td>
        </tr>
    </table>

    <table id="data_footer" width="96%" cellspacing="0" height cellpadding="0"
        style="margin: 20px auto;text-align: center; height:200px">
        <tr>
            <td width="40%" style="text-align: left; vertical-align: top;">
            </td>
            <td style="vertical-align: top;">
                <i>Ngày......tháng......năm...........</i><br>
                <b>Doanh nghiệp/Tổ chức/cá nhân cung cấp thông tin</b><br>
                <i>(Chữ ký, dấu)</i>
            </td>
        </tr>
    </table>
@stop
