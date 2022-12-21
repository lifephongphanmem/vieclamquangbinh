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
                        <h3 class="card-label text-uppercase">Danh sách tài khoản đơn vị: {{ $model->tendv }}</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ '/TaiKhoan/ThemMoi?id=' . $model->id }}" class="btn btn-sm btn-success mr-2"
                            title="Thêm mới tài khoản"><i class="fa fa-plus"></i>Thêm mới</a>
                        <a href="{{ '/TaiKhoan/ThongTin?phanloaitk=1' }}" class="btn btn-sm btn-info mr-2"
                            title="Quay lại"><i class="fa fa-reply"></i>Quay lại</a>
                        {{-- <button class="btn btn-sm btn-icon btn-success mr-2" title="Nhận dữ liệu từ file Excel"
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
                                <th>Tên tài khoản</th>
                                <th>Tài khoản truy cập</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model_tk as $key => $tk)
                                <tr class="text-center">
                                    <td style="width: 2%">{{ ++$key }}</td>
                                    <td class="text-left" style="width: 50%">{{ $tk->name }}</td>
                                    <td class="text-left" style="width: 10%">{{ $tk->username }}</td>
                                    @if ($tk->status == 1)
                                        <td class="text-center">
                                            <button title="Tài khoản đang được kích hoạt"
                                                class="btn btn-sm btn-clean btn-icon">
                                                <i class="icon-lg la fa-check text-primary icon-2x"></i></button>
                                        </td>
                                    @else
                                        <td class="text-center">
                                            <button title="Tài khoản bị vô hiệu" class="btn btn-sm btn-clean btn-icon">
                                                <i class="icon-lg la fa-times-circle text-danger icon-2x"></i></button>
                                        </td>
                                    @endif
                                    <td class="text-center">
                                        <a title="Sửa thông tin" href="{{ '/TaiKhoan/edit_tk/' . $tk->id }}"
                                            class="btn btn-sm btn-clean btn-icon">
                                            <i class="icon-lg la flaticon-edit-1 text-primary "></i>
                                        </a>
                                        @if ($tk->status == 1)
                                            <a title="Phân quyền" href="{{'/TaiKhoan/PhanQuyen?tendangnhap='.$tk->username.'&phnaloaitk='.$tk->phanloaitk}}" class="btn btn-sm btn-clean btn-icon">
                                                <i class="icon-lg la flaticon-user-settings text-primary icon-2x"></i></a>

                                            <button type="button" onclick="setPerGroup('{{ $tk->manhomchucnang }}','{{ $tk->username }}','{{$tk->phanloaitk}}')"
                                                class="btn btn-sm btn-clean btn-icon" data-target="#modify-nhomchucnang"
                                                data-toggle="modal" title="Đặt lại quyền theo nhóm chức năng">
                                                <i class="icon-lg la flaticon-network text-primary icon-2x"></i>
                                            </button>

                                            <button title="Xóa thông tin" type="button"
                                                onclick="cfDel('{{ '/TaiKhoan/delete/' . $tk->id }}')"
                                                class="btn btn-sm btn-clean btn-icon" data-target="#delete-modal-confirm"
                                                data-toggle="modal">
                                                <i class="icon-lg la fa-trash-alt text-danger icon-2x"></i></button>
                                        @endif
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
    <div id="modify-nhomchucnang" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade kt_select2_modal">
        {!! Form::open(['url' => '/TaiKhoan/NhomChucNang', 'id' => 'frm_nhomchucnang']) !!}
        <input type="hidden" name="tendangnhap" />
        <input type="hidden" name="phanloaitk" />
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý tải lại phân quyền của tài khoản?
                    </h4>
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
    
                </div>
                <div class="modal-body">
                    <p style="color: #0000FF">Các phân quyền của tài khoản sẽ được tải lại theo nhóm chức năng và không thể khôi phục lại</p>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label class="control-label">Tên nhóm chức năng<span class="require">*</span></label>
                            {{-- {!! Form::select('manhomchucnang', $a_nhomtk, null, ['class' => 'form-control select2basic', 'required'=>'true','width'=>'100%']) !!} --}}
                            <select name="manhomchucnang" id="" class="form-control select2basic" required style="width:100%">
                                <option value="">Tất cả</option>
                                @foreach ($a_nhomtk as $key=>$val )
                                    <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickNhanvaTKT()">Đồng
                        ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

    @include('includes.delete')
    <script>
            function clickNhanvaTKT() {
        $('#frm_nhomchucnang').submit();
    }
    function setPerGroup(manhomchucnang, tendangnhap,phanloaitk) {
        $('#frm_nhomchucnang').find("[name='manhomchucnang']").val(manhomchucnang);
        $('#frm_nhomchucnang').find("[name='tendangnhap']").val(tendangnhap);
        $('#frm_nhomchucnang').find("[name='phanloaitk']").val(phanloaitk);
    }
    </script>
@stop
