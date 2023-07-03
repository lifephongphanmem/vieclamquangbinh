@extends('main_baocao')
@section('content')
    <table id='data_header' width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
        <tr>
            <td width="40%" style="vertical-align: top;">
                <p style="text-transform: uppercase"> TRUNG TÂM DỊCH VỤ VIỆC LÀM QUẢNG BÌNH </p>
                <span style="text-transform: uppercase;font-weight: bold"> PHÒNG TƯ VẤN GIỚI THIỆU VIỆC LÀM </span>
                <hr style="text-align: center;vertical-align: top;">

            </td>
            <td style="vertical-align: top;">
                <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                    Độc lập - Tự do - Hạnh phúc</b>
                <hr style="text-align: center;vertical-align: top;display: block">
          
            </td>
        </tr>
    </table>
  
    <p id='data_body' style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">TỔNG HỢP TÌNH HÌNH HOẠT ĐỘNG DỊCH VỤ VIỆC LÀM</p>
    <p id='data_body1' style="text-align: center;font-style: italic;"> Từ ngày {{getDayVn($input['tungay'])}} đến ngày {{getDayVn($input['denngay'])}} </p>

    <P id='data_body2' style="font-weight: bold;text-align: botton;">I. TÌNH HÌNH THỰC HIỆN NHIỆM VỤ THÁNG </P>

    <table id='data_body3' cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
        <thead>
            <tr>
                <th>STT</th>
                <th>Chỉ tiêu</th>
                <th>Đơn vị tính</th>
                <th>Số liệu</th>
            </tr>
            <tr>
                <th>(1)</th>
                <th>(2)</th>
                <th>(3)</th>
                <th>(4)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>A</th>
                <td colspan="3" style="text-transform: uppercase;font-weight: bold">TỔ CHỨC PHIÊN GDVL ĐỊNH KỲ</td>
            </tr>
            <tr>
                <td style="font-weight: bold">1</td>
                <td style="font-weight: bold">Tần suất tổ chức phiên GDVL định kỳ</td>
                <th>Lần/quý</th>
                <th></th>
            </tr>
            <tr>
                <td  style="font-weight: bold">2</td>
                <td style="font-weight: bold">Số phiên tổ chức tại sàn GDVL đã thực hiện tại Sàn GDVL</td>
                <th>Phiên</th>
                <?php  

                ?>
                <th style="text-align: center;">{{ count(a_unique(array_column($model->toarray(),'maphien')))}}</th>
            </tr>
            <tr>
                <td></td>
                <td style=" font-style: italic;">Trong đó</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>a</td>
                <td>Phiên GDVL định kỳ</td>
                <td  style="text-align: center;" >"</td> 
                <td style="text-align: center;">{{ count(a_unique(array_column($model->where('phiengd','Phiên định kỳ')->toarray(),'maphien'))) }}</td>
            </tr>
            <tr>
                <td>b</td>
                <td>Phiên GDVL đột xuất</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;">{{ count(a_unique(array_column($model->where('phiengd','Phiên đột xuất')->toarray(),'maphien'))) }}</td>
            </tr>
            <tr>
                <td>c</td>
                <td>Phiên GDVL Online</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;">{{ count(a_unique(array_column($model->where('phiengd','Phiên online')->toarray(),'maphien'))) }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold">3</td>
                <td style="font-weight: bold">Số Doanh nghiệp trực tiếp tham gia tuyển dụng trực tiếp tại Sàn GDVL</td>
                <th>Doanh nghiệp</th>
                <td style="text-align: center;">{{ count(a_unique(array_column($model->toarray(),'madkkd'))) }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold">4</td>
                <td style="font-weight: bold">Số lượt người lao động được tư vấn việc làm tại Sàn GDVL </td>
                <th>Lượt Người</th>
                <th style="text-align: center;">{{ count($model) }}</th>
            </tr>
            <tr>
                <td></td>
                <td style=" font-style: italic;">Trong đó</td>
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
                <td style="text-align: center;">{{ count($model->where('nguoikhuyettat', 'Có' )) }}</td>
            </tr>
            <tr>
                <td>c</td>
                <td>Số người là người dân tộc thiểu số</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;">{{ count($model->where('dantoc','!=',['kinh','Kinh','KINH'])) }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold">5</td>
                <td style="font-weight: bold">Số lượt người lao động được tư vấn chia theo trình độ chuyên môn kỹ thuật cao nhất (a+b+c+d) </td>
                <th>Lượt Người</th>
                <th>{{  count($model->where('trinhdocmkt','!=',null))}}</th>
            </tr>
            <tr>
                <td></td>
                <td style=" font-style: italic;">Trong đó</td>
                <td></td>
                <td></td>
            </tr>
            @foreach($dmtrinhdokythuat as $key => $item)
                <tr>
                    @if ($key == 0) <td>a</td> @endif @if ($key == 1)<td>b</td> @endif @if ($key == 2) <td>c</td> @endif  @if ($key == 3)<td>d</td> @endif
                    @if ($key == 4) <td>e</td> @endif @if ($key == 5)<td>f</td> @endif @if ($key == 6) <td>g</td> @endif @if ($key == 7) <td>h</td> @endif
                    <td>{{ $item->tentdkt }}</td>
                    <td style="text-align: center;">"</td>
                    <td style="text-align: center;">{{ count($model->where('trinhdocmkt',$item->stt)) }}</td>
                </tr>
            @endforeach

            <tr>
                <td style="font-weight: bold">6</td>
                <td style="font-weight: bold">Số lượt người lao động được tư vấn chia theo nhóm ngành nghề </td>
                <th>Lượt Người</th>
                <th style="text-align: center;">{{ count($model->where('linhvuc','!=',null)) }}</th>
            </tr>
            <tr>
                <td></td>
                <td style=" font-style: italic;">Trong đó</td>
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

            <tr>
                <td style="font-weight: bold">7</td>
                <td style="font-weight: bold">Số lượt người lao động đăng ký tìm kiếm việc làm tại Sàn GDVL</td>
                <th>Lượt Người</th>
                <th style="text-align: center;">{{ count($model) }}</th>
            </tr>
            <tr>
                <td style="font-weight: bold">8</td>
                <td style="font-weight: bold">Số lượt người lao động được giới thiệu phỏng vấn tại Sàn GDVL</td>
                <th>Lượt Người</th>
                <th style="text-align: center;">{{ count($model->where('datsotuyen','Đạt')) }}</th>
            </tr>
            <tr>
                <td style="font-weight: bold">9</td>
                <td style="font-weight: bold">Số người lao động nhận được việc làm sau khi phỏng vấn tại Sàn GDVL</td>
                <th>Lượt Người</th>
                <th style="text-align: center;">{{ count($model->where('nhanduocviec','Có')) }}</th>
            </tr>

            <tr>
                <th>B</th>
                <td colspan="3" style="text-transform: uppercase;font-weight: bold">CÁC HOẠT ĐỘNG TẠI SÀN GDVL</td>
            </tr>
            <tr>
                <th>I</th>
                <td colspan="3" style="font-weight: bold">Hoạt động tư vấn việc làm trong tỉnh, trong nước tại Sàn GDVL</td>
            </tr>
            <tr>
                <td style="font-weight: bold">1</td>
                <td style="font-weight: bold">Số lượt người lao động được tư vấn tại Sàn</td>
                <th>Lượt Người</th>
                <th></th>
            </tr>
            <tr>
                <td></td>
                <td style=" font-style: italic;">Trong đó</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>a</td>
                <td>Số người thuộc đối tượng LĐXH</td>
                <td  style="text-align: center;" >"</td>
                <td style="text-align: center;"></td>
            </tr>
            <tr>
                <td>b</td>
                <td>Số người thuộc đối tượng BHTN</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;"></td>
            </tr>
            <tr>
                <td style="font-weight: bold">2</td>
                <td style="font-weight: bold">Số lượt người lao động được tư vấn chia theo loại tư vấn</td>
                <th>Lượt Người</th>
                <th></th>
            </tr>
            <tr>
                <td></td>
                <td style=" font-style: italic;">Trong đó</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>a</td>
                <td>Tư vấn về việc làm trong tỉnh, trong nước</td>
                <td  style="text-align: center;" >"</td>
                <td style="text-align: center;"></td>
            </tr>
            <tr>
                <td>b</td>
                <td>Tư vấn về chính sách, pháp luật LĐ</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;"></td>
            </tr>
            <tr>
                <td>c</td>
                <td>Tư vấn về chính sách BHTN</td>
                <td  style="text-align: center;" >"</td>
                <td style="text-align: center;"></td>
            </tr>
            <tr>
                <td>d</td>
                <td>Tư vấn về học nghề</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;"></td>
            </tr>
            <tr>
                <td>e</td>
                <td>Tư vấn khác</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;"></td>
            </tr>
            <tr>
                <td style="font-weight: bold">3</td>
                <td style="font-weight: bold">Số lượt người lao động được tư vấn chia theo trình độ chuyên môn kỹ thuật cao nhất</td>
                <th>Lượt Người</th>
                <th></th>
            </tr>
            <tr>
                <td></td>
                <td style=" font-style: italic;">Trong đó</td>
                <td></td>
                <td></td>
            </tr>
            @foreach($dmtrinhdokythuat as $key => $item)
                <tr>
                    @if ($key == 0) <td>a</td> @endif @if ($key == 1)<td>b</td> @endif @if ($key == 2) <td>c</td> @endif  @if ($key == 3)<td>d</td> @endif
                    @if ($key == 4) <td>e</td> @endif @if ($key == 5)<td>f</td> @endif @if ($key == 6) <td>g</td> @endif @if ($key == 7) <td>h</td> @endif
                    {{-- @for ($i=0;$i<=count($abc);$i++)
                        @if ($i == $key)
                            <td>{{ $abc[$a] }}</td>
                        @endif
                    @endfor --}}
                    <td>{{ $item->tentdkt }}</td>
                    <td style="text-align: center;">"</td>
                    <td></td>
                    {{-- <td style="text-align: center;">{{ count($model->where('trinhdocmkt',$item->stt)) }}</td> --}}
                </tr>
            @endforeach
            <tr>
                <td style="font-weight: bold">4</td>
                <td style="font-weight: bold">Số lượt người lao động được tư vấn chia theo nhóm ngành nghề </td>
                <th>Lượt Người</th>
                {{-- <th style="text-align: center;">{{ count($model->where('linhvuc','!=',null)) }}</th> --}}
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td style=" font-style: italic;">Trong đó</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>a</td>
                <td>Lĩnh vực Xây dựng</td>
                <td style="text-align: center;">"</td>
                {{-- <td style="text-align: center;">{{ count($model->where('linhvuc','Lĩnh vực xây dựng')) }}</td> --}}
                <td></td>
            </tr>
            <tr>
                <td>b</td>
                <td>Lĩnh vực Kinh tế</td>
                <td style="text-align: center;">"</td>
                {{-- <td style="text-align: center;">{{ count($model->where('linhvuc','Lĩnh vực kinh tế')) }}</td> --}}
                <td></td>
            </tr>
            <tr>
                <td>c</td>
                <td>Lĩnh vực Dịch vụ</td>
                <td style="text-align: center;">"</td>
                {{-- <td style="text-align: center;">{{ count($model->where('linhvuc','Lĩnh vực dịch vụ')) }}</td> --}}
                <td></td>
            </tr>
            <tr>
                <td>d</td>
                <td>Lĩnh vực kỹ thuật</td>
                <td style="text-align: center;">"</td>
                 {{-- <td style="text-align: center;">{{ count($model->where('linhvuc','Lĩnh vực kỹ thuật')) }}</td> --}}
                 <td></td>
            </tr>
            <tr>
                <td>e</td>
                <td>Lĩnh vực LĐPT</td>
                <td style="text-align: center;">"</td>
                 {{-- <td style="text-align: center;">{{ count($model->where('linhvuc','Lĩnh vực LDPT')) }}</td> --}}
                 <td></td>
            </tr>
            <tr>
                <td>f</td>
                <td>Lĩnh vực khác</td>
                <td style="text-align: center;">"</td>
                {{-- <td style="text-align: center;">{{ count($model->where('linhvuc','Lĩnh vực khác')) }}</td> --}}
                <td></td>
            </tr>
            <tr>
                <th>II</th>
                <td colspan="3" style="font-weight: bold">Hoạt động giới thiệu, cung ứng việc làm tại Sàn</td>
            </tr>
            <tr>
                <td style="font-weight: bold">1</td>
                <td style="font-weight: bold">Số Doanh nghiệp tham gia tuyển dụng</td>
                <th>Doanh nghiệp</th>
                <th></th>
            </tr>
            <tr>
                <td  style="font-weight: bold">2</td>
                <td style="font-weight: bold">Số lượt người đăng ký tìm việc làm</td>
                <th>Lượt Người</th>
                <th style="text-align: center;"></th>
            </tr>
            <tr>
                <td></td>
                <td style=" font-style: italic;">Trong đó</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>a</td>
                <td>Số người thuộc đối tượng LĐXH</td>
                <td style="text-align: center;" >"</td>
                <td style="text-align: center;"></td>
            </tr>
            <tr>
                <td>b</td>
                <td>Số người thuộc đối tượng BHTN</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;"></td>
            </tr>
            <tr>
                <td  style="font-weight: bold">3</td>
                <td style="font-weight: bold">Số người được giới thiệu việc làm</td>
                <th>Lượt Người</th>
                <th style="text-align: center;"></th>
            </tr>
            <tr>
                <td></td>
                <td style=" font-style: italic;">Trong đó</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>a</td>
                <td>Số người thuộc đối tượng LĐXH</td>
                <td style="text-align: center;" >"</td>
                <td style="text-align: center;"></td>
            </tr>
            <tr>
                <td>b</td>
                <td>Số người thuộc đối tượng BHTN</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;"></td>
            </tr>
            <tr>
                <td style="font-weight: bold">4</td>
                <td style="font-weight: bold">Số người được tuyển dụng do Trung tâm giới thiệu</td>
                <th>Người</th>
                <th style="text-align: center;"></th>
            </tr>
            <tr>
                <td></td>
                <td style=" font-style: italic;">Trong đó</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>a</td>
                <td>Số người thuộc đối tượng LĐXH</td>
                <td style="text-align: center;" >"</td>
                <td style="text-align: center;"></td>
            </tr>
            <tr>
                <td>b</td>
                <td>Số người thuộc đối tượng BHTN</td>
                <td style="text-align: center;">"</td>
                <td style="text-align: center;"></td>
            </tr>
            <tr>
                <th>C</th>
                <td colspan="3" style="text-transform: uppercase;font-weight: bold"> THÔNG TIN THỊ TRƯỜNG LAO ĐỘNG</td>
            </tr>
            <tr>
                <th>I</th>
                <td colspan="3" style="font-weight: bold">Kết quả thu thập thông tin thị trường lao động:</td>
            </tr>
            <tr>
                <th>1</th>
                <td colspan="3" style="font-weight: bold">Thị trường trong tỉnh, trong nước:</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">a</td>
                <td style="font-weight: bold;font-style: italic;">Số đơn vị, tổ chức tham gia tuyển dụng</td>
                <th>Doanh nghiệp</th>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td style=" font-style: italic;">Trong đó</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực Xây dựng</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực Kinh tế</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực Dịch vụ</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực kỹ thuật</td>
                <td style="text-align: center;">"</td>
                 <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực LĐPT</td>
                <td style="text-align: center;">"</td>
                 <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực khác</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">b</td>
                <td style="font-weight: bold;font-style: italic;">Số vị trí việc làm</td>
                <th>Vị trí</th>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td style=" font-style: italic;">Trong đó</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực Xây dựng</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực Kinh tế</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực Dịch vụ</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực kỹ thuật</td>
                <td style="text-align: center;">"</td>
                 <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực LĐPT</td>
                <td style="text-align: center;">"</td>
                 <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực khác</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">b</td>
                <td style="font-weight: bold;font-style: italic;">Số chỉ tiêu tuyển dụng</td>
                <th>Chỉ tiêu</th>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td style=" font-style: italic;">Trong đó</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực Xây dựng</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực Kinh tế</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực Dịch vụ</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực kỹ thuật</td>
                <td style="text-align: center;">"</td>
                 <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực LĐPT</td>
                <td style="text-align: center;">"</td>
                 <td></td>
            </tr>
            <tr>
                <td></td>
                <td>-Lĩnh vực khác</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <th>II</th>
                <td colspan="3" style="font-weight: bold">Kết quả cập nhật Thông tin thị trường lao động</td>
            </tr>
            <tr>
                <th>1</th>
                <td colspan="3" style="font-weight: bold">Cập nhật thông tin thị trường qua website của Trung tâm.</td>
            </tr>
            <tr>
                <td>a</td>
                <td>Số doanh nghiệp truy cập đăng ký nhu cầu tuyển dụng trên website.</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <td>b</td>
                <td>Số lao động truy cập đăng ký thông tin tìm kiếm việc làm trên website.</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <td>c</td>
                <td>Số tin tức được đăng tải của Trung tâm.</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <td>d</td>
                <td>Số lượt truy cập thông tin tìm kiếm việc làm trên website.</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <th>2</th>
                <td colspan="3" style="font-weight: bold">Cập nhật thông tin thị trường qua fanpage của Trung tâm:</td>
            </tr>
            <tr>
                <td>a</td>
                <td>Số người tiếp cận trên trang fanpage “Sàn GDVL”.</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <td>b</td>
                <td>Số tin được Trung tâm đăng tải trên các trang fanpage.</td>
                <td style="text-align: center;">"</td>
                <td></td>
            </tr>
            <tr>
                <th>III</th>
                <td colspan="3" style="font-weight: bold">Hoạt động tuyên truyền</td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: left">- Từ đầu năm 2023 đến nay phòng Tư vấn GTVL đã tiến hành tổ chức tuyên truyền tại địa phương trên địa bàn tỉnh bằng các hình thức như loa phát thanh theo xe tuyên truyền kết hợp phát thông báo tuyển dụng, treo băng rôn.
                    <br>-  Gửi công văn cho các xã/ phường/ thị trấn đề nghị phối hợp tuyên truyền phiên									
                </td>

            </tr>


        </tbody>
    </table>
    <P id='data_body4' style="font-weight: bold;text-align: botton;">II. ĐÁNH GIÁ CHUNG:</P>
    <P id='data_body5' style="font-weight: bold;text-align: botton;">III.KIẾN NGHỊ, ĐỀ XUẤT (Nếu có):</P>
     									
    <table id='data_footer' width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
        <tr>
            <td width="40%" style="vertical-align: top;">
                <p></p><br>
                <p style="text-transform: uppercase"> LÃNH ĐẠO DUYỆT</p>
            </td>
            <td style="vertical-align: top;">
                <p><i >Quảng Bình, ngày {{date('d')}} tháng {{date('m')}} năm {{date('Y')}}</i></p>
                <p>TRƯỞNG PHÒNG</p>
            </td>
        </tr>
        
    </table>

@stop


