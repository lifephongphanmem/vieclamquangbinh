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
    
    <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">DANH SÁCH CUNG LAO ĐỘNG NĂM
        ...........
    </p>


    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
        <thead>
            <tr style="text-align: center">
                <th rowspan="2">STT</th>
                <th rowspan="2">Họ và tên</th>
                <th rowspan="2">Ngày tháng năm sinh</th>
                <th colspan="2">Giới tinh</th>
                <th rowspan="2">Số CCCD/ CMTND</th>
                <th rowspan="2">Nơi đăng ký thường trú</th>
                <th rowspan="2"> Nơi ở hiện tại </th>
                <th rowspan="2"> Số diện thại </th>
                <th colspan="3"> Đối tượng ưu tiên </th>
                <th colspan="4"> Trình độ GDPT cao nhất đạt được </th>
                <th colspan="8"> Trình độ chuyên môn kỹ thuật cao nhất </th>
                <th rowspan="2"> Chuyên ngành đào tạo (Ghi rõ) </th>
                <th colspan="3"> Tình trạng tham gia hoạt động kinh tế </th>
                <th colspan="4">Người có việc làm </th>
                <th rowspan="2">Công việc cụ thể đang làm</th>
                <th rowspan="2">Nơi làm việc </th>
                <th colspan="2">Người thất nghiệp</th>
                <th colspan="3">Thời gian thất nghiệp</th>
                <th colspan="5">Không tham gia hoạt động kinh tế</th>
            </tr>
            <tr>
                <th> Nam </th>
                <th> Nữ </th>
                <th> Người khuyết tật</th>
                <th> Hộ nghèo, cận nghèo </th>
                <th> Dân tộc thiểu số(ghi tên dân tộc) </th>
                <th> Chưa học xong tiểu học </th>
                <th> TN tiểu học </th>
                <th> TN trung học cơ sở </th>
                <th> TN trung học phổ thông </th>
                <th> Chưa qua đào tạo </th>
                <th> CNKT không bằng </th>
                <th> CC nghề dưới 3 tháng </th>
                <th> Sơ cấp </th>
                <th> Trung cấp</th>
                <th> Cao đẳng </th>
                <th> Đại học </th>
                <th> Trên đại học </th>
                <th> Người có việc làm </th>
                <th> Người thất nghiệp </th>
                <th> Không tham gia hoạt động kinh tế </th>
                <th> Chủ cơ sở SXKD </th>
                <th> Tự làm </th>
                <th> Lao động gia đình </th>
                <th> Làm công ăn lương </th>
                <th> Chưa bao giờ làm việc </th>
                <th> Đã từng làm việc </th>
                <th> Dưới 3 tháng </th>
                <th>3 tháng đến 1 năm </th>
                <th> Trên 1 năm </th>
                <th> Đi học </th>
                <th> Hưu trí </th>
                <th> Nội trợ </th>
                <th> Khuyết tật </th>
                <th> Khác </th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td>Nghuyễn Thị A</td>
                <td>09/08/1945</td>
                <td></td>
                <td>x</td>
                <td>34634646</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
        </tbody>
    </table>

    <table width="96%" cellspacing="0" height cellpadding="0" style="margin: 20px auto;text-align: center; height:200px">
        <tr>
            <td width="40%" style="text-align: left; vertical-align: top;">
            </td>
            <td style="vertical-align: top;">
                <b>ỦY BAN NHÂN DÂN ...........................</b><br>
                <i>(ký, đóng dấu)</i>
            </td>
        </tr>
    </table>
@stop
