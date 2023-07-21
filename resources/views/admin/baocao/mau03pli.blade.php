@extends('main_baocao')

@section('content')
    <table id="data_header">
        <tr>
            <td style="text-align:left;font-weight: bold;" valign="top" height="70">
                <p>TRUNG TÂM DUCH VỤ VIỆC LÀM QUẢNG BÌNH</p>
            </td>
            <td style="atext-align:right" valign="top">
                <p>Mẫu số 03/PLI</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">PHIẾU ĐĂNG KÝ</p>
                <p style="font-style:italic;">(Dành cho người sử dụng lao động)</p>
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
                Tên doanh nghiệp/người tuyển dụng*:
                {{ isset($company)
                    ? $company->name
                    : '  ............................................................................................................
                                     ...............................................................................................................................................' }}

            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:left">
                Chủ thể tuyển dụng: [ ] Cá nhân -> bắt buộc CMND/CCCD [ ] Doanh nghiệp -> Bắt buộc mã số thuế
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:left">
                Mã số
                thuế/CMND/CCCD*:{{ isset($company) ? $company->dkkd : '...................................................................................................................' }}
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:left">
                Loại hình doanh nghiệp*: [ ] Nhà nước [ ] Ngoài nhà nước [ ] Có vốn đầu tư nước ngoài
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:left;padding-bottom: 1%">
                Địa chỉ* : Tỉnh {{ isset($company) ? $company->tinh : '.................................' }}
                &emsp;&emsp;&emsp;
                {{ isset($company) ? $company->huyen : 'Huyện .................................' }}&emsp;&emsp;&emsp;
                {{ isset($company) ? $company->xa : 'Xã .................................' }}
                <br>Địa chỉ cụ thể*:
                {{ isset($company) ? $company->adress : '.................................' }}
                <br >[ ] KCN: 
                @foreach ($kcn as $item)
                    @if ($item->id == $company->khucn)
                     {{ $item->name }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align:left;">
                Số điện thoại*:
                {{ isset($company) ? $company->phone : '...................................................' }}
            </td>
            <td colspan="5" style="text-align:left;">
                Email*:
                {{ isset($company) ? $company->email : '................................................................................................' }}
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align:left;border-right: none">
                Ngành kinh doanh chính*:
                @if (isset($company->nganhnghe))
                    @foreach ($nganhnghe as $item)
                        @if ($company->nganhnghe == $item->id)
                            {{ $item->name }}
                        @endif
                    @endforeach
                @else
                    <br>[ ] Nông, lâm nghiệp và thủy sản
                    <br> [ ] Công nghiệp, chế biến, chế tạo
                    <br> [ ] SX và phân phối điện, khí đốt, hơi
                    điều hòa không khí
                    <br> [ ] Vận tải, kho bãi
                    <br> [ ] Thông tin và truyền thông
                    <br> [ ] Hoạt động kinh doanh bất động sản
                    <br> [ ] Hoạt động hành chính và dịch vụ hỗ trợ
                    <br> [ ] Y tế và hoạt động trợ giúp xã hội
                    <br> [ ] Bán buôn và bán lẻ; sửa chữa ô tô, mô
                    tô, xe máy và xe có động cơ khác
                    <br> [ ] Hoạt động làm thuê và các công việc
                    trong hộ gia đình
                @endif

            </td>
            <td colspan="5"  style="border-left: none">
                @if (!isset($company->nganhnghe))
                    <br> [ ] Khai khoáng
                    <br> [ ] Xây dựng
                    <br> [ ] Cung cấp nước, hoạt động quản lý và xử lý nước và
                    nước thải, rác thải
                    <br> [ ] Dịch vụ lưu trú và ăn uống
                    <br> [ ] Hoạt động tài chính, ngân hàng và bảo hiểm
                    <br> [ ] Hoạt động chuyên môn, khoa học và công nghệ
                    <br> [ ] Giáo dục và đào tạo
                    <br> [ ] Nghệ thuật, vui chơi và giải trí
                    <br> [ ] Hoạt động của ĐCS, tổ chức CT-XH,
                    QLNN, ANQP, BĐXH bắt buộc
                    <br> [ ] Hoạt động, dịch vụ khác
                    <br> [ ] Hoạt động của các tổ chức và cơ quan quốc tế
                @endif

            </td>

        </tr>
        <tr>
            <td colspan="10" style="text-align:left">
                Mặt hàng/sản phẩm dịch vụ chính*: .................................................................
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:left">
                Quy mô lao động*:
            </td>
            <td colspan="5">
                [ ] < 10 &emsp;&emsp;&emsp; [ ] 10-50 &emsp;&emsp;&emsp; [ ] 51 - 100 <br> [ ] 101 -200 &emsp;&emsp;&emsp;[
                    ] 201 -500 &emsp;&emsp;&emsp; [ ] 500-1.000
                    <br>[ ] 1.000 - 3.000 &emsp;&emsp;&emsp; [ ] 3.000 - 10.000 &emsp;&emsp;&emsp; [ ]>10.000
            </td>
            <td colspan="3">
                Số lao động tuyển
                dụng 6 tháng tới: .....................
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:left">
                <b>2. Đăng ký dịch vụ</b> (tích dấu “X” vào các dịch vụ đăng ký)
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:left;font-style:italic;">
                <br> [ ] Tư vấn chính sách, pháp luật lao động
                <br> [ ] Tư vấn tuyển lao động, quản trị và phát triển nguồn nhân lực
                <br> [ ] Tư vấn sử dụng lao động và phát triển việc làm
                <br> <b>[ ] Đăng ký giới thiệu, cung ứng lao động -> bổ sung thông tin tại Mẫu số 03a/PLI</b>
                <br> [ ] Khác (ghi rõ): ..........................................................
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:left">
                <b>3. Thời gian đăng ký:</b> {{ getDayVn($tuyendung->created_at) }} - {{ getDayVn($tuyendung->thoihan) }}
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:left">
                <b>4. Thông tin người đại diện doanh nghiệp đăng ký</b>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align:left">
                Họ và tên*: {{ $tuyendung->contact }}
            </td>
            <td colspan="5" style="text-align:left">
                Chức vụ: ......................................................................
            </td>
        </tr>
        <tr>
            <td colspan="10" style="text-align:left">
                Số điện thoại*: {{ $tuyendung->phonetd }}
        </tr>
        <tr>
            <td colspan="10" style="text-align:left">
                Hình thức liên hệ khác (nếu có):
                ..............................................................................................
            </td>
        </tr>

        <tr style=" border:none ">
            <td style="width: 10%;"></td>
            <td style="width: 10%;"></td>
            <td style="width: 10%;"></td>
            <td style="width: 10%;"></td>
            <td style="width: 10%;"></td>
            <td style="width: 10%;"></td>
            <td style="width: 10%;"></td>
            <td style="width: 10%;"></td>
            <td style="width: 10%;"></td>
            <td style="width: 10%;"></td>
        </tr>
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
