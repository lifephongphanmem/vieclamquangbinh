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
                        <h3 class="card-label text-uppercase">Danh mục thôn xóm</h3>
                    </div>
                    <div class="card-toolbar">
                        {{-- <a href="" class="btn btn-xs btn-success mr-2">Tạo mới</a> --}}
                        {{-- @if (chkPhanQuyen('chucvu', 'thaydoi')) --}}
                        <button type="button" onclick="add()" class="btn btn-success btn-sm" data-target="#modify-modal"
                        data-toggle="modal" title="Thêm mới">
                        <i class="fa fa-plus"></i>Thêm mới</button>
                        {{-- @endif --}}
                    {{-- </button>
                        <button class="btn btn-xs btn-icon btn-success mr-2" title="Nhận dữ liệu từ file Excel"
                            data-target="#modal-nhanexcel" data-toggle="modal">
                            <i class="fas fa-file-import"></i>
                        </button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr class="text-center odd">
                                <th style="width:5%">STT</th>
                                <th style="width:10%">Mã đơn vị</th>
                                <th >Tên đơn vị</th>
                                <th>Xã/Phường/Thị trấn</th>
                                <th style="width:15%">Thao tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $model as $key=>$dv )
                            <tr>
                                <td class="text-center">{{ ++$key }}</td>
                                <td name='tendanhmuc'>{{ $dv->maquocgia }}</td>
                                <td name='tenxom'>{{ $dv->name }}</td>
                                <td>{{$dv->parent != null?$a_xa[$dv->parent]:''}}</td>
                                    <td class="text-center">
                                        {{-- @if (chkPhanQuyen('chucvu', 'thaydoi')) --}}
                                        <button onclick="edit(this,'{{ $dv->maquocgia }}','{{$dv->parent}}')"
                                            class="btn btn-sm btn-clean btn-icon" data-target="#modify-modal"
                                            title="Thay đổi thông tin" data-toggle="modal">
                                            <i class="icon-lg la fa-edit text-primary icon-2x"></i></button>
                                            <button title="Xóa thông tin" type="button" onclick="cfDel('{{'/dmthonxom/delete/'.$dv->id}}')" class="btn btn-sm btn-clean btn-icon" data-target="#delete-modal-confirm" data-toggle="modal">
                                                <i class="icon-lg flaticon-delete text-danger"></i></button>
                                                {{-- @endif --}}
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

    <form method="POST" action="" accept-charset="UTF-8" id="frm_modify">
        @csrf
        <div id="modify-modal" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Thông tin danh mục</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group ">
                                    <label class="control-label">Tên thôn xóm</label>
                                    <input type="text" id="tenxom" name="name" class="form-control" />
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group fv-plugins-icon-container">
                                    <label class="control-label">Xã / Phường / Thị trấn</label>
                                   <select name="xa" id="xa" class="form-control" style="width:100%">
                                    <option value="">--- Chọn xã phường ---</option>
                                    @foreach ($a_xa as $key=>$val )
                                        <option value="{{$key}}">{{$val}}</option>
                                    @endforeach
                                   </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name='id' id='edit'>
                    </div>
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
        function add()
        {
            var url='/dmthonxom/store'
            $('#tenxom').val('');
            $('#frm_modify').attr('action',url);
        }

        function edit(e,madv,maquocgia)
        {
            var url='/dmthonxom/store?madv='+madv;
            var tr = $(e).closest('tr');
            $('#tenxom').val($(tr).find('td[name=tenxom]').text());
            // $('#xa').val($(tr).find('td[name=mota]').text());
            $('#xa option[value=' + maquocgia + ' ]').attr('selected', 'selected');
            $('#frm_modify').attr('action',url);
        }
    </script>
@stop
