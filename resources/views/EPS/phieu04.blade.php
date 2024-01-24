@extends('main_baocao')
@section('content')
    <table id='data_header' width="96%" cellspacing="0" cellpadding="8"
        style=" text-align: center;font-size:16px">
        <tr style="height: 50px">
            <td width="70%" style="vertical-align: top;">

            </td>
            <td style="vertical-align: center;border:1px solid">
                <b>Số báo danh &nbsp; {{ $model->sobaodanh }}</b>
            </td>
        </tr>
        <tr>
            <td style="text-decoration:underline;font-weight: bold;text-align:left">
                <span style="text-decoration:underline;">Phụ lục 4</span>
            </td>
        </tr>
    </table>
    <p id='data_body' style="text-align: center;font-weight: bold;font-size: 17px; text-transform: uppercase;">bản kê khai
        thông tin
    </p>
    <p id='data_body1' style="text-align: center;font-style: italic;font-size:16px">(Ban hành kèm theo Công văn số 1064/TTLĐNN–TCLĐ ngày
        29/12/2023<br>
        của Trung tâm Lao động ngoài nước)
    </p>
    {{-- <p id='data_body1'>Để phục vụ công tác quản lý, đề nghị anh/ chị điền đầy đủ, chính xác các thông tin sau đây:
            </p> --}}
    <table id='data_body2' cellspacing="0" cellpadding="0" style="font-size:16px">
        <tr>
            <td style="text-align:left">
                Để phục vụ công tác quản lý, đề nghị anh/ chị điền đầy đủ, chính xác các thông tin sau đây:
            </td>
        </tr>
        <tr>
            <th style="text-align:left;font-weight:bold">I. Thông tin về người lao động</th>
        </tr>
        <tr>
            <td style="text-align:left">1. Họ và tên (CHỮ IN HOA) :&nbsp; {{ $model->hoten }}</td>
        </tr>
        <tr>
            <td style="text-align:left">2. Số CMND/Thẻ căn cước công dân:&nbsp; {{ $model->cccd }} </td>
        </tr>
        <tr>
            <td style="text-align:left">3. Số báo danh (ghi theo Đơn đăng ký dự thi): &nbsp; {{ $model->sobaodanh }}</td>
        </tr>
        <tr>
            <td style="text-align:left">4. Nơi đăng ký Hộ khẩu thường trú (ghi cụ thể):&nbsp;
                {{ $model->thonxom }},&nbsp; {{ $model->xa }},&nbsp; {{ $model->huyen }},&nbsp;
                {{ $model->tinh }} </td>
        </tr>
        <tr>
            <td style="text-align:left">5. Anh/ chị đã từng đi làm việc tại Hàn Quốc hay chưa?
                {{-- @if ($model->phanloai == 0)
                    &ensp;&ensp; &#x2610;&ensp; Đã từng &ensp; &#x2611;&ensp;Chưa
                @else
                    &ensp;&ensp; &#x2611;&ensp; Đã từng &ensp; &#x2610;&ensp;Chưa
                @endif --}}
                &ensp;&ensp; &#x2610;&ensp; Đã từng &ensp; &#x2610;&ensp;Chưa
            </td>
        </tr>
        <tr>
            <td style="text-align:left">Nếu đã từng làm việc tại Hàn Quốc, anh/ chị có về nước đúng thời hạn sau khi kết
                thúc hợp đồng lao động hay không?
                {{-- @if ($model->phanloai == 0)
                    &ensp;&ensp; &#x2610;&ensp;Có&ensp; &#x2610;&ensp;Không
                @else
                    @if ($model->phanloai == 2)
                        &ensp;&ensp; &#x2611;&ensp;Có&ensp; &#x2610;&ensp;Không
                    @else
                        &ensp;&ensp; &#x2610;&ensp;Có&ensp; &#x2611;&ensp;Không
                    @endif
                @endif --}}
                &ensp;&ensp; &#x2610;&ensp;Có&ensp; &#x2610;&ensp;Không
            </td>
        </tr>
        <tr>
            <td style="text-align:left">6. Nếu đã từng cư trú bất hợp pháp tại Hàn Quốc, anh/ chị có tự nguyện về nước hay
                không?
                {{-- @if ($model->phanloai == 0)
                    &ensp;&ensp; &#x2610;&ensp;Có&ensp; &#x2610;&ensp;Không
                @else
                    @if ($model->phanloai == 1)
                        &ensp;&ensp; &#x2611;&ensp;Có&ensp; &#x2610;&ensp;Không
                    @else
                        &ensp;&ensp; &#x2610;&ensp;Có&ensp; &#x2610;&ensp;Không
                    @endif
                @endif --}}
                &ensp;&ensp; &#x2610;&ensp;Có&ensp; &#x2610;&ensp;Không
            </td>
        </tr>
        <tr>
            <td style="text-align:left">7. Thời gian anh/ chị tự nguyện về nước:...........................................................................</td>
        </tr>
        <tr>
            <td style="text-align:left">8. Anh/ chị có người thân nào (bố, mẹ, con đẻ; anh, chị, em ruột; vợ hoặc chồng) đã
                từng hoặc đang làm việc tại Hàn Quốc theo chương trình EPS hay không?<br>
                {{-- &ensp;&ensp; &#x2610;&ensp;Có&ensp; &#x2610;&ensp;Không --}}
                &ensp;&ensp; &#x2610;&ensp;Có&ensp; &#x2610;&ensp;Không
            </td>
        </tr>
        <tr>
            <td style="text-align:left;font-weight:bold;font-style:italic"> Nếu có người thân đã từng hoặc đang làm việc tại
                Hàn Quốc theo Chương trình EPS,<br> đề nghị anh/chị kê khai các thông tin dưới đây (nếu không có không cần
                phải kê khai):
            </td>
        </tr>
        <tr>
            <th style="text-align:left;font-weight:bold">II. Thông tin về người thân đã từng hoặc đang làm việc tại Hàn Quốc
            </th>
        </tr>
        <tr>
            <td style="text-align:left;font-style:italic"> 1. Người thân thứ nhất : </td>
        </tr>
        <tr>
            <td style="text-align:left">- Họ và tên người thân (CHỮ IN HOA): ……………………………………………….. </td>
        </tr>
        <tr>
            <td style="text-align:left">- Ngày sinh: ………/………/…………… </td>
        </tr>
        <tr>
            <td style="text-align:left">- Quan hệ của người thân đó với anh/chị là gì?............................................</td>
        </tr>
        <tr>
            <td style="text-align:left">- Ngày xuất cảnh Việt Nam để đi làm việc tại Hàn Quốc: ………………..</td>
        </tr>
        <tr>
            <td style="text-align:left">- Hiện nay người thân còn làm việc ở Hàn Quốc hay không?
                {{-- &ensp;&ensp;&#x2611;&ensp;Có&ensp; &#x2610;&ensp;Không  --}}
                &ensp;&ensp;&#x2610;&ensp;Có&ensp; &#x2610;&ensp;Không 
            </td>
        </tr>
        <tr>
            <td style="text-align:left;font-style:italic"> 1. Người thân thứ hai : </td>
        </tr>
        <tr>
            <td style="text-align:left">- Họ và tên người thân (CHỮ IN HOA): ……………………………………………….. </td>
        </tr>
        <tr>
            <td style="text-align:left">- Ngày sinh: ………/………/…………… </td>
        </tr>
        <tr>
            <td style="text-align:left">- Quan hệ của người thân đó với anh/chị là gì?............................................</td>
        </tr>
        <tr>
            <td style="text-align:left">- Ngày xuất cảnh Việt Nam để đi làm việc tại Hàn Quốc: ………………..</td>
        </tr>
        <tr>
            <td style="text-align:left">- Hiện nay người thân còn làm việc ở Hàn Quốc hay không?
                {{-- &ensp;&ensp; &#x2611;&ensp;Có&ensp; &#x2610;&ensp;Không  --}}
                &ensp;&ensp; &#x2610;&ensp;Có&ensp; &#x2610;&ensp;Không 
            </td>
        </tr>
        <tr>
            <td style="text-align:left">
                Tôi xin cam đoan các thông tin kê khai trên đây là đúng sự thực.
            </td>
        </tr>
    </table>

    <table id='data_footer' width="96%" cellspacing="0" height cellpadding="0"
        style="margin: 20px auto;text-align: center; height:100px;font-size:16px">
        <tr>
            <td width="40%" style="text-align: left; vertical-align: top;">
            </td>
            <td style="vertical-align: top;">
                …….., ngày …. tháng....năm 2024<br>
                <b>Người kê khai</b><br>
                <i>(Ký, ghi rõ họ và tên)</i>
            </td>
        </tr>
    </table>
@stop
