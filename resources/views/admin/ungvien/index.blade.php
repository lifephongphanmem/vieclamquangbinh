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
                        <div class="col-md-4">
                            <label style="font-weight: bold">Cấp bậc</label>
                            <select name="chucdanh" id="chucdanh" class="form-control" value="">
                                <option value="">Chọn chức danh</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label style="font-weight: bold">Mức lương</label>
                            <form action="{{ '/ungvien' }}" id="frm_checkluong" method="GET"
                                enctype="multipart/form-data">
                                <input type="number" name="luongmin" id="luongmin" placeholder="Nhỏ nhất"
                                    value="{{ isset($inputs['luongmin']) ? $inputs['luongmin'] : '' }}">
                                <input type="number" name="luongmax" id="luongmax" placeholder="Lớn nhất"
                                    value="{{ isset($inputs['luongmax']) ? $inputs['luongmax'] : '' }}">
                                <a onclick="checkluong()" class="btn btn-sm btn-success ml-3">Tìm</a>
                            </form>

                        </div>

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
                                    <td>{{ $item->chucdanh }}</td>
                                    <td>{{ $item->nganhnghe }}</td>
                                    <td>{{ $item->luong }}</td>
                                    <td></td>
                                    <td>{{ $item->created_at }}</td>
                                    <td style="text-align: center">
                                        @if ($item->status == '1')
                                            <a data-toggle="modal" data-target="#modal_trangthai"  onclick="addtrangthai('{{ $item->user }}','2')"
                                                 title="click để khóa"> <i class="fa fa-check text-success " aria-hidden="true"></i></a>
                                        @else
                                            <a data-toggle="modal" data-target="#modal_trangthai" onclick="addtrangthai('{{ $item->user }}','1')"
                                                title="click để kích hoạt"><i class="fa fa-times text-danger "
                                                    aria-hidden="true"></i></a>
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        <a href="{{ '/ungvien/edit?user=' . $item->user }}" title="Sửa thông tin"
                                            type="button" class="btn btn-sm btn-clean btn-icon">
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

    <div id="modal_trangthai" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="frmtrangthai" method="POST" action="{{ '/ungvien/trangthai' }}" accept-charset="UTF-8">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Đồng thay đổi trạng thái?</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    </div>
                    <input name="user" id="user">
                    <input name="trangthai" id="trangthai">
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Hủy thao tác</button>
                        <button type="submit"  class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @include('includes.delete')
    <script>
        function addtrangthai(user,tt) {
            $('#user').val(user);
            $('#trangthai').val(tt);
        }
        
        function checkluong() {
            var luongmin = $('#luongmin').val();
            var luongmax = $('#luongmax').val();
            if (luongmin != '' && luongmax != '') {
                if (luongmin > luongmax) {
                    toastr.warning('Lỗi', 'Lương nhỏ nhất không được nhỏ hơn lương lớn nhất')
                } else {
                    $('#frm_checkluong').submit();
                }
            }else{
                $('#frm_checkluong').submit();
            }
        }
    </script>


@endsection
