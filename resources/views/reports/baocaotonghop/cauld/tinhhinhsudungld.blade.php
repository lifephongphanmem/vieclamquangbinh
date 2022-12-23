@extends('main_baocao')
@section('custom-style')
@stop
@section('custom-script')
@stop
@section('content')
    <div style="margin-left: 5%">
        <p style="text-transform: uppercase;font-weight: bold;width: auto;">TRUNG TÂM DỊCH VỤ VIỆC
            LÀM......................<br></p>
    </div>
    </table>
    <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">PHIẾU ĐĂNG KÝ GIỚI THIỆU/CUNG
        ỨNG LAO ĐỘNG<br>

    </p>
    <p style="text-align: center">
        <i style="text-align: center"> (Dành cho người sử dụng lao động)</i>
    </p>
    <p style="text-transform: uppercase;font-weight: bold,;text-align: right">
        Mã số:...................................................................
    </p>

    <table cellspacing="0" cellpadding="0" border="1">
        <tr>
            <th colspan="5" style="text-align: left;">1. Thông tin tuyển dụng</th>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left;"> Tên công việc*:
                .........................................................................................................................
            </td>
            <td colspan="1"> Số lượng tuyển*: ..........................................</td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left"> Mô tả công việc*:
                ..................................................................................................................................................................................
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left"> Mã nghề*:
                ..............................................................................................................................................................................................
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: left;"> Cấp 1:
                ....................................................................................
            </td>
            <td colspan="2"> Cấp 2: .................................................................................
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: left"> Cấp 3:
                ....................................................................................</td>
            <td colspan="3">Cấp 4: .................................................................................
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left"> Chức vụ*: [ ] Nhân viên &emsp;&emsp;&emsp; [ ] Quản lý &emsp;&emsp;&emsp; [ ] Lãnh đạo
                [ ] Khác (ghi rõ):
                ...........................................................................................
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">
                Trình độ học vấn*: [ ] Chưa tốt nghiệp tiểu học &emsp;&emsp;&emsp; [ ] Tốt nghiệp tiểu học &emsp;&emsp;&emsp;
                [ ] Tốt nghiệp Trung học cơ sở  &emsp;&emsp;&emsp;[ ] Tốt nghiệp Trung học phổ thông
            </td>
        </tr>
        <tr>
            <td style="text-align: left"> Trình độ CMKT*: </td>
            <td>
                [ ] Chưa qua đào tạo<br>
                [ ] Sơ cấp<br>
                [ ] Cao đẳng<br>
                [ ] Thạc sĩ<br>
            </td>
            <td colspan="2" style="text-align: left">
                [ ] CNKT không bằng<br>
                [ ] Trung cấp<br>
                [ ] Đại học<br>
                [ ] Tiến sĩ
            </td>
            <td>
                Chuyên ngành đào tạo:<br>
                ...........................<br>
                ...........................<br>
                ...........................
            </td>
        </tr>
        <tr>
            <td style="text-align: left"> Trình độ khác </td>
            <td colspan="4">
                1: ..............................................................................................<br>
                2: ..............................................................................................
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">
                Trình độ kỹ năng
                nghề:..............................................................................................................................................
                Bậc:........................................................................
            </td>
        </tr>
        <tr>
            <td style="text-align: left"> Trình độ ngoại ngữ </td>
            <td colspan="4">
                Ngoại ngữ 1: .............................................................................. Chứng chỉ
                .............................................<br>
                Khả năng sử dụng: [ ] Tốt &emsp;&emsp; [ ] &emsp;&emsp; Khá [ ] &emsp;&emsp; Trung bình<br>
                Ngoại ngữ 2: .............................................................................. Chứng chỉ
                .............................................<br>
                Khả năng sử dụng: [ ] Tốt &emsp;&emsp; [ ] Khá &emsp;&emsp;[ ] Trung bình
            </td>
        </tr>
        <tr>
            <td style="text-align: left"> Trình độ tin học </td>
            <td colspan="4">
                [ ] Tin học văn phòng
                .............................................................................................................................<br>
                Khả năng sử dụng: [ ] Tốt &emsp;&emsp;[ ] Khá &emsp;&emsp;[ ] Trung bình<br>
                [ ] Khác:
                ..................................................................................................................................................<br>
                Khả năng sử dụng: [ ] &emsp;&emsp;Tốt [ ]&emsp;&emsp; Khá [ ] Trung bình
            </td>
        </tr>
        <tr>
            <td style="text-align: left">Kỹ năng mềm </td>
            <td colspan="4">
                [ ] Giao tiếp&emsp;&emsp; [ ] Thuyết trình &emsp;&emsp;[ ] Quản lý thời gian<br>
                [ ] Quản lý nhân sự&emsp;&emsp; [ ] Tổng hợp, báo cáo&emsp;&emsp; [ ] Thích ứng<br>
                [ ] Làm việc nhóm&emsp;&emsp; [ ] Làm việc độc lập&emsp;&emsp; [ ] Chịu được áp lực công việc<br>
                [ ] Theo dõi giám sát&emsp;&emsp; [ ] Tư duy phản biện<br>
                [ ] Kỹ năng mềm khác:
                ...........................................................................................................................<br>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">
                Yêu cầu kinh nghiệm:<br>
                [ ] Không yêu cầu &emsp;&emsp;[ ] Dưới 1 năm&emsp;&emsp; [ ] Từ 1 đến 2 năm &emsp;&emsp; [ ] Từ 2 đến 5 năm &emsp;&emsp;[ ] Trên 5 năm

            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">
                Nơi làm việc dự kiến: Tỉnh ................................................. Quận/huyện/KCN
                .............................
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">
                Loại hợp đồng LĐ: [ ] Không xác định thời hạn &emsp;&emsp; [ ] Xác định thời hạn dưới 12 tháng
                [ ] Xác định thời hạn từ 12 tháng đến 36 tháng

            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">
                Yêu cầu thêm: [ ] Làm ca;&emsp;&emsp; [ ] Đi công tác;&emsp;&emsp; [ ] Đi biệt phái
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">
                Hình thức làm việc*: [ ] Toàn thời gian;&emsp;&emsp; [ ] Bán thời gian
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">
                Mục đích làm việc: [ ] Làm việc lâu dài;&emsp;&emsp; [ ] Làm việc tạm thời;&emsp;&emsp; [ ] Làm thêm
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">
                Mức lương*: - Lương tháng (VN đồng):<br>
                [ ] < 5 triệu;&emsp;&emsp; [ ] 5 -10 triệu;&emsp;&emsp;[ ] 10 - 20 triệu;&emsp;&emsp; [ ] 20 - 50 triệu;&emsp;&emsp; [ ]> 50 triệu<br>
                    - [ ] Lương ngày ......................................./ngày<br>
                    - [ ] Lương giờ ......................................../giờ<br>
                    - [ ] Thỏa thuận khi phỏng vấn<br>
                    - [ ] Hoa hồng theo doanh thu/sản phẩm<br>
            </td>
        </tr>
        <tr>
            <td rowspan="4" style="text-align: left"> Chế độ phúc lợi* </td>
            <td colspan="4">Hỗ trợ ăn: [ ] 1 bữa;&emsp;&emsp; [ ] 2 bữa;&emsp;&emsp; [ ] 3 bữa;&emsp;&emsp; [ ] Bằng tiền: ..........; [ ]&emsp;&emsp; Không hỗ trợ</td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left">[ ] Đóng BHXH, BHYT, BHTN;&emsp;&emsp; [ ] BH nhân thọ;&emsp;&emsp; [ ] Trợ cấp thôi việc;&emsp;&emsp; [ ] Nhà trẻ</td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left">[ ] Xe đưa đón;&emsp;&emsp; [ ] Hỗ trợ đi lại;&emsp;&emsp; [ ] Ký túc xá;&emsp;&emsp; [ ] Hỗ trợ nhà ở;&emsp;&emsp;
                [ ] Đào tạo</td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left">[ ] Lối đi/thiết bị hỗ trợ cho người khuyết tật&emsp;&emsp; [ ] Cơ hội thăng
                tiến<br>
                [ ] Khác
                ................................................................................
            </td>
        </tr>

        <tr>
            <td rowspan="7" style="text-align: left">Điều kiện làm việc*</td>
            <td colspan="1"> Nơi làm việc</td>
            <td colspan="3"> [ ] Trong nhà;&emsp;&emsp; [ ] Ngoài trời;&emsp;&emsp; [ ] Hỗn hợp</td>
        </tr>
        <tr>
            <td colspan="1" style="text-align: left">Trọng lượng nâng</td>
            <td colspan="3">[ ] Dưới 5 kg &emsp;&emsp;[ ] 5 - 20 kg [ ]&emsp;&emsp; Trên 20 kg</td>
        </tr>
        <tr>
            <td colspan="1" style="text-align: left">Đứng hoặc đi lại</td>
            <td colspan="3">[ ] Hầu như không có;&emsp;&emsp; [ ] Mức trung bình;&emsp;&emsp; [ ] Cần đứng/đi lại nhiều</td>
        </tr>
        <tr>
            <td colspan="1" style="text-align: left">Nghe nói</td>
            <td colspan="3">[ ] Không cần thiết;&emsp;&emsp; [ ] Nghe nói cơ bản;&emsp;&emsp; [ ] Quan trọng</td>
        </tr>
        <tr>
            <td colspan="1" style="text-align: left">Thị lực </td>
            <td colspan="3">[ ] Mức bình thường;&emsp;&emsp; [ ] Nhìn được vật/chi tiết nhỏ;</td>
        </tr>
        <tr>
            <td colspan="1" style="text-align: left">Thao tác bằng tay</td>
            <td colspan="3"> [ ] Lắp ráp đồ vật lớn;&emsp;&emsp; [ ] Lắp ráp đồ vật nhỏ;&emsp;&emsp; [ ] Lắp ráp đồ vật rất nhỏ</td>
        </tr>
        <tr>
            <td colspan="1" style="text-align: left"> Dùng 2 tay</td>
            <td colspan="3"> [ ] Cần 2 tay; &emsp;&emsp;[ ] Đôi khi cần 2 tay;&emsp;&emsp; [ ] Chỉ cần 1 tay; &emsp;&emsp;[ ] Trái;&emsp;&emsp; [ ] Phải</td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">Đối tượng ưu tiên: [ ] Người khuyết tật;&emsp;&emsp; [ ] Bộ đội xuất ngũ;&emsp;&emsp; [ ]
                Người thuộc hộ nghèo, cận nghèo<br>
                [ ] Người dân tộc thiểu số;&emsp;&emsp; [ ] Khác (ghi rõ:....................
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">Hình thức tuyển dụng*: [ ] Trực tiếp;&emsp;&emsp; [ ] Qua điện thoại;&emsp;&emsp; [ ] Phỏng
                vấn online;&emsp;&emsp; [ ] Nộp CV</td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">Thời hạn tuyển dụng*: ngày tháng năm</td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">Mong muốn của doanh nghiệp đối với TTDVVL: [ ] Tư vấn;&emsp;&emsp; [ ] GT việc
                làm;&emsp;&emsp; [ ] Cung ứng LĐ</td>
        </tr>
        <tr>
            <th colspan="5" style="text-align: left">2. Thông tin người liên hệ tuyển dụng</th>
        </tr>

        <tr>
            <td colspan="3" style="text-align: left">Họ và tên*:
                .............................................................................</td>
            <td colspan="2">Chức vụ*: ...................................................................................
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: left">Số điện thoại*:
                ....................................................................................<br>
                Nhận SMS thông báo ứng tuyển<br>
                [ ] Có &emsp;&emsp;[ ] Không
            </td>
            <td colspan="2">Email*: ...............................................................................<br>
                Nhận email thông báo ứng tuyển<br>
                [ ] Có&emsp;&emsp; [ ] Không
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">
                Hình thức liên hệ khác (nếu có):
                .......................................................................................................................................................
            </td>
        </tr>
        <tr>
            <td style="width: 15%; "></td>
            <td style="width: 28%;"></td>
            <td style="width: 6.5%;"></td>
            <td style="width: 21,5%;"></td>
            <td style="width: 28%;"></td>
        </tr>
    </table>


    <table width="96%" cellspacing="0" height cellpadding="0"
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
