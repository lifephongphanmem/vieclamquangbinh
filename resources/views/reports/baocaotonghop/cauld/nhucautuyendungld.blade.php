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

    <p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">THÔNG TIN NHU CẦU TUYỂN DỤNG
        LAO ĐỘNG CỦA NGƯỜI SỬ DỤNG LAO ĐỘNG<br>

    </p>
    <i style="text-align: center"> </i>

    <p style="text-align: center">
        <i>(Thu thập thông tin của người sử dụng lao động)</i>
    </p>

    <table cellspacing="0" cellpadding="0" border="1">
        <tr>
            <th colspan="6" style="text-align: left;">1. Thông tin người sử dụng lao động</th>
        </tr>
        <tr>
            <td colspan="6" style="text-align: left;">
                Tên người sử dụng lao động:<br>
                .............................................................................................................................................................................................
            </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align: left;">
                Mã số đăng ký kinh doanh/Mã số
                thuế/CCCD/CMND:............................................................................................................................
            </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align: left;">
                Loại hình: [ ] Doanh nghiệp Nhà nước&emsp;&emsp;&emsp; [ ] Doanh nghiệp ngoài nhà nước &emsp;&emsp;&emsp;[ ] Doanh nghiệp FDI<br>
                [ ] Cơ quan, đơn vị nhà nước&emsp;&emsp;&emsp; [ ] Hộ kinh doanh &emsp;&emsp;&emsp;[ ] Cá nhân
            </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align: left;">
                Địa chỉ: Tỉnh..............................................................
                Huyện............................................................
                Xã...........................................................<br>
                Địa chỉ cụ
                thể:.............................................................................................................................................................................................<br>
                [ ]
                KCN/KKT:.....................................................................................................................................................................................................
            </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align: left;">
                Số điện thoại:............................................................................
                Email:.........................................................................................................................
            </td>
        </tr>


        <tr>

            <td colspan="6" style="text-align: left">
                Ngành sản xuất - kinh doanh chính:
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td style="text-align: left">
                            [ ] Nông, lâm nghiệp và thủy sản<br>
                            [ ] Công nghiệp, chế biến, chế tạo<br>
                            [ ] SX và phân phối điện, khí đốt, hơi nước và điều hòa không khí<br>
                            [ ] Vận tải, kho bãi<br>
                            [ ] Thông tin và truyền thông<br>
                            [ ] Hoạt động kinh doanh bất động sản<br>
                            [ ] Hoạt động hành chính và dịch vụ hỗ trợ<br>
                            [ ] Y tế và hoạt động trợ giúp xã hội<br>
                            [ ] Bán buôn và bán lẻ; sửa chữa ô tô, mô tô, xe máy và xe có động cơ khác<br>
                            [ ] Hoạt động làm thuê và các công việc trong hộ gia đình
                        </td>
                        <td style="text-align: left;">
                            [ ] Khai khoáng<br>
                            [ ] Xây dựng<br>
                            [ ] Cung cấp nước, hoạt động quản lý và xử lý nước thải, rác thải<br>
                            [ ] Dịch vụ lưu trú và ăn uống<br>
                            [ ] Hoạt động tài chính, ngân hàng và bảo hiểm<br>
                            [ ] Hoạt động chuyên môn, khoa học và công nghệ<br>
                            [ ] Giáo dục và đào tạo<br>
                            [ ] Nghệ thuật, vui chơi và giải trí<br>
                            [ ] Hoạt động của ĐCS, tổ chức CT-XH, QLNN, ANQP, BĐXH bắt buộc<br>
                            [ ] Hoạt động, dịch vụ khác<br>
                            [ ] Hoạt động của các tổ chức và cơ quan quốc tế <br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td colspan="6" style="text-align: left"> Mặt hàng/sản phẩm dịch vụ chính:<br>
                ..............................................................................................................................................................................................................
            </td>
        </tr>

        <tr>
            <td colspan="2" style="text-align: left">
                <b>2. Quy mô lao động<br></b>(Đơn vị: Người)
            </td>
            <td colspan="4" style="text-align: left">
                [ ]< 10&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;[ ] 10 - 50
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;[ ] 51 - 100<br>
                    [ ] 101 - 200 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp; [ ] 201 - 500
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; [ ] 501 - 1.000<br>
                    [ ] 1.001 - 3.000 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; [ ] 3.001 - 10.000
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; [ ] >10.000

            </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align: left"><b>3. Số lao động tuyển dụng 6 tháng tới:</b>
                ................................................................................ người
            </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align: left"><b>4. Nhu cầu tuyển dụng lao động theo nghề, trình độ trong 6 tháng
                    tới
            </td>
        </tr>
        <tr>
            <td colspan="1">
                Mã nghề cấp 2
            </td>
            <td colspan="3" style="text-align: center">
                Tên gọi nghề nghiệp
            </td>
            <td colspan="1" style="text-align: center">
                Số lượng <br>(Người)
            </td>
            <td colspan="1" style="text-align: center">
                Trong đó nữ <br> (Người)
            </td>
        </tr>
        <tr>
            <td colspan="1"> 17 </td>
            <td colspan="3">Nhà quản lý của các cơ quan Tập đoàn, Tổng công ty và tương đương
                (chuyên trách)</td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1"> 21</td>
            <td colspan="3" > Nhà chuyên môn trong lĩnh vực khoa học và kỹ thuật </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">22 </td>
            <td colspan="3"> Nhà chuyên môn về sức khỏe</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="1">23 </td>
            <td colspan="3" > Nhà chuyên môn về giảng dạy </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">24 </td>
            <td colspan="3" > Nhà chuyên môn về kinh doanh và quản lý </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">25 </td>
            <td colspan="3" > Nhà chuyên môn trong lĩnh vực công nghệ thông tin và truyền thông</td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1"> 26</td>
            <td colspan="3" > Nhà chuyên môn về luật pháp, văn hóa, xã hội</td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">31 </td>
            <td colspan="3" >  Kỹ thuật viên khoa học và kỹ thuật </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1"> 32</td>
            <td colspan="3">  Kỹ thuật viên sức khỏe </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">33 </td>
            <td colspan="3">Nhân viên về kinh doanh và quản lý </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">34 </td>
            <td colspan="3">Nhân viên luật pháp, văn hóa, xã hội </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1"> 35</td>
            <td colspan="3">Kỹ thuật viên thông tin và truyền thông </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">36 </td>
            <td colspan="3"> Giáo viên bậc trung </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1"> 41</td>
            <td colspan="3">  Nhân viên tổng hợp và nhân viên làm các công việc bàn giấy </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">42 </td>
            <td colspan="3">  Nhân viên dịch vụ khách hàng </td>
            <td></td><td></td>
        </tr>

        <tr>
            <td colspan="1">43 </td>
            <td colspan="3" > Nhân viên ghi chép số liệu và vật liệu </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">44 </td>
            <td colspan="3"> Nhân viên hỗ trợ văn phòng khác </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">51 </td>
            <td colspan="3" > Nhân viên dịch vụ cá nhân </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">52 </td>
            <td colspan="3" >   Nhân viên bán hàng</td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">53 </td>
            <td colspan="3">    Nhân viên chăm sóc cá nhân</td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1"> 54</td>
            <td colspan="3">   Nhân viên dịch vụ bảo vệ</td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">61 </td>
            <td colspan="3">  Lao động có kỹ năng trong nông nghiệp có sản phẩm chủ yếu để bán </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">62 </td>
            <td colspan="3">  Lao động có kỹ năng trong lâm nghiệp, thủy sản và săn bắn có sản phẩm chủ yếu để bán </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">63 </td>
            <td colspan="3">Lao động tự cung tự cấp trong nông nghiệp, lâm nghiệp và thủy sản</td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">71 </td>
            <td colspan="3" > Lao động xây dựng và lao động có liên quan đến nghề xây dựng (trừ thợ điện) </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">72 </td>
            <td colspan="3" > Thợ luyện kim, cơ khí và thợ có liên quan</td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">73 </td>
            <td colspan="3">Thợ thủ công và thợ liên quan đến in </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1"> 74</td>
            <td colspan="3">Thợ điện và thợ điện tử </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">75 </td>
            <td colspan="3" > Thợ chế biến thực phẩm, gia công gỗ, may mặc, đồ thủ công và thợ có liên quan khác </td>
            <td></td><td></td>
        </tr>

        <tr>
            <td colspan="1">81 </td>
            <td colspan="3">Thợ vận hành máy móc và thiết bị </td>
            <td></td><td></td>
        </tr>
        <tr>
            <td colspan="1">82 </td>
            <td colspan="3">Thợ lắp ráp </td>
            <td></td> <td></td>
        </tr>
        <tr>
            <td colspan="1">83 </td>
            <td colspan="3">Lái xe và thợ vận hành thiết bị chuyển động </td>
            <td></td>  <td></td>
        </tr>
        <tr>
            <td colspan="1"> 91</td>
            <td colspan="3" > Người quét dọn và giúp việc </td>
            <td></td><td></td>
        </tr>

        <tr>
            <td colspan="1"> 92</td>
            <td colspan="3" > Lao động giản đơn trong nông nghiệp, lâm nghiệp và thủy sản </td>
            <td></td>  <td></td>
        </tr>
        <tr>
            <td colspan="1">93 </td>
            <td colspan="3"> Lao động trong ngành khai khoáng, xây dựng, công nghiệp chế biến, chế tạo và giao thông vận tải </td>
            <td></td>  <td></td>
        </tr>
        <tr>
            <td colspan="1">94 </td>
            <td colspan="3"> Người phụ giúp chuẩn bị thực phẩm </td>
            <td></td> <td></td>
        </tr>
        <tr>
            <td colspan="1"> 95</td>
            <td colspan="3" > Lao động trên đường phố và lao động có liên quan đến bán hàng </td>
            <td></td> <td></td>
        </tr>
        <tr>
            <td colspan="1"> 96</td>
            <td colspan="3" > Người thu dọn vật thải và lao động giản đơn khác </td>
            <td></td> <td></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center;font-weight: bold;text-transform: uppercase;"><b>tổng</b></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td style="width: 5%;"></td>
            <td style="width: 20%;"></td>
            <td style="width: 25%;"></td>
            <td style="width: 25%;"></td>
            <td style="width: 12.5%;"></td>
            <td style="width: 12.5%;"></td>
        </tr>
    </table>


    <table width="96%" cellspacing="0" height cellpadding="0"
        style="margin: 20px auto;text-align: center; height:200px">
        <tr>
            <td width="40%" style="text-align: left; vertical-align: top;">
            </td>
            <td style="vertical-align: top;">
                <i>Ngày......tháng......năm...........</i><br>
                <b>Người cung cấp thông tin</b><br>
                <i>(Chữ ký, dấu)</i>
            </td>
        </tr>
    </table>
@stop
