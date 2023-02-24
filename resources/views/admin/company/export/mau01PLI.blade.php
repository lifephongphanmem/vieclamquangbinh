@extends('main_baocao')

@section('content')
    <table id="data_header" class="header" width="96%" border="0" cellspacing="0" cellpadding="8"
        style="margin:0 auto 25px; text-align: center;">
        <tr>
            <td style="text-align: left;width: 60%">

            </td>
            <td style="text-align: center;">

            </td>
        </tr>
        <tr>
            <td style="text-align: left;width: 60%">
                {{-- <b>Đơn vị: {{ isset($m_dv) ? $m_dv->name : '' }}</b> --}}
            </td>
            <td style="text-align: right; font-style: italic">
                <b>Mẫu số 01/PLI</b>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;width: 60%">
                {{-- <b>Mã đơn vị SDNS: </b> --}}
            </td>

            <td style="text-align: center; font-style: italic">

            </td>
        </tr>

        <tr>
            <td colspan="2" style="text-align: center; font-weight: bold; font-size: 20px;">
                BÁO CÁO</br>TÌNH HÌNH SỬ DỤNG LAO ĐỘNG
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; font-size: 12px; font-style: italic">
                Ngày.....tháng....năm....
            </td>
        </tr>
    </table>
<div id=data_body style="font-size:12px;">
    <p style="text-align: left;font-weight: bold;font-size:14px">1. Thông tin chung về doanh nghiệp, cơ
        quan, tổ chức:</p>
        <p style="margin-left: 110px;">Tên doanh nghiệp, cơ quan tổ chức: <span style="font-weight:normal !important;text-transform:none;">{{isset($m_dv)?$m_dv->tendn:''}}</span>
        <p style="margin-left: 110px;">Địa chỉ:<span style="font-weight:normal !important; text-transform:none;">{{isset($m_dv)?$m_dv->diachi:''}}</span></p>
        <p style="margin-left: 110px;">Điện thoại: <span style="font-weight:normal !important;text-transform:none;">{{isset($m_dv)?$m_dv->phone:''}}</span></p>
        <p style="margin-left: 110px;">Fax: <span style="font-weight:normal !important;text-transform:none;">{{isset($m_dv)?$m_dv->fax:''}}</span></p>
        <p style="margin-left: 110px;">Email: <span style="font-weight:normal !important;text-transform:none;">{{isset($m_dv)?$m_dv->email:''}}</span></p>
        <p style="margin-left: 110px;">Mã số đăng ký doanh nghiệp: <span style="font-weight:normal !important;text-transform:none;">{{isset($m_dv)?$m_dv->dkkd:''}}</span></p>
        {{-- <p style="margin-left: 110px;">Lĩnh vực hoạt động: <span style="font-weight:normal !important;text-transform:none;">{{isset($m_dv)?$m_dv->loaihinh:''}}</span></p> --}}
        <p style="margin-left: 110px;">Ngành, nghề kinh doanh chính: <span style="font-weight:normal !important;text-transform:none;">{{isset($m_dv)?$m_dv->nganhnghe:''}}</span></p>

        <p style="text-align: left;font-weight: bold;font-size:14px">2.Thông tin tình hình sử dụng lao động của đơn vị</p>
</div>


    <table id="data_body1" class="money" cellspacing="0" cellpadding="0" border="1"
        style="margin: 20px auto; border-collapse: collapse;font:normal 11px Times, serif;">
        <thead>
            <tr style="padding-left: 2px;padding-right: 2px">
                <th style="width: 3%;" rowspan="3">S</br>T</br>T</th>
                <th style="width: 5%;" rowspan="3">Họ và tên</th>
                <th rowspan="3">Mã số</br>BHXH</th>
                <th rowspan="3">Ngày sinh</th>
                <th rowspan="3" style="width: 3%;">Giới tính</th>
                <th rowspan="3">CCCD/</br>CMND</th>
                <th style="width: 5%;" rowspan="3">Chức vụ</th>
                <th style="width: 20%;" colspan="4">Vị trí việc làm</th>
                <th colspan="6">Tiền lương</th>
                <th colspan="2" rowspan="2">Ngành nghề nặng nhọc,</br>độc hại</th>
                <th colspan="5">Loại và hiệu lực hợp đồng lao động</th>
                <th rowspan="3" style="width: 5%;">Thời điểm</br>đơn vị</br>bắt đầu</br>đóng BHXH</th>
                <th rowspan="3" style="width: 5%;">Thời điểm</br>đơn vị</br>kết thúc</br>đóng BHXH</th>
                <th rowspan="3">Ghi chú</th>
            </tr>
            <tr>
                <th rowspan="2" style="width: 3%;">Nhà</br>quản</br>lý</th>
                <th rowspan="2" style="width: 3%;">Chuyên</br>môn</br>kỹ</br>thuật</br>bậc</br>cao</th>
                <th rowspan="2" style="width: 3%;">Chuyên</br>môn</br>kỹ</br>thuật</br>bậc</br>trung</th>
                <th rowspan="2" style="width: 3%;">Khác</th>
                <th rowspan="2" style="width: 3%;">Hệ số</br>mức lương</th>
                <th colspan="5" style="width: 3%;">Phụ cấp</th>
                <th rowspan="2" style="width: 3%;">Ngày</br>bắt đầu</br>HĐLĐ</br>không</br>xác định</br>thời hạn</th>
                <th colspan="2" style="width: 3%;">Hiệu lực HĐLĐ<br>xác định thời hạn</th>
                <th colspan="2" style="width: 3%;">Hiệu lực HĐLĐ<br>khác</th>
            </tr>
            <tr>
                <th style="width: 3%;">Chức vụ</th>
                <th style="width: 3%;">Thâm</br>niên</br>vượt</br>khung</th>
                <th style="width: 3%;">Thâm</br>niên</br>nghề</th>
                <th style="width: 3%;">Phụ</br>cấp</br>lương</th>
                <th style="width: 3%;">Các</br>khoản</br>bổ</br>sung</th>
                <th style="width: 3%;">Ngày</br>bắt</br>đầu</th>
                <th style="width: 3%;">Ngày</br>kết</br>thúc</th>
                <th style="width: 3%;">Ngày</br>bắt</br>đầu</th>
                <th style="width: 3%;">Ngày</br>kết</br>thúc</th>
                <th style="width: 3%;">Ngày</br>bắt</br>đầu</th>
                <th style="width: 3%;">Ngày</br>kết</br>thúc</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($model as $key => $ct)
                <tr class="text-center">
                    <td>{{ ++$key }}</td>
                    <td>{{ $ct->hoten }}</td>
                    <td>{{ $ct->sobaohiem }}</td>
                    <td>{{getDayVn($ct->ngaysinh) }}</td>
                    <td>{{ $ct->gioitinh }}</td>
                    <td>{{ $ct->cmnd }}</td>
                    <td>{{ $ct->chucvu}}</td>
                    <td>
                        {{$ct->nhaquanly==true?'X':''}}
                    </td>
                    @foreach ($a_vitri as $key => $val)
                        <td>{{ $key == $ct->vitri ? 'X' : '' }}</td>
                    @endforeach
                    <td>{{ in_array($ct->vitri, $a_vitrikhac) ? 'X' : '' }}</td>
                    <td></td>
                    <td>{{ $ct->pcchucvu }}</td>
                    <td>{{ $ct->pcthamnien }}</td>
                    <td>{{ $ct->pcthamniennghe }}</td>
                    <td>{{ $ct->pcluong }}</td>
                    <td>{{ $ct->pcbosung }}</td>
                    <td>{{ getDayVn($ct->bddochai) }}</td>
                    <td>{{ getDayVn($ct->ktdochai) }}</td>
                    <td>{{ $ct->loaihdld == 'Không xác định thời hạn'?getDayVn($ct->bdhopdong):'' }}
                    </td>
                    @if ($ct->loaihdld != 'Không xác định thời hạn')
                        <td>{{ getDayVn($ct->bdhopdong) }}</td>
                        <td>{{ getDayVn($ct->kthopdong) }}</td>
                    @else
                        <td></td>
                        <td></td>
                    @endif

                        <td></td>
                        <td></td>
                    <td>{{ getDayVn($ct->bdbhxh) }}</td>
                    <td>{{ getDayVn($ct->ktbhxh) }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <table id="data_footer" class="header" width="96%" border="0" cellspacing="0" cellpadding="8"
        style="margin:20px auto; text-align: center;">

        <tr style="font-weight: bold">
            <td style="text-align: center;" width="50%">Người lập bảng</td>
            <td style="text-align: center;" width="50%"></td>
        </tr>
        <tr style="font-style: italic">
            <td style="text-align: center;" width="50%">(Ghi rõ họ tên)</td>
            <td style="text-align: center;" width="50%">(Ký tên, đóng dấu)</td>
        </tr>
        <tr>
            <td><br><br><br><br><br><br></td>
        </tr>

        <tr>
            <td style="text-align: center;" width="50%"></td>
            <td style="text-align: center;" width="50%"></td>
        </tr>
    </table>
@stop
