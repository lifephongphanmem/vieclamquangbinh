@extends('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/global/plugins/select2/select2.css') }}" />
@stop

@section('custom-script')
    <script type="text/javascript" src="{{ url('assets/global/plugins/select2/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}">
    </script>

    <script src="{{ url('assets/admin/pages/scripts/table-lifesc.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged3.init();
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
                        <h3 class="card-label text-uppercase">Danh sách địa bàn</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ url('danh_muc/dsdonvi/them?madiaban=' . $inputs['madiaban']) }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Thêm mới</a>
                        {{-- <button class="btn btn-xs btn-icon btn-success mr-2" title="Nhận dữ liệu từ file Excel"
                            data-target="#modal-nhanexcel" data-toggle="modal">
                            <i class="fas fa-file-import"></i>
                        </button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover" id="sample_3">
                                <thead>
                                    <tr class="text-center">
                                        <th width="5%">STT</th>
                                        <th width="75%">Tên đơn vị</th>
                                        <th width="15%">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($model as $key => $tt)
                                        <tr class="odd gradeX">
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td class="active">{{ $tt->tendonvi }}</td>
                                            <td class="text-center">
                                                <a title="Sửa thông tin" href="{{ url('/DonVi/Sua?madonvi=' . $tt->madonvi) }}"
                                                    class="btn btn-sm btn-clean btn-icon">
                                                    <i class="icon-lg la flaticon-edit-1 text-primary"></i>
                                                </a>
                                                <a href="{{ url('/TaiKhoan/DanhSach?madonvi=' . $tt->madonvi) }}"
                                                    class="btn btn-icon btn-clean btn-lg mb-1 position-relative"
                                                    title="Danh sách tài khoản">
                                                    <span class="svg-icon svg-icon-xl">
                                                        <i class="icon-lg flaticon-list-2 text-dark"></i>
                                                    </span>
                                                    <span
                                                        class="label label-sm label-light-danger text-dark label-rounded font-weight-bolder position-absolute top-0 right-0">{{ $tt->sotaikhoan }}</span>
                                                </a>
        
                                                <button title="Xóa thông tin" type="button"
                                                    onclick="confirmDelete('{{ $tt->id }}','{{ $inputs['url'] . 'Xoa' }}')"
                                                    class="btn btn-sm btn-clean btn-icon" data-target="#delete-modal-confirm"
                                                    data-toggle="modal">
                                                    <i class="icon-lg flaticon-delete text-danger"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Card-->
        <!--end::Example-->
    </div>
    <!--end::Row-->

    @include('includes.delete')

    <form method="POST" action="" accept-charset="UTF-8" id="frm_modify">
        @csrf
        <div id="modify-modal" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Thông tin địa bàn quản lý</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    </div>
                    <div class="modal-body" data-select2-id="148">
                        <div class="form-horizontal" data-select2-id="147">
                            <div class="row form-group">
                                <div class="col-lg-4">
                                    <label class="control-label">Mã địa bàn</label>
                                    <input class="form-control" name="madiaban" type="text" id="madiaban">
                                </div>

                                <div class="col-lg-8">
                                    <label class="control-label">Tên địa bàn<span class="require">*</span></label>
                                    <input class="form-control" required="required" name="tendiaban" type="text"
                                        id="tendiaban">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label class="control-label">Phân loại</label>
                                    <select class="form-control select2me" name="capdo" id="capdo">
                                        <option value="T">Đơn vị hành chính cấp Tỉnh</option>
                                        <option value="H">Đơn vị hành chính cấp Huyện</option>
                                        <option value="X">Đơn vị hành chính cấp Xã</option>

                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label">Trực thuộc địa bàn</label>
                                    <select class="form-control select2me " name='madiabanQL' id='madiabanQL'>
                                        <option value="">Không chọn</option>
                                        @foreach ($model as $value)
                                            <option value="{{ $value->madiaban }}">{{ $value->tendiaban }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label class="control-label">Đơn vị quản lý</label>
                                    <select class="form-control select2me " name='madonviQL' id='madonviQL'>
                                        <option value="">Không chọn</option>
                                        @foreach ($model as $value)
                                            <option value="{{ $value->madiaban }}">{{ $value->tendiaban }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="edit" id='edit'>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" id="submit" name="submit" value="submit"
                            class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <script>
        function add() {
            $('#madiaban').val('');
            $('#madiaban').attr('readonly', true);
            var url = '/danh_muc/dsdiaban/store';
            $("#frm_modify").attr("action", url);
        }

        function edit(id, maquocgia, parent, name, level) {
            var url = '/dia_ban/update/' + id;
            $('#level option[value=' + level + ' ]').attr('selected', 'selected');
            $('#parent option[value=' + parent + ' ]').attr('selected', 'selected');
            $('#name').val(name);
            $('#madb').val(maquocgia)
            $('#edit').val(id);
            $("#frm_modify").attr("action", url);
        }

        // function setDiaBan(parent, level) {
        //     var url = '/dia_ban/store';
        //     switch (level) {
        //         case 'Tỉnh': {
        //             var lv = 'Huyện'
        //             break;
        //         }
        //         case 'Huyện': {
        //             var lv = 'Phường';
        //             break;
        //         }
        //         case 'Thành phố': {
        //             var lv = 'Phường';
        //             break;
        //         }
        //         case 'Thị xã': {
        //             var lv = 'Phường';
        //             break;
        //         }
        //         case 'Phường': {
        //             var lv = 'Thôn'
        //             break;
        //         }
        //         case 'Xã': {
        //             var lv = 'Thôn'
        //             break;
        //         }
        //         case 'Thị trấn': {
        //             var lv = 'Thôn'
        //             break;
        //         }
        //     }

        //     $('#level_th option[value=' + lv + ' ]').attr('selected', 'selected');
        //     $('#parent_th option[value=' + parent + ' ]').attr('selected', 'selected');
        //     $("#frm_modify_th").attr("action", url);
        // }
        function setDiaBan(madiaban, tendiaban, capdo, madonviQL, madiabanQL, madonviKT) {
            var form = $('#frm_modify');
            form.find("[name='madiaban']").val(madiaban);
            form.find("[name='tendiaban']").val(tendiaban);
            form.find("[name='capdo']").val(capdo).trigger('change');
            form.find("[name='madiabanQL']").val(madiabanQL).trigger('change');
            var url = '/danh_muc/dsdiaban/store';
            $("#frm_modify").attr("action", url);
        }
    </script>
@stop
