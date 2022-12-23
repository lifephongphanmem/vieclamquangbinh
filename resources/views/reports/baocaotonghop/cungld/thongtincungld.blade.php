@extends('main_baocao')
@section('custom-style')
@stop
@section('custom-script')
@stop
@section('content')
    <div>
        <p>Tỉnh/thành phố:.................................</p>
        <p>Quận/huyện/thị xã:............................</p>
        <p>Xã/phường/thị trấn:...........................</p>
    </div>
    </table>
    <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">THÔNG TIN VỀ CUNG LAO ĐỘNG
    </p>
    <p style="text-align: center;font-style: italic;">(thu thập thông tin người từ 15 tuổi trở lên đang thực tế thường trú
        tại địa bàn)
    </p>


    <p><b>1.Họ, chữ đện và tên khai
            sinh:</b>..................................................................................................
    </p>

    <table cellspacing="0" cellpadding="0">
        <tr>
            <td style="width: 20%;text-align: left;"><b>2.Ngày, tháng, <br> năm sinh</b></td>
            <td style=";width: 50%;">
                <input style="width: 3rem;height: 4rem;border: 0.01px solid "><input
                    style="width: 3rem;height: 4rem;border: 0.01px solid"> -
                <input style="width: 3rem;height: 4rem;border: 0.01px solid"><input
                    style="width: 3rem;height: 4rem;border: 0.01px solid"> -
                <input style="width: 3rem;height: 4rem;border: 0.01px solid"><input
                    style="width: 3rem;height: 4rem;border: 0.01px solid"><input
                    style="width: 3rem;height: 4rem;border: 0.01px solid"><input
                    style="width: 3rem;height: 4rem;border: 0.01px solid">
            </td>
            <td><b>3.Giới tính: </b>
                □ Nam □ Nữ
            </td>
        </tr>
    </table>

    <p><b>4. Số CCCD/CMND:</b> <input style="width: 3rem;height: 4rem;margin-left: 5rem;border: 0.01px solid"><input
            style="width: 3rem;height: 4rem;border: 0.01px solid"><input
            style="width: 3rem;height: 4rem;border: 0.01px solid">
        <input style="width: 3rem;height: 4rem;margin-left: 3rem;border: 0.01px solid"><input
            style="width: 3rem;height: 4rem;border: 0.01px solid"><input
            style="width: 3rem;height: 4rem;border: 0.01px solid"> <input
            style="width: 3rem;height: 4rem;margin-left: 3rem;border: 0.01px solid"><input
            style="width: 3rem;height: 4rem;border: 0.01px solid"><input
            style="width: 3rem;height: 4rem;border: 0.01px solid"> <input
            style="width: 3rem;height: 4rem;margin-left: 3rem;border: 0.01px solid"><input
            style="width: 3rem;height: 4rem;border: 0.01px solid"><input
            style="width: 3rem;height: 4rem;border: 0.01px solid">
    </p>

    <p><b>5.Số điện thoại liên hệ:</b>............................................................
    </p>

    <p><b>6.Nơi đăng ký hộ khẩu thường
            trú:</b>................................................................................................................................................................................
        ............................................................................................................................................................................................................................................
    </p>

    <p><b>7.Nơi hiện tại (chỉ thu thập nếu khác nươi thường trú):</b><br>
        ............................................................................................................................................................................................................................................
        ............................................................................................................................................................................................................................................
    </p>


    <p><b>7.1 Khu vực:</b> □ thành thị □ nông thôn
    </p>

    <p><b>8.Đối tượng ưu tiên(nếu có):</b> □ Người khuyết tật □ thuộc hộ nghèo □ Hộ cân nghèo<br>
        □ dân tộc thiểu số(ghi tên dân
        tộc):......................................................................................................................................
    </p>

    <p><b>9.Trình độ giáo giục phổ thông cao nhất đã tốt nghiệp/đạt được:</b><br>
        □ Chưa học xong Tiểu học □ Tốt nghiệp Tiểu học □ Tốt nghiệp THCS □ Tốt nghiệp THPT
    </p>

    <p><b>10.Trình độ chuyên môn kỹ thuật cao nhất đạt được:</b>
        □ Chưa qua đào tạo
        □ CNKT không có bằng □ Chứng chỉ nghề dưới 3 tháng<br>
        □ Sơ cấp □ Trung cấp □ Cao đẳng □ Đại học □ Trên đại học
    </p>

    <p><b>10.1 Chuyên ngành đào tạo:</b>............................................................
    </p>

    <p> <b>11. Tình trạng tham gia hoạt động kinh tế:</b><br> □
        Người có việc làm → Chuyển câu 12<br>
        □ Người thất nghiệp → Chuyển câu 13<br>
        □ Không tham gia hoạt động kinh tế, lý do: □ Đi học □ Hưu trí □ Nội
        trợ □ Khuyết tật □ Khác
    </p>

    <p style="font-weight: bold">12. Người có việc làm:
    </p>
    <p>12.1 Vị thế việc làm: □ Chủ cơ sở □ SXKD □ Tự làm □ Lao động gia đình □ Làm công ăn lương
    </p>

    <p>12.2 Cụ thể công việc đang
        làm:...........................................................................................................................
    </p>

    <p>12.3 Nơi làm
        việc:.................................................................................................................................................
    </p>

    <p><b>13. Người thất nghiệp:</b> □ Chưa bao giờ làm việc □ Đã từng làm việc
    </p>
    <p>13.1. Thời gian thất nghiệp: □ Dưới 3 tháng □ Từ 3 tháng đến 1 năm □ Trên 1 năm
    </p>

    <table width="96%" cellspacing="0" height cellpadding="0" style="margin: 20px auto;text-align: center; height:200px">
        <tr>
            <td width="40%" style="text-align: left; vertical-align: top;">
            </td>
            <td style="vertical-align: top;">
                <i>Ngày......tháng......năm...........</i><br>
                <b>Người cung cấp thông tin</b><br>
                <i>(ký, ghi rõ họ tên)</i>
            </td>
        </tr>
    </table>
@stop
