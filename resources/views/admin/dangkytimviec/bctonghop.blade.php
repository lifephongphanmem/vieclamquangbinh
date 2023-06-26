@extends('main_baocao')
@section('content')
    <table id='data_header' width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
        <tr>
            <td width="40%" style="vertical-align: top;">
                <p style="text-transform: uppercase"> TRUNG TÂM DỊCH VỤ VIỆC LÀM QUẢNG BÌNH </p>
                <span style="text-transform: uppercase;font-weight: bold"> PHÒNG TƯ VẤN GIỚI THIỆU VIỆC LÀM </span>
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
    <p id='data_body' style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">TỔNG HỢP TÌNH HÌNH HOẠT ĐỘNG DỊCH VỤ VIỆC LÀM</p>
    <p id='data_body1' style="text-align: center;font-style: italic;"> Từ ngày {{getDayVn($input['tungay'])}} đến ngày {{getDayVn($input['denngay'])}} </p>

    <table id='data_body2' cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
        <thead>
            <tr>
                <th>STT</th>
                <th>Chỉ tiêu</th>
                <th>Đơn vị</th>
                <th>Số liệu</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>A</th>
                <td colspan="3" style="text-transform: uppercase;font-weight: bold">TỔ CHỨC PHIÊN GDVL ĐỊNH KỲ</td>
            </tr>
            <tr>
                <td>1</td>
                <td style="font-weight: bold">Tần suất tổ chức phiên GDVL định kỳ</td>
                <th>Lần/quý</th>
                <th></th>
            </tr>
            <tr>
                <td>2</td>
                <td style="font-weight: bold">Số phiên tổ chức tại sàn GDVL đã thực hiện tại Sàn GDVL</td>
                <th>Phiên</th>
                <th style="text-align: center;">{{ count($model->where('phiengd','!=',null)) }}</th>
            </tr>
            <tr>
                <td></td>
                <td>Trong đó</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>a</td>
                <td>Phiên GDVL định kỳ</td>
                <td  style="text-align: center;" >"</td>
                <td style="text-align: center;">{{ count($model->where('phiengd','Phiên định kỳ')) }}</td>
            </tr>
            <tr>
                <td>b</td>
                <td>Phiên GDVL đột xuất</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;">{{ count($model->where('phiengd','Phiên đột xuất')) }}</td>
            </tr>
            <tr>
                <td>c</td>
                <td>Phiên GDVL Online</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;">{{ count($model->where('phiengd','Phiên online')) }}</td>
            </tr>
            <tr>
                <td>3</td>
                <td style="font-weight: bold">Số Doanh nghiệp trực tiếp tham gia tuyển dụng trực tiếp tại Sàn GDVL</td>
                <th>Doanh nghiệp</th>
                <th></th>
            </tr>
            <tr>
                <td>4</td>
                <td style="font-weight: bold">Số lượt người lao động được tư vấn việc làm tại Sàn GDVL </td>
                <th>Lượt Người</th>
                <th>{{ count($model) }}</th>
            </tr>
            <tr>
                <td></td>
                <td>Trong đó</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>a</td>
                <td>Số người là phụ nữ</td>
                <td  style="text-align: center;" >"</td>
                <td style="text-align: center;">{{ count($model->where('gioitinh','Nữ')) }}</td>
            </tr>
            <tr>
                <td>b</td>
                <td>Số người là người khuyết tật</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;"></td>
            </tr>
            <tr>
                <td>c</td>
                <td>Số người là người dân tộc thiểu số</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;">{{ count($model->where('gioitinh','!=',['kinh','Kinh','KINH'])) }}</td>
            </tr>
            <tr>
                <td>5</td>
                <td style="font-weight: bold">Số lượt người lao động được tư vấn chia theo trình độ chuyên môn kỹ thuật cao nhất (a+b+c+d) </td>
                <th>Lượt Người</th>
                <th>{{  count($model->where('trinhdocmkt','!=',null))}}</th>
            </tr>
            <tr>
                <td></td>
                <td>Trong đó</td>
                <td></td>
                <td></td>
            </tr>
            @foreach($dmtrinhdokythuat as $item)
                <tr>
                    <td></td>
                    <td>{{ $item->tentdkt }}</td>
                    <td style="text-align: center;">"</td>
                    <td style="text-align: center;">{{ count($model->where('trinhdocmkt',$item->stt)) }}</td>
                </tr>
            @endforeach


            <tr>
                <td>6</td>
                <td style="font-weight: bold">Số lượt người lao động được tư vấn chia theo nhóm ngành nghề </td>
                <th>Lượt Người</th>
                <th style="text-align: center;">{{ count($model->where('linhvuc','!=',null)) }}</th>
            </tr>
            <tr>
                <td></td>
                <td>Trong đó</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>a</td>
                <td>Lĩnh vực Xây dựng</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;">{{ count($model->where('linhvuc','Lĩnh vực xây dựng')) }}</td>
            </tr>
            <tr>
                <td>b</td>
                <td>Lĩnh vực Kinh tế</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;">{{ count($model->where('linhvuc','Lĩnh vực kinh tế')) }}</td>
            </tr>
            <tr>
                <td>c</td>
                <td>Lĩnh vực Dịch vụ</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;">{{ count($model->where('linhvuc','Lĩnh vực dịch vụ')) }}</td>
            </tr>
            <tr>
                <td>d</td>
                <td>Lĩnh vực kỹ thuật</td>
                <td style="text-align: center;">"</td>
                 <td style="text-align: center;">{{ count($model->where('linhvuc','Lĩnh vực kỹ thuật')) }}</td>
            </tr>
            <tr>
                <td>e</td>
                <td>Lĩnh vực LĐPT</td>
                <td style="text-align: center;">"</td>
                 <td style="text-align: center;">{{ count($model->where('linhvuc','Lĩnh vực LDPT')) }}</td>
            </tr>
            <tr>
                <td>f</td>
                <td>Lĩnh vực khác</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;">{{ count($model->where('linhvuc','Lĩnh vực khác')) }}</td>
            </tr>

	


        </tbody>
    </table>

    <table id='data_footer' width="96%" cellspacing="0" height cellpadding="0" style="margin: 20px auto;text-align: center; height:200px">
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


