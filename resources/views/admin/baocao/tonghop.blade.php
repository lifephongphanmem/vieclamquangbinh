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
    <p id='data_body' style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase">DANH SÁCH<br>
    </p>

    <table id="data_body2" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th rowspan="3">TT</th>
                <th rowspan="3">Họ và tên </th>
                <th colspan="2" style="width:10%">Ngày tháng năm sinh<br></th>
                <th rowspan="3">Số CCCD/CMND </th>
                <th rowspan="3">Điện thoại </th>
                <th rowspan="3">Địa chỉ</th>
                <th rowspan="3"> Khu vực </th>
                <th rowspan="3" style="width:3%">Đối tượng ưu tiên (Ghi theo mã số từ 1-6)</th>
                <th rowspan="3">Tên dân tộc thiểu số</th>
                <th rowspan="3" style="width:3%">Trình độ</br>GDPT</br>cao nhất</br>đạt được</br>(Ghi theo</br>mã số
                    từ</br>1-4)</th>
                <th rowspan="3" style="width:3%">Trình độ CMKT cao nhất (Ghi theo mã số từ 1-8)</th>
                <th rowspan="3">Chuyên ngành đào tạo (Ghi rõ)</th>
                <th colspan="4"> Nhu cầu tìm kiếm việc làm </th>
                <th colspan="2"> Nhu cầu học nghề </th>
                <th rowspan="3"> Ghi chú </th>
            </tr>
            <tr>
                <th rowspan="2">Nam</th>
                <th rowspan="2">Nữ</th>
                <th rowspan="2"> Đối tượng </th>
                <th colspan="3"> Việc làm mong muốn </th>
                <th rowspan="2"> Ngành nghề muốn học </th>
                <th rowspan="2"> Trình độ CM muốn học </th>
            </tr>
            <tr>
                <th> Khu vực</th>
                <th>Ngành nghề</th>
                <th>Thị trường</th>
            </tr>
            <tr>
                @for ($i = 1; $i < 21; $i++)
                    <td style="font-weight:bold; text-decoration: underline;font-style: italic;text-align: center">
                        {{ $i }}</td>
                @endfor
            </tr>

        </thead>
        <?php $stt = 1; ?>
        <tbody>
            @foreach ($model as $item)
                <tr>

                    <td style="text-align: center ; vertical-align: middle">{{ $stt++ }}</td>
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
                    <td style="text-align: center ; vertical-align: middle">{{ $item->sdt}}</td>
                    <td style="vertical-align: middle">{{ $item->diachi }}</td>
                    <td style="vertical-align: middle">{{ $item->khuvuc==1?'Thành thị':'Nông thôn' }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->uutien }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->dantoc }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->trinhdogiaoduc }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->chuyenmonkythuat }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->chuyennganh }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->doituongtimvieclam==1?'Chưa từng làm việc':'Đã từng làm việc' }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->vieclammongmuon==2?'Đi nước ngoài':'Trong tỉnh,trong nước' }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->nganhnghemongmuon }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ isset($item->thitruonglamviec)?getthitruong()[$item->thitruonglamviec]:'' }}</td>
                    <td style="text-align: center ; vertical-align: middle">{{ $item->nganhnghemuonhoc }}</td>
                    <td style="vertical-align: middle">{{ $item->trinhdochuyenmonmuonhoc }}</td>
                    <td></td>
                    {{-- <td style="text-align: center ; vertical-align: middle">{{ $item->mqh }}</td> --}}

                    {{-- @if ($item->mqh == 'CH')
                        <td style="text-align: center ; vertical-align: middle">{{ $item->mqh }}</td>
                    @else
                        <td></td>
                    @endif --}}

                </tr>
            @endforeach

        </tbody>
    </table>
@stop
