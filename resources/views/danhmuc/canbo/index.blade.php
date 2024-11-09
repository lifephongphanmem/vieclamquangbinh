@extends('main')
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
            $('#madv_cb, #mahuyen_cb').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv_cb').val() +
                    '&mahuyen=' + $('#mahuyen_cb').val();
            });
        });
    </script>
@stop
@section('content')

    <!--begin::Row-->
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Example-->
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">DANH MỤC CÁN BỘ</h3>
                    </div>
                    <div class="card-toolbar">
                        {{-- @if (chkPhanQuyen('trinhdogdpt', 'thaydoi')) --}}
                        {{-- <button onclick="create()" data-toggle="modal" data-target="#create_edit_modal"
                            class="btn btn-m btn-success mr-2" title="Thêm mới"><i class="fa fa-plus"></i>Thêm mới</button> --}}
                        {{-- @endif --}}
                        <button onclick="create()" class="btn btn-m btn-success mr-2" title="Thêm mới"><i
                                class="fa fa-plus"></i>Thêm mới</button>
                        <button class="btn btn-m btn-success mr-2" data-toggle="modal" data-target="#in_modal"
                            title="In danh sách"><i class=" text-dark-50 flaticon2-print"></i></i>In danh sách</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label style="font-weight: bold">Xã</label>
                            <select name="madv" id="madv_cb" class="form-control select2basic">
                                @if (in_array(session('admin')->capdo, ['T', 'H']))
                                    <option value="">----Chọn xã---</option>
                                @endif

                                @foreach ($a_xa as $key => $ct)
                                    <option value="{{ $ct->madv }}"
                                        {{ $ct->madv == $inputs['madv'] ? 'selected' : '' }}>
                                        {{ $ct->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label style="font-weight: bold">Huyện</label>
                            <select name="mahuyen" id="mahuyen_cb" class="form-control select2basic">
                                @foreach ($a_huyen as $key => $ct)
                                    <option value="{{ $key }}"
                                        {{ isset($inputs['mahuyen']) ? ($inputs['mahuyen'] == $key ? 'selected' : '') : '' }}>
                                        {{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr class="text-center">
                                <th width="5%"> STT </th>
                                <th>Họ tên</th>
                                <th width="8%">Ngày sinh</th>
                                <th width="8%">CCCD</th>
                                <th width="8%">Điện thoại</th>
                                <th>Địa chỉ</th>
                                {{-- <th width="8%">Trạng thái</th> --}}
                                <th width="8%">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $k => $ct)
                                <tr>
                                    <td>{{ ++$k }}</td>
                                    <td>{{ $ct->name }}</td>
                                    <td>{{ getDayVn($ct->ngaysinh) }}</td>
                                    <td>{{ $ct->cccd }}</td>
                                    <td>{{ $ct->sdt }}</td>
                                    <td>{{ $ct->diachi }}</td>
                                    {{-- <td>{{$a_trangthai[$ct->status]}}</td> --}}
                                    <td>
                                        <button title="Sửa thông tin" data-toggle="modal" data-target="#create_edit_modal"
                                            type="button" onclick="edit('{{ $ct->id }}')"
                                            class="btn btn-sm btn-clean btn-icon">
                                            <i class="icon-lg la flaticon-edit-1 text-primary"></i>
                                        </button>
                                        <button title="Xóa thông tin" data-toggle="modal"
                                            data-target="#delete-modal-confirm" type="button"
                                            onclick="cfDel('{{ '/danh_muc/canbo/delete/' . $ct->id }}')"
                                            class="btn btn-sm btn-clean btn-icon">
                                            <i class="icon-lg flaticon-delete text-danger"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <!--end::Card-->
            <!--end::Example-->
        </div>
    </div>
    <!--end::Row-->



    <!--create Modal-->
    <div class="modal fade" id="create_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-label">
                        Thông tin cán bộ
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                {!! Form::open([
                    'url' => '/danh_muc/canbo/store',
                    'method' => 'post',
                    'id' => 'frm_create_edit',
                ]) !!}
                {{-- @csrf --}}
                <div class="modal-body">
                    <div class="row">
                        <input type="number" id="id" name="id" hidden />
                        <input type="text" id="madv_create" name="madv" hidden />
                        <div class="col-xl-4">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Họ tên*</b></label>
                                <input type="text" id="hoten" name="name" class="form-control"
                                    onkeyup="taotk()" />
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Tài khoản</b></label><span style="float: right"><a onclick="Kiemtra()"
                                        class="btn btn-link-success font-weight-bold">Kiểm tra</a></span>
                                <input type="text" id="username" name="username" placeholder="Viết liền không dấu"
                                    class="form-control" />
                                <p id='thongbao'></p>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Mật khẩu</b></label>
                                <input type="password" id="password" name="password"
                                    placeholder="Không thay đổi thì không cần điền" value="123456abc"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Phân loại</b></label>
                                <select class="form-control" name="phanloai">
                                    <option value="tonghop">Tổng hợp</option>
                                    <option value="nhaplieu">Nhập liệu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Cấp độ</b></label>
                                <select class="form-control" name="capdo">
                                    <option value="T">Tài khoản cấp Tỉnh</option>
                                    <option value="H">Tài khản cấp Huyện</option>
                                    <option value="X">Tài khản cấp Xã</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Nhóm chức năng</b></label>
                                <select class="form-control" name="manhomchucnang">
                                    @foreach ($a_nhomchucnang as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Ngày sinh</b></label>
                                <input type="date" id="ngaysinh" name="ngaysinh" class="form-control" />
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>CCCD</b></label>
                                <input type="text" id="cccd" name="cccd" class="form-control" />
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Giới tính</b></label>
                                <select type="text" name="gioitinh" class="form-control">
                                    <option value="0">Nam</option>
                                    <option value="1">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Điện thoại</b></label>
                                <input type="text" id="sdt" name="sdt" class="form-control" />
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Địa chỉ</b></label>
                                <input type="text" id="diachi" name="diachi" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger font-weight-bold">Đồng ý</button>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
<!-- modal in danh sách -->
<form method="POST" action="{{ '/danh_muc/canbo/In' }}" accept-charset="UTF-8" id="frm_modify_in"
    target="_blank">
    @csrf
    <div id="in_modal" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <h4 id="modal-header-primary-label" class="modal-title">In danh sách cán bộ
                    </h4>
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12 mb-2">
                        <label class="control-label">Chọn huyện</label>
                        <select name="madv_huyen" class="form-control" style="width:100%">
                            <option value="ALL">Tất cả</option>
                            @foreach ($a_huyen as $key => $ct)
                            <option value="{{ $key }}">
                                {{ $ct }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12 mb-2" id="chon_xa_mau03">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" name="submit" value="submit"
                        class="btn btn-primary">Đồng
                        ý</button>
                </div>
            </div>
        </div>
    </div>
</form>

    @include('includes.delete')
    <script>
        function validate() {
            if ($('#stt').val() <= 0) {
                toastr.error('số thứ tự phải là số tự nhiên và lớn hơn 0', 'Lỗi!');
            } else {
                $('#frm_create_edit').submit();

            }
        }

        function taotk() {
            // var tk=removeVietnameseTones()
            $('#username').val(removeVietnameseTones($('#hoten').val()));
        }

        function removeVietnameseTones(str) {
            return str.toLowerCase()
                .normalize('NFD').replace(/[\u0300-\u036f]/g, '') // Loại bỏ dấu tiếng Việt
                .replace(/đ/g, 'd').replace(/Đ/g, 'D') // Thay thế 'đ' thành 'd'
                .replace(/\s+/g, ''); // Loại bỏ khoảng trắng
        }

        function edit(id) {

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/danh_muc/canbo/edit',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    var phanloai = '';
                    if (data.tonghop == 1) {
                        phanloai = 'tonghop'
                    } else if (data.nhaplieu == 1) {
                        phanloai = 'nhaplieu';
                    }
                    var form = $('#frm_create_edit');
                    form.find("[name='id']").val(data.id);
                    form.find("[name='madv']").val(data.madv);
                    form.find("[name='name']").val(data.name);
                    form.find("[name='password']").val('');
                    form.find("[name='ngaysinh']").val(data.ngaysinh);
                    form.find("[name='username']").val(data.username);
                    form.find("[name='sdt']").val(data.sdt);
                    form.find("[name='cccd']").val(data.cccd);
                    form.find("[name='diachi']").val(data.diachi);
                    form.find("[name='gioitinh']").val(data.gioitinh).trigger('change');
                    form.find("[name='capdo']").val(data.capdo).trigger('change');
                    form.find("[name='phanloai']").val(phanloai).trigger('change');
                    form.find("[name='nhomchucnang']").val(data.nhomchucnang).trigger('change');

                },
                error: function(message) {
                    toastr.error(message, 'Lỗi!');
                }
            });
        }

        function create() {
            var madv = $('#madv_cb').val();
            if (madv == '') {
                toastr.error('Chọn xã trước khi thêm mới', 'Lỗi!');
            } else {
                $('#create_edit_modal').modal('show');
                var form = $('#frm_create_edit');
                form.find("[name='id']").val(null);
                form.find("[name='hoten']").val('');
                form.find("[name='ngaysinh']").val('');
                form.find("[name='name']").val('');
                form.find("[name='sdt']").val('');
                form.find("[name='cccd']").val('');
                form.find("[name='madv']").val(madv);
            }

        }

        function Kiemtra() {
            var taikhoan = $('#username').val();
            console.log(taikhoan);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/danh_muc/canbo/kiemtra',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    taikhoan: taikhoan
                },
                dataType: 'JSON',
                success: function(data) {
                    if (data.status) {
                        $('#thongbao').replaceWith(data.message)
                    }
                    // var form = $('#frm_create_edit');
                    // form.find("[name='id']").val(data.id);
                    // form.find("[name='tengdpt']").val(data.tengdpt);
                    // form.find("[name='trangthai']").val(data.trangthai).trigger('change');
                    // form.find("[name='stt']").val(data.stt);
                },
                error: function(message) {
                    toastr.error(message, 'Lỗi!');
                }
            });
        }
    </script>
@endsection
