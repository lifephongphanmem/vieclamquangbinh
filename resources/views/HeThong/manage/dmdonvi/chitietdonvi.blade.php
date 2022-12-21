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
                        <h3 class="card-label text-uppercase">Danh sách đơn vị - {{ $donvi->name }}</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ '/dmdonvi/create?madonvi=' . $donvi->id . '&maquocgia=' . $donvi->maquocgia . '&parent=' . $donvi->parent }}"
                            class="btn btn-xs btn-icon btn-success mr-2" title="Thêm mới đơn vị"><i
                                class="fa fa-plus"></i></a>
                        {{-- <button class="btn btn-xs btn-icon btn-success mr-2" title="Nhận dữ liệu từ file Excel"
                            data-target="#modal-nhanexcel" data-toggle="modal">
                            <i class="fas fa-file-import"></i>
                        </button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr class="text-center">
                                <th>STT</th>
                                <th>Tên đơn vị</th>
                                <th>Thao tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $key => $diaban)
                                <tr class="text-center">
                                    <td>{{ ++$key }}</td>
                                    <td class="text-left">{{ $diaban->tendv }}</td>
                                    <td>
                                        <a title="Sửa thông tin" href="{{ '/dmdonvi/edit/' . $diaban->id }}"
                                            class="btn btn-sm btn-clean btn-icon">
                                            <i class="icon-lg la flaticon-edit-1 text-primary"></i>
                                        </a>
                                        <a href="{{ '/TaiKhoan/DanhSach?madv=' . $diaban->madv }}"
                                            class="btn btn-icon btn-clean btn-lg mb-1 position-relative"
                                            title="Danh sách tài khoản">
                                            <span class="svg-icon svg-icon-xl">
                                                <i class="icon-lg flaticon-list-2 text-dark"></i>
                                            </span>
                                            <span
                                                class="label label-sm label-light-danger text-dark label-rounded font-weight-bolder position-absolute top-0 right-0">{{ count(App\Models\User::where('madv', $diaban->madv)->get()) }}</span>
                                        </a>
                                        <button title="Xóa thông tin" type="button"
                                            onclick="cfDel('{{ '/dmdonvi/delete/' . $diaban->id }}')"
                                            class="btn btn-sm btn-clean btn-icon" data-target="#delete-modal-confirm"
                                            data-toggle="modal">
                                            <i class="icon-lg flaticon-delete text-danger"></i></button>
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
    @include('includes.delete')
@stop
