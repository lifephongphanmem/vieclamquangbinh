@extends('main_baocao')

@section('content')
    <div style="margin-left: 5%">
        <p style="text-transform: uppercase;font-weight: bold;width: auto;">TRUNG TÂM DỊCH VỤ VIỆC
            LÀM TỈNH QUẢNG BÌNH<br></p>
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
            <td colspan="4" style="text-align: left;"> Tên công việc*: {{ $vitritd->name }}
            </td>
            <td colspan="1"> Số lượng tuyển*: {{ $vitritd->soluong }} </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left"> Mô tả công việc*: {{ $vitritd->description }}
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left"> Mã nghề*:{{ $vitritd->manghe }}
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
            <td colspan="5" style="text-align: left"> Chức vụ*: [ ] Nhân viên &emsp;&emsp;&emsp; [ ] Quản lý
                &emsp;&emsp;&emsp; [ ] Lãnh đạo
                [ ] Khác (ghi rõ):
                ...........................................................................................
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">
                Trình độ học vấn*: 
                [ <?php if ($vitritd->tdgd == 'Chưa đi học') { echo 'x ';} ?> ] Chưa đi học &emsp;&emsp;&emsp; 
                [ <?php if ($vitritd->tdgd == 'Chưa tốt nghiệp tiểu học') { echo 'x ';} ?> ] Chưa tốt nghiệp tiểu học &emsp;&emsp;&emsp; 
                [ <?php if ($vitritd->tdgd == 'Tốt nghiệp tiểu học') { echo 'x ';} ?> ] Tốt nghiệp tiểu học  &emsp;&emsp;&emsp;
                [ <?php if ($vitritd->tdgd == 'Tốt nghiệp THCS') { echo 'x ';} ?>] Tốt nghiệp Trung học cơ sở &emsp;&emsp;&emsp;
                [ <?php if ($vitritd->tdgd == 'Tốt nghiệp THPT trở lên') { echo 'x ';} ?>] Tốt nghiệp Trung học phổ thông
            </td>
        </tr>
        <tr>
            <td style="text-align: left"> Trình độ CMKT*: </td>
            <td>
                [<?php if ($vitritd->tdcmkt == 'Chưa qua đào tạo') { echo 'x ';} ?>  ] Chưa qua đào tạo<br>
                [ <?php if ($vitritd->tdcmkt == 'Sơ cấp') { echo 'x ';} ?> ] Sơ cấp<br>
                [<?php if ($vitritd->tdcmkt == 'Cao đẳng') { echo 'x ';} ?>  ] Cao đẳng<br>
                [ <?php if ($vitritd->tdcmkt == 'Thạc sĩ') { echo 'x ';} ?> ] Thạc sĩ<br>
            </td>
            <td colspan="2" style="text-align: left">
                [ <?php if ($vitritd->tdcmkt == 'CNKT không bằng') { echo 'x ';} ?>  ] CNKT không bằng<br>
                [ <?php if ($vitritd->tdcmkt == 'Trung cấp') { echo 'x ';} ?> ] Trung cấp<br>
                [ <?php if ($vitritd->tdcmkt == 'Đại học') { echo 'x ';} ?> ] Đại học<br>
                [ <?php if ($vitritd->tdcmkt == 'Tiến sĩ') { echo 'x ';} ?>  ] Tiến sĩ
            </td>
            <td>
                Chuyên ngành đào tạo:<br>
                {{ $vitritd->chuyennganh }}
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
                Ngoại ngữ 1: {{ $vitritd->ngoaingu1 != null ? $vitritd->ngoaingu1 : '.........................................' }} 
                Chứng chỉ {{ $vitritd->chungchinn1 != null ? $vitritd->chungchinn1 : '.........................................'}}<br>
                Khả năng sử dụng: [ <?php if ($vitritd->xeploainn1 == 'Tốt') {
                    echo 'x ';
                } ?>]
                Tốt &emsp;&emsp; [ <?php if ($vitritd->xeploainn1 == 'Khá') {
                    echo 'x ';
                } ?>] Khá &emsp;&emsp;[
                <?php if ($vitritd->xeploainn1 == 'Trung bình') {
                    echo 'x ';
                } ?>]  Trung bình &emsp;&emsp;<br>
                Ngoại ngữ 2: {{ $vitritd->ngoaingu2 != null ? $vitritd->ngoaingu2 : '.........................................' }} 
                Chứng chỉ {{ $vitritd->chungchinn2 != null ? $vitritd->chungchinn2 : '.........................................'}}<br>
                Khả năng sử dụng: [ <?php if ($vitritd->xeploainn2 == 'Tốt') {
                    echo 'x ';
                } ?>] Tốt &emsp;&emsp; [ <?php if ($vitritd->xeploainn2 == 'Khá') {
                    echo 'x ';
                } ?>]  Khá &emsp;&emsp; [
                <?php if ($vitritd->xeploainn2 == 'Trung bình') {
                    echo 'x ';
                } ?>] Trung bình &emsp;&emsp; 
            </td>
        </tr>
        <tr>
            <td style="text-align: left"> Trình độ tin học </td>
            <td colspan="4">
                [ ] Tin học văn phòng
                .............................................................................................................................<br>
                Khả năng sử dụng: [ <?php if ($vitritd->loaithvp == 'Tốt') {
                    echo 'x ';
                } ?>] Tốt &emsp;&emsp; [ <?php if ($vitritd->loaithvp == 'Khá') {
                    echo 'x ';
                } ?>] Khá  &emsp;&emsp;[
                <?php if ($vitritd->loaithvp == 'Trung bình') {
                    echo 'x ';
                } ?>]  Trung bình &emsp;&emsp;<br>
                [ ] Khác: {{ $vitritd->tinhockhac }} <br>
                Khả năng sử dụng: [ <?php if ($vitritd->loaithk == 'Tốt') {
                    echo 'x ';
                } ?>] Tốt &emsp;&emsp; [ <?php if ($vitritd->loaithk == 'Khá') {
                    echo 'x ';
                } ?>]  Khá &emsp;&emsp; [
                <?php if ($vitritd->loaithk == 'Trung bình') {
                    echo 'x ';
                } ?>]  Trung bình &emsp;&emsp;
            </td>
        </tr>
        <tr>
            <td style="text-align: left">Kỹ năng mềm </td>
            <td colspan="4">
                [ <?php if ($vitritd->kynangmem == 'Giao tiếp') { echo 'x ';} ?> ] Giao tiếp &emsp;&emsp; 
                [ <?php if ($vitritd->kynangmem == 'Thuyết trình') { echo 'x ';} ?> ] Thuyết trình &emsp;&emsp;
                [ <?php if ($vitritd->kynangmem == 'Quản lý thời gian') { echo 'x ';} ?> ] Quản lý thời gian<br>
                [ <?php if ($vitritd->kynangmem == 'Quản lý nhân sự') { echo 'x ';} ?> ] Quản lý nhân sự &emsp;&emsp; 
                [ <?php if ($vitritd->kynangmem == 'Tổng hợp báo cáo') { echo 'x ';} ?> ] Tổng hợp, báo cáo &emsp;&emsp; 
                [<?php if ($vitritd->kynangmem == 'Thích ứng') { echo 'x ';} ?> ] Thích ứng <br>
                [<?php if ($vitritd->kynangmem == 'Làm việc nhóm') { echo 'x ';} ?> ] Làm việc nhóm &emsp;&emsp; 
                [<?php if ($vitritd->kynangmem == 'Làm việc độc lập') { echo 'x ';} ?> ] Làm việc độc lập &emsp;&emsp;
                [ <?php if ($vitritd->kynangmem == 'Chịu áp lực') { echo 'x ';} ?>] Chịu được áp lực công việc <br>
                [ <?php if ($vitritd->kynangmem == 'Theo dõi giám sát') { echo 'x ';} ?>] Theo dõi giám sát &emsp;&emsp; 
                [<?php if ($vitritd->kynangmem == 'Tư duy phản biện') { echo 'x ';} ?> ] Tư duy phản biện<br>
                [<?php if ($vitritd->kynangmem == 'khác') { echo 'x ';} ?> ] khác:<br>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">
                Yêu cầu kinh nghiệm:<br>
                [ <?php if ($vitritd->yeucaukn == 'Không yêu cầu') { echo 'x ';} ?>  ] Không yêu cầu &emsp;&emsp;
                [  <?php if ($vitritd->yeucaukn == 'Dưới 1 năm') { echo 'x ';} ?> ] Dưới 1 năm &emsp;&emsp; 
                [  <?php if ($vitritd->yeucaukn == '1 đến 2 năm') { echo 'x ';} ?> ] Từ 1 đến 2 năm &emsp;&emsp; 
                [  <?php if ($vitritd->yeucaukn == '2 đến 5 năm') { echo 'x ';} ?> ] Từ 2 đến 5 năm &emsp;&emsp;
                [  <?php if ($vitritd->yeucaukn == 'Trên 5 năm') { echo 'x ';} ?> ] Trên 5 năm

            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">
                Nơi làm việc dự kiến: {{$vitritd->diadiem}}
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
                Hình thức làm việc*: 
                [ <?php if ($vitritd->hinhthuclv == 'Toàn thời gian') { echo 'x ';} ?>] Toàn thời gian &emsp;&emsp; 
                [ <?php if ($vitritd->hinhthuclv == 'Bán thời gian') { echo 'x ';} ?>] Bán thời gian
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">
                Mục đích làm việc: 
                [ <?php if ($vitritd->mucdichlv == 'Làm lâu dài') { echo 'x ';} ?>] Làm việc lâu dài; &emsp;&emsp; 
                [ <?php if ($vitritd->mucdichlv == 'Làm tạm thời') { echo 'x ';} ?>] Làm việc tạm thời; &emsp;&emsp; 
                [ <?php if ($vitritd->mucdichlv == 'Làm thêm') { echo 'x ';} ?>] Làm thêm
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">
                Mức lương*: - Lương tháng (VN đồng):<br>
                [  <?php if ($vitritd->mucluong == '< 5 triệu') { echo 'x ';} ?>] < 5 triệu ;&emsp;&emsp; 
                [ <?php if ($vitritd->mucluong == '5 -10 triệu') { echo 'x ';} ?> ] 5 -10 triệu;&emsp;&emsp;
                [ <?php if ($vitritd->mucluong == '10 - 20 triệu') { echo 'x ';} ?> ] 10 - 20 triệu;&emsp;&emsp; 
                [ <?php if ($vitritd->mucluong == '20 - 50 triệu') { echo 'x ';} ?> ] 20 - 50 triệu;&emsp;&emsp; 
                [ <?php if ($vitritd->mucluong == '> 50 triệu') { echo 'x ';} ?> ]> 50 triệu<br>
                    - [ ] Lương ngày ......................................./ngày<br>
                    - [ ] Lương giờ ......................................../giờ<br>
                    - [ ] Thỏa thuận khi phỏng vấn<br>
                    - [ ] Hoa hồng theo doanh thu/sản phẩm<br>
            </td>
        </tr>
        <tr>
            <td rowspan="4" style="text-align: left"> Chế độ phúc lợi* </td>
            <td colspan="4">Hỗ trợ ăn: 
                [ <?php if ($vitritd->hotroan == '1 Bữa') { echo 'x ';} ?>] 1 bữa;&emsp;&emsp; 
                [ <?php if ($vitritd->hotroan == '2 Bữa') { echo 'x ';} ?>] 2 bữa;&emsp;&emsp; 
                [ <?php if ($vitritd->hotroan == '3 Bữa') { echo 'x ';} ?>] 3 bữa;&emsp;&emsp; 
                [ <?php if ($vitritd->hotroan == 'Bằng tiền') { echo 'x ';} ?>] Bằng tiền: ..........; 
                [ <?php if ($vitritd->hotroan == 'Không') { echo 'x ';} ?>] Không hỗ trợ &emsp;&emsp;</td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left">[ ] Đóng BHXH, BHYT, BHTN;&emsp;&emsp; [ ] BH nhân thọ;&emsp;&emsp;
                [ ] Trợ cấp thôi việc;&emsp;&emsp; [ ] Nhà trẻ</td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left">[ ] Xe đưa đón;&emsp;&emsp; [ ] Hỗ trợ đi lại;&emsp;&emsp; [ ] Ký
                túc xá;&emsp;&emsp; [ ] Hỗ trợ nhà ở;&emsp;&emsp;
                [ ] Đào tạo</td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: left">[ ] Lối đi/thiết bị hỗ trợ cho người khuyết tật&emsp;&emsp; [ ] Cơ
                hội thăng
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
            <td colspan="3">[ ] Hầu như không có;&emsp;&emsp; [ ] Mức trung bình;&emsp;&emsp; [ ] Cần đứng/đi lại nhiều
            </td>
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
            <td colspan="3"> [ ] Lắp ráp đồ vật lớn;&emsp;&emsp; [ ] Lắp ráp đồ vật nhỏ;&emsp;&emsp; [ ] Lắp ráp đồ vật
                rất nhỏ</td>
        </tr>
        <tr>
            <td colspan="1" style="text-align: left"> Dùng 2 tay</td>
            <td colspan="3"> [ ] Cần 2 tay; &emsp;&emsp;[ ] Đôi khi cần 2 tay;&emsp;&emsp; [ ] Chỉ cần 1 tay;
                &emsp;&emsp;[ ] Trái;&emsp;&emsp; [ ] Phải</td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">Đối tượng ưu tiên: 
                [ ] Người khuyết tật;&emsp;&emsp; 
                [ ] Bộ đội xuất ngũ;&emsp;&emsp; 
                [ ] Người thuộc hộ nghèo, cận nghèo<br>
                [ ] Người dân tộc thiểu số;&emsp;&emsp; 
                [ ] Khác (ghi rõ:....................)
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">Hình thức tuyển dụng*: [ ] Trực tiếp;&emsp;&emsp; [ ] Qua điện
                thoại;&emsp;&emsp; [ ] Phỏng
                vấn online;&emsp;&emsp; [ ] Nộp CV</td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">Thời hạn tuyển dụng*: ngày tháng năm</td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left">Mong muốn của doanh nghiệp đối với TTDVVL: 
                [  <?php if ($tuyendung->yeucau == 'Tư vấn') { echo 'x ';} ?>] Tư vấn;&emsp;&emsp; 
                [ <?php if ($tuyendung->yeucau == 'Giới thiệu việc làm') { echo 'x ';} ?> ] GT việc làm;&emsp;&emsp; 
                [ <?php if ($tuyendung->yeucau == 'Cung ứng lao động') { echo 'x ';} ?> ] Cung ứng LĐ</td>
        </tr>
        <tr>
            <th colspan="5" style="text-align: left">2. Thông tin người liên hệ tuyển dụng</th>
        </tr>

        <tr>
            <td colspan="3" style="text-align: left">Họ và tên*: {{$tuyendung->contact}} </td>
            <td colspan="2">Chức vụ*: ...................................................................................
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: left">Số điện thoại*: {{$tuyendung->phonetd}} <br>
                Nhận SMS thông báo ứng tuyển<br>
                [ ] Có &emsp;&emsp;[ ] Không
            </td>
            <td colspan="2">Email*: {{$tuyendung->emailtd}} <br>
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
