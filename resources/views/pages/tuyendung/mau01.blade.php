@extends('main_baocao')

@section('content')
    <table id="data_header">
        <tr>
            <td style="text-align:left;font-weight: bold;" valign="top" height="70">
                <p></p>
            </td>
            <td style="atext-align:right" valign="top">
                <p class="text-right">Mẫu số 01</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">PHIẾU THÔNG TIN
                    NHU CẦU TUYỂN DỤNG LAO ĐỘNG
                    CỦA NGƯỜI SỬ DỤNG LAO ĐỘNG
                </p>
                {{-- <p style="font-style:italic;">(Dành cho người sử dụng lao động)</p> --}}
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:right">
                <p>Mã số:..........</p>
            </td>
        </tr>


    </table>

    <table id="data_body" border="1" cellspacing="0" cellpadding="0">

        <tr>
            <th colspan="10"style="text-align:left">1. Thông tin người sử dụng lao động</th>
        </tr>
        <tr>
            <td colspan="10" style="text-align:left">
                Tên doanh nghiệp/người tuyển dụng*:&emsp;
                {{ isset($company)
                    ? $company->name
                    : '  ............................................................................................................
                                                                                     ...............................................................................................................................................' }}

            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:left">
                Mã số đăng ký/ Mã số
                thuế/CMND/CCCD*:&emsp;{{ isset($company) ? $company->dkkd : '...................................................................................................................' }}
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:left">
                Loại hình doanh nghiệp*: &emsp;
                @foreach ($loaihinhdn as $k => $ct)
                    [
                    @if ($ct->id == $company->loaihinh)
                        x
                    @endif
                    ] {{ $ct->name }}&emsp;&emsp;
                    @if ($k % 3 == 0 && $k != 0)
                        <br>
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:left;padding-bottom: 1%">
                Địa chỉ* :&emsp; Tỉnh {{ isset($company) ? $company->tinh : '.................................' }}
                &emsp;&emsp;&emsp;
                {{ isset($company) ? $company->huyen : 'Huyện .................................' }}&emsp;&emsp;&emsp;
                {{ isset($company) ? $company->xa : 'Xã .................................' }}
                <br>Địa chỉ cụ thể*:&emsp;&emsp;
                {{ isset($company) ? $company->adress : '.................................' }}
                <br>[ ] KCN/KKT:
                @if (isset($kcn))
                    {{ $kcn->name }}
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align:left;">
                Số điện thoại*:&emsp;
                {{ isset($company) ? $company->phone : '...................................................' }}
            </td>
            <td colspan="5" style="text-align:left;">
                Email*:&emsp;
                {{ isset($company) ? $company->email : '................................................................................................' }}
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:left;border-right: none">
                Ngành kinh doanh chính*:&emsp;
                @foreach ($nganhnghe as $ct)
                    <br>[@if ($company->nganhnghe == $ct->id)
                        x
                    @endif ] {{ $ct->name }}
                @endforeach

            </td>
        </tr>
        <tr>
            <th colspan="10" style="text-align: left;">2. Thông tin về nhu cầu tuyển dụng </th>
        </tr>
        <tr>
            <td colspan="6" style="text-align: left;"> Tên công việc*:&emsp; {{ $vitritd->name }}
            </td>
            <td colspan="4"> Số lượng tuyển*:&emsp; {{ $vitritd->soluong }} </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: left"> Mô tả công việc*:&emsp; {{ $vitritd->description }}
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: left"> Mã nghề*:&emsp;{{ $vitritd->manghe }}
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left;"> Cấp 1:
                ....................................................................................
            </td>
            <td colspan="5"> Cấp 2: .................................................................................
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: left"> Cấp 3:
                ....................................................................................</td>
            <td colspan="5">Cấp 4: .................................................................................
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: left"> Chức vụ*: &emsp;&emsp;
                @foreach (getchucvu() as $k=>$ct)
                [
                @if ($k== $vitritd->chucvu)
                    x
                @endif
                ] {{ $ct }} &emsp;&emsp;
            @endforeach
                [ ] Khác (ghi rõ):
                ...........................................................................................
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: left">
                Trình độ học vấn*:&emsp;
                [ <?php if ($vitritd->tdgd == 'Chưa đi học') {
                    echo 'x ';
                } ?> ] Chưa đi học &emsp;&emsp;&emsp;
                [ <?php if ($vitritd->tdgd == 'Chưa tốt nghiệp tiểu học') {
                    echo 'x ';
                } ?> ] Chưa tốt nghiệp tiểu học &emsp;&emsp;&emsp;
                [ <?php if ($vitritd->tdgd == 'Tốt nghiệp tiểu học') {
                    echo 'x ';
                } ?> ] Tốt nghiệp tiểu học &emsp;&emsp;&emsp;
                [ <?php if ($vitritd->tdgd == 'Tốt nghiệp THCS') {
                    echo 'x ';
                } ?>] Tốt nghiệp Trung học cơ sở &emsp;&emsp;&emsp;
                [ <?php if ($vitritd->tdgd == 'Tốt nghiệp THPT trở lên') {
                    echo 'x ';
                } ?>] Tốt nghiệp Trung học phổ thông
            </td>
        </tr>
        <tr>
            <td style="text-align: left"> Trình độ CMKT*: </td>
            <td colspan="3">
                [<?php if ($vitritd->tdcmkt == 'Không có trình độ chuyên môn kỹ thuật (CMKT)') {
                    echo 'x ';
                } ?> ] Chưa qua đào tạo<br>
                [ <?php if ($vitritd->tdcmkt == 'Sơ cấp') {
                    echo 'x ';
                } ?> ] Sơ cấp<br>
                [<?php if ($vitritd->tdcmkt == 'Cao đẳng') {
                    echo 'x ';
                } ?> ] Cao đẳng<br>
                [ <?php if ($vitritd->tdcmkt == 'Thạc sĩ') {
                    echo 'x ';
                } ?> ] Thạc sĩ<br>
            </td>
            <td colspan="3" style="text-align: left">
                [ <?php if ($vitritd->tdcmkt == 'CNKT không bằng') {
                    echo 'x ';
                } ?> ] CNKT không bằng<br>
                [ <?php if ($vitritd->tdcmkt == 'Trung cấp') {
                    echo 'x ';
                } ?> ] Trung cấp<br>
                [ <?php if ($vitritd->tdcmkt == 'Đại học') {
                    echo 'x ';
                } ?> ] Đại học<br>
                [ <?php if ($vitritd->tdcmkt == 'Tiến sĩ') {
                    echo 'x ';
                } ?> ] Tiến sĩ
            </td>
            <td colspan="3">
                Chuyên ngành đào tạo:<br>
                {{ $vitritd->chuyennganh }}
            </td>
        </tr>
        <tr>
            <td style="text-align: left"> Trình độ khác </td>
            <td colspan="9">
                1: ..............................................................................................<br>
                2: ..............................................................................................
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: left">
                Trình độ kỹ năng nghề:..............................................................................................................................................
                Bậc:........................................................................
            </td>
        </tr>
        <tr>
            <td style="text-align: left"> Trình độ ngoại ngữ </td>
            <td colspan="9">
                Ngoại ngữ 1:
                {{ $vitritd->ngoaingu1 != null ? $vitritd->ngoaingu1 : '.........................................' }}
                &emsp;&emsp;Chứng chỉ:
                {{ $vitritd->chungchinn1 != null ? $vitritd->chungchinn1 : '.........................................' }}<br>
                Khả năng sử dụng: [ <?php if ($vitritd->xeploainn1 == 'Tốt' && $vitritd->ngoaingu1 != null) {
                    echo 'x ';
                } ?>]
                Tốt &emsp;&emsp; [ <?php if ($vitritd->xeploainn1 == 'Khá' && $vitritd->ngoaingu1 != null) {
                    echo 'x ';
                } ?>] Khá &emsp;&emsp;[
                <?php if ($vitritd->xeploainn1 == 'Trung bình' && $vitritd->ngoaingu1 != null) {
                    echo 'x ';
                } ?>] Trung bình &emsp;&emsp;<br>
                Ngoại ngữ 2:
                {{ $vitritd->ngoaingu2 != null ? $vitritd->ngoaingu2 : '.........................................' }}
                &emsp;&emsp;Chứng chỉ:
                {{ $vitritd->chungchinn2 != null ? $vitritd->chungchinn2 : '.........................................' }}<br>
                Khả năng sử dụng: [ <?php if ($vitritd->xeploainn2 == 'Tốt' && $vitritd->ngoaingu2 != null) {
                    echo 'x ';
                } ?>] Tốt &emsp;&emsp; [ <?php if ($vitritd->xeploainn2 == 'Khá' && $vitritd->ngoaingu2 != null) {
                    echo 'x ';
                } ?>] Khá &emsp;&emsp; [
                <?php if ($vitritd->xeploainn2 == 'Trung bình' && $vitritd->ngoaingu2 != null) {
                    echo 'x ';
                } ?>] Trung bình &emsp;&emsp;
            </td>
        </tr>
        <tr>
            <td style="text-align: left"> Trình độ tin học </td>
            <td colspan="9">
                [ ] Tin học văn phòng
                .............................................................................................................................<br>
                Khả năng sử dụng: [ <?php if ($vitritd->loaithvp == 'Tốt') {
                    echo 'x ';
                } ?>] Tốt &emsp;&emsp; [ <?php if ($vitritd->loaithvp == 'Khá') {
                    echo 'x ';
                } ?>] Khá &emsp;&emsp;[
                <?php if ($vitritd->loaithvp == 'Trung bình') {
                    echo 'x ';
                } ?>] Trung bình &emsp;&emsp;<br>
                [ ] Khác: {{ $vitritd->tinhockhac }} <br>
                Khả năng sử dụng: [ <?php if ($vitritd->loaithk == 'Tốt') {
                    echo 'x ';
                } ?>] Tốt &emsp;&emsp; [ <?php if ($vitritd->loaithk == 'Khá') {
                    echo 'x ';
                } ?>] Khá &emsp;&emsp; [
                <?php if ($vitritd->loaithk == 'Trung bình') {
                    echo 'x ';
                } ?>] Trung bình &emsp;&emsp;
            </td>
        </tr>
        <tr>
            <td style="text-align: left">Kỹ năng mềm </td>
            <td colspan="9">
                @foreach (getkynangmem() as $ct)
                    [
                    @if (in_array($ct, $vitritd->kynangmem))
                        x
                    @endif
                    ] {{ $ct }} &emsp;&emsp;
                @endforeach
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: left">
                Yêu cầu kinh nghiệm:<br>
                [ <?php if ($vitritd->yeucaukn == 'Không yêu cầu') {
                    echo 'x ';
                } ?> ] Không yêu cầu &emsp;&emsp;
                [ <?php if ($vitritd->yeucaukn == 'Dưới 1 năm') {
                    echo 'x ';
                } ?> ] Dưới 1 năm &emsp;&emsp;
                [ <?php if ($vitritd->yeucaukn == '1 đến 2 năm') {
                    echo 'x ';
                } ?> ] Từ 1 đến 2 năm &emsp;&emsp;
                [ <?php if ($vitritd->yeucaukn == '2 đến 5 năm') {
                    echo 'x ';
                } ?> ] Từ 2 đến 5 năm &emsp;&emsp;
                [ <?php if ($vitritd->yeucaukn == 'Trên 5 năm') {
                    echo 'x ';
                } ?> ] Trên 5 năm
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: left">
                Nơi làm việc dự kiến: {{ $vitritd->diadiem }}
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: left">
                Loại hợp đồng LĐ:&emsp;&emsp;
                @foreach (getHDLD() as $k => $ct)
                    [
                    @if ($k == $vitritd->loaihopdong)
                        x
                    @endif
                    ] {{ $ct }} &emsp;&emsp;
                @endforeach
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: left">
                Yêu cầu thêm: &emsp;&emsp;
                @foreach (getYeucauthem() as $k => $ct)
                    [
                    @if ($k == $vitritd->yeucauthem)
                        x
                    @endif
                    ] {{ $ct }} &emsp;&emsp;
                @endforeach
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: left">
                Hình thức làm việc*:&emsp;&emsp;
                [ <?php if ($vitritd->hinhthuclv == 'Toàn thời gian') {
                    echo 'x ';
                } ?>] Toàn thời gian &emsp;&emsp;
                [ <?php if ($vitritd->hinhthuclv == 'Bán thời gian') {
                    echo 'x ';
                } ?>] Bán thời gian
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: left">
                Mục đích làm việc:&emsp;&emsp;
                [ <?php if ($vitritd->mucdichlv == 'Làm lâu dài') {
                    echo 'x ';
                } ?>] Làm việc lâu dài; &emsp;&emsp;
                [ <?php if ($vitritd->mucdichlv == 'Làm tạm thời') {
                    echo 'x ';
                } ?>] Làm việc tạm thời; &emsp;&emsp;
                [ <?php if ($vitritd->mucdichlv == 'Làm thêm') {
                    echo 'x ';
                } ?>] Làm thêm
            </td>
        </tr>
        <?php
        $arr_mucluong = ['Dưới 5 triệu', '5 - 10 triệu', '10 - 20 triệu', '20 - 50 triệu', 'trên 50 triệu', 'Thỏa thuận', 'Hoa hồng'];
        ?>
        <tr>
            <td colspan="10" style="text-align: left">
                Mức lương*: - Lương tháng (VN đồng):<br>&emsp;&emsp;&emsp;&emsp;
                @foreach ($arr_mucluong as $k => $ct)
                    [
                    @if ($ct == $vitritd->mucluong)
                        x
                    @endif
                    ] {{ $ct }} &emsp;&emsp;
                @endforeach
            </td>
        </tr>

        <tr>
            <td rowspan="4" style="text-align: left"> Chế độ phúc lợi* </td>
            <td colspan="9">Hỗ trợ ăn:
                [ <?php if ($vitritd->hotroan == '1 Bữa') {
                    echo 'x ';
                } ?>] 1 bữa;&emsp;&emsp;
                [ <?php if ($vitritd->hotroan == '2 Bữa') {
                    echo 'x ';
                } ?>] 2 bữa;&emsp;&emsp;
                [ <?php if ($vitritd->hotroan == '3 Bữa') {
                    echo 'x ';
                } ?>] 3 bữa;&emsp;&emsp;
                [ <?php if ($vitritd->hotroan == 'Bằng tiền') {
                    echo 'x ';
                } ?>] Bằng tiền: ..........;
                [ <?php if ($vitritd->hotroan == 'Không') {
                    echo 'x ';
                } ?>] Không hỗ trợ
            </td>
        </tr>
        <tr>
            <td colspan="9" style="text-align: left">[
                @if (in_array('Đóng BHXH, BHYT, BHTN', $vitritd->phucloi))
                    x
                @endif
                ] Đóng BHXH, BHYT, BHTN;&emsp;&emsp;
                [
                @if (in_array('Đóng BHNT', $vitritd->phucloi))
                    x
                @endif
                ] BH nhân thọ;&emsp;&emsp;
                [
                @if (in_array('Trợ cấp thôi việc', $vitritd->phucloi))
                    x
                @endif
                ] Trợ cấp thôi việc;&emsp;&emsp;
                [
                @if (in_array('Nhà trẻ', $vitritd->phucloi))
                    x
                @endif
                ] Nhà trẻ
            </td>
        </tr>
        <tr>
            <td colspan="9" style="text-align: left">[
                @if (in_array('Xe đưa đón', $vitritd->phucloi))
                    x
                @endif
                ] Xe đưa đón;&emsp;&emsp;
                [
                @if (in_array('Hỗ trợ đi lại', $vitritd->phucloi))
                    x
                @endif
                ] Hỗ trợ đi lại;&emsp;&emsp;
                [
                @if (in_array('Ký túc xá', $vitritd->phucloi))
                    x
                @endif
                ] Ký túc xá;&emsp;&emsp;
                [
                @if (in_array('Hỗ trợ nhà ở', $vitritd->phucloi))
                    x
                @endif
                ] Hỗ trợ nhà ở;&emsp;&emsp;
                [
                @if (in_array('Đào tạo', $vitritd->phucloi))
                    x
                @endif
                ] Đào tạo
            </td>
        </tr>
        <tr>
            <td colspan="9" style="text-align: left">[
                @if (in_array('Lối đi người khuyết tật', $vitritd->phucloi))
                    x
                @endif
                ] Lối đi/thiết bị hỗ trợ cho người khuyết tật&emsp;&emsp;
                [
                @if (in_array('Cơ hội thăng tiến', $vitritd->phucloi))
                    x
                @endif
                ] Cơ hội thăng tiến<br>
                [ ] Khác
                ................................................................................
            </td>
        </tr>

        <tr>
            <td rowspan="7" style="text-align: left">Điều kiện làm việc*</td>
            <td colspan="1"> Nơi làm việc</td>
            <td colspan="9">
                @foreach (getNoilamviec() as $key=>$val)
                [ 
                    @if ($key == $vitritd->noilamviec)
                      x  
                    @endif
                ] {{$val}} &emsp;&emsp;
                @endforeach
            </td>
        </tr>
        @foreach (getDklamviec() as $k=>$ct)
        <tr>
            <td colspan="1" style="text-align: left">{{DKLV()[$k]}}</td>
            <td colspan="9">
                @foreach ($ct as $key=>$val)
                [ 
                    @if ($key == $vitritd->$k)
                      x  
                    @endif
                ] {{$val}} &emsp;&emsp;
                @endforeach
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="10" style="text-align: left">Đối tượng ưu tiên:&emsp;&emsp;
                @foreach (uutien() as $key=>$val)
                [ 
                    @if ($key == $vitritd->uutien)
                      x  
                    @endif
                ] {{$val}} &emsp;&emsp;
                @endforeach
                [ ] Khác (ghi rõ:....................)
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: left">Hình thức tuyển dụng*: [ ] Trực tiếp;&emsp;&emsp; [ ] Qua điện
                thoại;&emsp;&emsp; [ ] Phỏng
                vấn online;&emsp;&emsp; [ ] Nộp CV</td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: left">Thời hạn tuyển dụng*: ngày {{$tuyendung->ngay}} tháng {{$tuyendung->thang}} năm {{$tuyendung->nam}}</td>
        </tr>
        <tr>
            <th colspan="10" style="text-align: left">3. Thông tin người liên hệ tuyển dụng</th>
        </tr>

        <tr>
            <td colspan="6" style="text-align: left">Họ và tên*: {{ $tuyendung->contact }} </td>
            <td colspan="4">Chức vụ*:
                ...................................................................................
            </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align: left">Số điện thoại*: {{ $tuyendung->phonetd }} <br>
                Nhận SMS thông báo ứng tuyển<br>
                [ ] Có &emsp;&emsp;[ ] Không
            </td>
            <td colspan="4">Email*: {{ $tuyendung->emailtd }} <br>
                Nhận email thông báo ứng tuyển<br>
                [ ] Có&emsp;&emsp; [ ] Không
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align: left">
                Hình thức liên hệ khác (nếu có):
                .......................................................................................................................................................
            </td>
        </tr>
        {{-- </table> --}}
    </table>
    <table id="data_footer" width="96%" cellspacing="0" height cellpadding="0"
        style="margin: 20px auto;text-align: center; height:200px">
        <tr>
            <td width="40%" style="text-align: left; vertical-align: top;">
            </td>
            <td style="vertical-align: top;">
                <i>Ngày......tháng......năm...........</i><br>
                <b>XÁC NHẬN CỦA NGƯỜI ĐĂNG KÝ</b><br>
                <i>(Ký tên đóng dấu)</i>
            </td>
        </tr>
    </table>
@stop
