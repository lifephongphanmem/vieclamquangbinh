<div class="search_form mg-b3 search_page">
    <div class="container ">

        <div class="content_form">
            <form id="search-form" action="/tat-ca-viec-lam.html" method="GET" role="form">
                <div class="group_form w40 bd-r1">
                    <input type="text" class="" name="k" value=""
                        placeholder="Nhập tiêu đề công việc, tên công ty, vị trí địa điểm..." autocomplete="off">
                </div>
                <div class="group_form w25 bd-r1">
                    <img src="{{ url('assets2/images/nn.png')}}" alt="ngành nghề">
                    <select >
                        <option value="" data-select2-id="select2-data-3-9z0d">Tất cả ngành nghề
                        </option>
                        <option value="8">Khác</option>
                        <option value="1">Ngành Điện - điện tử</option>
                        <option value="4">Văn phòng</option>
                        <option value="6">Kỹ sư </option>
                        <option value="2">Kinh doanh</option>
                        <option value="3">Tài chính</option>
                        <option value="5">Lao động phổ thông</option>
                        <option value="11">Nhân viên văn phòng</option>
                        <option value="7">Kỹ thuật</option>
                        <option value="10">Kế toán</option>
                        <option value="12">Trợ lý sản xuất</option>
                        <option value="13">Giáo viên</option>
                        <option value="14">LÁI XE</option>
                        <option value="9">Quản Trị Kinh Doanh</option>
                        <option value="15">Xây dựng</option>
                        <option value="16">Đầu bếp</option>
                        <option value="17">Dịch vụ</option>
                    </select>
                    {{-- <span class="select2 select2-container select2-container--default" dir="ltr"
                        data-select2-id="select2-data-2-vmnj" style="width: 117px;">
                        <span class="selection">
                            <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false"
                                aria-labelledby="select2-c-ou-container"><span class="select2-selection__rendered" title="Tất cả ngành nghề">Tất cả ngành nghề</span>
                            <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                aria-hidden="true">
                        </span>
                    </span> --}}
                </div>
                <div class="group_form w25 bd-r1">
                    <img src="{{ url('assets2/images/dd.png')}}" alt="địa điểm">
                    <select id="search-location-index">
                        <option value="" selected="">Tất cả
                            địa điểm</option>
                        <option value="1">Việt Nam</option>
                        <option value="2">Nhật Bản</option>
                        <option value="3">Hàn Quốc</option>
                        <option value="4">Mỹ</option>
                        <option value="6">Đài loan</option>
                        <option value="7">SLOVAKIA</option>
                        <option value="8">Đức</option>
                        <option value="9">Canada</option>
                        <option value="10">Trà Vinh</option>
                        <option value="11">NGA</option>
                        <option value="12">RUMANI</option>
                        <option value="13">HUNGARY</option>
                        <option value="14">HUNGGARY</option>
                        <option value="15">Ba Lan</option>
                        <option value="16">ĐAN MẠCH</option>
                    </select>
                    {{-- <span class="select2 select2-container select2-container--default" dir="ltr"
                        data-select2-id="select2-data-4-wpna" style="width: 117px;"><span class="selection"><span
                                class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true"
                                aria-expanded="false" tabindex="0" aria-disabled="false"
                                aria-labelledby="select2-search-location-index-container"><span
                                    class="select2-selection__rendered" id="select2-search-location-index-container"
                                    role="textbox" aria-readonly="true" title="Tất cả địa điểm">Tất cả địa
                                    điểm</span><span class="select2-selection__arrow" role="presentation"><b
                                        role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                            aria-hidden="true"></span></span> --}}
                </div>
                <div class="group_form w16">
                    <button type="submit" class="btn_submit"><i class="fa fa-search" aria-hidden="true"></i>Tìm
                        kiếm</button>
                </div>
            </form>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#search-form").keydown(function(e) {
                    if (e.keyCode == 13) {
                        $('#search-form').submit();
                    }
                });
            });
        </script>
    </div>
</div>
