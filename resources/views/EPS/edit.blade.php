{{-- @extends ('admin.layout') --}}
@extends ('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
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
    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title text-uppercase">Đăng ký dự thi tiếng hàn eps (2024)</h3>
            <div class="card-toolbar">
            </div>
        </div>
        <!--begin::Form-->
        <form action="{{ '/EPS/Update' }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group mb-8">
                    {{-- <div class="alert alert-custom alert-default" role="alert">
                        <div class="alert-icon">
                            <span class="svg-icon svg-icon-primary svg-icon-xl">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z"
                                            fill="#000000" opacity="0.3" />
                                        <path
                                            d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                        <div class="alert-text">Người lao động khi đến đăng ký làm thẻ dự thi
                            tiếng Hàn theo Chương trình EPS năm 2024, đề nghị hoàn thành các câu
                            hỏi sau,<br>
                            <b>Lưu ý mỗi người chỉ nhập thông tin cá nhân của mình một lần</b>
                        </div>
                    </div> --}}
                </div>
                <div class="row">
                    <div class="form-group col-xl-6">
                        <label>Số báo danh</label>
                        <input type="text" name="sobaodanh" value="{{ $model->sobaodanh }}" class="form-control"
                            placeholder="Số báo danh" />
                        {{-- <span class="form-text text-muted">VD: Nguyễn Văn A</span> --}}
                    </div>
                    <input type="hidden" name='id' value="{{ $model->id }}">
                </div>
                <div class="row">
                    <div class="form-group col-xl-6">
                        <label>Họ và tên
                            <span class="text-danger">*</span></label>
                        <input type="text" name="hoten" value="{{ $model->hoten }}" class="form-control"
                            placeholder="Điền đầy đủ họ tên" required />
                        <span class="form-text text-muted">VD: Nguyễn Văn A</span>
                    </div>
                    <div class="form-group col-xl-6">
                        <label for="exampleInputPassword1">Ngày tháng năm sinh
                            <span class="text-danger">*</span></label>
                        <input type="date" name="ngaysinh" value="{{ $model->ngaysinh }}" required class="form-control"
                            id="exampleInputPassword1" placeholder="Password" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xl-6">
                        <label for="exampleSelect1">Giới tính
                            <span class="text-danger">*</span></label>
                        <select class="form-control" name="gioitinh" id="exampleSelect1">
                            <option value="1" {{ $model->gioitinh == 1 ? 'selected' : '' }}>Nam</option>
                            <option value="0" {{ $model->gioitinh == 0 ? 'selected' : '' }}>Nữ</option>
                        </select>
                    </div>
                    <div class="form-group col-xl-6">
                        <label>Số CCCD hoặc Hộ chiếu
                            <span class="text-danger">*</span></label>
                        <input type="text" name="cccd" value="{{ $model->cccd }}" required class="form-control"
                            placeholder="Điền số CCCD hoặc Hộ chiếu" />
                        @if ($errors->has('cccd'))
                            <span class=" form-text text-danger">{{ $errors->first('cccd') }}</span>
                        @endif
                        {{-- <span class="form-text text-muted">VD: Nguyễn Văn A</span> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xl-6">
                        <label for="exampleSelect1">Phân loại: Người lao động đã từng đi làm
                            việc tại Hàn Quốc chọn
                            <span class="text-danger">*</span></label>
                        <select class="form-control" name="phanloai">
                            @foreach (phanloai() as $k => $ct)
                                <option value="{{ $k }}" {{ $model->phanloai == $k ? 'selected' : '' }}>
                                    {{ $ct }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-xl-6">
                        <label for="exampleSelect1">Đối tượng
                            <span class="text-danger">*</span></label>
                        <select class="form-control" name="doituong">
                            @foreach (doituong() as $k => $ct)
                                <option value="{{ $k }}" {{ $model->doituong == $k ? 'selected' : '' }}>
                                    {{ $ct }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xl-6">
                        <label for="exampleSelect1">Ngành đăng ký dự thi
                            <span class="text-danger">*</span></label>
                        <select class="form-control" name="nganhdkthi" onchange="getnganh()" id="nganhdk">
                            @foreach (NganhDKthi() as $key => $ct)
                                <option value="{{ $key }}" {{ $model->nganhdkthi == $key ? 'selected' : '' }}>
                                    {{ $ct }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-xl-6">
                        <label for="exampleSelect1">Nghề
                            <span class="text-danger">*</span></label>
                        <div id="nghedk">
                            @if ($model->nganhdkthi == 'KHAC')
                                <input type="text" name="nghekhac" value="{{ $model->nghekhac }}" id="nghe"
                                    class="form-control" placeholder="Nghề đăng ký theo ngành khác" />
                            @else
                                <select class="form-control" name="nghe" id='nghe'>
                                    @foreach (NgheDK()[$model->nganhdkthi] as $k => $ct)
                                        <option value="{{ $k }}" {{ $model->nghe == $k ? 'selected' : '' }}>
                                            {{ $ct }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xl-3">
                        <label>Tỉnh
                            <span class="text-danger">*</span></label>
                        <input type="text" name="tinh" required value="{{ $model->tinh }}" class="form-control"
                            placeholder="Điền tỉnh" />
                    </div>
                    <div class="form-group col-xl-3">
                        <label>Huyện
                            <span class="text-danger">*</span></label>
                        <input type="text" name="huyen" value="{{ $model->huyen }}" required class="form-control"
                            placeholder="Điền Huyện" />
                    </div>
                    <div class="form-group col-xl-3">
                        <label>Xã
                            <span class="text-danger">*</span></label>
                        <input type="text" name="xa" value="{{ $model->xa }}" required class="form-control"
                            placeholder="Điền Xã" />
                    </div>
                    <div class="form-group col-xl-3">
                        <label>Thôn/ xóm
                            <span class="text-danger">*</span></label>
                        <input type="text" name="thonxom" value="{{ $model->thonxom }}" required
                            class="form-control" placeholder="Điền Xã" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xl-6">
                        <label>Số điện thoại
                            <span class="text-danger">*</span></label>
                        <input type="text" name="sdt" value="{{ $model->sdt }}" required class="form-control"
                            placeholder="Điền số điện thoại" />
                    </div>
                    <div class="form-group col-xl-6">
                        <label for="exampleSelect1">Đăng ký tham gia học tiếng Hàn tại TTDVVL
                            Quảng Bình
                            <span class="text-danger">*</span></label>
                        <select class="form-control" name="dkhoc" id="dkhoc">
                            <option value="1" {{ $model->dkhoc == 1 ? 'selected' : '' }}>Đăng ký</option>
                            <option value="0" {{ $model->dkhoc == 0 ? 'selected' : '' }}>Không</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ '/EPS/DanhSach' }}" style="font-size: 16px" class="btn btn-warning mr-2">Quay lại</a>
                @if (chkPhanQuyen('danhsachdangkyeps', 'thaydoi'))
                    <button type="submit" style="font-size: 16px" class="btn btn-primary mr-2">Cập nhật</button>
                @endif
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Card-->
    <script>
        function getnganh() {
            var manganh = $('#nganhdk').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/EPS/getnghe',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    manganh: manganh
                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    $('#nghe').remove();
                    $('#nghedk').append(data);
                },
                error: function(message) {
                    toastr.error(message, 'Lỗi!');
                }
            });
        }
    </script>
@endsection
