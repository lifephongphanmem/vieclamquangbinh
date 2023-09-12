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
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Danh sách ứng viên</h3>
                    </div>
                    <div class="card-toolbar">

                        {{-- @if (chkPhanQuyen('danhsachdieutra', 'thaydoi') && $inputs['kydieutra'] == date('Y')) --}}
                        <div class="card-toolbar">
                            <a href="{{ '/ungvien/create' }}" class="btn btn-xs btn-success mr-3"><i class="fa fa-plus"></i>
                                &ensp;Thêm</a>
                        </div>
                        {{-- @endif
 
                        @if (session('admin')->capdo == 'X') --}}
                        <button onclick="Inchitiet(' ')" data-target="#in-modal-confirm" data-toggle="modal" title="In"
                            class="btn btn-sm btn-success ml-3">
                            <i class="icon-lg la flaticon2-print text-primary"></i>Xuất danh sách
                        </button>
                        {{-- @endif --}}

                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">


                    </div>
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr class="text-center">
                                <th> STT </th>
                                <th>Tên ứng viên</th>
                                <th>Email</th>
                                <th>Điện thoại</th>
                                <th>Cấp bậc</th>
                                <th>Ngành nghề</th>
                                <th>Mức lương</th>
                                <th>Nơi làm việc</th>
                                <th>Ngày tạo</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->hoten }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->capbac }}</td>
                                    <td>{{ $item->nganhnghe }}</td>
                                    <td>{{ $item->luong }}</td>
                                    <td></td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->status == '1' ? 'kích hoạt' : 'khóa' }}</td>
                                    <td>
                                        <a href="{{ '/ungvien/edit?user='.$item->user }}" title="Sửa thông tin" type="button"
                                            class="btn btn-sm btn-clean btn-icon">
                                            <i class="icon-lg la flaticon-edit-1 text-primary"></i>
                                        </a>
                                        <button title="Xóa thông tin" data-toggle="modal"
                                            data-target="#delete-modal-confirm" type="button"
                                            onclick="cfDel('{{ '/ungvien/delete/' . $item->user }}')"
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
        </div>
    </div>

    @include('includes.delete')
@endsection
