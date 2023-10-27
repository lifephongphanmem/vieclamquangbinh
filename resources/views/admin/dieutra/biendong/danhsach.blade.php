@extends('main_baocao')

@section('content')
    <table id="data_header" width="96%" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
        <tr>
            <td></td>
            <td class="text-right" style="font-style:italic">Mẫu số 02</td>
        </tr>
        <tr>
            <td width="40%" style="vertical-align: top;">

                <p>Tỉnh: Quảng Bình</p>
                <p>{{ $m_donvi->huyen }}</p>
                <p>{{ $m_donvi->name }}</p>
                <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

            </td>
            {{-- <td style="vertical-align: top;">
                <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                    Độc lập - Tự do - Hạnh phúc</b>
                <hr style="color: black;width: 15%;vertical-align: top; margin-top: 2px">
            </td> --}}
        </tr>
        {{-- <tr>
            <td>Số: ......../BC-</td>
            <td style="text-align: right"><i style="margin-right: 40%;">Quảng Bình, ngày .... tháng .... năm ....</i></td>
        </tr> --}}
    </table>
    <p id='data_body'
        style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;margin-bottom:10px;">DANH
        SÁCH BIẾN ĐỘNG NHÂN KHẨU<br>
    </p>

    <table id="data_body1" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                {{-- <th rowspan="2" width=2%>TT hộ</th> --}}
                <th rowspan="2">TT</th>
                <th rowspan="2">Họ và tên </th>
                <th colspan="2" style="width:10%">Ngày tháng năm sinh<br></th>
                <th rowspan="2">Số CCCD/CMND </th>
                <th rowspan="2">Mã số BHXH/BHYT </th>
                <th rowspan="2" style="width:10%">Nơi đăng ký thường trú </th>
                <th rowspan="2">Nơi ở hiện nay</th>
                <th rowspan="2" style="width:3%">Đối tượng ưu tiên (Ghi theo mã số từ 1-6)</th>
                <th rowspan="2">Tên dân tộc thiểu số</th>
                <th rowspan="2" style="width:3%">Trình độ</br>GDPT</br>cao nhất</br>đạt được</br>(Ghi theo</br>mã số
                    từ</br>1-4)</th>
                <th rowspan="2" style="width:3%">Trình độ CMKT cao nhất (Ghi theo mã số từ 1-8)</th>
                <th rowspan="2">Chuyên ngành đào tạo (Ghi rõ)</th>
                <th rowspan="2"> Đối tượng tìm việc </th>
                <th rowspan="2"> Việc làm mong muốn </th>
                <th rowspan="2"> Ngành nghề mong muốn </th>
                <th rowspan="2"> Thị trường </th>
                <th rowspan="2"> Ngành nghề muốn học </th>
                <th rowspan="2"> trình độ chuyên môn muốn học </th>
                {{-- <th rowspan="2"  style="width:3%">Tình trạng tham gia HĐKT (Ghi theo mã số từ 1-3)</th>
                <th rowspan="2"  style="width:3%">Người có việc làm (Ghi theo mã số từ 1-5)</th>
                <th rowspan="2">Công việc cụ thể đang làm (ghi rõ)</th>
                <th rowspan="2"  style="width:3%">Tham gia BHXH (Ghi theo mã số từ 1-3)</th>
                <th rowspan="2"  style="width:3%">HĐLĐ (Ghi theo mã số từ 1-3)</th>
                <th rowspan="2">Nơi làm việc (ghi rõ tên cơ quan/đơn vị …)</th>
                <th rowspan="2"  style="width:3%">Loại hình nơi làm việc (Ghi theo mã số từ 1-11)</th>
                <th rowspan="2">Địa chỉ nơi làm việc </th>
                <th rowspan="2">Người thất nghiệp</th>
                <th rowspan="2"  style="width:3%">Thời gian thất nghiệp (Ghi theo mã số từ 1-3)</th>
                <th rowspan="2"  style="width:3%">Không tham gia HĐKT (Ghi theo mã số từ 1-5)</th> --}}
                {{-- <th rowspan="2">MQH</th> --}}
            </tr>
            <tr>
                <th>Nam</th>
                <th>Nữ</th>
            </tr>
            <tr>
                @for ($i = 1; $i < 20; $i++)
                    <td style="font-weight:bold; text-decoration: underline;font-style: italic;text-align: center">
                        {{ $i }}</td>
                @endfor
            </tr>

        </thead>
        <?php $stt = 0;
        $tt = 1;
        $stt_ho = 1; ?>
        <tbody>
            @foreach ($a_loaibiendong as $key => $val)
                <?php $m_model = $model->where('loaibiendong', $key);
                $stt++;
                ?>
                <tr style="font-weight:bold">
                    <td>{{ convert2Roman($stt) }}</td>
                    <td colspan="18">{{ $val }}</td>
                </tr>
                @foreach ($m_model as $item)
                    <tr>
                        {{-- @if ($item->mqh == 'CH')
                    <td style="text-align: center ; vertical-align: middle">{{ $stt_ho++ }}</td>
                @else
                    <td></td>
                @endif --}}

                        <td style="text-align: center ; vertical-align: middle">{{ $tt++ }}</td>
                        <td style="vertical-align: middle">{{ $item->hoten }}</td>

                        @if ($item->gioitinh == 'Nam')
                            <td style="text-align: center ; vertical-align: middle">{{ $item->ngaysinh }}</td>
                        @else
                            <td></td>
                        @endif
                        @if ($item->gioitinh == 'Nữ')
                            <td style="text-align: center ; vertical-align: middle">{{ $item->ngaysinh }}</td>
                        @else
                            <td></td>
                        @endif

                        <td style="text-align: center ; vertical-align: middle">{{ $item->cccd }}</td>
                        <td style="text-align: center ; vertical-align: middle">{{ $item->bhxh }}</td>
                        <td style="vertical-align: middle">{{ $item->thuongtru }}</td>
                        <td style="vertical-align: middle">{{ $item->diachi }}</td>
                        <td style="text-align: center ; vertical-align: middle">{{ $item->uutien }}</td>
                        <td style="text-align: center ; vertical-align: middle">{{ $item->dantoc }}</td>
                        <td style="text-align: center ; vertical-align: middle">{{ $item->trinhdogiaoduc }}</td>
                        <td style="text-align: center ; vertical-align: middle">{{ $item->chuyenmonkythuat }}</td>
                        <td style="text-align: center ; vertical-align: middle">{{ $item->chuyennganh }}</td>


                        <td style="text-align: center ; vertical-align: middle">
                            {{ $item->doituongtimvieclam != null ? ($item->doituongtimvieclam == '1' ? 'Chưa từng làm việc' : 'Đã từng làm việc') : '' }}
                        </td>
                        <td style="text-align: center ; vertical-align: middle">
                            @if ($item->vieclammongmuon == '1')
                                Trong tỉnh trong nước
                            @elseif ($item->vieclammongmuon == '2')
                                Đi làm việc ở nước ngoài
                                {{-- @else
                    'Tất cả' --}}
                            @endif
                        </td>
                        <td style="text-align: center ; vertical-align: middle">
                            @foreach ($dmnganhnghe as $nganhnghe)
                                @if ($nganhnghe->madm == $item->nganhnghemongmuon)
                                    {{ $nganhnghe->tendm }}
                                @endif
                            @endforeach
                        </td>
                        <td style="text-align: center ; vertical-align: middle">
                            @foreach (getthitruong() as $k => $val)
                                @if ($k == $item->thitruonglamviec)
                                    {{ $val }}
                                @endif
                            @endforeach
                        </td>
                        <td style="text-align: center ; vertical-align: middle">
                            @foreach ($dmnganhnghe as $nganhnghe)
                                @if ($nganhnghe->madm == $item->nganhnghemuonhoc)
                                    {{ $nganhnghe->tendm }}
                                @endif
                            @endforeach
                        </td>
                        <td style="text-align: center ; vertical-align: middle">
                            @if ($item->trinhdochuyenmonmuonhoc == '1')
                                Sơ cấp
                            @elseif ($item->trinhdochuyenmonmuonhoc == '2')
                                Trung cấp
                            @elseif ($item->trinhdochuyenmonmuonhoc == '3')
                                Cao đẳng
                            @endif

                        </td>

                        {{-- <td style="text-align: center ; vertical-align: middle">{{ $item->tinhtranghdkt }}</td>
                <td style="text-align: center ; vertical-align: middle">{{ $item->nguoicovieclam }}</td>
                <td style="text-align: center ; vertical-align: middle">{{ $item->congvieccuthe }}</td>
                <td style="text-align: center ; vertical-align: middle">{{ $item->thamgiabhxh }}</td>
                <td style="text-align: center ; vertical-align: middle">{{ $item->hdld }}</td>
                <td style="vertical-align: middle">{{ $item->noilamviec }}</td>
                <td style="text-align: center ; vertical-align: middle">{{ $item->loaihinhnoilamviec }}</td>
                <td style="vertical-align: middle">{{ $item->diachinoilamviec }}</td>
                <td style="text-align: center ; vertical-align: middle">{{ $item->thatnghiep }}</td>
                <td style="text-align: center ; vertical-align: middle">{{ $item->thoigianthatnghiep }}</td>
                <td style="text-align: center ; vertical-align: middle">{{ $item->khongthamgiahdkt }}</td> --}}
                        {{-- <td style="text-align: center ; vertical-align: middle">{{ $item->mqh }}</td> --}}

                        {{-- @if ($item->mqh == 'CH')
                    <td style="text-align: center ; vertical-align: middle">{{ $item->mqh }}</td>
                @else
                    <td></td>
                @endif --}}

                    </tr>
                @endforeach
            @endforeach


        </tbody>
    </table>
@stop
