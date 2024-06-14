@extends ('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
    <style>
        .col-md-3 {
            float: left;
        }

        .wrapper {
            margin-top: 0px;
            padding: 0px 15px;
        }
    </style>
@stop

@section('custom-script')
    <script type="text/javascript" src="{{ url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>
    <script src="{{ url('assets/admin/pages/scripts/table-lifesc.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged3.init();
        });
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Thông tin nhân khẩu</h3>
                    </div>
                    <div class="card-toolbar">
                    </div>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ '/dieutra/store' }}" enctype='multipart/form-data'>
                        {{ csrf_field() }}

                        <div class="panel-body" id='dynamicTable'>
                            <div class="row" id="1stld">
                                <div class="col-md-12">
                                    <div class="card card-custom">
                                        <div class="card-header card-header-tabs-line">
                                            <div class="card-toolbar">
                                                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#thongtincoban">
                                                            <span class="nav-icon">
                                                                <i class="fas fa-users"></i>
                                                            </span>
                                                            <span class="nav-text">Thông tin cơ bản</span>
                                                        </a>
                                                    </li>
                                                    {{-- <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#khac">
                                                            <span class="nav-icon">
                                                                <i class="far fa-user"></i>
                                                            </span>
                                                            <span class="nav-text">Tình trạng HĐKT</span>
                                                        </a>
                                                    </li> --}}
                                                </ul>
                                            </div>
                                            <div class="card-toolbar">

                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-pane fade active show" id="thongtincoban" role="tabpanel"
                                                    aria-labelledby="thongtincoban">
                                                    {{-- @include('pages.employer.include.coban') --}}
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Họ và Tên <span class="text-danger">*</span></label>
                                                                <input type="text" name="hoten[]" class="form-control"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Số CMND/CCCD <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="cccd[]" class="form-control"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label> Giới tính </label>
                                                                <select class="form-control" name="gioitinh[]">
                                                                    <option value='Nữ'>Nữ</option>
                                                                    <option value='Nam'>Nam
                                                                    </option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Ngày tháng năm sinh <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="date" name="ngaysinh[]" class="form-control"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Số điện thoại</label>
                                                                <input type="text" name="sdt[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Khu vực</label>
                                                                <select class="form-control" name="khuvuc[]">
                                                                    <option value="1">Thành thị</option>
                                                                    <option value="2">Nông thôn</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Nơi ở hiện nay</label>
                                                                <input type="text" name="diachi[]" class="form-control">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Tham gia BHXH</label>
                                                                <select name="bhxh[]" class="form-control selec2basic">
                                                                    <option value="">---Chọn---</option>
                                                                    @foreach ($a_thamgiabaohiem as $key=>$val)
                                                                        <option value="{{$key}}">{{$val}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Bảo hiểm xã hội</label>
                                                                <input type="text" name="bhxh[]"
                                                                     class="form-control"
                                                                    >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Đối tượng ưu tiên</label>
                                                                <select class="form-control" name="uutien[]">
                                                                    <option value="">--- Chọn đối tượng ưu tiên ---
                                                                    </option>
                                                                    @foreach ($m_uutien as $val)
                                                                        <option value="{{ $val->stt }}">
                                                                            {{ $val->tendoituong }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Dân tộc</label>
                                                                <input type="text" name="dantoc[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Trình độ GDPT <span
                                                                        class="text-danger">*</span></label>
                                                                <select name="trinhdogiaoduc[]"
                                                                    class="form-control selec2basic" required>
                                                                    <option value="">---Chọn trình độ GDPT---</option>
                                                                    @foreach ($list_tdgd as $val)
                                                                        <option value="{{ $val->stt }}">
                                                                            {{ $val->tengdpt }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Trình độ CMKT <span
                                                                        class="text-danger">*</span></label>
                                                                <select name="chuyenmonkythuat[]"
                                                                    class="form-control selec2basic">
                                                                    <option value="">---Chọn trình độ CMKT---
                                                                    </option>
                                                                    @foreach ($list_cmkt as $val)
                                                                        <option value="{{ $val->stt }}">
                                                                            {{ $val->tentdkt }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Tình trạng tham gia hoạt động kinh tế <span class="text-danger">*</span></label>
                                                                <select name="tinhtranghdkt[]" class="form-control selec2basic">
                                                                    <option value="">---Chọn tình trạng HĐKT---</option>
                                                                    @foreach ($m_tinhtrangvl as $val)
                                                                        <option value="{{$val->stt}}">{{$val->tentgkt}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Người có việc làm</label>
                                                                <select name="nguoicovieclam[]" class="form-control selec2basic">
                                                                    <option value="">---Chọn---</option>
                                                                    @foreach ($m_vithevl as $val)
                                                                        <option value="{{$val->stt}}">{{$val->tentgktct2}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Công việc cụ thể đang làm</label>
                                                                <input type="text" name="congvieccuthe[]"
                                                                class="form-control">
                                                            </div>
                                                        </div>
                                                        {{-- <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Tham gia BHXH</label>
                                                                <select name="bhxh[]" class="form-control selec2basic">
                                                                    <option value="">---Chọn---</option>
                                                                    @foreach ($a_thamgiabaohiem as $key=>$val)
                                                                        <option value="{{$key}}">{{$val}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div> --}}

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>HĐLĐ </label>
                                                                <select name="hdld[]" class="form-control selec2basic">
                                                                    <option value="">---Chọn HĐLĐ---</option>
                                                                    @foreach ($m_hopdongld as $key=>$val)
                                                                        <option value="{{$val->stt}}">{{$val->tenlhl}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Nơi làm việc </label>
                                                                <input type="text" name="noilamviec[]"
                                                                class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Loại hình nơi làm việc</label>
                                                                <select name="loaihinhnoilamviec[]" class="form-control selec2basic">
                                                                    <option value="">---Chọn HĐLĐ---</option>
                                                                    @foreach ($m_loaihinhkt as $key=>$val)
                                                                        <option value="{{$val->stt}}">{{$val->tenlhkt}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Địa chỉ nơi làm việc</label>
                                                                <input type="text" name="diachinoilamviec[]"
                                                               class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Người thất nghiệp</label>
                                                                <select name="thatnghiep[]" class="form-control selec2basic">
                                                                    <option value="">---Chọn người thất nghiệp---</option>
                                                                    @foreach ($m_nguoithatnghiep as $key=>$val)
                                                                        <option value="{{$val->stt}}">{{$val->tentgktct}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Thời gian thất nghiệp</label>
                                                                <select name="thoigianthatnghiep[]" class="form-control selec2basic">
                                                                    <option value="">---Chọn thời gian thất nghiệp---</option>
                                                                    @foreach ($m_thoigianthatnghiep as $key=>$val)
                                                                        <option value="{{$val->stt}}">{{$val->tentgtn}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Không tham gia HĐKT</label>
                                                                <select name="khongthamgiahdkt[]" class="form-control selec2basic">
                                                                    <option value="">---Chọn lý do không tham gia---</option>
                                                                    @foreach ($lydo as $key=>$val)
                                                                        <option value="{{$val->stt}}">{{$val->tentgktct}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Mối quan hệ</label>
                                                                <select name="mqh[]" class="form-control selec2basic">
                                                                    <option value="CH">Chủ hộ</option>
                                                                    <option value="Vợ">Vợ</option>
                                                                    <option value="Chồng">Chồng</option>
                                                                    <option value="Con">Con</option>
                                                                </select>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Chuyên ngành đào tạo</label>
                                                                <select name="chuyennganh[]"
                                                                    class="form-control selec2basic">
                                                                    <option value="">---Chọn chuyên ngành đào tạo---
                                                                    </option>
                                                                    @foreach ($m_nganhnghe as $val)
                                                                        <option value="{{ $val->madm }}">
                                                                            {{ $val->tendm }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Đối tượng tìm kiếm việc làm</label>
                                                                <select name="doituongtimvieclam[]"
                                                                    class="form-control selec2basic">
                                                                    <option value="">---Chọn đối tượng tìm kiếm việc
                                                                        làm---</option>
                                                                    <option value="1">Chưa từng làm việc</option>
                                                                    <option value="2">Đã từng làm việc</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Việc làm mong muốn</label>
                                                                <select name="vieclammongmuon[]" class="form-control">
                                                                    <option value="">---Chọn việc làm mong muốn---</option>
                                                                    <option value="3">Tất cả</option>
                                                                    <option value="1">Trong tỉnh, trong nước</option>
                                                                    <option value="2">Đi làm việc ở nước ngoài
                                                                    </option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Ngành nghề mong muốn</label>
                                                                <select name="nganhnghemongmuon[]"
                                                                    class="form-control selec2basic">
                                                                    <option value="">---Chọn ngành nghề mong muốn---
                                                                    </option>
                                                                    @foreach ($m_nganhnghe as $val)
                                                                        <option value="{{ $val->madm }}">
                                                                            {{ $val->tendm }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Thị trường </label>
                                                                <select name="thitruonglamviec[]"
                                                                    class="form-control selec2basic">
                                                                    <option value="">---Chọn thị trường muốn làm
                                                                        việc--</option>
                                                                    @foreach (getthitruong() as $k => $val)
                                                                        <option value="{{ $k }}">
                                                                            {{ $val }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Ngành nghề muốn học</label>
                                                                <select name="nganhnghemuonhoc[]"
                                                                    class="form-control selec2basic">
                                                                    <option value="">---Chọn ngành nghề muốn học---
                                                                    </option>
                                                                    @foreach ($m_nganhnghe as $val)
                                                                        <option value="{{ $val->madm }}">
                                                                            {{ $val->tendm }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Trình độ chuyên môn muốn học</label>
                                                                <select name="trinhdochuyenmonmuonhoc[]"
                                                                    class="form-control selec2basic">
                                                                    <option value="">---Chọn trình độ chuyên môn muốn
                                                                        học---</option>
                                                                    <option value="1">Sơ cấp</option>
                                                                    <option value="2">Trung cấp</option>
                                                                    <option value="3">Cao đẳng</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Ghi chú</label>
                                                                <input name="lydo[]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <input type="hidden" name="id">
                        <input type="hidden" name="madv" value="{{ $inputs['madv'] }}">
                        <input type="hidden" name="kydieutra" value="{{ $inputs['kydieutra'] }}">
                        <input type="hidden" name="quantity" id="quantity" value="1">
                        <input type="hidden" name="huyen" id="huyen" value="{{ $inputs['huyen'] ?? '' }}">
                        <input type="hidden" name="xa" id="xa" value="{{ $inputs['xa'] ?? '' }}">
                        <input type="hidden" name="tinh" id="tinh" value="44">
                        <input type="hidden" name="ho" id="ho" value="{{ $inputs['soho'] ?? '' }}">
                        <input type="hidden" name="nkid" id="nkid" value="{{ $inputs['nkid'] ?? '' }}">
                        <div class="card-footer">
                            <div class="row text-center">
                                <div class="col-lg-12 text-left">
                                    <button type="button" name="add" id="add" class="btn btn-success"> Thêm
                                        nhân khẩu</button>
                                    <button type="button" class="btn btn-danger" id='remove'>Giảm nhân khẩu</button>
                                </div>
                                <div class="col-lg-12">
                                    <a onclick="history.back()" class="btn btn-danger mr-5"><i
                                            class="fa fa-reply"></i>&nbsp;Quay lại</a>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Hoàn
                                        thành</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var i = 0;
        $("#add").click(function() {
            document.getElementById("quantity").value = parseInt(document.getElementById("quantity").value, 10) + 1;
            ++i;
            firstld = document.getElementById("1stld").innerHTML + '';
            nextld = "<div class='row' id ='row" + i + "' >" + firstld + "</div>"
            $("#dynamicTable").append(nextld);
        });
        $("#remove").click(function() {
            if ($('#quantity').val() > 1) {
                document.getElementById("quantity").value = parseInt(document.getElementById("quantity").value,
                    10) - 1;
            }
            delrowid = "row" + i;
            document.getElementById(delrowid).remove();
            --i;
        });
    </script>
@endsection
